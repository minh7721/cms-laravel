<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'tag_id' => 'required',
            'category_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được để trống',
            'description.required' => 'Mô tả ngắn không được để trống',
            'tag_id.required' => 'Tag không được để trống',
            'category_id.required' => 'Category không được để trống',
        ];
    }
}
