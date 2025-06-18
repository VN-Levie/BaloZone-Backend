<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Product::with(['category', 'brand']);

        // Tìm kiếm theo tên
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Lọc theo category
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Lọc theo brand
        if ($request->has('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        // Lọc theo giá
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Lọc theo màu sắc
        if ($request->has('color')) {
            $query->where('color', $request->color);
        }

        // Lọc sản phẩm còn hàng
        if ($request->has('in_stock') && $request->in_stock) {
            $query->where('quantity', '>', 0);
        }

        // Sắp xếp
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        // Phân trang
        $perPage = $request->get('per_page', 12);
        $products = $query->paginate($perPage);

        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): JsonResponse
    {
        $product = Product::create($request->validated());
        $product->load(['category', 'brand']);

        return response()->json([
            'message' => 'Product created successfully',
            'data' => $product
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): JsonResponse
    {
        $product->load(['category', 'brand', 'comments.user']);

        return response()->json([
            'data' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product): JsonResponse
    {
        $product->update($request->validated());
        $product->load(['category', 'brand']);

        return response()->json([
            'message' => 'Product updated successfully',
            'data' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): JsonResponse
    {
        // Kiểm tra xem product có trong order nào không
        if ($product->orderDetails()->count() > 0) {
            return response()->json([
                'message' => 'Cannot delete product that has been ordered.'
            ], 422);
        }

        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }

    /**
     * Get featured products
     */
    public function getFeatured(): JsonResponse
    {
        $products = Product::with(['category', 'brand'])
            ->where('quantity', '>', 0)
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        return response()->json([
            'data' => $products
        ]);
    }

    /**
     * Get products by category slug
     */
    public function getByCategory(string $categorySlug): JsonResponse
    {
        $products = Product::with(['category', 'brand'])
            ->whereHas('category', function($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            })
            ->where('quantity', '>', 0)
            ->orderBy('name')
            ->paginate(12);

        return response()->json($products);
    }

    /**
     * Get products by brand slug
     */
    public function getByBrand(string $brandSlug): JsonResponse
    {
        $products = Product::with(['category', 'brand'])
            ->whereHas('brand', function($query) use ($brandSlug) {
                $query->where('slug', $brandSlug);
            })
            ->where('quantity', '>', 0)
            ->orderBy('name')
            ->paginate(12);

        return response()->json($products);
    }

    /**
     * Search products
     */
    public function search(Request $request): JsonResponse
    {
        $query = $request->get('q', '');

        if (empty($query)) {
            return response()->json([
                'data' => [],
                'message' => 'Search query is required'
            ], 400);
        }

        $products = Product::with(['category', 'brand'])
            ->where(function($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                  ->orWhere('description', 'like', '%' . $query . '%')
                  ->orWhereHas('category', function($categoryQuery) use ($query) {
                      $categoryQuery->where('name', 'like', '%' . $query . '%');
                  })
                  ->orWhereHas('brand', function($brandQuery) use ($query) {
                      $brandQuery->where('name', 'like', '%' . $query . '%');
                  });
            })
            ->where('quantity', '>', 0)
            ->orderBy('name')
            ->paginate(12);

        return response()->json($products);
    }
}
