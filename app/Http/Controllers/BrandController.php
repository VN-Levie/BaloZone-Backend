<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

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

            // Transform brands to include logo URLs
            $transformedBrands = $brands->map(function ($brand) {
                return $this->transformBrand($brand);
            });

            return response()->json([
                'success' => true,
                'data' => $transformedBrands,
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
        try {
            $data = $request->validated();

            // Handle logo upload
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('brands/logos', 'public');
                $data['logo'] = $logoPath;
            }

            $brand = Brand::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Brand created successfully',
                'data' => $this->transformBrand($brand)
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create brand: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand): JsonResponse
    {
        // Load products relationship if needed
        $brand->load('products');

        return response()->json([
            'data' => $this->transformBrand($brand)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand): JsonResponse
    {
        try {
            $data = $request->validated();

            // Handle logo upload
            if ($request->hasFile('logo')) {
                // Delete old logo if exists
                if ($brand->logo && Storage::disk('public')->exists($brand->logo)) {
                    Storage::disk('public')->delete($brand->logo);
                }

                $logoPath = $request->file('logo')->store('brands/logos', 'public');
                $data['logo'] = $logoPath;
            }

            $brand->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Brand updated successfully',
                'data' => $this->transformBrand($brand)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update brand: ' . $e->getMessage()
            ], 500);
        }
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
            'data' => $this->transformBrand($brand)
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
            ->select('id', 'name', 'slug', 'logo')
            ->get();

        // Transform brands to include logo URLs
        $transformedBrands = $brands->map(function ($brand) {
            return [
                'id' => $brand->id,
                'name' => $brand->name,
                'slug' => $brand->slug,
                'logo' => $this->getImageUrl($brand->logo)
            ];
        });

        return response()->json([
            'data' => $transformedBrands
        ]);
    }

    /**
     * Get image URL - handles both local storage files and external URLs
     */
    private function getImageUrl($imagePath)
    {
        if (!$imagePath) {
            return null;
        }

        // Check if it's already a full URL (starts with http:// or https://)
        if (str_starts_with($imagePath, 'http://') || str_starts_with($imagePath, 'https://')) {
            return $imagePath;
        }

        // Otherwise, it's a local storage file
        return asset('storage/' . $imagePath);
    }

    /**
     * Transform brand data to include full URLs
     */
    private function transformBrand($brand)
    {
        $transformed = [
            'id' => $brand->id,
            'name' => $brand->name,
            'slug' => $brand->slug,
            'description' => $brand->description,
            'logo' => $this->getImageUrl($brand->logo),
            'status' => $brand->status,
            'created_at' => $brand->created_at,
            'updated_at' => $brand->updated_at
        ];

        // Include products_count if it exists
        if (isset($brand->products_count)) {
            $transformed['products_count'] = $brand->products_count;
        }

        return $transformed;
    }
}
