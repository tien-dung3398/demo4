<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProduct extends FormRequest
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
        $rules = [
            'name'       => 'bail|required|min:3|unique:products',
            'quantity'   => 'bail|required|integer',
            'price'      => 'bail|required|integer',
            'desc'       => 'bail|required',
            'brand'      => 'bail|required',
            'category'   => 'bail|required',
        ];
    
        return $rules;
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
            'img.required'       => 'Không được để trống',
            'img.image'          => 'Định dạng chưa đúng',
            'desc.required'      => 'Không được để trống',
            'brand.required'     => 'Không được để trống',
            'category.required'  => 'Không được để trống',
        ];
    }
}
