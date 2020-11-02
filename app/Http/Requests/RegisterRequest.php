<?php

namespace App\Http\Requests;

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
            'name'              => 'required',
            'email'             => 'required|email|unique:admins',
            'password'          => 'required|min:8',
            'confirm_password'  => 'required|same:password'
        ];
    }
    public function messages()
    {
        return [
            'name.required'              => 'không được để trống',
            'email.required'             => 'không được để trống',
            'email.unique'               => 'Tài khoản này đã tồn tại',
            'email.email'                => 'Định dạng Gmail không đúng',
            'password.required'          => 'Không được để trống',
            'password.min'               => 'Mật khẩu tối thiểu 8 kí tự',
            'confirm_password.required'  => 'Không được để trống',
            'confirm_password.same'      => 'Không trùng mật khẩu',
        ];
    }
}
