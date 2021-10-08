<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRateRequest extends FormRequest
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
            'rate_name'=>'required',
            'rate_description' => 'required',
            'service_charge_type' => 'notIn:select',
            'rate_type' => 'notIn:select',
            'daily_charge' => 'required_without:fixed_charge',
            'fixed_charge' => 'required_without:daily_charge'
        ];
    }
    public function messages()
    {
        return [
            'rate_name.required' => 'Please Enter A Name for the Rate.',
            'rate_description.required' => "Please Enter a Description for the Rate.",
            'service_charge_type' => "Please select a service charge type.",
            'rate_type' => "Please select a rate type.",
            'daily_charge' => "Please enter the daily charge.",
            'fixed_charge' => "Please enter the fixed charge."
        ];
    }
}
