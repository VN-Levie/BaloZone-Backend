<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Voucher;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $user = auth('api')->user();

        $query = Order::with(['address', 'paymentMethod', 'voucher', 'orderDetails.product'])
            ->where('user_id', $user->id);

        // Lọc theo trạng thái thanh toán
        if ($request->has('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        // Sắp xếp theo ngày tạo mới nhất
        $orders = $query->orderBy('created_at', 'desc')->paginate(10);

        return response()->json($orders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request): JsonResponse
    {
        $user = auth('api')->user();

        // Verify that address belongs to user
        $address = $user->addressBooks()->find($request->address_id);
        if (!$address) {
            return response()->json([
                'message' => 'Địa chỉ không thuộc về bạn'
            ], 403);
        }

        DB::beginTransaction();

        try {
            $totalPrice = 0;
            $orderItems = [];

            // Validate products and calculate total
            foreach ($request->items as $item) {
                $product = Product::find($item['product_id']);

                if (!$product) {
                    throw new \Exception('Sản phẩm không tồn tại');
                }

                if ($product->quantity < $item['quantity']) {
                    throw new \Exception("Sản phẩm {$product->name} không đủ số lượng. Còn lại: {$product->quantity}");
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
            if ($request->voucher_id) {
                $voucher = Voucher::find($request->voucher_id);

                if (!$voucher) {
                    throw new \Exception('Voucher không tồn tại');
                }

                if ($voucher->end_at < now()) {
                    throw new \Exception('Voucher đã hết hạn');
                }

                if ($voucher->quantity <= 0) {
                    throw new \Exception('Voucher đã hết lượt sử dụng');
                }

                $voucherDiscount = $voucher->price;
                $voucher->decrement('quantity');
            }

            $finalTotal = max(0, $totalPrice - $voucherDiscount);

            // Create order
            $order = Order::create([
                'address_id' => $request->address_id,
                'payment_method_id' => $request->payment_method_id,
                'payment_status' => 'pending',
                'voucher_id' => $request->voucher_id,
                'comment' => $request->comment,
                'user_id' => $user->id,
                'total_price' => $finalTotal,
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
                $item['product']->decrement('quantity', $item['quantity']);
            }

            DB::commit();

            $order->load(['address', 'paymentMethod', 'voucher', 'orderDetails.product']);

            return response()->json([
                'message' => 'Đặt hàng thành công',
                'data' => $order
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
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
                'message' => 'Bạn không có quyền xem đơn hàng này'
            ], 403);
        }

        $order->load(['address', 'paymentMethod', 'voucher', 'orderDetails.product.category', 'orderDetails.product.brand']);

        return response()->json([
            'data' => $order
        ]);
    }

    /**
     * Cancel order (only pending orders)
     */
    public function cancel(Order $order): JsonResponse
    {
        $user = auth('api')->user();

        if ($order->user_id !== $user->id) {
            return response()->json([
                'message' => 'Bạn không có quyền hủy đơn hàng này'
            ], 403);
        }

        if ($order->payment_status !== 'pending') {
            return response()->json([
                'message' => 'Chỉ có thể hủy đơn hàng đang chờ xử lý'
            ], 400);
        }

        DB::beginTransaction();

        try {
            // Restore product quantities
            foreach ($order->orderDetails as $detail) {
                $detail->product->increment('quantity', $detail->quantity);
            }

            // Restore voucher quantity if used
            if ($order->voucher_id) {
                $order->voucher->increment('quantity');
            }

            // Update order status
            $order->update(['payment_status' => 'failed']);

            DB::commit();

            return response()->json([
                'message' => 'Hủy đơn hàng thành công'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

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
}
