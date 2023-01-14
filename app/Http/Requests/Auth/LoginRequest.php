<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|alpha|',
        ];
    }
    public function messages()
    {
        return [
            'email.required' =>'Email không được để trống',
            'email.email' => 'Email phải hợp lệ',
            'password.required' => 'Mật khẩu không được để trống',
            'password.confirmed' => 'Mật khẩu không chính xác',
        ];
    }
}
