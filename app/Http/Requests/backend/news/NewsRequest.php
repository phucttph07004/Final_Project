<?php

namespace App\Http\Requests\backend\news;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|min:6',
            'content'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Không được bỏ trống tiêu đề',
            'title.min'=>'Tên tiêu đề không được dưới 6 ký tự',
            'content.required'=>'Không được bỏ trống nội dung',
            'content.min'=>'nội dung không được dưới 6 ký tự',
        ];
    }
}
