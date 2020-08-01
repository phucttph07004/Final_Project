<?php

namespace App\Http\Requests\backend\branch;
use App\Models\{User,Branch};
use Illuminate\Foundation\Http\FormRequest;
class BranchRequest extends FormRequest
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
            'director_id'=>'required|numeric',
            'branch_name'=>'required|min:10|unique:Branchs',
            'address'=>'required|min:10',
            'avatar'=>'required|mimes:jpeg,jpg,png',
        ];
    }
    public function messages()
    {
        return [
            'director_id.required'=>'Không được bỏ trống giám đốc',
            'director_id.numeric'=>'Không Được Thay Đổi Dữ Liệu',
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
