<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'company_name', 'company_legal_name', 'internal_nickname', 'type'
    ];
	
	protected $hidden = [
	
	];
	
	public function organizations()
	{
		return $this->belongsToMany(Organization::class, 'organizations_companies');
	}
    public function contacts()
	{
  		return $this->belongsToMany(Contact::class, 'companies_contacts');
	}
    public function addresses()
    {
        return $this->belongsToMany(Address::class, 'companies_addresses');
    }
	public function repositoryparts()
	{
		return $this->hasMany(RepositoryPart::class, 'repository_parts_vendors');
	}
    public function rates()
    {
        return $this->hasMany(UtilityRate::class, 'utility');
    }
}
