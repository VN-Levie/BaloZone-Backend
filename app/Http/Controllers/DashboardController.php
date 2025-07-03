<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Get admin dashboard statistics
     */
    public function getAdminStats(): JsonResponse
    {
        try {
            // Thống kê tổng quan
            $totalUsers = User::count();
            $totalOrders = Order::count();
            $totalProducts = Product::count();
            $totalContacts = Contact::count();

            // Thống kê đơn hàng theo trạng thái
            $orderStats = Order::select('status', DB::raw('count(*) as count'))
                ->groupBy('status')
                ->pluck('count', 'status')
                ->toArray();

            // Thống kê doanh thu
            $totalRevenue = Order::where('status', '!=', 'cancelled')->sum('final_amount');
            $monthlyRevenue = Order::where('status', '!=', 'cancelled')
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->sum('final_amount');

            // Thống kê người dùng mới trong tháng
            $newUsersThisMonth = User::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count();

            // Thống kê đơn hàng trong tháng
            $ordersThisMonth = Order::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count();

            // Top sản phẩm bán chạy
            $topProducts = Product::select('products.id', 'products.name',
                    DB::raw('COALESCE(SUM(order_details.quantity), 0) as total_sold'))
                ->leftJoin('order_details', 'products.id', '=', 'order_details.product_id')
                ->leftJoin('orders', 'order_details.order_id', '=', 'orders.id')
                ->where('orders.status', '!=', 'cancelled')
                ->orWhereNull('orders.status')
                ->groupBy('products.id', 'products.name')
                ->orderBy('total_sold', 'desc')
                ->limit(5)
                ->get();

            // Thống kê liên hệ theo trạng thái
            $contactStats = Contact::select('status', DB::raw('count(*) as count'))
                ->groupBy('status')
                ->pluck('count', 'status')
                ->toArray();

            // Thống kê doanh thu 7 ngày gần đây
            $revenueChart = [];
            for ($i = 6; $i >= 0; $i--) {
                $date = Carbon::now()->subDays($i);
                $revenue = Order::where('status', '!=', 'cancelled')
                    ->whereDate('created_at', $date)
                    ->sum('final_amount');

                $revenueChart[] = [
                    'date' => $date->format('Y-m-d'),
                    'revenue' => $revenue
                ];
            }

            // Thống kê đơn hàng 7 ngày gần đây
            $orderChart = [];
            for ($i = 6; $i >= 0; $i--) {
                $date = Carbon::now()->subDays($i);
                $orderCount = Order::whereDate('created_at', $date)->count();

                $orderChart[] = [
                    'date' => $date->format('Y-m-d'),
                    'orders' => $orderCount
                ];
            }

            $stats = [
                'overview' => [
                    'total_users' => $totalUsers,
                    'total_orders' => $totalOrders,
                    'total_products' => $totalProducts,
                    'total_contacts' => $totalContacts,
                    'total_revenue' => $totalRevenue,
                    'monthly_revenue' => $monthlyRevenue,
                    'new_users_this_month' => $newUsersThisMonth,
                    'orders_this_month' => $ordersThisMonth
                ],
                'order_stats' => $orderStats,
                'contact_stats' => $contactStats,
                'top_products' => $topProducts,
                'revenue_chart' => $revenueChart,
                'order_chart' => $orderChart
            ];

            return response()->json([
                'success' => true,
                'message' => 'Lấy thống kê dashboard thành công',
                'data' => $stats
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi lấy thống kê: ' . $e->getMessage(),
                'data' => null
            ], 500);
        }
    }

    /**
     * Get monthly revenue report
     */
    public function getMonthlyRevenue(Request $request): JsonResponse
    {
        try {
            $year = $request->input('year', Carbon::now()->year);

            $monthlyRevenue = [];
            for ($month = 1; $month <= 12; $month++) {
                $revenue = Order::where('status', '!=', 'cancelled')
                    ->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->sum('final_amount');

                $orderCount = Order::whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->count();

                $monthlyRevenue[] = [
                    'month' => $month,
                    'month_name' => Carbon::create($year, $month, 1)->format('M Y'),
                    'revenue' => $revenue,
                    'order_count' => $orderCount
                ];
            }

            return response()->json([
                'success' => true,
                'message' => 'Lấy báo cáo doanh thu theo tháng thành công',
                'data' => [
                    'year' => $year,
                    'monthly_data' => $monthlyRevenue
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi lấy báo cáo doanh thu: ' . $e->getMessage(),
                'data' => null
            ], 500);
        }
    }

    /**
     * Get user analytics
     */
    public function getUserAnalytics(Request $request): JsonResponse
    {
        try {
            // Thống kê người dùng theo tháng trong năm
            $year = $request->input('year', Carbon::now()->year);

            $usersByMonth = [];
            for ($month = 1; $month <= 12; $month++) {
                $userCount = User::whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->count();

                $usersByMonth[] = [
                    'month' => $month,
                    'month_name' => Carbon::create($year, $month, 1)->format('M Y'),
                    'new_users' => $userCount
                ];
            }

            // Thống kê người dùng theo vai trò
            $usersByRole = User::select('roles.name as role_name', DB::raw('count(*) as count'))
                ->leftJoin('user_roles', 'users.id', '=', 'user_roles.user_id')
                ->leftJoin('roles', 'user_roles.role_id', '=', 'roles.id')
                ->groupBy('roles.name')
                ->get()
                ->pluck('count', 'role_name')
                ->toArray();

            // Thống kê người dùng theo trạng thái
            $usersByStatus = User::select('status', DB::raw('count(*) as count'))
                ->groupBy('status')
                ->pluck('count', 'status')
                ->toArray();

            return response()->json([
                'success' => true,
                'message' => 'Lấy phân tích người dùng thành công',
                'data' => [
                    'year' => $year,
                    'users_by_month' => $usersByMonth,
                    'users_by_role' => $usersByRole,
                    'users_by_status' => $usersByStatus
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi lấy phân tích người dùng: ' . $e->getMessage(),
                'data' => null
            ], 500);
        }
    }

    /**
     * Get product analytics
     */
    public function getProductAnalytics(): JsonResponse
    {
        try {
            // Top sản phẩm bán chạy
            $topSellingProducts = Product::select('products.id', 'products.name', 'products.price',
                    DB::raw('COALESCE(SUM(order_details.quantity), 0) as total_sold'),
                    DB::raw('COALESCE(SUM(order_details.quantity * order_details.price), 0) as total_revenue'))
                ->leftJoin('order_details', 'products.id', '=', 'order_details.product_id')
                ->leftJoin('orders', 'order_details.order_id', '=', 'orders.id')
                ->where('orders.status', '!=', 'cancelled')
                ->orWhereNull('orders.status')
                ->groupBy('products.id', 'products.name', 'products.price')
                ->orderBy('total_sold', 'desc')
                ->limit(10)
                ->get();

            // Sản phẩm sắp hết hàng
            $lowStockProducts = Product::where('stock', '<=', 10)
                ->where('stock', '>', 0)
                ->orderBy('stock', 'asc')
                ->limit(10)
                ->get(['id', 'name', 'stock', 'price']);

            // Sản phẩm hết hàng
            $outOfStockProducts = Product::where('stock', '<=', 0)
                ->get(['id', 'name', 'stock', 'price']);

            // Thống kê sản phẩm theo danh mục
            $productsByCategory = Product::select('categories.name as category_name',
                    DB::raw('count(*) as product_count'))
                ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                ->groupBy('categories.name')
                ->orderBy('product_count', 'desc')
                ->get();

            // Thống kê sản phẩm theo thương hiệu
            $productsByBrand = Product::select('brands.name as brand_name',
                    DB::raw('count(*) as product_count'))
                ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
                ->groupBy('brands.name')
                ->orderBy('product_count', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Lấy phân tích sản phẩm thành công',
                'data' => [
                    'top_selling_products' => $topSellingProducts,
                    'low_stock_products' => $lowStockProducts,
                    'out_of_stock_products' => $outOfStockProducts,
                    'products_by_category' => $productsByCategory,
                    'products_by_brand' => $productsByBrand
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi lấy phân tích sản phẩm: ' . $e->getMessage(),
                'data' => null
            ], 500);
        }
    }
}
