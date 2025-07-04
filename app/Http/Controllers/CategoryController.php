<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $query = Category::query();

            // Tìm kiếm theo tên
            if ($request->has('search')) {
                $query->where('name', 'like', '%' . $request->search . '%');
            }

            // Lấy tất cả categories theo thứ tự name
            $categories = $query->orderBy('name')->get();

            return response()->json([
                'success' => true,
                'data' => $categories,
                'message' => 'Lấy danh sách danh mục thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi hệ thống khi lấy danh sách danh mục'
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request): JsonResponse
    {
        $category = Category::create($request->validated());

        return response()->json([
            'message' => 'Category created successfully',
            'data' => $category
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): JsonResponse
    {
        // Load products count only for basic info
        $category->loadCount('products');

        return response()->json([
            'data' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category): JsonResponse
    {
        $category->update($request->validated());

        return response()->json([
            'message' => 'Category updated successfully',
            'data' => $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): JsonResponse
    {
        // Kiểm tra xem category có products không (chỉ kiểm tra products chưa bị xóa)
        if ($category->products()->whereNull('deleted_at')->count() > 0) {
            return response()->json([
                'message' => 'Cannot delete category that has active products. Please remove or reassign products first.'
            ], 422);
        }

        $category->delete(); // Soft delete

        return response()->json([
            'message' => 'Category soft deleted successfully'
        ]);
    }

    /**
     * Restore the specified soft deleted category.
     */
    public function restore($id): JsonResponse
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();

        return response()->json([
            'message' => 'Category restored successfully',
            'data' => $category
        ]);
    }

    /**
     * Permanently delete the specified category.
     */
    public function forceDelete($id): JsonResponse
    {
        $category = Category::onlyTrashed()->findOrFail($id);

        // Kiểm tra xem category có products nào không (cả đã xóa và chưa xóa)
        if ($category->products()->withTrashed()->count() > 0) {
            return response()->json([
                'message' => 'Cannot force delete category that has products. Please force delete all products first.'
            ], 422);
        }

        $category->forceDelete();

        return response()->json([
            'message' => 'Category permanently deleted'
        ]);
    }

    /**
     * Get trashed categories (Admin only)
     */
    public function trashed(): JsonResponse
    {
        $categories = Category::onlyTrashed()
            ->withCount(['products' => function($query) {
                $query->withTrashed();
            }])
            ->orderBy('deleted_at', 'desc')
            ->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
    }

    /**
     * Get categories with products for homepage
     */
    public function getWithProducts(): JsonResponse
    {
        $categories = Category::with(['products' => function($query) {
            $query->with('brand')
                  ->where('stock', '>', 0)
                  ->orderBy('created_at', 'desc')
                  ->take(8);
        }])
        ->orderBy('name')
        ->get();

        return response()->json([
            'data' => $categories
        ]);
    }

    /**
     * Get category by slug with products
     */
    public function getBySlug(string $slug, Request $request): JsonResponse
    {
        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            return response()->json([
                'message' => 'Category not found'
            ], 404);
        }

        // Get products with pagination
        $perPage = $request->get('per_page', 12);
        $products = $category->products()
            ->with('brand')
            ->where('stock', '>', 0)
            ->orderBy('name')
            ->paginate($perPage);

        return response()->json([
            'category' => $category,
            'products' => $products
        ]);
    }
}
