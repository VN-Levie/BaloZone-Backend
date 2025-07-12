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
            'message' => 'Lấy danh sách địa chỉ thành công'
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
                'success' => false,
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
                'recipient_name' => $request->recipient_name,
                'recipient_phone' => $request->recipient_phone,
                'address' => $request->address,
                'province' => $request->province,
                'district' => $request->district,
                'ward' => $request->ward,
                'postal_code' => $request->postal_code,
                'is_default' => $request->is_default ?? false,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Thêm địa chỉ thành công',
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
    public function show($id): JsonResponse
    {
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $addressBook = AddressBook::where('id', $id)
            ->where('user_id', $user->id)
            ->first();

        if (!$addressBook) {
            return response()->json([
                'success' => false,
                'message' => 'Địa chỉ không tồn tại'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $addressBook,
            'message' => 'Lấy chi tiết địa chỉ thành công'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressBookRequest $request, $id): JsonResponse
    {
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $addressBook = AddressBook::where('id', $id)
            ->where('user_id', $user->id)
            ->first();

        if (!$addressBook) {
            return response()->json([
                'success' => false,
                'message' => 'Địa chỉ không tồn tại'
            ], 404);
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
                'recipient_name' => $request->recipient_name,
                'recipient_phone' => $request->recipient_phone,
                'address' => $request->address,
                'province' => $request->province,
                'district' => $request->district,
                'ward' => $request->ward,
                'postal_code' => $request->postal_code,
                'is_default' => $request->is_default ?? $addressBook->is_default,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật địa chỉ thành công',
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
    public function destroy($id): JsonResponse
    {
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $addressBook = AddressBook::where('id', $id)
            ->where('user_id', $user->id)
            ->first();

        if (!$addressBook) {
            return response()->json([
                'success' => false,
                'message' => 'Địa chỉ không tồn tại'
            ], 404);
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
                'message' => 'Xóa địa chỉ thành công'
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

    /**
     * Set the specified address as default.
     */
    public function setDefault($id): JsonResponse
    {
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $addressBook = AddressBook::where('id', $id)
            ->where('user_id', $user->id)
            ->first();

        if (!$addressBook) {
            return response()->json([
                'success' => false,
                'message' => 'Địa chỉ không tồn tại'
            ], 404);
        }

        DB::beginTransaction();

        try {
            // Bỏ mặc định của tất cả địa chỉ khác
            AddressBook::where('user_id', $user->id)
                ->update(['is_default' => false]);

            // Đặt địa chỉ này làm mặc định
            $addressBook->update(['is_default' => true]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Đặt địa chỉ mặc định thành công'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi đặt địa chỉ mặc định',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
