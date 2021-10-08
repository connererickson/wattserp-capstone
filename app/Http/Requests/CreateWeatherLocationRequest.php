<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWeatherLocationRequest extends FormRequest
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
            'city'=>'required',
            'state' => 'notIn:select',
            'latitude' => 'required',
            'longitude' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'city.required' => 'Please enter city name.',
            'state.not_in' => "Please select a state.",
            'latitude.required' => "Please enter latitude for the location.",
            'longitue' => "Please enter longitude for the location.",
        ];
    }
}
