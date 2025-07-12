<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'product_id' => 'required|exists:products,id',
            'content' => 'required|string|min:10|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'product_id.required' => 'ID sản phẩm là bắt buộc.',
            'product_id.exists' => 'Sản phẩm không tồn tại.',
            'content.required' => 'Nội dung bình luận là bắt buộc.',
            'content.min' => 'Bình luận phải có ít nhất 10 ký tự.',
            'content.max' => 'Bình luận không được vượt quá 1000 ký tự.',
            'rating.required' => 'Đánh giá là bắt buộc.',
            'rating.integer' => 'Đánh giá phải là số nguyên.',
            'rating.min' => 'Đánh giá phải từ 1 đến 5 sao.',
            'rating.max' => 'Đánh giá phải từ 1 đến 5 sao.',
        ];
    }
}
