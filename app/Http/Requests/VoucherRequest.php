<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VoucherRequest extends FormRequest
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
        $voucherId = $this->route('voucher') ? $this->route('voucher')->id : null;

        return [
            'code' => [
                'required',
                'string',
                'max:20',
                'regex:/^[A-Z0-9]+$/',
                Rule::unique('vouchers', 'code')->ignore($voucherId)
            ],
            'price' => 'required|numeric|min:1000',
            'end_at' => 'required|date|after:now',
            'quantity' => 'required|integer|min:1',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'code.required' => 'Mã voucher là bắt buộc.',
            'code.unique' => 'Mã voucher này đã tồn tại.',
            'code.regex' => 'Mã voucher chỉ được chứa chữ cái in hoa và số.',
            'price.required' => 'Giá trị giảm giá là bắt buộc.',
            'price.numeric' => 'Giá trị giảm giá phải là số.',
            'price.min' => 'Giá trị giảm giá tối thiểu là 1,000 VND.',
            'end_at.required' => 'Ngày hết hạn là bắt buộc.',
            'end_at.date' => 'Ngày hết hạn không hợp lệ.',
            'end_at.after' => 'Ngày hết hạn phải sau thời điểm hiện tại.',
            'quantity.required' => 'Số lượng là bắt buộc.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
            'quantity.min' => 'Số lượng tối thiểu là 1.',
        ];
    }
}
