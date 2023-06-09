<?php

namespace App\Http\Requests\Post;

use App\Enums\PostStatusEnum;
use App\Enums\PublishStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'post_category_id' => 'required',
            'title' => [
                'required',
                'max:255',
            ],
            'description' => [
                'nullable',
            ],
            'image' => [
                'image',
                'max:2035',
                'mimes:png,jpg,svg,gif',
            ],
            'link' => [
                'nullable',
            ],
            'status' => [
                // 'required',
                'nullable',
                Rule::in(PublishStatusEnum::status),
            ],
            'post_status' => [
                // 'required',
                'nullable',
                Rule::in(PostStatusEnum::post_status),
            ],

        ];
    }
}
