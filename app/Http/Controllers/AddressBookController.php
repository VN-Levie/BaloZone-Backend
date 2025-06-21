<?php

namespace App\Http\Controllers;

use App\Models\AddressBook;
use App\Http\Requests\AddressBookRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class AddressBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $addresses = AddressBook::where('user_id', $user->id)
            ->orderBy('is_default', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $addresses,
            'total' => $addresses->count()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressBookRequest $request): JsonResponse
    {
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        DB::beginTransaction();

        try {
            // Nếu đây là địa chỉ mặc định, bỏ mặc định của các địa chỉ khác
            if ($request->is_default) {
                AddressBook::where('user_id', $user->id)
                    ->update(['is_default' => false]);
            }

            $addressBook = AddressBook::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'province' => $request->province,
                'district' => $request->district,
                'ward' => $request->ward,
                'is_default' => $request->is_default ?? false,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Địa chỉ đã được tạo thành công',
                'data' => $addressBook
            ], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi tạo địa chỉ',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AddressBook $addressBook): JsonResponse
    {
        $user = auth('api')->user();

        if (!$user || $addressBook->user_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden'
            ], 403);
        }

        return response()->json([
            'success' => true,
            'data' => $addressBook
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressBookRequest $request, AddressBook $addressBook): JsonResponse
    {
        $user = auth('api')->user();

        if (!$user || $addressBook->user_id !== $user->id) {
            return response()->json([
                'message' => 'Forbidden'
            ], 403);
        }

        DB::beginTransaction();

        try {
            // Nếu đây là địa chỉ mặc định, bỏ mặc định của các địa chỉ khác
            if ($request->is_default && !$addressBook->is_default) {
                AddressBook::where('user_id', $user->id)
                    ->where('id', '!=', $addressBook->id)
                    ->update(['is_default' => false]);
            }

            $addressBook->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'province' => $request->province,
                'district' => $request->district,
                'ward' => $request->ward,
                'is_default' => $request->is_default ?? $addressBook->is_default,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Địa chỉ đã được cập nhật thành công',
                'data' => $addressBook->fresh()
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi cập nhật địa chỉ',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AddressBook $addressBook): JsonResponse
    {
        $user = auth('api')->user();

        if (!$user || $addressBook->user_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden'
            ], 403);
        }

        // Kiểm tra xem có đơn hàng nào đang sử dụng địa chỉ này không
        if ($addressBook->orders()->whereIn('payment_status', ['pending', 'processing'])->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Không thể xóa địa chỉ đang được sử dụng trong đơn hàng chưa hoàn thành'
            ], 422);
        }

        DB::beginTransaction();

        try {
            // Nếu xóa địa chỉ mặc định, chọn địa chỉ khác làm mặc định
            if ($addressBook->is_default) {
                $nextDefault = AddressBook::where('user_id', $user->id)
                    ->where('id', '!=', $addressBook->id)
                    ->first();

                if ($nextDefault) {
                    $nextDefault->update(['is_default' => true]);
                }
            }

            $addressBook->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Địa chỉ đã được xóa thành công'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi xóa địa chỉ',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
