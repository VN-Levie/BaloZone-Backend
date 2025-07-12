<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

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

            // Transform categories to include image URLs
            $transformedCategories = $categories->map(function ($category) {
                return $this->transformCategory($category);
            });

            return response()->json([
                'success' => true,
                'data' => $transformedCategories,
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
        try {
            $data = $request->validated();

            // Handle image upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('categories/images', 'public');
                $data['image'] = $imagePath;
            }

            $category = Category::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Category created successfully',
                'data' => $this->transformCategory($category)
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create category: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): JsonResponse
    {
        // Load products count only for basic info
        $category->loadCount('products');

        return response()->json([
            'data' => $this->transformCategory($category)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category): JsonResponse
    {
        try {
            $data = $request->validated();

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($category->image && Storage::disk('public')->exists($category->image)) {
                    Storage::disk('public')->delete($category->image);
                }

                $imagePath = $request->file('image')->store('categories/images', 'public');
                $data['image'] = $imagePath;
            }

            $category->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Category updated successfully',
                'data' => $this->transformCategory($category)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update category: ' . $e->getMessage()
            ], 500);
        }
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
            'data' => $this->transformCategory($category)
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
            ->withCount(['products' => function ($query) {
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
        $categories = Category::with(['products' => function ($query) {
            $query->with('brand')
                ->where('stock', '>', 0)
                ->orderBy('created_at', 'desc')
                ->take(8);
        }])
            ->orderBy('name')
            ->get();

        // Transform categories to include image URLs
        $transformedCategories = $categories->map(function ($category) {
            $transformedCategory = $this->transformCategory($category);
            // Transform products as well if needed
            if ($category->products) {
                $transformedCategory['products'] = $category->products->map(function ($product) {
                    return [
                        'id' => $product->id,
                        'name' => $product->name,
                        'slug' => $product->slug,
                        'price' => $product->price,
                        'discount_price' => $product->discount_price,
                        'image' => $product->image ? $this->getImageUrl($product->image) : null,
                        'stock' => $product->stock,
                        'brand' => $product->brand
                    ];
                });
            }
            return $transformedCategory;
        });

        return response()->json([
            'data' => $transformedCategories
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


        return response()->json([
            'data' => $this->transformCategory($category),
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
     * Transform category data to include full URLs
     */
    private function transformCategory($category)
    {
        $transformed = [
            'id' => $category->id,
            'name' => $category->name,
            'slug' => $category->slug,
            'description' => $category->description,
            'image' => $this->getImageUrl($category->image),
            'created_at' => $category->created_at,
            'updated_at' => $category->updated_at
        ];

        // Include products_count if it exists
        if (isset($category->products_count)) {
            $transformed['products_count'] = $category->products_count;
        }

        return $transformed;
    }
}
