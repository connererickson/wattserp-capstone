<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meter extends Model
{
    protected $fillable = [
    	'address_id', 'meter_number'
    ];
	
	protected $hidden = [
	
	];
	
	public function meters()
	{
		return $this->belongsTo(Address::class, 'address_id');
	}
}
