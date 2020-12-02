<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminstratorRequest extends FormRequest
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
            'username' => 'required|email',
            'password' => 'required'
        ];
    }

    public function messages() {
        return [
            'username.required' => 'vui lòng nhập email đăng nhập',
            'password.required' => 'vui lòng nhập mật khẩu'
        ];
    }
}