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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'name.required' => "Tên không được để trống",
            'password.required' => 'Mật khẩu mới không được để trống',
            'password.confirmed' => 'Mật khẩu nhập lại chưa chính xác',
            'password.min' => 'Mật khẩu mới tối thiểu 6 ký tự',
        ];
    }
}
