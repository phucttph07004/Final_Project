<?php

namespace App\Http\Requests\backend\branch;
use App\Models\{User,Branch};
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class BranchRequestEdit extends FormRequest
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
        $Branch = Branch::find((int) request()->segment(2));
        return [
            'director_id'=>'required|numeric',
            'branch_name'=>'required|min:10|unique:Branchs,branch_name,'.$Branch->id.',id',
            'address'=>'required|min:10',
            'avatar'=>'required|mimes:jpeg,jpg,png',

        ];
    }
    public function messages()
    {
        return [
            'director_id.required'=>'Không được bỏ trống họ tên',
            'director_id.numeric'=>'họ tên không được dưới 6 ký tự',
            'address.required'=>'Không được bỏ trống địa chỉ',
            'address.min'=>'địa chỉ không được dưới 10 ký tự',
            'branch_name.required'=>'Không được bỏ trống tên chi nhánh',
            'branch_name.min'=>'tên chi nhánh phải it nhất 10 chữ số',
            'branch_name.unique'=>'tên chi nhánh đã tồn tại',
            'avatar.required'=>'ảnh không được bỏ trống',
            'avatar.mimes'=>'Ảnh phải đúng định dạng jpg , png ,jpeg',
        ];
    }
}

