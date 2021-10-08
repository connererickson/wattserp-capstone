<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email',
            'username'=>'required',
            'role'=>'required'
        ];
	}
	public function messages()
	{
    	return [
	    	'name.required' => 'Please Enter Your Name',
			'email.required' => 'Please Enter Your E-mail',
			'username.required' => 'Please Enter A Unique Username',
			'role.required' => 'You Must Select At Least One Role'
		];
	}
}
