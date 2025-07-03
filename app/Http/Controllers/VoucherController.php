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
}
