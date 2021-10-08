<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesMember extends Model
{
    protected $fillable = [
        'org_id', 'user_id', 'first_name', 'middle_name', 'last_name', 'phone', 'alt_email', 'start_date', 'end_date'
    ];
	
	protected $hidden = [
	
	];
	
	public function user()
	{
  		return $this->hasOne('App\User');
	}
	public function address()
	{
		return $this->belongsToMany(Address::class, 'sales_members_addresses');
	}
}
