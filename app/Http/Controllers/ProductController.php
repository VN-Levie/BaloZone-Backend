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
            $query->where('stock', '>', 0);
        }

        // Sắp xếp
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        // Phân trang
        $perPage = $request->get('per_page', 10);
        $products = $query->paginate($perPage);

        // Transform the data to match API documentation
        $transformedProducts = $products->getCollection()->map(function ($product) {
            return $this->transformProduct($product);
        });

        return response()->json([
            'success' => true,
            'data' => [
                'current_page' => $products->currentPage(),
                'data' => $transformedProducts,
                'first_page_url' => $products->url(1),
                'from' => $products->firstItem(),
                'last_page' => $products->lastPage(),
                'last_page_url' => $products->url($products->lastPage()),
                'links' => $products->linkCollection(),
                'next_page_url' => $products->nextPageUrl(),
                'path' => $products->path(),
                'per_page' => $products->perPage(),
                'prev_page_url' => $products->previousPageUrl(),
                'to' => $products->lastItem(),
                'total' => $products->total()
            ]
        ]);
    }

    /**
     * Transform product data to match API documentation format
     */
    private function transformProduct($product)
    {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'slug' => $product->slug,
            'description' => $product->description,
            'price' => $product->price,
            'discount_price' => $product->discount_price,
            'image' => $product->image,
            'gallery' => $product->gallery ?? [],
            'stock' => $product->stock,
            'brand' => $product->brand ? [
                'id' => $product->brand->id,
                'name' => $product->brand->name,
                'slug' => $product->brand->slug
            ] : null,
            'category' => $product->category ? [
                'id' => $product->category->id,
                'name' => $product->category->name,
                'slug' => $product->category->slug
            ] : null,
            'created_at' => $product->created_at,
            'updated_at' => $product->updated_at
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): JsonResponse
    {
        $product = Product::create($request->validated());
        $product->load(['category', 'brand']);

        return response()->json([
            'success' => true,
            'message' => 'Product created successfully',
            'data' => $this->transformProduct($product)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): JsonResponse
    {
        $product->load(['category', 'brand', 'comments.user']);

        return response()->json([
            'success' => true,
            'data' => $this->transformProduct($product)
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
            'success' => true,
            'message' => 'Product updated successfully',
            'data' => $this->transformProduct($product)
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
    public function getByCategory(string $categorySlug, Request $request): JsonResponse
    {
        $query = Product::with(['category', 'brand'])
            ->whereHas('category', function($categoryQuery) use ($categorySlug) {
                $categoryQuery->where('slug', $categorySlug);
            })
            ->where('quantity', '>', 0);

        // Filter by brand
        if ($request->has('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        // Filter by price range
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Filter by color
        if ($request->has('color')) {
            $query->where('color', $request->color);
        }

        // Search by name
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sort options
        $sortBy = $request->get('sort_by', 'name');
        $sortOrder = $request->get('sort_order', 'asc');
        $query->orderBy($sortBy, $sortOrder);

        // Pagination
        $perPage = $request->get('per_page', 12);
        $products = $query->paginate($perPage);

        return response()->json($products);
    }

    /**
     * Get products by brand slug
     */
    public function getByBrand(string $brandSlug, Request $request): JsonResponse
    {
        $query = Product::with(['category', 'brand'])
            ->whereHas('brand', function($brandQuery) use ($brandSlug) {
                $brandQuery->where('slug', $brandSlug);
            })
            ->where('quantity', '>', 0);

        // Filter by category
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filter by price range
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Filter by color
        if ($request->has('color')) {
            $query->where('color', $request->color);
        }

        // Search by name
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sort options
        $sortBy = $request->get('sort_by', 'name');
        $sortOrder = $request->get('sort_order', 'asc');
        $query->orderBy($sortBy, $sortOrder);

        // Pagination
        $perPage = $request->get('per_page', 12);
        $products = $query->paginate($perPage);

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

    /**
     * Get products currently on sale
     */
    public function getOnSale(Request $request): JsonResponse
    {
        $query = Product::with(['category', 'brand', 'currentSale.saleCampaign'])
            ->whereHas('currentSale');

        // Filter by category
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filter by brand
        if ($request->has('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        // Filter by minimum discount percentage
        if ($request->has('min_discount')) {
            $query->whereHas('currentSale', function($q) use ($request) {
                $q->where('discount_percentage', '>=', $request->min_discount);
            });
        }

        // Filter by maximum discount percentage
        if ($request->has('max_discount')) {
            $query->whereHas('currentSale', function($q) use ($request) {
                $q->where('discount_percentage', '<=', $request->max_discount);
            });
        }

        // Filter by price range (sale price)
        if ($request->has('min_price')) {
            $query->whereHas('currentSale', function($q) use ($request) {
                $q->where('sale_price', '>=', $request->min_price);
            });
        }
        if ($request->has('max_price')) {
            $query->whereHas('currentSale', function($q) use ($request) {
                $q->where('sale_price', '<=', $request->max_price);
            });
        }

        // Search by name
        if ($request->has('search')) {
            $searchQuery = $request->search;
            $query->where(function($q) use ($searchQuery) {
                $q->where('name', 'like', '%' . $searchQuery . '%')
                  ->orWhere('description', 'like', '%' . $searchQuery . '%');
            });
        }

        // Sort options
        $sortBy = $request->get('sort_by', 'name');
        $sortOrder = $request->get('sort_order', 'asc');

        if ($sortBy === 'discount') {
            // Sort by discount percentage
            $query->join('sale_products', function($join) {
                $join->on('products.id', '=', 'sale_products.product_id')
                     ->where('sale_products.is_active', true);
            })
            ->join('sale_campaigns', function($join) {
                $join->on('sale_products.sale_campaign_id', '=', 'sale_campaigns.id')
                     ->where('sale_campaigns.status', 'active')
                     ->where('sale_campaigns.start_date', '<=', now())
                     ->where('sale_campaigns.end_date', '>=', now());
            })
            ->orderBy('sale_products.discount_percentage', $sortOrder)
            ->select('products.*');
        } elseif ($sortBy === 'sale_price') {
            // Sort by sale price
            $query->join('sale_products', function($join) {
                $join->on('products.id', '=', 'sale_products.product_id')
                     ->where('sale_products.is_active', true);
            })
            ->join('sale_campaigns', function($join) {
                $join->on('sale_products.sale_campaign_id', '=', 'sale_campaigns.id')
                     ->where('sale_campaigns.status', 'active')
                     ->where('sale_campaigns.start_date', '<=', now())
                     ->where('sale_campaigns.end_date', '>=', now());
            })
            ->orderBy('sale_products.sale_price', $sortOrder)
            ->select('products.*');
        } else {
            // Default sorting
            $query->orderBy($sortBy, $sortOrder);
        }

        $perPage = $request->get('per_page', 12);
        $products = $query->paginate($perPage);

        return response()->json($products);
    }

    /**
     * Get sale campaigns for specific product
     */
    public function getSaleCampaigns(Product $product): JsonResponse
    {
        $campaigns = $product->saleCampaigns()
            ->with(['saleProducts' => function($query) use ($product) {
                $query->where('product_id', $product->id);
            }])
            ->orderBy('priority', 'desc')
            ->get();

        return response()->json([
            'data' => $campaigns
        ]);
    }
}
