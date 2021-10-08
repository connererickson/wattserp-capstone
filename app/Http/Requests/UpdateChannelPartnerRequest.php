<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChannelPartnerRequest extends FormRequest
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
            'cp_company_name'=>'required',
            'cp_main_phone'=>'required',
            'cp_mailing_address'=>'required',
            'cp_mailing_city'=>'required',
            'cp_mailing_state'=>'required',
            'cp_mailing_zip'=>'required|numeric|min:5',
            'cp_website'=>'required|numeric|digits:10',
            'cp_taxid'=>'required|email',
            'start_date'=>'required|date_format:m/d/Y|before:tomorrow',
        ];
    }
	public function messages()
    {
    	return [
	    	'cp_company_name.required' => 'Please Enter First Name.',
	    	'cp_main_phone.required' => 'Please Enter Last Name.',
	    	'cp_mailing_address.required' => 'Please Enter Address.',
            'cp_mailing_city.required' => 'Please Enter City.',
            'cp_mailing_state.required' => 'Please Enter State',
            'cp_mailing_zip.required' => 'Please Enter Zip Code',
			'cp_website.required' => 'Enter 10 Digit Phone Number. Just Numbers.',
			'cp_taxid.required' => 'Please Enter A Valid Email Address.',
			'start_date.required' => 'Please Enter A Valid Date.',
		];
	}
}
