<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleNhapSV extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'masv' => ['required', 'regex:/^PS\d{5}/'],
            'hoten' => ['required', 'min:3', 'max:20'],
            'tuoi' => 'required|integer|min:16|max:100',
            'ngaysinh' => ['required', 'regex:/^\d{1,2}\/\d{1,2}\/\d{4}$/'],
            'cmnd' => 'digits_between:9,10',
            'email' => 'email|ends_with:fpt.edu.vn'
        ];
    }

    public function messages()
    {
        return [
            'masv.required' => 'Mã SV chưa nhập',
            'masv.regex' => 'Mã SV không đúng định dạng',
            'hoten.required' => 'Họ tên sao không nhập ta',
            'hoten.min' => 'Họ tên sao ngắn quá vậy',
            'hoten.max' => 'Họ tên quá dài bố ơi',
            'tuoi.required' => 'Tuổi chưa nhập',
            'tuoi.integer' => 'Tuổi phải là số nguyên',
            'tuoi.min' => 'Tuổi phải từ 16 trở lên',
            'tuoi.max' => 'Tuổi không được quá 100',
            'ngaysinh.required' => 'Ngày sinh chưa nhập',
            'ngaysinh.regex' => 'Ngày sinh phải có định dạng dd/mm/yyyy',
            'cmnd.digits_between' => 'CMND phải từ 9 đến 10 số',
            'email.email' => 'Email không đúng định dạng',
            'email.ends_with' => 'Email phải kết thúc bằng fpt.edu.vn'
        ];
    }

    public function attributes()
    {
        return [
            'masv' => 'Mã sinh viên',
            'hoten' => 'Họ tên',
            'tuoi' => 'Tuổi',
            'ngaysinh' => 'Ngày sinh',
            'cmnd' => 'CMND',
            'email' => 'Email'
        ];
    }
}