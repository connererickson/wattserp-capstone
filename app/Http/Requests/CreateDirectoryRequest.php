<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDirectoryRequest extends FormRequest
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
            'company_name'=>'required',
            'internal_nickname'=>'required'
        ];
    }
	public function messages()
    {
    	return [
	    	'company_name.required' => 'Please Enter Company Name.',
	    	'internal_nickname.required' => 'Please Enter An Internal Nickname.'
		];
	}
}
