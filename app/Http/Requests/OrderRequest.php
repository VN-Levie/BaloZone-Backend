<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'address_id' => 'required|exists:address_books,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'voucher_id' => 'nullable|exists:vouchers,id',
            'comment' => 'nullable|string|max:500',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'address_id.required' => 'Địa chỉ giao hàng là bắt buộc.',
            'address_id.exists' => 'Địa chỉ giao hàng không tồn tại.',
            'payment_method_id.required' => 'Phương thức thanh toán là bắt buộc.',
            'payment_method_id.exists' => 'Phương thức thanh toán không tồn tại.',
            'voucher_id.exists' => 'Voucher không tồn tại.',
            'items.required' => 'Giỏ hàng không được trống.',
            'items.array' => 'Dữ liệu giỏ hàng không hợp lệ.',
            'items.min' => 'Giỏ hàng phải có ít nhất 1 sản phẩm.',
            'items.*.product_id.required' => 'ID sản phẩm là bắt buộc.',
            'items.*.product_id.exists' => 'Sản phẩm không tồn tại.',
            'items.*.quantity.required' => 'Số lượng sản phẩm là bắt buộc.',
            'items.*.quantity.integer' => 'Số lượng phải là số nguyên.',
            'items.*.quantity.min' => 'Số lượng phải lớn hơn 0.',
        ];
    }
}
