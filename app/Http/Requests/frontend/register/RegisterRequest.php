<?php

namespace App\Http\Requests\frontend\register;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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

        ];
    }
    public function messages()
    {
        return [
            'fullname.required'=>'Vui lòng nhập họ tên',
            'fullname.min'=>'Vui lòng nhập đúng họ tên',

            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email Không đúng định dạng!',
            'email.unique'=>'Email đã tồn tại!',

            'address.required'=>'Vui lòng nhập địa chỉ',
            'address.min'=>'Vui lòng nhập đúng địa chỉ',

            'phone.required'=>'Vui lòng nhập số điện thoại',
            'phone.numeric'=>'Số điện thoại phải là chữ số',
            'phone.min'=>'Số điện thoại không đúng',
            'phone.max'=>'Số điện thoại không đúng',

            'date_of_birth.required'=> 'Vui lòng chọn ngày sinh',
        ];
    }
}
