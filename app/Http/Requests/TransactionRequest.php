<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'description' => 'required',
            'percent' => 'required',
            'duration' => 'required',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Tên giao dịch không được để trống',
            'description.required' => 'Nội dung không được để trống',
            'percent.required' => 'Phần trăm không được để trống',
            'duration.required' => 'Thời hạn không được để trống',
        ];
    }
}
