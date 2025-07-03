<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $query = Brand::query();

            // Tìm kiếm theo tên
            if ($request->has('search')) {
                $query->where('name', 'like', '%' . $request->search . '%');
            }

            // Lọc theo status
            if ($request->has('status')) {
                $query->where('status', $request->status);
            }

            // Lấy tất cả brands theo thứ tự name
            $brands = $query->orderBy('name')->get();

            return response()->json([
                'success' => true,
                'data' => $brands,
                'message' => 'Lấy danh sách thương hiệu thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi hệ thống khi lấy danh sách thương hiệu'
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request): JsonResponse
    {
        $brand = Brand::create($request->validated());

        return response()->json([
            'message' => 'Brand created successfully',
            'data' => $brand
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand): JsonResponse
    {
        // Load products relationship if needed
        $brand->load('products');

        return response()->json([
            'data' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand): JsonResponse
    {
        $brand->update($request->validated());

        return response()->json([
            'message' => 'Brand updated successfully',
            'data' => $brand
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand): JsonResponse
    {
        // Kiểm tra xem brand có products không
        if ($brand->products()->count() > 0) {
            return response()->json([
                'message' => 'Cannot delete brand that has products. Please remove or reassign products first.'
            ], 422);
        }

        $brand->delete();

        return response()->json([
            'message' => 'Brand deleted successfully'
        ]);
    }

    /**
     * Get active brands for select options
     */
    public function getActiveBrands(): JsonResponse
    {
        $brands = Brand::where('status', 'active')
            ->orderBy('name')
            ->select('id', 'name', 'slug')
            ->get();

        return response()->json([
            'data' => $brands
        ]);
    }
}
