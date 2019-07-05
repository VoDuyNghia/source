<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ContactRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'username'              => 'required|min:5|max:50 |',
            'email'                 => 'required|min:5|max:50 |',
            'phone'                 => 'required|numeric',
            'message'               => 'required|min:100',
        ];
    }
    public function messages() {
        return [
            'email.required'        => 'Vui lòng nhập email',
            'email.min'             => 'Email trong khoản 5 - 50 ký tự',
            'email.max'             => 'Email trong khoản 5 - 50 ký tự',
            'username.required'     => 'Vui lòng nhập họ và tên',
            'username.min'          => 'Họ và tên trong khoản 5 - 50 ký tự',
            'username.max'          => 'Họ và tên trong khoản 5 - 50 ký tự',
            'phone.required'        => 'Vui lòng nhập số điện thoại',
            'phone.required'        => 'Định dạng số điện thoại là số',
            'message.required'      => 'Vui lòng nhập nội dung',
            'message.min'           => 'Nội dung tối thiểu 100 ký tự',
        ];
    }
}
