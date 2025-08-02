<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Voucher;
use App\Http\Requests\OrderRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $user = auth('api')->user();

        $query = Order::with(['paymentMethod', 'voucher', 'orderDetails.product'])
            ->where('user_id', $user->id);

        // Lọc theo trạng thái đơn hàng
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Sắp xếp theo ngày tạo mới nhất
        $perPage = $request->get('per_page', 10);
        $orders = $query->orderBy('created_at', 'desc')->paginate($perPage);

        // Transform data theo format API
        $transformedData = $orders->through(function ($order) {
            return $this->transformOrder($order);
        });

        return response()->json([
            'success' => true,
            'data' => $transformedData,
            'message' => 'Lấy danh sách đơn hàng thành công'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request): JsonResponse
    {
        /** @var User|null $user */
        $user = auth('api')->user();
        $validated = $request->validated();

        // Verify that address belongs to user
        $address = $user->addressBooks()->find($validated['shipping_address_id']);
        if (!$address) {
            return response()->json([
                'success' => false,
                'message' => 'Địa chỉ giao hàng không thuộc về bạn'
            ], 403);
        }

        DB::beginTransaction();

        try {
            $totalPrice = 0;
            $orderItems = [];

            // Validate products and calculate total
            foreach ($validated['items'] as $item) {
                $product = Product::find($item['product_id']);

                if (!$product) {
                    throw new \Exception('Sản phẩm không tồn tại');
                }

                if ($product->stock < $item['quantity']) {
                    throw new \Exception("Sản phẩm {$product->name} không đủ số lượng. Còn lại: {$product->stock}");
                }

                $itemTotal = $product->price * $item['quantity'];
                $totalPrice += $itemTotal;

                $orderItems[] = [
                    'product' => $product,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                    'total' => $itemTotal
                ];
            }

            // Apply voucher if provided
            $voucherDiscount = 0;
            $voucherId = null;
            if (!empty($validated['voucher_code'])) {
                $voucher = Voucher::where('code', strtoupper($validated['voucher_code']))->first();

                if (!$voucher) {
                    throw new \Exception('Voucher không tồn tại');
                }

                if (!$voucher->isValid()) {
                    throw new \Exception('Voucher không còn hiệu lực');
                }

                if (!$voucher->canApplyToOrder($totalPrice)) {
                    throw new \Exception('Đơn hàng không đủ điều kiện áp dụng voucher');
                }

                $voucherDiscount = $voucher->calculateDiscount($totalPrice);
                $voucher->incrementUsage();
                $voucherId = $voucher->id;
            }

            $shippingFee = 30000; // Fixed shipping fee 30k for now
            $finalTotal = $totalPrice + $shippingFee - $voucherDiscount;

            // Generate order number
            $orderNumber = 'ORD-' . date('Y') . '-' . str_pad(Order::count() + 1, 6, '0', STR_PAD_LEFT);

            // Create order
            $order = Order::create([
                'order_number' => $orderNumber,
                'status' => 'pending',
                'total_amount' => $totalPrice,
                'shipping_fee' => $shippingFee,
                'voucher_discount' => $voucherDiscount,
                'final_amount' => $finalTotal,
                'payment_method' => $validated['payment_method'],
                'note' => $validated['note'] ?? null,
                'address_id' => $validated['shipping_address_id'], // Giữ để tham chiếu
                'payment_method_id' => 1, // Default payment method ID
                'payment_status' => 'pending',
                'voucher_id' => $voucherId,
                'user_id' => $user->id,
                'total_price' => $finalTotal, // Backup field
                // Lưu thông tin địa chỉ trực tiếp
                'shipping_recipient_name' => $address->recipient_name,
                'shipping_recipient_phone' => $address->recipient_phone,
                'shipping_address' => $address->address,
                'shipping_ward' => $address->ward,
                'shipping_district' => $address->district,
                'shipping_province' => $address->province,
                'shipping_postal_code' => $address->postal_code,
            ]);

            // Create order details and update product quantities
            foreach ($orderItems as $item) {
                OrderDetail::create([
                    'product_id' => $item['product']->id,
                    'order_id' => $order->id,
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                ]);

                // Update product quantity
                $item['product']->decrement('stock', $item['quantity']);
            }

            DB::commit();

            $order->load(['paymentMethod', 'voucher', 'orderDetails.product']);

            return response()->json([
                'success' => true,
                'data' => $this->transformOrder($order),
                'message' => 'Tạo đơn hàng thành công'
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order): JsonResponse
    {
        $user = auth('api')->user();

        if ($order->user_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Bạn không có quyền xem đơn hàng này'
            ], 403);
        }

        $order->load(['paymentMethod', 'voucher', 'orderDetails.product.category', 'orderDetails.product.brand']);

        $transformedOrder = $this->transformOrder($order);
        // Add order history for detail view
        $transformedOrder['order_history'] = [
            [
                'status' => $order->status,
                'note' => 'Đơn hàng đã được tạo',
                'created_at' => $order->created_at
            ]
        ];

        return response()->json([
            'success' => true,
            'data' => $transformedOrder,
            'message' => 'Lấy chi tiết đơn hàng thành công'
        ]);
    }

    /**
     * Cancel order (only pending orders)
     */
    public function cancel(Order $order, Request $request): JsonResponse
    {
        $user = auth('api')->user();

        if ($order->user_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Bạn không có quyền hủy đơn hàng này'
            ], 403);
        }

        if ($order->status !== 'pending') {
            return response()->json([
                'success' => false,
                'message' => 'Không thể hủy đơn hàng ở trạng thái hiện tại'
            ], 400);
        }

        DB::beginTransaction();

        try {
            // Restore product quantities
            foreach ($order->orderDetails as $detail) {
                $detail->product->increment('stock', $detail->quantity);
            }

            // Restore voucher usage if used
            if ($order->voucher_id) {
                $order->voucher->decrement('used_count');
            }

            // Update order status
            $order->update(['payment_status' => 'failed']);
            $order->status = 'cancelled';
            $order->save();

            DB::commit();

            return response()->json([
                'message' => 'Hủy đơn hàng thành công'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            // Log lỗi để debug
            Log::error('Cancel order error: ' . $e->getMessage());
            Log::error('Line: ' . $e->getLine());
            Log::error('File: ' . $e->getFile());

            return response()->json([
                'message' => 'Có lỗi xảy ra khi hủy đơn hàng'
            ], 500);
        }
    }

    /**
     * Get order statistics for user
     */
    public function getStats(): JsonResponse
    {
        /** @var User|null $user */
        $user = auth('api')->user();

        $stats = [
            'total_orders' => $user->orders()->count(),
            'pending_orders' => $user->orders()->where('payment_status', 'pending')->count(),
            'paid_orders' => $user->orders()->where('payment_status', 'paid')->count(),
            'failed_orders' => $user->orders()->where('payment_status', 'failed')->count(),
            'total_spent' => $user->orders()->where('payment_status', 'paid')->sum('total_price'),
        ];

        return response()->json([
            'data' => $stats
        ]);
    }

    /**
     * [ADMIN] Display a listing of the resource.
     */
    public function adminIndex(Request $request): JsonResponse
    {
        $query = Order::with(['user', 'paymentMethod', 'voucher', 'orderDetails.product']);

        // Lọc theo trạng thái thanh toán
        if ($request->has('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        // Lọc theo user
        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // Tìm kiếm theo tên người dùng hoặc email
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->whereHas('user', function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('email', 'like', "%{$searchTerm}%");
            });
        }

        // Sắp xếp theo ngày tạo mới nhất
        $orders = $query->orderBy('created_at', 'desc')->paginate(20);

        return response()->json($orders);
    }

    /**
     * [ADMIN] Update the specified resource in storage.
     */
    public function updateStatus(Request $request, Order $order): JsonResponse
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'status' => 'sometimes|in:pending,processing,shipped,delivered,cancelled',
            'payment_status' => 'sometimes|in:pending,paid,failed',
            'tracking_number' => 'sometimes|string|max:255',
            'notes' => 'sometimes|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $updateData = [];
        if ($request->has('status')) {
            $updateData['status'] = $request->status;
        }
        if ($request->has('payment_status')) {
            $updateData['payment_status'] = $request->payment_status;
        }
        if ($request->has('notes')) {
            $updateData['note'] = $request->notes;
        }

        $order->update($updateData);

        // Logic gửi email thông báo cho user có thể thêm ở đây

        return response()->json([
            'success' => true,
            'message' => 'Order status updated successfully',
            'data' => $order->load(['user', 'paymentMethod', 'voucher', 'orderDetails.product'])
        ]);
    }

    /**
     * Transform order data to match API documentation format
     */
    private function transformOrder($order)
    {
        return [
            'id' => $order->id,
            'user_id' => $order->user_id,
            'order_number' => $order->order_number,
            'status' => $order->status,
            'total_amount' => $order->total_amount,
            'shipping_fee' => $order->shipping_fee,
            'voucher_discount' => $order->voucher_discount,
            'final_amount' => $order->final_amount,
            'payment_method' => $order->payment_method,
            'payment_status' => $order->payment_status,
            'shipping_address' => [
                'recipient_name' => $order->shipping_recipient_name,
                'recipient_phone' => $order->shipping_recipient_phone,
                'address' => $order->shipping_address,
                'ward' => $order->shipping_ward,
                'district' => $order->shipping_district,
                'province' => $order->shipping_province,
                'postal_code' => $order->shipping_postal_code,
            ],
            'items' => $order->orderDetails->map(function ($detail) {
                return [
                    'id' => $detail->id,
                    'product_id' => $detail->product_id,
                    'product_name' => $detail->product ? $detail->product->name : null,
                    'product_image' => $detail->product ? $detail->product->image : null,
                    'quantity' => $detail->quantity,
                    'price' => $detail->price,
                    'total' => $detail->price * $detail->quantity
                ];
            }),
            'created_at' => $order->created_at,
            'updated_at' => $order->updated_at,
        ];
    }
}
