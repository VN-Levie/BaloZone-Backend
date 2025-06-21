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
            'name' => 'required|string|max:100|min:2',
            'phone' => 'required|string|max:10|min:10|regex:/^[0-9+\-\s()]+$/',
            'address' => 'required|string|max:500|min:10',
            'province' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'ward' => 'required|string|max:100',
            'is_default' => 'sometimes|boolean',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Họ và tên không được để trống',
            'name.min' => 'Họ và tên phải có ít nhất 2 ký tự',
            'name.max' => 'Họ và tên không được vượt quá 100 ký tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.regex' => 'Số điện thoại không đúng định dạng',
            'phone.max' => 'Số điện thoại không được vượt quá 10 ký tự',
            'phone.min' => 'Số điện thoại phải có ít nhất 10 ký tự',
            'address.required' => 'Địa chỉ không được để trống',
            'address.min' => 'Địa chỉ phải có ít nhất 10 ký tự',
            'address.max' => 'Địa chỉ không được vượt quá 500 ký tự',
            'province.required' => 'Tỉnh/Thành phố không được để trống',
            'province.max' => 'Tỉnh/Thành phố không được vượt quá 100 ký tự',
            'district.required' => 'Quận/Huyện không được để trống',
            'district.max' => 'Quận/Huyện không được vượt quá 100 ký tự',
            'ward.required' => 'Phường/Xã không được để trống',
            'ward.max' => 'Phường/Xã không được vượt quá 100 ký tự',
            'is_default.boolean' => 'Trường mặc định phải là true hoặc false',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'name' => 'họ và tên',
            'phone' => 'số điện thoại',
            'address' => 'địa chỉ',
            'province' => 'tỉnh/thành phố',
            'district' => 'quận/huyện',
            'ward' => 'phường/xã',
            'is_default' => 'địa chỉ mặc định',
        ];
    }
}
