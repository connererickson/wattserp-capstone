<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
	{
		return $this->belongsToMany(User::class, 'users_roles');
	}
	public function permissions()
	{
		return $this->belongsToMany(Permission::class, 'roles_permissions')->withPivot('org_id');;
	}
	public function dashboardmodules()
	{
		return $this->belongsToMany(DashboardModule::class, 'dashboardmodules_roles');
	}
}
