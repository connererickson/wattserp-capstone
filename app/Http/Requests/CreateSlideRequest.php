<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSlideRequest extends FormRequest
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
            'image'=>'required|image|max:1000',
            'audio'=>'max:500|mimes:mpga,wav',
            'seconds'=>'required'
        ];
    }
	public function messages()
    {
    	return [
	    	'name.required' => 'Please Enter Slide Name.',
	    	'image.required' => 'Slide Requires An Image',
	    	'image.max' => 'The Slide Image Is Too Large. Must Be Under 1 MB.',
	    	'image.image' => 'The Slide File Must Be An Image File: JPG, JPEG, PNG, GIF, BMP',
	    	'audio.max' => 'The Audio File Is Too Large. Must Be Under 500 K',
	    	'audio.mimes' => 'The Audio File Must Be Type MP3 or WAV',
	    	'seconds.required' => 'Please Enter Slide Seconds.'
		];
	}
}
