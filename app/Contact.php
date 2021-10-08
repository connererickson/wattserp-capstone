<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'title', 'cell_phone', 'home_phone', 'work_phone', 'email1', 'email2'
    ];
	
	protected $hidden = [
	
	];
	
	public function portfolios()
	{
  		return $this->belongsToMany(Portfolio::class, 'portfolios_contacts');
	}
    public function projects()
	{
  		return $this->belongsToMany(Project::class, 'projects_contacts');
	}
	public function companies()
	{
  		return $this->belongsToMany(Company::class, 'companies_contacts');
	}
	public function employees()
	{
		return $this->hasOne(Employee::class, 'emergency_contact', 'id');
	}
	public function addresses()
	{
		return $this->belongsToMany(Address::class, 'contacts_addresses');
	}
}
