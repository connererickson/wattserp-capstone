<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportPartsRequest extends FormRequest
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
            'list_file' => 'required|mimes:csv,txt',
        ];
    }
    public function messages()
    {
        return [
            'list_file.required' => 'Please select a file to import from.',
            'list_file.mimes' => 'Only CSV files are allowed.'
        ];
    }
}
