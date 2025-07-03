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

// Brand routes
Route::apiResource('brands', BrandController::class);
Route::get('brands-active', [BrandController::class, 'getActiveBrands']);

// Category routes
Route::apiResource('categories', CategoryController::class);
Route::get('categories-with-products', [CategoryController::class, 'getWithProducts']);
Route::get('categories/slug/{slug}', [CategoryController::class, 'getBySlug']);

// Product routes
Route::apiResource('products', ProductController::class);
Route::get('products-featured', [ProductController::class, 'getFeatured']);
Route::get('products/category/{categorySlug}', [ProductController::class, 'getByCategory']);
Route::get('products/brand/{brandSlug}', [ProductController::class, 'getByBrand']);
Route::get('products-search', [ProductController::class, 'search']);
Route::get('products-on-sale', [ProductController::class, 'getOnSale']);
Route::get('products/{product}/sale-campaigns', [ProductController::class, 'getSaleCampaigns']);

// Voucher routes
Route::apiResource('vouchers', VoucherController::class);
Route::post('vouchers/validate', [VoucherController::class, 'validateCode']);
Route::get('vouchers-active', [VoucherController::class, 'getActive']);

// Comment routes
Route::apiResource('comments', CommentController::class);
Route::get('comments/product/{productId}', [CommentController::class, 'getByProduct']);
Route::get('my-comments', [CommentController::class, 'getUserComments'])->middleware('auth:api');

// Order routes (protected)
Route::middleware('auth:api')->group(function () {
    Route::apiResource('orders', OrderController::class)->except(['update', 'destroy']);
    Route::post('orders/{order}/cancel', [OrderController::class, 'cancel']);
    Route::get('orders-stats', [OrderController::class, 'getStats']);

    // User profile routes
    Route::get('profile', [UserController::class, 'profile']);
    Route::put('profile', [UserController::class, 'updateProfile']);
    Route::post('change-password', [UserController::class, 'changePassword']);
    Route::get('user-stats', [UserController::class, 'getStats']);
    Route::delete('delete-account', [UserController::class, 'deleteAccount']);

    // Address book routes
    Route::apiResource('address-books', AddressBookController::class);
});

// News routes
Route::get('news', [NewsController::class, 'index']);
Route::get('news/{news}', [NewsController::class, 'show']);
Route::get('news-latest', [NewsController::class, 'getLatest']);

// Contact routes
Route::post('contacts', [ContactController::class, 'store']);
Route::get('contacts', [ContactController::class, 'index']);
Route::get('contacts/{contact}', [ContactController::class, 'show']);

// Sale Campaign routes
Route::apiResource('sale-campaigns', SaleCampaignController::class);
Route::get('sale-campaigns-active', [SaleCampaignController::class, 'getActive']);
Route::get('sale-campaigns-featured', [SaleCampaignController::class, 'getFeatured']);
Route::get('sale-campaigns/{saleCampaign}/products', [SaleCampaignController::class, 'getProducts']);

// Protected Sale Campaign routes (Admin only)
Route::middleware('auth:api')->group(function () {
    Route::post('sale-campaigns/{saleCampaign}/products', [SaleCampaignController::class, 'addProducts']);
    Route::delete('sale-campaigns/{saleCampaign}/products/{product}', [SaleCampaignController::class, 'removeProduct']);
});

// Admin routes (Admin only)
Route::middleware(['auth:api', 'role:admin'])->group(function () {
    Route::apiResource('roles', RoleController::class);
    Route::post('roles/assign', [RoleController::class, 'assignRole']);
    Route::post('roles/remove', [RoleController::class, 'removeRole']);

    // User management routes
    Route::get('admin/users', [UserController::class, 'index']);
    Route::put('admin/users/{user}', [UserController::class, 'update']);
    Route::delete('admin/users/{user}', [UserController::class, 'destroy']);
    Route::post('admin/users/{user}/toggle-status', [UserController::class, 'toggleStatus']);
});

// Contributor routes (Admin or Contributor)
Route::middleware(['auth:api', 'role:admin,contributor'])->group(function () {
    Route::post('news', [NewsController::class, 'store']);
    Route::put('news/{news}', [NewsController::class, 'update']);
    Route::delete('news/{news}', [NewsController::class, 'destroy']);

    Route::post('brands', [BrandController::class, 'store']);
    Route::put('brands/{brand}', [BrandController::class, 'update']);
    Route::delete('brands/{brand}', [BrandController::class, 'destroy']);

    Route::post('categories', [CategoryController::class, 'store']);
    Route::put('categories/{category}', [CategoryController::class, 'update']);
    Route::delete('categories/{category}', [CategoryController::class, 'destroy']);

    Route::post('products', [ProductController::class, 'store']);
    Route::put('products/{product}', [ProductController::class, 'update']);
    Route::delete('products/{product}', [ProductController::class, 'destroy']);

    Route::post('vouchers', [VoucherController::class, 'store']);
    Route::put('vouchers/{voucher}', [VoucherController::class, 'update']);
    Route::delete('vouchers/{voucher}', [VoucherController::class, 'destroy']);

    Route::post('sale-campaigns', [SaleCampaignController::class, 'store']);
    Route::put('sale-campaigns/{saleCampaign}', [SaleCampaignController::class, 'update']);
    Route::delete('sale-campaigns/{saleCampaign}', [SaleCampaignController::class, 'destroy']);

    Route::put('orders/{order}/status', [OrderController::class, 'updateStatus']);
    Route::get('admin/orders', [OrderController::class, 'adminIndex']);

    Route::get('admin/contacts', [ContactController::class, 'adminIndex']);
    Route::put('contacts/{contact}', [ContactController::class, 'update']);
    Route::delete('contacts/{contact}', [ContactController::class, 'destroy']);
});
