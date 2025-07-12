<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

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
            'price' => (int)$product->price,
            'discount_price' => (int)$product->discount_price,
            'image' => $product->image ? $this->getImageUrl($product->image) : null,
            'gallery' => $product->gallery ? array_map(function ($path) {
                return $this->getImageUrl($path);
            }, $product->gallery) : [],
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
        try {
            $data = $request->validated();

            // Handle main image upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('products/images', 'public');
                $data['image'] = $imagePath;
            }

            // Handle gallery images upload
            if ($request->hasFile('gallery')) {
                $galleryPaths = [];
                foreach ($request->file('gallery') as $galleryFile) {
                    $galleryPath = $galleryFile->store('products/gallery', 'public');
                    $galleryPaths[] = $galleryPath;
                }
                $data['gallery'] = $galleryPaths;
            }

            $product = Product::create($data);
            $product->load(['category', 'brand']);

            return response()->json([
                'success' => true,
                'message' => 'Product created successfully',
                'data' => $this->transformProduct($product)
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create product: ' . $e->getMessage()
            ], 500);
        }
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
     * Display the specified product by slug.
     */
    public function getBySlug(string $slug): JsonResponse
    {
        $product = Product::where('slug', $slug)
            ->with(['category', 'brand', 'comments.user'])
            ->firstOrFail();

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
        try {
            $data = $request->validated();

            // Handle main image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($product->image && Storage::disk('public')->exists($product->image)) {
                    Storage::disk('public')->delete($product->image);
                }

                $imagePath = $request->file('image')->store('products/images', 'public');
                $data['image'] = $imagePath;
            }

            // Handle gallery images upload
            if ($request->hasFile('gallery')) {
                // Delete old gallery images if exists
                if ($product->gallery && is_array($product->gallery)) {
                    foreach ($product->gallery as $oldGalleryPath) {
                        if (Storage::disk('public')->exists($oldGalleryPath)) {
                            Storage::disk('public')->delete($oldGalleryPath);
                        }
                    }
                }

                $galleryPaths = [];
                foreach ($request->file('gallery') as $galleryFile) {
                    $galleryPath = $galleryFile->store('products/gallery', 'public');
                    $galleryPaths[] = $galleryPath;
                }
                $data['gallery'] = $galleryPaths;
            }

            $product->update($data);
            $product->load(['category', 'brand']);

            return response()->json([
                'success' => true,
                'message' => 'Product updated successfully',
                'data' => $this->transformProduct($product)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update product: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): JsonResponse
    {
        // Kiểm tra xem product có trong order nào không (chỉ kiểm tra orders chưa bị xóa)
        if ($product->orderDetails()->whereHas('order', function ($query) {
            $query->whereNull('deleted_at');
        })->count() > 0) {
            return response()->json([
                'message' => 'Cannot delete product that has been ordered in active orders.'
            ], 422);
        }

        $product->delete(); // Soft delete

        return response()->json([
            'message' => 'Product soft deleted successfully'
        ]);
    }

    /**
     * Restore the specified soft deleted product.
     */
    public function restore($id): JsonResponse
    {
        $product = Product::onlyTrashed()->with(['category', 'brand'])->findOrFail($id);
        $product->restore();

        return response()->json([
            'message' => 'Product restored successfully',
            'data' => $product
        ]);
    }

    /**
     * Permanently delete the specified product.
     */
    public function forceDelete($id): JsonResponse
    {
        $product = Product::onlyTrashed()->findOrFail($id);

        // Kiểm tra xem product có trong order nào không (cả đã xóa và chưa xóa)
        if ($product->orderDetails()->withTrashed()->count() > 0) {
            return response()->json([
                'message' => 'Cannot force delete product that has order history. Data integrity must be maintained.'
            ], 422);
        }

        $product->forceDelete();

        return response()->json([
            'message' => 'Product permanently deleted'
        ]);
    }

    /**
     * Get trashed products (Admin only)
     */
    public function trashed(): JsonResponse
    {
        $products = Product::onlyTrashed()
            ->with(['category', 'brand'])
            ->withCount(['orderDetails' => function ($query) {
                $query->withTrashed();
            }])
            ->orderBy('deleted_at', 'desc')
            ->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }

    /**
     * Get featured products
     */
    public function getFeatured(): JsonResponse
    {
        $products = Product::with(['category', 'brand'])
            ->where('stock', '>', 0)
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
            ->whereHas('category', function ($categoryQuery) use ($categorySlug) {
                $categoryQuery->where('slug', $categorySlug);
            })
            ->where('stock', '>', 0);

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
            ->whereHas('brand', function ($brandQuery) use ($brandSlug) {
                $brandQuery->where('slug', $brandSlug);
            })
            ->where('stock', '>', 0);

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
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhereHas('category', function ($categoryQuery) use ($query) {
                        $categoryQuery->where('name', 'like', '%' . $query . '%');
                    })
                    ->orWhereHas('brand', function ($brandQuery) use ($query) {
                        $brandQuery->where('name', 'like', '%' . $query . '%');
                    });
            })
            ->where('stock', '>', 0)
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
            $query->whereHas('currentSale', function ($q) use ($request) {
                $q->where('discount_percentage', '>=', $request->min_discount);
            });
        }

        // Filter by maximum discount percentage
        if ($request->has('max_discount')) {
            $query->whereHas('currentSale', function ($q) use ($request) {
                $q->where('discount_percentage', '<=', $request->max_discount);
            });
        }

        // Filter by price range (sale price)
        if ($request->has('min_price')) {
            $query->whereHas('currentSale', function ($q) use ($request) {
                $q->where('sale_price', '>=', $request->min_price);
            });
        }
        if ($request->has('max_price')) {
            $query->whereHas('currentSale', function ($q) use ($request) {
                $q->where('sale_price', '<=', $request->max_price);
            });
        }

        // Search by name
        if ($request->has('search')) {
            $searchQuery = $request->search;
            $query->where(function ($q) use ($searchQuery) {
                $q->where('name', 'like', '%' . $searchQuery . '%')
                    ->orWhere('description', 'like', '%' . $searchQuery . '%');
            });
        }

        // Sort options
        $sortBy = $request->get('sort_by', 'name');
        $sortOrder = $request->get('sort_order', 'asc');

        if ($sortBy === 'discount') {
            // Sort by discount percentage
            $query->join('sale_products', function ($join) {
                $join->on('products.id', '=', 'sale_products.product_id')
                    ->where('sale_products.is_active', true);
            })
                ->join('sale_campaigns', function ($join) {
                    $join->on('sale_products.sale_campaign_id', '=', 'sale_campaigns.id')
                        ->where('sale_campaigns.status', 'active')
                        ->where('sale_campaigns.start_date', '<=', now())
                        ->where('sale_campaigns.end_date', '>=', now());
                })
                ->orderBy('sale_products.discount_percentage', $sortOrder)
                ->select('products.*');
        } elseif ($sortBy === 'sale_price') {
            // Sort by sale price
            $query->join('sale_products', function ($join) {
                $join->on('products.id', '=', 'sale_products.product_id')
                    ->where('sale_products.is_active', true);
            })
                ->join('sale_campaigns', function ($join) {
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
            ->with(['saleProducts' => function ($query) use ($product) {
                $query->where('product_id', $product->id);
            }])
            ->orderBy('priority', 'desc')
            ->get();

        return response()->json([
            'data' => $campaigns
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
}
