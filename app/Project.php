<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'org_id', 'portfolio_id', 'project_number', 'corporate', 'company_name', 'company_legal_name', 'internal_nickname', 'is_lead', 'class', 'archived'
    ];
	
    public function portfolio()
	{
  		return $this->belongsTo(Portfolio::class, 'portfolio_id');
	}
    public function contacts()
	{
  		return $this->belongsToMany(Contact::class, 'projects_contacts');
	}
	public function address()
	{
  		return $this->belongsToMany(Address::class, 'projects_addresses');
	}
    public function designs()
    {
        return $this->hasMany(Design::class, 'proposal_id');
    }
}
