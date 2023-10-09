<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => 'required',
            'email' => 'required|email',
            'password' => [
                'required',
                'min:8',
                'max:255',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
                'confirmed'
            ],
            'password_confirmation' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'fullname' => 'Tên là bắt buộc',
            'email.required' => 'Email là bắt buộc',
            'email.email' => 'Vui lòng nhập một địa chỉ email hợp lệ',
            'password.required' => 'Mật khẩu là bắt buộc',
            'password.min' => 'Mật khẩu phải lớn hơn 8 ký tự',
            'password.regex' => 'Mật khẩu phải chứa chữ hoa, chữ thường, ký tự đặc biệt và số',
            'password.confirmed' => 'Mất khẩu xác nhận không hợp lệ',
            'password_confirmation.required' => 'Vui lòng xác nhận mật khẩu của bạn',
            'password_confirmation.min' => 'Mật khẩu phải lớn hơn 8 ký tự',

        ];
    }
}
