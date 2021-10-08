<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
        	'unassigned_users'=>'required|not_in:select',
            'first_name'=>'required',
            'middle_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'zip'=>'required|numeric|min:5',
            'phone'=>'required|numeric|digits:10',
            'ssn'=>'required|numeric|digits:9',
            'hire_date'=>'required|date_format:m/d/Y|before:tomorrow',
            'dob'=>'required|date_format:m/d/Y|before:yesterday'
        ];
    }
	public function messages()
    {
    	return [
    		'unassigned_users.not_in:select'=>'Please Select the Employee to Create',
	    	'first_name.required' => 'Please Enter First Name.',
	    	'middle_name.required' => 'Please Enter Middle Name.',
	    	'last_name.required' => 'Please Enter Last Name.',
	    	'address.required' => 'Please Enter Address.',
            'city.required' => 'Please Enter City.',
            'state.required' => 'Please Enter State',
            'zip.required' => 'Please Enter Zip Code',
			'phone.required' => 'Enter 10 Digit Phone Number. Just Numbers.',
			'ssn.required' => 'Please Enter 9 Digits Of SSN. Just Numbers.',
			'hire_date.required' => 'Please Enter A Valid Date.',
			'dob.required' => 'Please Enter A Valid Past Date.'
		];
	}
}
