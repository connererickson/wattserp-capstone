<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Factory as ValidationFactory;
use Validator;

class CreateContactRequest extends FormRequest
{
	public function __construct(ValidationFactory $validationFactory)
    {
    	$validationFactory->extend('at_least_one_phone', function ($attribute, $value, $parameters, $validator) {
	    	$flag = false;
			$data = $validator->getData();
	    	foreach($parameters as $parameter){
    			if (array_key_exists($parameter, $data)){
    				if($data[$parameter] != ''){
    					if (is_numeric($data[$parameter])){
    						$flag = true;
						}
					}
					else if ($value != ''){
						if (is_numeric($value)){
							$flag = true;
						}
					}
				}
	    	}
	    	return $flag;
		});
		$validationFactory->extend('at_least_one_email', function ($attribute, $value, $parameters, $validator) {
	    	$flag = false;
			$data = $validator->getData();
			if ($value != ''){
				if (filter_var($value, FILTER_VALIDATE_EMAIL)){
					$flag = true;
				}
			}
			else{
		    	foreach($parameters as $parameter){
					if (array_key_exists($parameter, $data)){
	    				if($data[$parameter] != ''){
	    					if (filter_var($data[$parameter], FILTER_VALIDATE_EMAIL)){
	    						$flag = true;
							}
						}
					}
		    	}
			}
	    	return $flag;
		});
		$validationFactory->extend('alpha_if', function ($attribute, $value, $parameters, $validator) {
	    	$flag = false;
			if ($value != ''){
				if (ctype_alpha($value)){
					$flag = true;
				}
			}
			else{
				$flag = true;
			}
	    	return $flag;
		});
	}
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
            'first_name' => 'required',
            'middle_name' => 'alpha_if',
            'last_name' => 'required',
            'title' => 'nullable',
            'cell_phone' => 'at_least_one_phone:home_phone,work_phone',
            'home_phone' => 'at_least_one_phone:cell_phone,work_phone',
            'work_phone' => 'at_least_one_phone:cell_phone,home_phone',
            'email1' => 'at_least_one_email:email2',
            'email2' => 'at_least_one_email:email1'
        ];
    }
	public function messages()
    {
    	return [
	    	'first_name.required' => 'Please Enter A First Name.',
	    	'first_name.alpha' => 'First Name must be letters only',
	    	'middle_name.alpha_if' => 'Middle Name must be letters only',
	    	'last_name.required' => 'Please Enter A Last Name.',
	    	'last_name.alpha' => 'Last Name must be letters only',
	    	'title.alpha' => 'Title must be letters only',
	    	'email1.email' => 'Please enter a valid email address',
	    	'email2.email' => 'Please enter a valid email address',
	    	'cell_phone.at_least_one_phone' => 'Please provide at least one phone number. Numbers Only.',
	    	'home_phone.at_least_one_phone' => 'Please provide at least one phone number. Numbers Only.',
	    	'work_phone.at_least_one_phone' => 'Please provide at least one phone number. Numbers Only.',
	    	'email1.at_least_one_email' => 'Please provide at least one email address. All addresses must be valid email.',
	    	'email2.at_least_one_email' => 'Please provide at least one email address. All addresses must be valid email.',
		];
	}
}
