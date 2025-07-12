<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class VoucherController extends Controller
{
    /**
     * Display a listing of active vouchers.
     */
    public function index(): JsonResponse
    {
        try {
            $vouchers = Voucher::active()->get();

            return response()->json([
                'success' => true,
                'data' => $vouchers,
                'message' => 'Lấy danh sách voucher thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi lấy danh sách voucher'
            ], 500);
        }
    }

    /**
     * Check voucher validity and calculate discount
     */
    public function check(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string',
            'order_total' => 'required|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Dữ liệu không hợp lệ',
                'errors' => $validator->errors()
            ], 400);
        }

        try {
            $voucher = Voucher::where('code', strtoupper($request->code))->first();

            if (!$voucher) {
                return response()->json([
                    'success' => false,
                    'message' => 'Voucher không hợp lệ hoặc không thể áp dụng',
                    'errors' => [
                        'code' => ['Voucher không tồn tại']
                    ]
                ], 400);
            }

            // Kiểm tra voucher có còn hiệu lực không
            if (!$voucher->isValid()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Voucher không hợp lệ hoặc không thể áp dụng',
                    'errors' => [
                        'code' => ['Voucher đã hết hạn hoặc đã hết lượt sử dụng']
                    ]
                ], 400);
            }

            $orderTotal = $request->order_total;

            // Kiểm tra điều kiện áp dụng
            if (!$voucher->canApplyToOrder($orderTotal)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Voucher không hợp lệ hoặc không thể áp dụng',
                    'errors' => [
                        'order_total' => ['Giá trị đơn hàng không đủ điều kiện']
                    ]
                ], 400);
            }

            // Tính toán số tiền giảm
            $discountAmount = $voucher->calculateDiscount($orderTotal);

            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $voucher->id,
                    'code' => $voucher->code,
                    'name' => $voucher->name,
                    'discount_type' => $voucher->discount_type,
                    'discount_value' => $voucher->discount_value,
                    'discount_amount' => $discountAmount,
                    'min_order_value' => $voucher->min_order_value,
                    'max_discount_amount' => $voucher->max_discount_amount,
                    'is_applicable' => true,
                    'message' => 'Voucher hợp lệ'
                ],
                'message' => 'Kiểm tra voucher thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi kiểm tra voucher'
            ], 500);
        }
    }

    /**
     * Display the specified voucher (Admin).
     */
    public function show($id): JsonResponse
    {
        try {
            $voucher = Voucher::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $voucher,
                'message' => 'Lấy thông tin voucher thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Voucher không tồn tại'
            ], 404);
        }
    }

    /**
     * Store a newly created voucher (Admin).
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|max:50|unique:vouchers',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'discount_type' => 'required|in:percentage,fixed',
            'discount_value' => 'required|numeric|min:0',
            'min_order_value' => 'nullable|numeric|min:0',
            'max_discount_amount' => 'nullable|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Dữ liệu không hợp lệ',
                'errors' => $validator->errors()
            ], 400);
        }

        try {
            $data = $request->all();
            $data['code'] = strtoupper($data['code']);
            $data['is_active'] = $request->boolean('is_active', true);

            $voucher = Voucher::create($data);

            return response()->json([
                'success' => true,
                'data' => $voucher,
                'message' => 'Tạo voucher thành công'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi tạo voucher'
            ], 500);
        }
    }

    /**
     * Update the specified voucher (Admin).
     */
    public function update(Request $request, $id): JsonResponse
    {
        $voucher = Voucher::find($id);
        if (!$voucher) {
            return response()->json([
                'success' => false,
                'message' => 'Voucher không tồn tại'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'code' => 'required|string|max:50|unique:vouchers,code,' . $id,
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'discount_type' => 'required|in:percentage,fixed',
            'discount_value' => 'required|numeric|min:0',
            'min_order_value' => 'nullable|numeric|min:0',
            'max_discount_amount' => 'nullable|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Dữ liệu không hợp lệ',
                'errors' => $validator->errors()
            ], 400);
        }

        try {
            $data = $request->all();
            $data['code'] = strtoupper($data['code']);
            $data['is_active'] = $request->boolean('is_active', $voucher->is_active);

            $voucher->update($data);

            return response()->json([
                'success' => true,
                'data' => $voucher->fresh(),
                'message' => 'Cập nhật voucher thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi cập nhật voucher'
            ], 500);
        }
    }

    /**
     * Remove the specified voucher (Admin).
     */
    public function destroy($id): JsonResponse
    {
        try {
            $voucher = Voucher::findOrFail($id);
            $voucher->delete();

            return response()->json([
                'success' => true,
                'message' => 'Xóa voucher thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Voucher không tồn tại hoặc có lỗi xảy ra'
            ], 404);
        }
    }

    /**
     * Get all vouchers for admin (Admin).
     */
    public function adminIndex(): JsonResponse
    {
        try {
            $vouchers = Voucher::orderBy('created_at', 'desc')->get();

            return response()->json([
                'success' => true,
                'data' => $vouchers,
                'message' => 'Lấy danh sách voucher thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi lấy danh sách voucher'
            ], 500);
        }
    }
}
