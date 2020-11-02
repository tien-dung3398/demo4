<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProduct extends FormRequest
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
            'name'       => 'required|min:3|unique:products,name,'.$this->id,
            'quantity'   => 'required|integer',
            'price'      => 'required|integer',
            'desc'       => 'required',
            'brand'      => 'required',
            'category'   => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'      => 'Không được để trống',
            'name.min'           => 'Tối thiểu 3 kí tự',
            'name.unique'        => 'Tên sản phẩm đã tồn tại',
            'quantity.required'  => 'Không được để trống',
            'quantity.integer'   => 'Định dạng chưa đúng',
            'price.required'     => 'Không được để trống',
            'price.integer'      => 'Định dạng chưa đúng',
            'desc.required'      => 'Không được để trống',
            'brand.required'     => 'Không được để trống',
            'category.required'  => 'Không được để trống',
        ];
    }
}
