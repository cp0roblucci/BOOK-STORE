<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password' => [
                'required',
                'min:8',
                'max:255',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
                'confirmed'
            ],
            'password_confirmation' => 'required|min:8',
            'token' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be greater than 8 characters.',
            'password.regex' => 'Password must contain uppercase, lowercase, special characters, and numbers.',
            'password.confirmed' => 'Passwords do not match.',
            'password_confirmation.required' => 'Please confirm your password.',
        ];
    }
}
