<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePartRequest extends FormRequest
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
            'part_no'=>'required',
            'sku'=>'required'
        ];
    }
	public function messages()
    {
    	return [
	    	'part_no.required' => 'Please Enter A Part Number.',
	    	'sku.required' => 'Please Generate A Sku For This Part.'
		];
	}
}
