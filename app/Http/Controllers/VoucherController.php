<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use App\Http\Requests\VoucherRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Voucher::query();

        // Tìm kiếm theo mã voucher
        if ($request->has('search')) {
            $query->where('code', 'like', '%' . $request->search . '%');
        }

        // Lọc voucher còn hiệu lực
        if ($request->has('active') && $request->active) {
            $query->where('end_at', '>', now())
                  ->where('quantity', '>', 0);
        }

        // Sắp xếp theo ngày tạo
        $vouchers = $query->orderBy('created_at', 'desc')->paginate(15);

        return response()->json($vouchers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VoucherRequest $request): JsonResponse
    {
        $voucher = Voucher::create($request->validated());

        return response()->json([
            'message' => 'Voucher created successfully',
            'data' => $voucher
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Voucher $voucher): JsonResponse
    {
        return response()->json([
            'data' => $voucher
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VoucherRequest $request, Voucher $voucher): JsonResponse
    {
        $voucher->update($request->validated());

        return response()->json([
            'message' => 'Voucher updated successfully',
            'data' => $voucher
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voucher $voucher): JsonResponse
    {
        // Kiểm tra xem voucher có được sử dụng trong đơn hàng nào không
        if ($voucher->orders()->count() > 0) {
            return response()->json([
                'message' => 'Cannot delete voucher that has been used in orders.'
            ], 422);
        }

        $voucher->delete();

        return response()->json([
            'message' => 'Voucher deleted successfully'
        ]);
    }

    /**
     * Validate voucher code
     */
    public function validateCode(Request $request): JsonResponse
    {
        $request->validate([
            'code' => 'required|string'
        ]);

        $voucher = Voucher::where('code', strtoupper($request->code))
                          ->where('end_at', '>', now())
                          ->where('quantity', '>', 0)
                          ->first();

        if (!$voucher) {
            return response()->json([
                'valid' => false,
                'message' => 'Mã voucher không hợp lệ hoặc đã hết hạn'
            ], 404);
        }

        return response()->json([
            'valid' => true,
            'message' => 'Mã voucher hợp lệ',
            'data' => [
                'id' => $voucher->id,
                'code' => $voucher->code,
                'discount' => $voucher->price,
                'end_at' => $voucher->end_at,
                'remaining' => $voucher->quantity
            ]
        ]);
    }

    /**
     * Get active vouchers for public display
     */
    public function getActive(): JsonResponse
    {
        $vouchers = Voucher::where('end_at', '>', now())
                          ->where('quantity', '>', 0)
                          ->orderBy('price', 'desc')
                          ->get();

        return response()->json([
            'data' => $vouchers
        ]);
    }
}
