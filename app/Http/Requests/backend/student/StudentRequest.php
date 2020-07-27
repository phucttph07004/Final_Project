<?php

namespace App\Http\Requests\backend\student;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'fullname'=>'required|min:6',
            'email'=>'required|email|unique:students',
            'address'=>'required|min:10',
            'phone'=>'required|min:10|max:10',
            'class_id'=>'required',
            'date_of_birth'=>'required|date',
            'avatar'=>'required',

        ];
    }
    public function messages()
    {
        return [
            'fullname.required'=>'Không được bỏ trống họ tên',
            'fullname.min'=>'họ tên không được dưới 6 ký tự',
            'email.required'=>'Không được bỏ trống email',
            'email.email'=>'Email Không đúng định dạng!',
            'email.unique'=>'Email đã tồn tại!',
            'address.required'=>'Không được bỏ trống địa chỉ',
            'address.min'=>'địa chỉ không được dưới 10 ký tự',

            'phone.required'=>'Không được bỏ trống số điện thoại',
            'phone.numeric'=>'số điện thoại phải là chữ số',
            'phone.min'=>'số điện thoại phải 10 chữ số',
            'phone.max'=>'số điện thoại phải 10 chữ số',


            'class_id.required'=>'Không được bỏ trống lớp học',
            'date_of_birth.required'=>'Không được bỏ trống ngày sinh',
            'date_of_birth.date'=>'phải đúng định dạng ngày tháng',
            'avatar.required'=>'ảnh không được bỏ trống',
        ];
    }
}
