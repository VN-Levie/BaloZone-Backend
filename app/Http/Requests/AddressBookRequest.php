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
            'recipient_name' => 'required|string|max:100|min:2',
            'recipient_phone' => 'required|string|max:15|min:10|regex:/^[0-9+\-\s()]+$/',
            'address' => 'required|string|max:500|min:10',
            'province' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'ward' => 'required|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'is_default' => 'sometimes|boolean',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'recipient_name.required' => 'Tên người nhận là bắt buộc',
            'recipient_name.min' => 'Tên người nhận phải có ít nhất 2 ký tự',
            'recipient_name.max' => 'Tên người nhận không được vượt quá 100 ký tự',
            'recipient_phone.required' => 'Số điện thoại người nhận là bắt buộc',
            'recipient_phone.regex' => 'Số điện thoại không đúng định dạng',
            'recipient_phone.max' => 'Số điện thoại không được vượt quá 15 ký tự',
            'recipient_phone.min' => 'Số điện thoại phải có ít nhất 10 ký tự',
            'address.required' => 'Địa chỉ là bắt buộc',
            'address.min' => 'Địa chỉ phải có ít nhất 10 ký tự',
            'address.max' => 'Địa chỉ không được vượt quá 500 ký tự',
            'province.required' => 'Tỉnh/Thành phố là bắt buộc',
            'province.max' => 'Tỉnh/Thành phố không được vượt quá 100 ký tự',
            'district.required' => 'Quận/Huyện là bắt buộc',
            'district.max' => 'Quận/Huyện không được vượt quá 100 ký tự',
            'ward.required' => 'Phường/Xã là bắt buộc',
            'ward.max' => 'Phường/Xã không được vượt quá 100 ký tự',
            'postal_code.max' => 'Mã bưu điện không được vượt quá 20 ký tự',
            'is_default.boolean' => 'Trường mặc định phải là true hoặc false',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'recipient_name' => 'tên người nhận',
            'recipient_phone' => 'số điện thoại người nhận',
            'address' => 'địa chỉ',
            'province' => 'tỉnh/thành phố',
            'district' => 'quận/huyện',
            'ward' => 'phường/xã',
            'postal_code' => 'mã bưu điện',
            'is_default' => 'địa chỉ mặc định',
        ];
    }
}
