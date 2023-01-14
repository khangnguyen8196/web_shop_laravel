<?php

namespace App\Http\Requests\Auth;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Tên người dùng không được bỏ trống',
            'name.unique'=>'Tên người dùng đã tồn tại',
            'email.required'=>'Email không được bỏ trống',
            'email.email'=>'Trường này phải là Email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Mật khẩu không được bỏ trống',
            'password.min'=>'Mật khẩu không được nhỏ hơn 8 ký tự'
        ];
    }
}
