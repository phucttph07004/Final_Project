<?php

namespace App\Http\Requests\backend\level;

use App\Models\Level;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LevelRequestEdit extends FormRequest
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
        $level = Level::find((int) request()->segment(2));
        return [
            'level'=>'required|numeric|',
            'fee'=>'required|numeric',
            'description'=>'required|min:10'
        ];
    }
    public function messages()
    {
        return [
            'level.required'=>'Không được bỏ trống level',
            'level.numeric'=>'level phải là chữ số',
            'level.unique'=>'level đã tồn tại',

            'fee.required'=>'Không được bỏ trống học phí',
            'fee.numeric'=>'Học phí phải là số',
            
            'description.required'=> 'Không được để trống mô tả',
            'description.min' => 'Mô tả quá ngắn'
        ];
    }
}
