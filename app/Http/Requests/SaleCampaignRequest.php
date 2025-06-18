<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleCampaignRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $campaignId = $this->route('sale_campaign')?->id;

        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:sale_campaigns,slug,' . $campaignId,
            'description' => 'nullable|string|max:1000',
            'banner_image' => 'nullable|string|max:255',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:draft,active,expired,cancelled',
            'is_featured' => 'boolean',
            'priority' => 'integer|min:0|max:100',
            'metadata' => 'nullable|array',
            'metadata.color' => 'nullable|string|max:7', // Hex color
            'metadata.tags' => 'nullable|array',
            'metadata.tags.*' => 'string|max:50',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Tên chiến dịch sale là bắt buộc.',
            'slug.required' => 'Slug là bắt buộc.',
            'slug.unique' => 'Slug này đã được sử dụng.',
            'start_date.required' => 'Ngày bắt đầu là bắt buộc.',
            'start_date.after_or_equal' => 'Ngày bắt đầu phải từ hôm nay trở đi.',
            'end_date.required' => 'Ngày kết thúc là bắt buộc.',
            'end_date.after' => 'Ngày kết thúc phải sau ngày bắt đầu.',
            'status.in' => 'Trạng thái không hợp lệ.',
            'priority.min' => 'Độ ưu tiên tối thiểu là 0.',
            'priority.max' => 'Độ ưu tiên tối đa là 100.',
        ];
    }
}
