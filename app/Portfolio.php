<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
	protected $fillable = [
        'org_id', 'name', 'nickname', 'archived'
    ];
	
    public function organization()
	{
  		return $this->belongsToOne('App\Organization', 'org_id');
	}
    public function projects()
	{
  		return $this->hasMany(Project::class);
	}
	 public function contacts()
	{
  		return $this->belongsToMany(Contact::class, 'portfolios_contacts');
	}
}
