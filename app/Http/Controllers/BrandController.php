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
        // Kiểm tra xem brand có products không (chỉ kiểm tra products chưa bị xóa)
        if ($brand->products()->whereNull('deleted_at')->count() > 0) {
            return response()->json([
                'message' => 'Cannot delete brand that has active products. Please remove or reassign products first.'
            ], 422);
        }

        $brand->delete(); // Soft delete

        return response()->json([
            'message' => 'Brand soft deleted successfully'
        ]);
    }

    /**
     * Restore the specified soft deleted brand.
     */
    public function restore($id): JsonResponse
    {
        $brand = Brand::onlyTrashed()->findOrFail($id);
        $brand->restore();

        return response()->json([
            'message' => 'Brand restored successfully',
            'data' => $brand
        ]);
    }

    /**
     * Permanently delete the specified brand.
     */
    public function forceDelete($id): JsonResponse
    {
        $brand = Brand::onlyTrashed()->findOrFail($id);

        // Kiểm tra xem brand có products nào không (cả đã xóa và chưa xóa)
        if ($brand->products()->withTrashed()->count() > 0) {
            return response()->json([
                'message' => 'Cannot force delete brand that has products. Please force delete all products first.'
            ], 422);
        }

        $brand->forceDelete();

        return response()->json([
            'message' => 'Brand permanently deleted'
        ]);
    }

    /**
     * Get trashed brands (Admin only)
     */
    public function trashed(): JsonResponse
    {
        $brands = Brand::onlyTrashed()
            ->withCount(['products' => function($query) {
                $query->withTrashed();
            }])
            ->orderBy('deleted_at', 'desc')
            ->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $brands
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
