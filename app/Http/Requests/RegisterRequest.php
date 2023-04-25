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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => [
                'required',
                'min:8',
                'max:255',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
                'confirmed'
            ],
            'password_confirmation' => 'required|min:8',
            'condition_register' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'firstname' => 'Tên là bắt buộc',
            'lastname' => 'Họ là bắt buộc',
            'email.required' => 'Email là bắt buộc',
            'email.email' => 'Vui lòng nhập một địa chỉ email hợp lệ',
            'password.required' => 'Mật khẩu là bắt buộc',
            'password.min' => 'Mật khẩu phải lớn hơn 8 ký tự',
            'password.regex' => 'Mật khẩu phải chứa chữ hoa, chữ thường, ký tự đặc biệt và số',
            'password.confirmed' => 'Mất khẩu không hợp lệ',
            'password_confirmation.required' => 'Vui lòng xác nhận mật khẩu của bạn',
            'condition_register.required' => 'Để tiếp tục, vui lòng đồng ý với các điều khoản và điều kiện của chúng tôi',
            'password_confirmation.min' => 'Mật khẩu phải lớn hơn 8 ký tự',

        ];
    }
}
