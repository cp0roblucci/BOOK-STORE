<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportwarehouseRequest extends FormRequest
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
            'HDN_NgayNhap' => 'required|date',
            'S_Ten.*' => 'required',
            'S_GiaBan.*' => 'required|numeric',
            'S_SoLuong.*' => 'required|integer|min:1',
            'S_NamXuatBan.*' => 'required',
            'S_DichGia.*' => 'required',
            'S_SoTrang.*' => 'required',
            'S_TrongLuong.*' => 'required',
            
        ];
    }
    public function messages()
    {
        return [
            'HDN_NgayNhap.required' => 'Ngày nhập không được để trống.',
            'HDN_NgayNhap.date' => 'Ngày nhập phải là một ngày hợp lệ.',
            'S_Ten.*.required' =>'Vui lòng nhập tên sản phẩm',
            'S_GiaBan.*.required' =>'Vui lòng nhập giá sản phẩm',
            'S_GiaBan.*.numeric' => 'Giá sản phẩm phải là một số',
            'S_SoLuong.*.required' =>'Vui lòng nhập số lượng',
            'S_SoLuong.*.integer' =>'Số lượng phải là một số',
            'S_NamXuatBan.*.required' => 'Vui lòng nhập năm xuất bản',
            'S_DichGia.*.required' => 'Vui lòng nhập dịch giả',
            'S_SoTrang.*.required' => 'Vui lòng nhập số trang',
            'S_TrongLuong.*.required' => 'Vui lòng nhập trọng lượng sản phẩm',
        ];
    }
}
