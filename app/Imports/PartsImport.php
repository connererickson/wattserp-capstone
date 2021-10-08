<?php

namespace App\Imports;

use App\RepositoryPart;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use App\Helpers\GenerateSKU;
use DB;
use App\Company;

HeadingRowFormatter::default('none');

class PartsImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    
    use Importable, SkipsFailures;
    
    protected $headings, $org_id, $part_array, $manufacturers, $types, $units, $colors, $count;
        
    public function __construct($headings, $org_id){
        $this->headings = $headings;
        $this->org_id = $org_id;
        $this->count = -1;
    }
    
    public function model(array $row)
    {
        //Generate a SKU for each item
        $sku_generator = new GenerateSKU();
        $upc = $sku_generator->generate_sku($row[$this->headings['type']]);
        $this->part_array['barcode_image'] = $upc . '.png';
        
        //Start Building the part array for insert
        $this->part_array['org_id'] = $this->org_id;
        $this->part_array['sku'] = $upc;
        $this->part_array['part_no'] = $row[$this->headings['part']];
        $this->part_array['description'] = $row[$this->headings['description']];
        
        //Include Weight if present, Weight doesn't need a default value
        if($this->headings['weight'] != 'no'){
            $this->part_array['weight'] = $row[$this->headings['weight']];
        }
        //Include Volts if present, Volts doesn't need a default value
        if($this->headings['volts'] != 'no'){
            $this->part_array['volts'] = $row[$this->headings['volts']];
        }
        //Include Watts if present, Watts doesn't need a default value
        if($this->headings['watts'] != 'no'){
            $this->part_array['watts'] = $row[$this->headings['watts']];
        }
        //Include Amps if present, Amps doesn't need a default value
        if($this->headings['amps'] != 'no'){
            $this->part_array['amps'] = $row[$this->headings['amps']];
        }
        //Include Location if present, Location doesn't need a default value
        if($this->headings['location'] != 'no'){
            $this->part_array['location'] = $row[$this->headings['location']];
        }
        
        return new RepositoryPart($this->part_array);
    }
    public function row_count(){
        return $this->count;
    }
    public function rules(): array
    {
        $this->count++;
        $this->manufacturers = Company::where('type', '=', 'Manufacturer')->get();
        $this->types = DB::table('repository_types')->where('active', 1)->select('*')->get();
        $this->units = DB::table('repository_units')->where('active', 1)->select('*')->get();
        $this->colors = DB::table('repository_colors')->where('active', 1)->select('*')->get();
        
        return [
            $this->headings['part'] => [
                'required',
                function ($attribute, $value, $fail) {
                    $result = DB::table('repository_parts')->select('part_no')->where('part_no', '=', $value)->get()->toArray();
                    if (count($result)){
                        $fail('exists');
                    }
                }
            ],
            $this->headings['manufacturer'] => [
                'required',
                function ($attribute, $value, $fail) {
                    //If the Manufacturer matches a manufacturer in the database, then assign it the ID of the manufacturer instead
                    $manufacturer_flag = 0;
                    foreach($this->manufacturers as $manufacturer){
                        if ($manufacturer->company_name == $value || $manufacturer->internal_nickname == $value){
                            $this->part_array['manufacturer'] = $manufacturer->id;
                            $manufacturer_flag = 1;
                        }
                    }
                    if ($manufacturer_flag == 0){
                        $fail('manufacturer');
                    }
                }
            ],
            $this->headings['type'] => [
                'required',
                function ($attribute, $value, $fail) {
                    //If the Type matches a type in the database, then assign it the ID of the type instead
                    $type_flag = 0;
                    foreach($this->types as $type){
                        if ($type->type == $value){
                            $this->part_array['parent_type'] = $type->id;
                            $type_flag = 1;
                        }
                    }
                    if ($type_flag == 0){
                        $fail('type');
                    }
                }
            ],
            $this->headings['pricing_unit'] => [
                'required',
                function ($attribute, $value, $fail) {
                    //If the Pricing Unit matches a unit in the database, then assign it the ID of the unit instead
                    $pricing_unit_flag = 0;
                    foreach($this->units as $unit){
                        if ($unit->unit == $value){
                            $this->part_array['pricing_unit'] = $unit->id;
                            $pricing_unit_flag = 1;
                        }
                    }
                    if ($pricing_unit_flag == 0){
                        $fail('unit');
                    }
                }
            ],
            $this->headings['stocking_unit'] => [
                'required',
                function ($attribute, $value, $fail) {
                    //If the Stocking Unit matches a unit in the database, then assign it the ID of the unit instead
                    $stocking_unit_flag = 0;
                    foreach($this->units as $unit){
                        if ($unit->unit == $value){
                            $this->part_array['stocking_unit'] = $unit->id;
                            $stocking_unit_flag = 1;
                        }
                    }
                    if ($stocking_unit_flag == 0){
                        $fail('unit');
                    }
                }
            ],
            $this->headings['length'] => [
                'sometimes',
                function($attribute, $value, $fail){
                    //Include Length if present, Length doesn't need a default value
                    if($this->headings['length'] != 'no'){
                        if (is_float($value) || is_int($value) || $value == ''){
                            $this->part_array['length'] = $value;
                        }
                        else{
                            $fail('dimension');
                        }
                    }
                }
            ],
            $this->headings['width'] => [
                'sometimes',
                function($attribute, $value, $fail){
                    //Include Width if present, Width doesn't need a default value
                    if($this->headings['width'] != 'no'){
                        if (is_float($value) || is_int($value) || $value == ''){
                            $this->part_array['width'] = $value;
                        }
                        else{
                            $fail('dimension');
                        }
                    }
                }
            ],
            $this->headings['height'] => [
                'sometimes',
                function($attribute, $value, $fail){
                    //Include Height if present, Height doesn't need a default value
                    if($this->headings['height'] != 'no'){
                        if (is_float($value) || is_int($value) || $value == ''){
                            $this->part_array['height'] = $value;
                        }
                        else{
                            $fail('dimension');
                        }
                    }
                }
            ],
            $this->headings['length_unit'] => [
                'sometimes',
                function($attribute, $value, $fail){
                    //If the Length Unit matches a unit in the database, then assign it the ID of the unit instead
                    $unit_flag = 0;
                    if ($this->headings['length_unit'] != 'no'){
                        if ($value == ''){
                            $this->part_array['length_unit'] = 0;
                        }
                        else{
                            foreach($this->units as $unit){
                                if ($unit->unit == $value){
                                    $this->part_array['length_unit'] = $unit->id;
                                    $unit_flag = 1;
                                }
                            }
                            if ($unit_flag == 0){
                                $fail('unit');
                            }
                        }
                    }
                    else{
                        $this->part_array['length_unit'] = 0;
                    }
                }
            ],
            $this->headings['width_unit'] => [
                'sometimes',
                function($attribute, $value, $fail){
                    //If the Width Unit matches a unit in the database, then assign it the ID of the unit instead
                    $unit_flag = 0;
                    if ($this->headings['width_unit'] != 'no'){
                        if ($value == ''){
                            $this->part_array['width_unit'] = 0;
                        }
                        else{
                            foreach($this->units as $unit){
                                if ($unit->unit == $value){
                                    $this->part_array['width_unit'] = $unit->id;
                                    $unit_flag = 1;
                                }
                            }
                            if ($unit_flag == 0){
                                $fail('unit');
                            }
                        }
                    }
                    else{
                        $this->part_array['width_unit'] = 0;
                    }
                }
            ],
            $this->headings['height_unit'] => [
                'sometimes',
                function($attribute, $value, $fail){
                    //If the Height Unit matches a unit in the database, then assign it the ID of the unit instead
                    $unit_flag = 0;
                    if ($this->headings['height_unit'] != 'no'){
                        if ($value == ''){
                            $this->part_array['height_unit'] = 0;
                        }
                        else{
                            foreach($this->units as $unit){
                                if ($unit->unit == $value){
                                    $this->part_array['height_unit'] = $unit->id;
                                    $unit_flag = 1;
                                }
                            }
                            if ($unit_flag == 0){
                                $fail('unit');
                            }
                        }
                    }
                    else{
                        $this->part_array['height_unit'] = 0;
                    }
                }
            ],
            $this->headings['color'] => [
                'sometimes',
                function($attribute, $value, $fail){ 
                    //If the Color matches a color in the database, then assign it the ID of the color instead
                    $color_flag = 0;
                    if ($this->headings['color'] != 'no'){
                        if ($value == ''){
                            $this->part_array['color'] = 0;
                        }
                        else{
                            foreach($this->colors as $color){
                                if ($color->color_name == $value){
                                    $this->part_array['color'] = $color->id;
                                    $color_flag = 1;
                                }
                            }
                            if ($color_flag == 0){
                                $fail('color');
                            }
                        }
                    }
                    else{
                        $this->part_array['color'] = 0;
                    }
                }
            ]
        ];
    }
}

?>