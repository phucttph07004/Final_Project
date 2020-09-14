<?php

namespace App\Http\Requests\backend\classes;

use Illuminate\Foundation\Http\FormRequest;

class ClassEditRequest extends FormRequest
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
            'name' => 'required',
            'number_of_sessions' => 'required|numeric'
        ];
    }

    public function message(){
        return [
            'name.required' => 'Không được bỏ trống tên lớp',

            'number_of_sessions.required' => 'Không được bỏ trống số buổi học',
            'number_of_sessions.numeric' => 'Số buổi học phải là số',


        ];
    }
}
