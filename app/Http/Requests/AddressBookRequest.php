<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth('api')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'postal_code' => 'required|string|max:10|regex:/^[0-9]{5,10}$/',
            'address' => 'required|string|max:500|min:10',
            'receiver_name' => 'nullable|string|max:100',
            'receiver_phone' => 'nullable|string|max:15|regex:/^[0-9+\-\s()]+$/',
            'is_default' => 'sometimes|boolean',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'postal_code.required' => 'Mã bưu điện không được để trống',
            'postal_code.regex' => 'Mã bưu điện phải là số từ 5-10 ký tự',
            'address.required' => 'Địa chỉ không được để trống',
            'address.min' => 'Địa chỉ phải có ít nhất 10 ký tự',
            'address.max' => 'Địa chỉ không được vượt quá 500 ký tự',
            'receiver_name.max' => 'Tên người nhận không được vượt quá 100 ký tự',
            'receiver_phone.regex' => 'Số điện thoại người nhận không đúng định dạng',
            'receiver_phone.max' => 'Số điện thoại không được vượt quá 15 ký tự',
            'is_default.boolean' => 'Trường mặc định phải là true hoặc false',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'postal_code' => 'mã bưu điện',
            'address' => 'địa chỉ',
            'receiver_name' => 'tên người nhận',
            'receiver_phone' => 'số điện thoại người nhận',
            'is_default' => 'địa chỉ mặc định',
        ];
    }
}
