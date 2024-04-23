<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
    public function rules() : array
    {
        return [
            'DH_TenNguoiNhan' => 'required',
            'DH_SDTNhan' => 'required|string|min:10|max:10',
            'DH_DiaChiNhan' => 'required',
            'DH_GhiChu' => 'nullable', // Ghi chú có thể trống
        ];
    }

    public function messages()
    {
        return [
            'DH_TenNguoiNhan.required' => 'Vui lòng nhập Họ và tên người nhận.',
            'DH_SDTNhan.required' => 'Vui lòng nhập Số điện thoại.',
            'DH_SDTNhan.min' => 'Số điện thoại phải có độ dài 10 ký tự.',
            'DH_SDTNhan.max' => 'Số điện thoại phải có độ dài 10 ký tự.',
            'DH_DiaChiNhan.required' => 'Vui lòng nhập Địa chỉ nhận hàng.',
        ];
    }
}
