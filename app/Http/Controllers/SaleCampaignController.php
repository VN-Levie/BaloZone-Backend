<?php

namespace App\Http\Controllers;

use App\Models\SaleCampaign;
use App\Models\Product;
use App\Http\Requests\SaleCampaignRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class SaleCampaignController extends Controller
{
    /**
     * Display a listing of sale campaigns.
     */
    public function index(Request $request): JsonResponse
    {
        $query = SaleCampaign::with(['saleProducts.product']);

        // Filter by status
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Filter active campaigns
        if ($request->has('active') && $request->active) {
            $query->active();
        }

        // Filter featured campaigns
        if ($request->has('featured') && $request->featured) {
            $query->featured();
        }

        // Search by name
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sort
        $sortBy = $request->get('sort_by', 'priority');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $campaigns = $query->paginate($request->get('per_page', 10));

        return response()->json($campaigns);
    }

    /**
     * Store a newly created sale campaign.
     */
    public function store(SaleCampaignRequest $request): JsonResponse
    {
        $data = $request->validated();

        // Handle banner image upload
        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $path = $file->store('sale-campaigns', 'public');
            $data['banner_image'] = '/storage/' . $path;
        }

        $campaign = SaleCampaign::create($data);

        return response()->json([
            'message' => 'Sale campaign created successfully',
            'data' => $campaign
        ], 201);
    }

    /**
     * Display the specified sale campaign.
     */
    public function show(SaleCampaign $saleCampaign): JsonResponse
    {
        $saleCampaign->load(['saleProducts.product.category', 'saleProducts.product.brand']);

        return response()->json([
            'data' => $saleCampaign
        ]);
    }

    /**
     * Update the specified sale campaign.
     */
    public function update(SaleCampaignRequest $request, SaleCampaign $saleCampaign): JsonResponse
    {
        $data = $request->validated();

        // Handle banner image upload
        if ($request->hasFile('banner_image')) {
            // Delete old image if exists
            if ($saleCampaign->banner_image && Storage::disk('public')->exists(str_replace('/storage/', '', $saleCampaign->banner_image))) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $saleCampaign->banner_image));
            }

            // Store new image
            $file = $request->file('banner_image');
            $path = $file->store('sale-campaigns', 'public');
            $data['banner_image'] = '/storage/' . $path;
        }

        $saleCampaign->update($data);

        return response()->json([
            'message' => 'Sale campaign updated successfully',
            'data' => $saleCampaign
        ]);
    }

    /**
     * Remove the specified sale campaign.
     */
    public function destroy(SaleCampaign $saleCampaign): JsonResponse
    {
        $saleCampaign->delete();

        return response()->json([
            'message' => 'Sale campaign deleted successfully'
        ]);
    }

    /**
     * Get active sale campaigns.
     */
    public function getActive(): JsonResponse
    {
        $campaigns = SaleCampaign::active()
            ->with(['saleProducts.product.category', 'saleProducts.product.brand'])
            ->orderBy('priority', 'desc')
            ->get();

        return response()->json([
            'data' => $campaigns
        ]);
    }

    /**
     * Get featured sale campaigns.
     */
    public function getFeatured(): JsonResponse
    {
        $campaigns = SaleCampaign::featured()
            ->active()
            ->with(['saleProducts.product.category', 'saleProducts.product.brand'])
            ->orderBy('priority', 'desc')
            ->take(5)
            ->get();

        return response()->json([
            'data' => $campaigns
        ]);
    }

    /**
     * Get products in sale campaign.
     */
    public function getProducts(SaleCampaign $saleCampaign, Request $request): JsonResponse
    {
        $query = $saleCampaign->products()
            ->with(['category', 'brand']);

        // Filter by category
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filter by brand
        if ($request->has('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        // Search
        if ($request->has('search')) {
            $searchQuery = $request->search;
            $query->where(function($q) use ($searchQuery) {
                $q->where('name', 'like', '%' . $searchQuery . '%')
                  ->orWhere('description', 'like', '%' . $searchQuery . '%');
            });
        }

        // Sort by discount
        if ($request->get('sort_by') === 'discount') {
            $query->orderBy('sale_products.discount_percentage', 'desc');
        } else {
            $query->orderBy('name');
        }

        $products = $query->paginate($request->get('per_page', 12));

        return response()->json($products);
    }

    /**
     * Add products to sale campaign.
     */
    public function addProducts(SaleCampaign $saleCampaign, Request $request): JsonResponse
    {
        $validated = $request->validate([
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.sale_price' => 'required|numeric|min:0',
            'products.*.discount_type' => 'in:percentage,fixed_amount',
            'products.*.max_quantity' => 'nullable|integer|min:1',
        ]);

        foreach ($validated['products'] as $productData) {
            $product = Product::find($productData['product_id']);

            $saleCampaign->saleProducts()->updateOrCreate(
                ['product_id' => $productData['product_id']],
                [
                    'original_price' => $product->price,
                    'sale_price' => $productData['sale_price'],
                    'discount_percentage' => (($product->price - $productData['sale_price']) / $product->price) * 100,
                    'discount_amount' => $product->price - $productData['sale_price'],
                    'discount_type' => $productData['discount_type'] ?? 'percentage',
                    'max_quantity' => $productData['max_quantity'] ?? null,
                    'is_active' => true,
                ]
            );
        }

        return response()->json([
            'message' => 'Products added to sale campaign successfully'
        ]);
    }

    /**
     * Remove product from sale campaign.
     */
    public function removeProduct(SaleCampaign $saleCampaign, Product $product): JsonResponse
    {
        $saleCampaign->saleProducts()
            ->where('product_id', $product->id)
            ->delete();

        return response()->json([
            'message' => 'Product removed from sale campaign successfully'
        ]);
    }

    /**
     * Display the specified sale campaign by slug.
     */
    public function getBySlug(string $slug): JsonResponse
    {
        $saleCampaign = SaleCampaign::where('slug', $slug)
            ->with(['saleProducts.product.category', 'saleProducts.product.brand'])
            ->firstOrFail();

        return response()->json([
            'data' => $saleCampaign
        ]);
    }
}
