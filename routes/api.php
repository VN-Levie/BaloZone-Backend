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
Route::prefix('brands')->group(function () {
    Route::get('/', [BrandController::class, 'index']);
    Route::get('/active', [BrandController::class, 'getActiveBrands']);
    Route::get('/{brand}', [BrandController::class, 'show']);
});

// Category routes (public read-only)
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/with-products', [CategoryController::class, 'getWithProducts']);
    Route::get('/slug/{slug}', [CategoryController::class, 'getBySlug']);
    Route::get('/{category}', [CategoryController::class, 'show']);
});

// Product routes (public read-only)
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/featured', [ProductController::class, 'getFeatured']);
    Route::get('/latest', [ProductController::class, 'getLatest']);
    Route::get('/on-sale', [ProductController::class, 'getOnSale']);
    Route::get('/slug/{slug}', [ProductController::class, 'getBySlug']);
    Route::get('/{product}', [ProductController::class, 'show']);
    Route::get('/{product}/related', [ProductController::class, 'getRelated']);
    Route::get('/{product}/sale-campaigns', [ProductController::class, 'getSaleCampaigns']);
});

// Voucher routes (require authentication)
Route::middleware('auth:api')->prefix('vouchers')->group(function () {
    Route::get('/', [VoucherController::class, 'index']);
    Route::post('/check', [VoucherController::class, 'check']);
});

// Comment routes (public read-only)
Route::prefix('comments')->group(function () {
    Route::get('/', [CommentController::class, 'index']);
    Route::get('/{comment}', [CommentController::class, 'show']);
    Route::get('/product/{product}', [CommentController::class, 'getByProduct']);
    Route::get('/product/{productId}/legacy', [CommentController::class, 'getByProduct']); // Legacy route for backward compatibility
});

// News routes (public read-only)
Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index']);
    Route::get('/latest', [NewsController::class, 'getLatest']);
    Route::get('/{news}', [NewsController::class, 'show']);
});

// Contact routes (public)
Route::prefix('contacts')->group(function () {
    Route::post('/', [ContactController::class, 'store']);
    Route::get('/', [ContactController::class, 'index']);
    Route::get('/{contact}', [ContactController::class, 'show']);
});

// Sale Campaign routes (public read-only)
Route::prefix('sale-campaigns')->group(function () {
    Route::get('/', [SaleCampaignController::class, 'index']);
    Route::get('/slug/{slug}', [SaleCampaignController::class, 'getBySlug'])->where('slug', '[a-zA-Z0-9\-]+');
    Route::get('/{saleCampaign}', [SaleCampaignController::class, 'show']);
    Route::get('/active', [SaleCampaignController::class, 'getActive']);
    Route::get('/featured', [SaleCampaignController::class, 'getFeatured']);
    Route::get('/{saleCampaign}/products', [SaleCampaignController::class, 'getProducts']);
});

// Payment Method routes (public read-only)
Route::prefix('payment-methods')->group(function () {
    Route::get('/', [PaymentMethodController::class, 'index']);
    Route::get('/{paymentMethod}', [PaymentMethodController::class, 'show']);
    Route::get('/active', [PaymentMethodController::class, 'getActive']);
});

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
    Route::prefix('address-books')->group(function () {
        Route::get('/', [AddressBookController::class, 'index']);
        Route::post('/', [AddressBookController::class, 'store']);
        Route::get('/{address_book}', [AddressBookController::class, 'show']);
        Route::put('/{address_book}', [AddressBookController::class, 'update']);
        Route::delete('/{address_book}', [AddressBookController::class, 'destroy']);
        Route::post('/{id}/set-default', [AddressBookController::class, 'setDefault']);
    });

    // Order routes
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index']);
        Route::post('/', [OrderController::class, 'store']);
        Route::get('/{order}', [OrderController::class, 'show']);
        Route::post('/{order}/cancel', [OrderController::class, 'cancel']);
        Route::get('/stats', [OrderController::class, 'getStats']);
    });

    // User comments
    Route::prefix('comments')->group(function () {
        Route::post('/', [CommentController::class, 'store']);
        Route::post('/product/{product}', [CommentController::class, 'storeByProduct']);
        Route::put('/{comment}', [CommentController::class, 'update']);
        Route::delete('/{comment}', [CommentController::class, 'destroy']);
    });
    Route::get('my-comments', [CommentController::class, 'getUserComments']);
});

// ===================
// DASHBOARD ROUTES (Admin + Contributor)
// ===================

Route::middleware(['auth:api', 'role:admin,contributor'])->prefix('dashboard')->group(function () {
    // Role management (Admin only)
    Route::middleware('role:admin')->prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index']);
        Route::post('/', [RoleController::class, 'store']);
        Route::get('/{role}', [RoleController::class, 'show']);
        Route::put('/{role}', [RoleController::class, 'update']);
        Route::delete('/{role}', [RoleController::class, 'destroy']);
        Route::post('/assign', [RoleController::class, 'assignRole']);
        Route::post('/remove', [RoleController::class, 'removeRole']);
    });

    // User management (Admin only)
    Route::middleware('role:admin')->prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{user}', [UserController::class, 'show']);
        Route::put('/{user}', [UserController::class, 'update']);
        Route::delete('/{user}', [UserController::class, 'destroy']);
        Route::post('/{user}/toggle-status', [UserController::class, 'toggleStatus']);
        Route::get('/trashed', [UserController::class, 'trashed']);
        Route::post('/{id}/restore', [UserController::class, 'restore']);
    });

    // Dashboard statistics (Admin only)
    Route::middleware('role:admin')->group(function () {
        Route::get('stats', [DashboardController::class, 'getAdminStats']);
        Route::get('revenue', [DashboardController::class, 'getMonthlyRevenue']);
        Route::get('user-analytics', [DashboardController::class, 'getUserAnalytics']);
        Route::get('product-analytics', [DashboardController::class, 'getProductAnalytics']);
    });

    // Brand management (Admin + Contributor)
    Route::prefix('brands')->group(function () {
        Route::get('/', [BrandController::class, 'index']);
        Route::get('/{brand}', [BrandController::class, 'show']);
        Route::post('/', [BrandController::class, 'store']);
        Route::put('/{brand}', [BrandController::class, 'update']);
        Route::delete('/{brand}', [BrandController::class, 'destroy']);
        Route::get('/trashed', [BrandController::class, 'trashed']);
        Route::post('/{id}/restore', [BrandController::class, 'restore']);
        Route::delete('/{id}/force', [BrandController::class, 'forceDelete']);
    });

    // Category management
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::get('/{category}', [CategoryController::class, 'show']);
        Route::post('/', [CategoryController::class, 'store']);
        Route::put('/{category}', [CategoryController::class, 'update']);
        Route::delete('/{category}', [CategoryController::class, 'destroy']);
        Route::get('/trashed', [CategoryController::class, 'trashed']);
        Route::post('/{id}/restore', [CategoryController::class, 'restore']);
        Route::delete('/{id}/force', [CategoryController::class, 'forceDelete']);
    });

    // Product management
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/{product}', [ProductController::class, 'show']);
        Route::post('/', [ProductController::class, 'store']);
        Route::put('/{product}', [ProductController::class, 'update']);
        Route::delete('/{product}', [ProductController::class, 'destroy']);
        Route::get('/trashed', [ProductController::class, 'trashed']);
        Route::post('/{id}/restore', [ProductController::class, 'restore']);
        Route::delete('/{id}/force', [ProductController::class, 'forceDelete']);
    });

    // Voucher management
    Route::prefix('vouchers')->group(function () {
        Route::get('/', [VoucherController::class, 'adminIndex']);
        Route::get('/{voucher}', [VoucherController::class, 'show']);
        Route::post('/', [VoucherController::class, 'store']);
        Route::put('/{voucher}', [VoucherController::class, 'update']);
        Route::delete('/{voucher}', [VoucherController::class, 'destroy']);
    });

    // Sale Campaign management
    Route::prefix('sale-campaigns')->group(function () {
        Route::get('/', [SaleCampaignController::class, 'index']);
        Route::get('/{saleCampaign}', [SaleCampaignController::class, 'show']);
        Route::get('/{saleCampaign}/products', [SaleCampaignController::class, 'getProducts']);
        Route::post('/', [SaleCampaignController::class, 'store']);
        Route::put('/{saleCampaign}', [SaleCampaignController::class, 'update']);
        Route::delete('/{saleCampaign}', [SaleCampaignController::class, 'destroy']);
        Route::post('/{saleCampaign}/products', [SaleCampaignController::class, 'addProducts']);
        Route::delete('/{saleCampaign}/products/{product}', [SaleCampaignController::class, 'removeProduct']);
    });

    // News management
    Route::prefix('news')->group(function () {
        Route::get('/', [NewsController::class, 'index']);
        Route::get('/{news}', [NewsController::class, 'show']);
        Route::post('/', [NewsController::class, 'store']);
        Route::put('/{news}', [NewsController::class, 'update']);
        Route::post('/{news}/update', [NewsController::class, 'update']); // For file upload with POST
        Route::delete('/{news}', [NewsController::class, 'destroy']);
    });

    // Order management
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'adminIndex']);
        Route::get('/{order}', [OrderController::class, 'show']);
        Route::put('/{order}/status', [OrderController::class, 'updateStatus']);
    });

    // Contact management
    Route::prefix('contacts')->group(function () {
        Route::get('/', [ContactController::class, 'adminIndex']);
        Route::get('/{contact}', [ContactController::class, 'show']);
        Route::put('/{contact}', [ContactController::class, 'update']);
        Route::delete('/{contact}', [ContactController::class, 'destroy']);
    });

    // Payment Method management
    Route::prefix('payment-methods')->group(function () {
        Route::get('/', [PaymentMethodController::class, 'index']);
        Route::get('/{paymentMethod}', [PaymentMethodController::class, 'show']);
        Route::post('/', [PaymentMethodController::class, 'store']);
        Route::put('/{paymentMethod}', [PaymentMethodController::class, 'update']);
        Route::delete('/{paymentMethod}', [PaymentMethodController::class, 'destroy']);
    });
});

// Test route for 500 error (only in development)
if (config('app.debug')) {
    Route::get('test-500-error', function () {
        throw new \Exception('This is a test 500 error for API exception handling');
    });
}
