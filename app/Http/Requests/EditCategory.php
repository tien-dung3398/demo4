<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCategory extends FormRequest
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
            'name'   =>  'bail|required|min:3|unique:categories,name,'.$this->id ,
            'desc'   =>  'bail|required'
        ];
    }
    public function messages()
    {
        return [
             'name.required'   => 'Không được để trống',
             'name.min'        => 'Tối thiểu 3 kí tự',
             'name.unique'     => 'Tên danh mục đa tồn tại',
             'desc'            => 'Không được để trống'
        ];
    }
}
