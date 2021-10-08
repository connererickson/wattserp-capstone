<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserInformationRequest extends FormRequest
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
            'email'=>'required|email',
            'username'=>'required|min:5',
        ];
	}
	public function messages()
	{
    	return [
			'email.required' => 'Please Enter Your E-mail',
			'username.required' => 'Please Enter A Unique Username, At Least 5 Characters Long',
		];
	}
}
