<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
        $productId = $this->route('product') ? $this->route('product')->id : null;

        return [
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0|lt:price',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|string|max:255',
            'gallery' => 'nullable|array',
            'gallery.*' => 'string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('products', 'slug')->ignore($productId)
            ],
            'color' => 'nullable|string|max:100',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'category_id.required' => 'Danh mục là bắt buộc.',
            'category_id.exists' => 'Danh mục không tồn tại.',
            'brand_id.exists' => 'Thương hiệu không tồn tại.',
            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'price.numeric' => 'Giá phải là số.',
            'price.min' => 'Giá phải lớn hơn hoặc bằng 0.',
            'discount_price.numeric' => 'Giá khuyến mại phải là số.',
            'discount_price.min' => 'Giá khuyến mại phải lớn hơn hoặc bằng 0.',
            'discount_price.lt' => 'Giá khuyến mại phải nhỏ hơn giá gốc.',
            'stock.required' => 'Số lượng là bắt buộc.',
            'stock.integer' => 'Số lượng phải là số nguyên.',
            'stock.min' => 'Số lượng phải lớn hơn hoặc bằng 0.',
            'gallery.array' => 'Thư viện ảnh phải là một mảng.',
            'gallery.*.string' => 'Mỗi ảnh trong thư viện phải là chuỗi.',
            'slug.required' => 'Slug là bắt buộc.',
            'slug.unique' => 'Slug này đã được sử dụng.',
            'slug.regex' => 'Slug chỉ được chứa chữ cái thường, số và dấu gạch ngang.',
        ];
    }
}
