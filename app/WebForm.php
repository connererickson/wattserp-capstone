<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebForm extends Model
{
    //
    protected $fillable = [
        'name', 'fields'
    ];
	
	protected $hidden = [
	
	];
}
