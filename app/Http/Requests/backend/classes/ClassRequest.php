<?php

namespace App\Http\Requests\backend\classes;

use Illuminate\Foundation\Http\FormRequest;

class ClassRequest extends FormRequest
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
            'name' => 'required|unique:classes',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Không để trống tên lớp',
            'name.unique' => 'Lớp học này đã được tạo',
        ];
    }
}
