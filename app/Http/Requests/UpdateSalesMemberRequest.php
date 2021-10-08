<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSalesMemberRequest extends FormRequest
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
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'zip'=>'required|numeric|min:5',
            'phone'=>'required|numeric|digits:10',
            'alt_email'=>'required|email',
            'start_date'=>'required|date_format:m/d/Y|before:tomorrow',
        ];
    }
	public function messages()
    {
    	return [
	    	'first_name.required' => 'Please Enter First Name.',
	    	'last_name.required' => 'Please Enter Last Name.',
	    	'address.required' => 'Please Enter Address.',
            'city.required' => 'Please Enter City.',
            'state.required' => 'Please Enter State',
            'zip.required' => 'Please Enter Zip Code',
			'phone.required' => 'Enter 10 Digit Phone Number. Just Numbers.',
			'alt_email.required' => 'Please Enter A Valid Email Address.',
			'start_date.required' => 'Please Enter A Valid Date.',
		];
	}
}
