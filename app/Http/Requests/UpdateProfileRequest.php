<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'confirm_password' => 'same:password',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Trường này không được để trống',
            'email.required' => 'Trường này không được để trống',
            'phone.required' => 'Trường này không được để trống',
            'address.required' => 'Trường này không được để trống',
            'confirm_password.same' => 'Mật khẩu bạn vừa nhập không trùng nhau',
        ];
    }
}
