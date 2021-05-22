<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
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
            'category_id' => 'required',
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
            'building' => 'required',
            'floor' => 'required',
            'apartment_number' => 'required',
            'images' => 'required',
        ];
    }
    
    public function messages() {
        return [
            'category_id.required' => 'Trường này không được để trống',
            'city_id.required' => 'Trường này không được để trống',
            'address.required' => 'Trường này không được để trống',
            'price.required' => 'Trường này không được để trống',
            'usage_status.required' => 'Trường này không được để trống',
            'acreage.required' => 'Trường này không được để trống',
            'number_of_bedrooms.required' => 'Trường này không được để trống',
            'number_of_toilets.required' => 'Trường này không được để trống',
            'name.required' => 'Trường này không được để trống',
            'description.required' => 'Trường này không được để trống',
            'door_direction.required' => 'Trường này không được để trống',
            'balcony_direction.required' => 'Trường này không được để trống',
            'building.required' => 'Trường này không được để trống',
            'floor.required' => 'Trường này không được để trống',
            'apartment_number.required' => 'Trường này không được để trống',
            'images.required' => 'Trường này không được để trống',
        ];
    }
}
