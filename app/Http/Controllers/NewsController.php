<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $query = News::query();

        // Tìm kiếm theo tiêu đề
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Phân trang
        $perPage = $request->get('per_page', 10);
        $news = $query->orderBy('created_at', 'desc')->paginate($perPage);

        return response()->json($news);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->only(['title', 'description']);

        // Handle file upload
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('news/thumbnails', $fileName, 'public');
            $data['thumbnail'] = '/storage/' . $filePath;
        }

        $news = News::create($data);

        return response()->json([
            'message' => 'Tin tức đã được tạo thành công',
            'data' => $news
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news): JsonResponse
    {
        return response()->json([
            'data' => $news
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news): JsonResponse
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = [];

        // Only update fields that are present in request
        if ($request->has('title')) {
            $data['title'] = $request->title;
        }
        if ($request->has('description')) {
            $data['description'] = $request->description;
        }

        // Handle file upload
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($news->thumbnail && file_exists(public_path($news->thumbnail))) {
                unlink(public_path($news->thumbnail));
            }

            $file = $request->file('thumbnail');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('news/thumbnails', $fileName, 'public');
            $data['thumbnail'] = '/storage/' . $filePath;
        }

        $news->update($data);

        return response()->json([
            'message' => 'Tin tức đã được cập nhật thành công',
            'data' => $news->fresh()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news): JsonResponse
    {
        // Delete thumbnail file if exists
        if ($news->thumbnail && file_exists(public_path($news->thumbnail))) {
            unlink(public_path($news->thumbnail));
        }

        $news->delete();

        return response()->json([
            'message' => 'Tin tức đã được xóa thành công'
        ]);
    }

    /**
     * Get latest news
     */
    public function getLatest(): JsonResponse
    {
        $news = News::orderBy('created_at', 'desc')->take(6)->get();

        return response()->json([
            'data' => $news
        ]);
    }
}
