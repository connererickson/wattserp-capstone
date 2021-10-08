<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DashboardModule extends Model
{
    //
    protected $fillable = [];
	
	protected $hidden = [
	
	];
	
	public function roles()
	{
  		return $this->belongsToMany(Role::class, 'dashboardmodules_roles')->withPivot('org_id');;
	}
	public function users()
	{
  		return $this->belongsToMany(User::class, 'dashboardmodules_users');
	}

}
