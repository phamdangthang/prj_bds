<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmTransactionRequest extends FormRequest
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
            'image' => 'required',
            'confirmation_date' => 'required',
        ];
    }

    public function messages() {
        return [
            'image.required' => 'Ảnh giao dịch không được để trống',
            'confirmation_date.required' => 'Thời gian giao dịch không được để trống',
        ];
    }
}
