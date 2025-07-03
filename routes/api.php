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
Route::get('products/{product}', [ProductController::class, 'show']);
Route::get('products-featured', [ProductController::class, 'getFeatured']);
Route::get('products/category/{categorySlug}', [ProductController::class, 'getByCategory']);
Route::get('products/brand/{brandSlug}', [ProductController::class, 'getByBrand']);
Route::get('products-search', [ProductController::class, 'search']);
Route::get('products-on-sale', [ProductController::class, 'getOnSale']);
Route::get('products/{product}/sale-campaigns', [ProductController::class, 'getSaleCampaigns']);

// Voucher routes (require authentication)
Route::middleware('auth:api')->group(function () {
    Route::get('vouchers', [VoucherController::class, 'index']);
    Route::post('vouchers/check', [VoucherController::class, 'check']);
});

// Comment routes (public read-only)
Route::get('comments', [CommentController::class, 'index']);
Route::get('comments/{comment}', [CommentController::class, 'show']);
Route::get('comments/product/{productId}', [CommentController::class, 'getByProduct']);

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

    // Order routes
    Route::apiResource('orders', OrderController::class)->except(['update', 'destroy']);
    Route::post('orders/{order}/cancel', [OrderController::class, 'cancel']);
    Route::get('orders-stats', [OrderController::class, 'getStats']);

    // User comments
    Route::post('comments', [CommentController::class, 'store']);
    Route::put('comments/{comment}', [CommentController::class, 'update']);
    Route::delete('comments/{comment}', [CommentController::class, 'destroy']);
    Route::get('my-comments', [CommentController::class, 'getUserComments']);
});

// ===================
// ADMIN ROUTES (Admin only)
// ===================

Route::middleware(['auth:api', 'role:admin'])->group(function () {
    // Role management
    Route::apiResource('roles', RoleController::class);
    Route::post('roles/assign', [RoleController::class, 'assignRole']);
    Route::post('roles/remove', [RoleController::class, 'removeRole']);

    // User management
    Route::get('admin/users', [UserController::class, 'index']);
    Route::put('admin/users/{user}', [UserController::class, 'update']);
    Route::delete('admin/users/{user}', [UserController::class, 'destroy']);
    Route::post('admin/users/{user}/toggle-status', [UserController::class, 'toggleStatus']);
});

// ===================
// CONTRIBUTOR ROUTES (Admin or Contributor)
// ===================

Route::middleware(['auth:api', 'role:admin,contributor'])->group(function () {
    // Brand management
    Route::post('brands', [BrandController::class, 'store']);
    Route::put('brands/{brand}', [BrandController::class, 'update']);
    Route::delete('brands/{brand}', [BrandController::class, 'destroy']);

    // Category management
    Route::post('categories', [CategoryController::class, 'store']);
    Route::put('categories/{category}', [CategoryController::class, 'update']);
    Route::delete('categories/{category}', [CategoryController::class, 'destroy']);

    // Product management
    Route::post('products', [ProductController::class, 'store']);
    Route::put('products/{product}', [ProductController::class, 'update']);
    Route::delete('products/{product}', [ProductController::class, 'destroy']);

    // Voucher management
    Route::post('vouchers', [VoucherController::class, 'store']);
    Route::put('vouchers/{voucher}', [VoucherController::class, 'update']);
    Route::delete('vouchers/{voucher}', [VoucherController::class, 'destroy']);

    // Sale Campaign management
    Route::post('sale-campaigns', [SaleCampaignController::class, 'store']);
    Route::put('sale-campaigns/{saleCampaign}', [SaleCampaignController::class, 'update']);
    Route::delete('sale-campaigns/{saleCampaign}', [SaleCampaignController::class, 'destroy']);
    Route::post('sale-campaigns/{saleCampaign}/products', [SaleCampaignController::class, 'addProducts']);
    Route::delete('sale-campaigns/{saleCampaign}/products/{product}', [SaleCampaignController::class, 'removeProduct']);

    // News management
    Route::post('news', [NewsController::class, 'store']);
    Route::put('news/{news}', [NewsController::class, 'update']);
    Route::delete('news/{news}', [NewsController::class, 'destroy']);

    // Order management
    Route::get('admin/orders', [OrderController::class, 'adminIndex']);
    Route::put('orders/{order}/status', [OrderController::class, 'updateStatus']);

    // Contact management
    Route::get('admin/contacts', [ContactController::class, 'adminIndex']);
    Route::put('contacts/{contact}', [ContactController::class, 'update']);
    Route::delete('contacts/{contact}', [ContactController::class, 'destroy']);

    // Payment Method management
    Route::post('payment-methods', [PaymentMethodController::class, 'store']);
    Route::put('payment-methods/{paymentMethod}', [PaymentMethodController::class, 'update']);
    Route::delete('payment-methods/{paymentMethod}', [PaymentMethodController::class, 'destroy']);
});
