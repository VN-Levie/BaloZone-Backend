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
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'shipping_address_id' => 'required|exists:address_books,id',
            'payment_method' => 'required|in:cod,vnpay,momo',
            'voucher_code' => 'nullable|string|exists:vouchers,code',
            'note' => 'nullable|string|max:500',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'items.required' => 'Danh sách sản phẩm là bắt buộc.',
            'items.array' => 'Dữ liệu sản phẩm không hợp lệ.',
            'items.min' => 'Phải có ít nhất 1 sản phẩm.',
            'items.*.product_id.required' => 'ID sản phẩm là bắt buộc.',
            'items.*.product_id.exists' => 'Sản phẩm không tồn tại.',
            'items.*.quantity.required' => 'Số lượng sản phẩm là bắt buộc.',
            'items.*.quantity.integer' => 'Số lượng phải là số nguyên.',
            'items.*.quantity.min' => 'Số lượng phải lớn hơn 0.',
            'shipping_address_id.required' => 'Địa chỉ giao hàng là bắt buộc.',
            'shipping_address_id.exists' => 'Địa chỉ giao hàng không tồn tại.',
            'payment_method.required' => 'Phương thức thanh toán là bắt buộc.',
            'payment_method.in' => 'Phương thức thanh toán không hợp lệ.',
            'voucher_code.exists' => 'Mã voucher không hợp lệ.',
            'note.max' => 'Ghi chú không được vượt quá 500 ký tự.',
        ];
    }
}
