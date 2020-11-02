<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUser extends FormRequest
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
            'name'       =>  'bail|required',
            'email'      =>  'bail|required|unique:admins',
            'password'   =>  'bail|required|min:6'
        ];
    }
    public function messages()
    {
        return [
            'name.required'        =>  'Không được để trống',
            'email.required'       => 'không được để trống',
            'email.unique'         => 'Email đã tồn tại',
            'password.required'    => 'Password không được để trống',
            'password.min'         => 'Password tối thiểu 6 kí tự'
        ];
    }
}
