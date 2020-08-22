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
            'start_date' =>'required|after:yesterday',
            'finish_date' =>'required|after:start_date',
            'number_of_sessions' => 'required|numeric|min:15',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Không để trống tên lớp',
            'name.unique' => 'Lớp học này đã được tạo',

            'start_date.required' => 'Không để trống ngày khai giảng',
            'start_date.after' => 'Không thể chọn ngày trong quá khứ',

            'finish_date.required' => 'Không để trống ngày kết thúc dự kiến',
            'finish_date.after' => 'Ngày kết thúc phải sau ngày khai giảng',

            'number_of_sessions.required' => 'Không để trống số buổi học',
            'number_of_sessions.numeric' => 'Số buổi học phải là số',
            'number_of_sessions.min' => 'Số buổi học phải trên 15 buổi',

            
        ];
    }
}
