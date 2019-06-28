<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UsersRequest extends FormRequest
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
            'email'                 => 'required|min:5|max:50 |unique:users,email,'.$request->id.',id',
            'password'              => 'regex:"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$"'
        ];
    }
    public function messages() {
        return [
            'email.required'        => 'Vui lòng nhập email',
            'email.min'             => 'Email trong khoản 5 - 50 ký tự',
            'email.max'             => 'Email trong khoản 5 - 50 ký tự',
            'email.unique'          => 'Email đã tồn tại',
            'username.required'     => 'Vui lòng nhập họ và tên',
            'username.min'          => 'Họ và tên trong khoản 5 - 50 ký tự',
            'username.max'          => 'Họ và tên trong khoản 5 - 50 ký tự',
            'password.required'     => 'Vui lòng nhập mật khẩu',
            'password.regex'        => 'Mật khẩu ít nhất 6 ký tự và có 1 chữ cái viết hoa và viết thường',


        ];
    }
}
