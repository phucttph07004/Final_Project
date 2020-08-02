<?php

namespace App\Http\Requests\backend\setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'logo' => 'required|file',
            'slogan' =>'required|min:10',
            'email'=>'required|email',
            'phone' => 'required|min:10|max:10'
        ];
    }

    public function messages()
    {
        return [
            'logo.required' => 'Không được để trống logo',
            'logo.file'=>'Logo không đúng định dạng file',

            'slogan.required' => 'Không được để trống slogan',
            'slogan.min'=>'Slogan quá ngắn',

            'email.required'=>'Không được để trống email',
            'email.email'=>'Email không đúng',

            'phone.required' => 'Không được để trống phone',
            'phone.min'=>'Số điện thoại không đúng',
            'phone.max'=>'Số điện thoại không đúng',

        ];
    }
}