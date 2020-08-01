<?php

namespace App\Http\Requests\backend\level;

use Illuminate\Foundation\Http\FormRequest;

class LevelRequest extends FormRequest
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
            'level'=>'required|numeric|unique:levels',
        ];
    }
    public function messages()
    {
        return [
            'level.required'=>'Không được bỏ trống level',
            'level.numeric'=>'level phải là chữ số',
            'level.unique'=>'level đã tồn tại',
        ];
    }
}


