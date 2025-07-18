<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\CommentByProductRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Comment::with(['user:id,name', 'product:id,name']);

        // Lọc theo sản phẩm
        if ($request->has('product_id')) {
            $query->where('product_id', $request->product_id);
        }

        // Lọc theo user (nếu đã đăng nhập)
        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // Phân trang
        $perPage = $request->get('per_page', 10);
        $comments = $query->orderBy('created_at', 'desc')->paginate($perPage);

        // Thêm thông tin đã mua hàng cho mỗi comment
        $comments->getCollection()->transform(function ($comment) {
            $hasPurchased = $comment->user->orders()
                ->where('payment_status', 'paid')
                ->whereHas('orderDetails', function($query) use ($comment) {
                    $query->where('product_id', $comment->product_id);
                })
                ->exists();

            $comment->has_purchased = $hasPurchased;
            return $comment;
        });

        return response()->json($comments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request): JsonResponse
    {
        /** @var User|null $user */
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'message' => 'Bạn cần đăng nhập để bình luận'
            ], 401);
        }

        // Kiểm tra xem user đã mua sản phẩm này chưa
        $hasPurchased = $user->orders()
            ->where('payment_status', 'paid')
            ->whereHas('orderDetails', function($query) use ($request) {
                $query->where('product_id', $request->product_id);
            })
            ->exists();

        // Kiểm tra xem user đã bình luận sản phẩm này chưa
        $existingComment = Comment::where('user_id', $user->id)
                                 ->where('product_id', $request->product_id)
                                 ->exists();

        if ($existingComment) {
            return response()->json([
                'message' => 'Bạn đã bình luận về sản phẩm này rồi'
            ], 422);
        }

        // Nếu user chưa mua hàng, rating = -1 (không tính vào rating tổng)
        $rating = $hasPurchased ? $request->rating : -1;

        $comment = Comment::create([
            'product_id' => $request->product_id,
            'user_id' => $user->id,
            'content' => $request->content,
            'rating' => $rating,
        ]);

        $comment->load(['user:id,name', 'product:id,name']);

        // Thêm thông tin đã mua hàng
        $comment->has_purchased = $hasPurchased;

        return response()->json([
            'message' => 'Bình luận đã được thêm thành công',
            'data' => $comment
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment): JsonResponse
    {
        $comment->load(['user:id,name', 'product:id,name,slug']);

        // Thêm thông tin đã mua hàng
        $hasPurchased = $comment->user->orders()
            ->where('payment_status', 'paid')
            ->whereHas('orderDetails', function($query) use ($comment) {
                $query->where('product_id', $comment->product_id);
            })
            ->exists();

        $comment->has_purchased = $hasPurchased;

        return response()->json([
            'data' => $comment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, Comment $comment): JsonResponse
    {
        /** @var User|null $user */
        $user = auth('api')->user();

        if (!$user || $comment->user_id !== $user->id) {
            return response()->json([
                'message' => 'Bạn không có quyền sửa bình luận này'
            ], 403);
        }

        // Kiểm tra xem user đã mua sản phẩm này chưa để quyết định rating
        $hasPurchased = $user->orders()
            ->where('payment_status', 'paid')
            ->whereHas('orderDetails', function($query) use ($comment) {
                $query->where('product_id', $comment->product_id);
            })
            ->exists();

        // Nếu user chưa mua hàng, rating = -1 (không tính vào rating tổng)
        $rating = $hasPurchased ? $request->rating : -1;

        $comment->update([
            'content' => $request->content,
            'rating' => $rating,
        ]);

        $comment->load(['user:id,name', 'product:id,name']);

        // Thêm thông tin đã mua hàng
        $comment->has_purchased = $hasPurchased;

        return response()->json([
            'message' => 'Bình luận đã được cập nhật',
            'data' => $comment
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment): JsonResponse
    {
        /** @var User|null */
        $user = auth('api')->user();

        if (!$user || $comment->user_id !== $user->id && !$user->isAdmin()) {
            return response()->json([
                'message' => 'Bạn không có quyền xóa bình luận này'
            ], 403);
        }

        $comment->delete(); // Soft delete

        return response()->json([
            'message' => 'Bình luận đã được xóa'
        ]);
    }

    /**
     * Get comments for a specific product
     */
    public function getByProduct(Request $request, $product): JsonResponse
    {
        // Handle both product ID and product model
        $productId = is_numeric($product) ? $product : $product->id;

        $query = Comment::with(['user:id,name,email'])
            ->where('product_id', $productId);

        // Phân trang
        $perPage = $request->get('per_page', 10);
        $comments = $query->orderBy('created_at', 'desc')->paginate($perPage);

        // Thêm thông tin đã mua hàng cho mỗi comment
        $comments->getCollection()->transform(function ($comment) {
            $hasPurchased = $comment->user->orders()
                ->where('payment_status', 'paid')
                ->whereHas('orderDetails', function($query) use ($comment) {
                    $query->where('product_id', $comment->product_id);
                })
                ->exists();

            $comment->has_purchased = $hasPurchased;
            return $comment;
        });

        return response()->json($comments);
    }

    /**
     * Get user's comments
     */
    public function getUserComments(Request $request): JsonResponse
    {
        /** @var User|null $user */
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $perPage = $request->get('per_page', 10);

        $comments = Comment::with(['product:id,name,slug,image'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        // Thêm thông tin đã mua hàng cho mỗi comment
        $comments->getCollection()->transform(function ($comment) use ($user) {
            /** @var User $user */
            $hasPurchased = $user->orders()
                ->where('payment_status', 'paid')
                ->whereHas('orderDetails', function($query) use ($comment) {
                    $query->where('product_id', $comment->product_id);
                })
                ->exists();

            $comment->has_purchased = $hasPurchased;
            return $comment;
        });

        return response()->json($comments);
    }

    /**
     * Store comment for a specific product
     */
    public function storeByProduct(CommentByProductRequest $request, $product): JsonResponse
    {
        /** @var User|null */
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'message' => 'Bạn cần đăng nhập để bình luận'
            ], 401);
        }

        // Handle both product ID and product model
        $productId = is_numeric($product) ? $product : $product->id;

        // Kiểm tra xem user đã mua sản phẩm này chưa
        $hasPurchased = $user->orders()
            ->whereHas('orderDetails', function ($query) use ($productId) {
                $query->where('product_id', $productId);
            })
            ->where('status', 'delivered')
            ->exists();

        // Nếu user chưa mua hàng, rating = -1 (không tính vào rating tổng)
        $rating = $hasPurchased ? $request->rating : -1;

        $comment = Comment::create([
            'user_id' => $user->id,
            'product_id' => $productId,
            'content' => $request->content,
            'rating' => $rating,
        ]);

        $comment->load('user:id,name,email');

        // Thêm thông tin đã mua hàng
        $comment->has_purchased = $hasPurchased;

        return response()->json([
            'success' => true,
            'data' => $comment,
            'message' => 'Bình luận thành công'
        ], 201);
    }
}
