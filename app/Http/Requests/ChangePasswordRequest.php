<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
          'old_password' => [
            'required'
          ],
          'new_password' => [
            'required',
            'min:8',
            'max:255',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
          ],
          'confirm_password' => 'required|min:8',
        ];
    }

  public function messages()
  {
    return [
      'old_password.required' => 'Password is required.',
      'new_password.required' => 'Password is required.',
      'new_password.min' => 'Password must be greater than 8 characters.',
      'new_password.regex' => 'Password must contain uppercase, lowercase, special characters, and numbers.',
      'confirm_password.required' => 'Please confirm your password.',
    ];
  }
}
