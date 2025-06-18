<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\CommentRequest;
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

        return response()->json($comments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request): JsonResponse
    {
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

        if (!$hasPurchased) {
            return response()->json([
                'message' => 'Bạn chỉ có thể bình luận về sản phẩm đã mua'
            ], 403);
        }

        // Kiểm tra xem user đã bình luận sản phẩm này chưa
        $existingComment = Comment::where('user_id', $user->id)
                                 ->where('product_id', $request->product_id)
                                 ->exists();

        if ($existingComment) {
            return response()->json([
                'message' => 'Bạn đã bình luận về sản phẩm này rồi'
            ], 422);
        }

        $comment = Comment::create([
            'product_id' => $request->product_id,
            'user_id' => $user->id,
            'comment' => $request->comment,
        ]);

        $comment->load(['user:id,name', 'product:id,name']);

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

        return response()->json([
            'data' => $comment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, Comment $comment): JsonResponse
    {
        $user = auth('api')->user();

        if (!$user || $comment->user_id !== $user->id) {
            return response()->json([
                'message' => 'Bạn không có quyền sửa bình luận này'
            ], 403);
        }

        $comment->update([
            'comment' => $request->comment
        ]);

        $comment->load(['user:id,name', 'product:id,name']);

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
        $user = auth('api')->user();

        if (!$user || $comment->user_id !== $user->id) {
            return response()->json([
                'message' => 'Bạn không có quyền xóa bình luận này'
            ], 403);
        }

        $comment->delete();

        return response()->json([
            'message' => 'Bình luận đã được xóa'
        ]);
    }

    /**
     * Get comments for a specific product
     */
    public function getByProduct(int $productId, Request $request): JsonResponse
    {
        $perPage = $request->get('per_page', 10);

        $comments = Comment::with(['user:id,name'])
            ->where('product_id', $productId)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return response()->json($comments);
    }

    /**
     * Get user's comments
     */
    public function getUserComments(Request $request): JsonResponse
    {
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

        return response()->json($comments);
    }
}
