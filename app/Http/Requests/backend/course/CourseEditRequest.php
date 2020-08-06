<?php

namespace App\Http\Requests\backend\course;

use Illuminate\Foundation\Http\FormRequest;

class CourseEditRequest extends FormRequest
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
            'course_name'=>'required',
        ];
    }

    public function messages() 
    {
        return [
            'course_name.required' => 'Không để trống tên khoá học',
        ];
    }
}
