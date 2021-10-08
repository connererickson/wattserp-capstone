<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'address', 'city', 'state', 'zip', 'county', 'ahj', 'apn', 'subdivision', 'lot', 'zoning', 'use_code'
    ];
	
	protected $hidden = [
	
	];
	
    public function projects()
	{
  		return $this->belongsToMany(Project::class, 'projects_addresses');
	}
	public function designs()
	{
  		return $this->belongsToOne(Design::class, 'address_id');
	}
	public function Employees()
	{
		return $this->belongsToMany(Employee::class, 'employees_addresses');
	}
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'companies_addresses');
    }
	public function Contact()
	{
		return $this->belongsToMany(Contact::class, 'contacts_addresses');
	}
	public function meters()
	{
		return $this->hasMany(Meter::class);
	}
}
