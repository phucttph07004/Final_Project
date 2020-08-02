<?php

namespace App\Http\Requests\backend\register;

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
            'note'=>'required|',
          

        ];
    }
    public function messages()
    {
        return [
            'note.required'=>'Không để trống ghi chú',
        ];
    }
}
