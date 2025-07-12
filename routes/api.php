<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AddressBookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaleCampaignController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\DashboardController;

// Public routes
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Auth routes
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::post('refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
    Route::get('me', [AuthController::class, 'me'])->middleware('auth:api');
});

// ===================
// PUBLIC ROUTES (READ-ONLY)
// ===================

// Brand routes (public read-only)
Route::get('brands', [BrandController::class, 'index']);
Route::get('brands/{brand}', [BrandController::class, 'show']);
Route::get('brands-active', [BrandController::class, 'getActiveBrands']);

// Category routes (public read-only)
Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{category}', [CategoryController::class, 'show']);
Route::get('categories-with-products', [CategoryController::class, 'getWithProducts']);
Route::get('categories/slug/{slug}', [CategoryController::class, 'getBySlug']);

// Product routes (public read-only)
Route::get('products', [ProductController::class, 'index']);
Route::get('products-featured', [ProductController::class, 'getFeatured']);
Route::get('products-search', [ProductController::class, 'search']);
Route::get('products-on-sale', [ProductController::class, 'getOnSale']);
Route::get('products/category/{categorySlug}', [ProductController::class, 'getByCategory']);
Route::get('products/brand/{brandSlug}', [ProductController::class, 'getByBrand']);
Route::get('products/slug/{slug}', [ProductController::class, 'getBySlug']);
Route::get('products/{product}', [ProductController::class, 'show']);
Route::get('products/{product}/sale-campaigns', [ProductController::class, 'getSaleCampaigns']);

// Voucher routes (require authentication)
Route::middleware('auth:api')->group(function () {
    Route::get('vouchers', [VoucherController::class, 'index']);
    Route::post('vouchers/check', [VoucherController::class, 'check']);
});

// Comment routes (public read-only)
Route::get('comments', [CommentController::class, 'index']);
Route::get('comments/{comment}', [CommentController::class, 'show']);
Route::get('comments/product/{product}', [CommentController::class, 'getByProduct']);
Route::get('comments/product/{productId}/legacy', [CommentController::class, 'getByProduct']); // Legacy route for backward compatibility

// News routes (public read-only)
Route::get('news', [NewsController::class, 'index']);
Route::get('news/{news}', [NewsController::class, 'show']);
Route::get('news-latest', [NewsController::class, 'getLatest']);

// Contact routes (public)
Route::post('contacts', [ContactController::class, 'store']);
Route::get('contacts', [ContactController::class, 'index']);
Route::get('contacts/{contact}', [ContactController::class, 'show']);

// Sale Campaign routes (public read-only)
Route::get('sale-campaigns', [SaleCampaignController::class, 'index']);
Route::get('sale-campaigns/slug/{slug}', [SaleCampaignController::class, 'getBySlug'])->where('slug', '[a-zA-Z0-9\-]+');
Route::get('sale-campaigns/{saleCampaign}', [SaleCampaignController::class, 'show']);
Route::get('sale-campaigns-active', [SaleCampaignController::class, 'getActive']);
Route::get('sale-campaigns-featured', [SaleCampaignController::class, 'getFeatured']);
Route::get('sale-campaigns/{saleCampaign}/products', [SaleCampaignController::class, 'getProducts']);

// Payment Method routes (public read-only)
Route::get('payment-methods', [PaymentMethodController::class, 'index']);
Route::get('payment-methods/{paymentMethod}', [PaymentMethodController::class, 'show']);
Route::get('payment-methods-active', [PaymentMethodController::class, 'getActive']);

// ===================
// AUTHENTICATED USER ROUTES
// ===================

// ===================
// AUTHENTICATED USER ROUTES
// ===================

Route::middleware('auth:api')->group(function () {
    // User profile routes
    Route::get('profile', [UserController::class, 'profile']);
    Route::put('profile', [UserController::class, 'updateProfile']);
    Route::post('change-password', [UserController::class, 'changePassword']);
    Route::get('user-stats', [UserController::class, 'getStats']);
    Route::delete('delete-account', [UserController::class, 'deleteAccount']);

    // Address book routes
    Route::apiResource('address-books', AddressBookController::class);
    Route::post('address-books/{id}/set-default', [AddressBookController::class, 'setDefault']);

    // Order routes
    Route::apiResource('orders', OrderController::class)->except(['update', 'destroy']);
    Route::post('orders/{order}/cancel', [OrderController::class, 'cancel']);
    Route::get('orders-stats', [OrderController::class, 'getStats']);

    // User comments
    Route::post('comments', [CommentController::class, 'store']);
    Route::post('comments/product/{product}', [CommentController::class, 'storeByProduct']);
    Route::put('comments/{comment}', [CommentController::class, 'update']);
    Route::delete('comments/{comment}', [CommentController::class, 'destroy']);
    Route::get('my-comments', [CommentController::class, 'getUserComments']);
});

// ===================
// DASHBOARD ROUTES (Admin + Contributor)
// ===================

Route::middleware(['auth:api', 'role:admin,contributor'])->prefix('dashboard')->group(function () {
    // Role management (Admin only)
    Route::middleware('role:admin')->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::post('roles/assign', [RoleController::class, 'assignRole']);
        Route::post('roles/remove', [RoleController::class, 'removeRole']);
    });

    // User management (Admin only)
    Route::middleware('role:admin')->group(function () {
        Route::get('users', [UserController::class, 'index']);
        Route::put('users/{user}', [UserController::class, 'update']);
        Route::delete('users/{user}', [UserController::class, 'destroy']);
        Route::post('users/{user}/toggle-status', [UserController::class, 'toggleStatus']);
        // User soft delete management
        Route::get('users/trashed', [UserController::class, 'trashed']);
        Route::post('users/{id}/restore', [UserController::class, 'restore']);
    });

    // Dashboard statistics (Admin only)
    Route::middleware('role:admin')->group(function () {
        Route::get('stats', [DashboardController::class, 'getAdminStats']);
        Route::get('revenue', [DashboardController::class, 'getMonthlyRevenue']);
        Route::get('user-analytics', [DashboardController::class, 'getUserAnalytics']);
        Route::get('product-analytics', [DashboardController::class, 'getProductAnalytics']);
    });

    // Brand management (Admin + Contributor)
    Route::get('brands', [BrandController::class, 'index']);
    Route::get('brands/{brand}', [BrandController::class, 'show']);
    Route::post('brands', [BrandController::class, 'store']);
    Route::put('brands/{brand}', [BrandController::class, 'update']);
    Route::delete('brands/{brand}', [BrandController::class, 'destroy']);
    // Brand soft delete management
    Route::get('brands/trashed', [BrandController::class, 'trashed']);
    Route::post('brands/{id}/restore', [BrandController::class, 'restore']);
    Route::delete('brands/{id}/force', [BrandController::class, 'forceDelete']);

    // Category management
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('categories/{category}', [CategoryController::class, 'show']);
    Route::post('categories', [CategoryController::class, 'store']);
    Route::put('categories/{category}', [CategoryController::class, 'update']);
    Route::delete('categories/{category}', [CategoryController::class, 'destroy']);
    // Category soft delete management
    Route::get('categories/trashed', [CategoryController::class, 'trashed']);
    Route::post('categories/{id}/restore', [CategoryController::class, 'restore']);
    Route::delete('categories/{id}/force', [CategoryController::class, 'forceDelete']);

    // Product management
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{product}', [ProductController::class, 'show']);
    Route::post('products', [ProductController::class, 'store']);
    Route::put('products/{product}', [ProductController::class, 'update']);
    Route::delete('products/{product}', [ProductController::class, 'destroy']);
    // Product soft delete management
    Route::get('products/trashed', [ProductController::class, 'trashed']);
    Route::post('products/{id}/restore', [ProductController::class, 'restore']);
    Route::delete('products/{id}/force', [ProductController::class, 'forceDelete']);

    // Voucher management
    Route::get('vouchers', [VoucherController::class, 'adminIndex']);
    Route::get('vouchers/{voucher}', [VoucherController::class, 'show']);
    Route::post('vouchers', [VoucherController::class, 'store']);
    Route::put('vouchers/{voucher}', [VoucherController::class, 'update']);
    Route::delete('vouchers/{voucher}', [VoucherController::class, 'destroy']);

    // Sale Campaign management
    Route::get('sale-campaigns', [SaleCampaignController::class, 'index']);
    Route::get('sale-campaigns/{saleCampaign}', [SaleCampaignController::class, 'show']);
    Route::post('sale-campaigns', [SaleCampaignController::class, 'store']);
    Route::put('sale-campaigns/{saleCampaign}', [SaleCampaignController::class, 'update']);
    Route::delete('sale-campaigns/{saleCampaign}', [SaleCampaignController::class, 'destroy']);
    Route::post('sale-campaigns/{saleCampaign}/products', [SaleCampaignController::class, 'addProducts']);
    Route::delete('sale-campaigns/{saleCampaign}/products/{product}', [SaleCampaignController::class, 'removeProduct']);

    // News management
    Route::get('news', [NewsController::class, 'index']);
    Route::get('news/{news}', [NewsController::class, 'show']);
    Route::post('news', [NewsController::class, 'store']);
    Route::put('news/{news}', [NewsController::class, 'update']);
    Route::delete('news/{news}', [NewsController::class, 'destroy']);

    // Order management
    Route::get('orders', [OrderController::class, 'adminIndex']);
    Route::get('orders/{order}', [OrderController::class, 'show']);
    Route::put('orders/{order}/status', [OrderController::class, 'updateStatus']);

    // Contact management
    Route::get('contacts', [ContactController::class, 'adminIndex']);
    Route::get('contacts/{contact}', [ContactController::class, 'show']);
    Route::put('contacts/{contact}', [ContactController::class, 'update']);
    Route::delete('contacts/{contact}', [ContactController::class, 'destroy']);

    // Payment Method management
    Route::get('payment-methods', [PaymentMethodController::class, 'index']);
    Route::get('payment-methods/{paymentMethod}', [PaymentMethodController::class, 'show']);
    Route::post('payment-methods', [PaymentMethodController::class, 'store']);
    Route::put('payment-methods/{paymentMethod}', [PaymentMethodController::class, 'update']);
    Route::delete('payment-methods/{paymentMethod}', [PaymentMethodController::class, 'destroy']);
});

// Test route for 500 error (only in development)
if (config('app.debug')) {
    Route::get('test-500-error', function () {
        throw new \Exception('This is a test 500 error for API exception handling');
    });
}
