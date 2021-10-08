<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRateRequest extends FormRequest
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
            'rate_description' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'rate_name.required' => 'Please Enter A Name for the Rate.',
            'rate_description' => "Please Enter a Description for the Rate."
        ];
    }
}
