<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'project_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'price' => 'required',
            'usage_status' => 'required',
            'acreage',
            'number_of_bedrooms' => 'required',
            'number_of_toilets' => 'required',
            'name' => 'required',
            'description' => 'required',
            'door_direction' => 'required',
            'balcony_direction' => 'required',
            'floor' => 'required',
            'apartment_number' => 'required',
        ];
    }
}
