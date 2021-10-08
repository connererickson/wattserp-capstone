<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
        	'current_password' => 'required',
    		'password' => 'required|same:password',
    		'password_confirmation' => 'required|same:password',     
		];
	}
	public function messages()
	{
		return [
        	'current_password.required' => 'Please enter current password',
   	 		'password.required' => 'Please enter password',
		];
	}		
}