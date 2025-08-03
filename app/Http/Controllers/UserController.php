<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Get user profile
     */
    public function profile(): JsonResponse
    {
        /** @var User|null $user */
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user->load(['addressBooks', 'orders' => function($query) {
            $query->orderBy('created_at', 'desc')->take(5);
        }]);

        return response()->json([
            'data' => $user
        ]);
    }

    /**
     * Update user profile
     */
    public function updateProfile(Request $request): JsonResponse
    {
        /** @var User|null $user */
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'phone' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return response()->json([
            'message' => 'Profile updated successfully',
            'data' => $user
        ]);
    }

    /**
     * Change password
     */
    public function changePassword(Request $request): JsonResponse
    {
        /** @var User|null $user */
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Mật khẩu hiện tại không đúng'
            ], 422);
        }

        // Cập nhật mật khẩu mới
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return response()->json([
            'message' => 'Password changed successfully'
        ]);
    }

    /**
     * Get user statistics
     */
    public function getStats(): JsonResponse
    {
        /** @var User|null $user */
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $stats = [
            'total_orders' => $user->orders()->count(),
            'pending_orders' => $user->orders()->where('payment_status', 'pending')->count(),
            'completed_orders' => $user->orders()->where('payment_status', 'paid')->count(),
            'total_spent' => $user->orders()->where('payment_status', 'paid')->sum('total_price'),
            'total_comments' => $user->comments()->count(),
            'addresses_count' => $user->addressBooks()->count(),
            'member_since' => $user->created_at->format('Y-m-d'),
        ];

        return response()->json([
            'data' => $stats
        ]);
    }

    /**
     * Delete account
     */
    public function deleteAccount(Request $request): JsonResponse
    {
        /** @var User|null $user */
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $validator = Validator::make($request->all(), [
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        // Kiểm tra mật khẩu
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Mật khẩu không đúng'
            ], 422);
        }

        // Kiểm tra xem có đơn hàng pending không (chỉ kiểm tra orders chưa bị xóa)
        if ($user->orders()->where('payment_status', 'pending')->whereNull('deleted_at')->count() > 0) {
            return response()->json([
                'message' => 'Cannot delete account with pending orders'
            ], 422);
        }

        // Xóa tài khoản (soft delete)
        $user->delete();

        return response()->json([
            'message' => 'Account soft deleted successfully'
        ]);
    }

    /**
     * Get all users (Admin only)
     */
    public function index(Request $request): JsonResponse
    {
        $query = User::with('roles')->withCount('orders');

        // Search by name or email
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        // Filter by role
        if ($request->has('role') && $request->role) {
            $query->whereHas('roles', function($q) use ($request) {
                $q->where('name', $request->role);
            });
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(20);

        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }

    /**
     * Get user details (Admin only)
     */
    public function show(User $user): JsonResponse
    {
        $user->load(['roles', 'addressBooks', 'orders' => function($query) {
            $query->orderBy('created_at', 'desc')->take(5);
        }]);

        // Calculate order summary
        $orderSummary = [
            'total_orders' => $user->orders->count(),
            'total_spent' => $user->orders->sum('total_amount'),
            'average_order_value' => $user->orders->count() > 0 ? $user->orders->avg('total_amount') : 0,
            'last_order_at' => $user->orders->first()?->created_at
        ];

        $userData = $user->toArray();
        $userData['order_summary'] = $orderSummary;

        return response()->json([
            'success' => true,
            'data' => $userData,
            'message' => 'Lấy chi tiết người dùng thành công'
        ]);
    }

    /**
     * Update user (Admin only)
     */
    public function update(Request $request, User $user): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'phone' => 'nullable|string|max:20',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $user->update($request->only(['name', 'email', 'phone', 'status']));
        $user->load('roles');

        return response()->json([
            'success' => true,
            'message' => 'User updated successfully',
            'data' => $user
        ]);
    }

    /**
     * Delete user (Admin only)
     */
    public function destroy(User $user): JsonResponse
    {
        // Không cho phép xóa admin
        if ($user->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete admin user'
            ], 400);
        }

        // Kiểm tra xem có đơn hàng pending không (chỉ kiểm tra orders chưa bị xóa)
        if ($user->orders()->where('payment_status', 'pending')->whereNull('deleted_at')->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete user with pending orders'
            ], 400);
        }

        $user->delete(); // Soft delete

        return response()->json([
            'success' => true,
            'message' => 'User soft deleted successfully'
        ]);
    }

    /**
     * Restore the specified soft deleted user (Admin only)
     */
    public function restore($id): JsonResponse
    {
        $user = User::onlyTrashed()->with('roles')->findOrFail($id);
        $user->restore();

        return response()->json([
            'success' => true,
            'message' => 'User restored successfully',
            'data' => $user
        ]);
    }

    /**
     * Get trashed users (Admin only)
     */
    public function trashed(): JsonResponse
    {
        $users = User::onlyTrashed()
            ->with('roles')
            ->withCount(['orders' => function($query) {
                $query->withTrashed();
            }])
            ->orderBy('deleted_at', 'desc')
            ->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }

    /**
     * Toggle user status (Admin only)
     */
    public function toggleStatus(User $user): JsonResponse
    {
        // Không cho phép khóa admin
        if ($user->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot change admin status'
            ], 400);
        }

        $user->update([
            'status' => $user->status === 'active' ? 'inactive' : 'active'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User status updated successfully',
            'data' => $user
        ]);
    }
}
