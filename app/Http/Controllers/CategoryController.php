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
        $query = Category::query();

        // Tìm kiếm theo tên
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Lấy kèm số lượng sản phẩm
        $query->withCount('products');

        // Phân trang
        $perPage = $request->get('per_page', 15);
        $categories = $query->orderBy('name')->paginate($perPage);

        return response()->json($categories);
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
        // Kiểm tra xem category có products không
        if ($category->products()->count() > 0) {
            return response()->json([
                'message' => 'Cannot delete category that has products. Please remove or reassign products first.'
            ], 422);
        }

        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully'
        ]);
    }

    /**
     * Get categories with products for homepage
     */
    public function getWithProducts(): JsonResponse
    {
        $categories = Category::with(['products' => function($query) {
            $query->with('brand')
                  ->where('quantity', '>', 0)
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
            ->where('quantity', '>', 0)
            ->orderBy('name')
            ->paginate($perPage);

        return response()->json([
            'category' => $category,
            'products' => $products
        ]);
    }
}
