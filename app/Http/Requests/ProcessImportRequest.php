<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessImportRequest extends FormRequest
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
            'part' => 'required|not_in:select',
            'manufacturer' => 'required|not_in:select',
            'description' => 'required|not_in:select',
            'type' => 'required|not_in:select',
            'pricing_unit' => 'required|not_in:select',
            'stocking_unit' => 'required|not_in:select',
            'length' => 'sometimes|required|not_in:select',
            'length_unit' => 'sometimes|required|not_in:select',
            'height' => 'sometimes|required|not_in:select',
            'height_unit' => 'sometimes|required|not_in:select',
            'width' => 'sometimes|required|not_in:select',
            'width_unit' => 'sometimes|required|not_in:select',
            'weight' => 'sometimes|required|not_in:select',
            'color' => 'sometimes|required|not_in:select',
            'volts' => 'sometimes|required|not_in:select',
            'watts' => 'sometimes|required|not_in:select',
            'amps' => 'sometimes|required|not_in:select',
            'location' => 'sometimes|required|not_in:select'
        ];
    }
    public function messages()
    {
        return [
            'part.not_in' => 'Part is Required.',
            'manufacturer.not_in' => 'Manufacturer is Required.',
            'description.not_in' => 'Description is Required.',
            'type.not_in' => 'Type is Required.',
            'pricing_unit.not_in' => 'Pricing Unit is Required.',
            'stocking_unit.not_in' => 'Stocking Unit is Required.',
            'length.not_in' => 'Length is Required or Select "Not Used".',
            'length_unit.not_in' => 'Length Unit is Required or Select "Not Used".',
            'height.not_in' => 'Height is Required or Select "Not Used".',
            'height_unit.not_in' => 'Height Unit is Required or Select "Not Used".',
            'width.not_in' => 'Width is Required or Select "Not Used".',
            'width_unit.not_in' => 'Width Unit is Required or Select "Not Used".',
            'weight.not_in' => 'Weight is Required or Select "Not Used".',
            'color.not_in' => 'Color is Required or Select "Not Used".',
            'volts.not_in' => 'Volts is Required or Select "Not Used".',
            'watts.not_in' => 'Watts is Required or Select "Not Used".',
            'amps.not_in' => 'Amps Unit is Required or Select "Not Used".',
            'location.not_in' => 'Location Unit is Required or Select "Not Used".'
        ];
    }
}
