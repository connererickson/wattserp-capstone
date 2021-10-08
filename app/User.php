<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword as ResetPasswordNotification;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'org_id', 'name', 'email', 'username', 'password', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function organization()
    {
        return $this->belongsTo('App\Organization');
    }
	public function roles()
	{
  		return $this->belongsToMany(Role::class, 'users_roles');
	}
	public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
	public function activities()
	{
  		return $this->hasMany(Activity::class, 'user_id');
	}
	public function dashboardmodules()
	{
		return $this->belongsToMany(DashboardModule::class, 'dashboardmodules_users');
	}
	
	/**
	* @param string|array $roles
	*/
	public function authorizeRoles($roles)
	{
	  if (is_array($roles)) {
	      if ($this->hasAnyRole($roles)){
	      	return '1';
		  }
		  else{
		  	return 0;
		  }
	  }
	  if ($this->hasRole($roles)){
	  	return 1;
	  }
	  else{
	  	return 0;
	  }
	}
	
	/**
	* Check multiple roles
	* @param array $roles
	*/
	public function hasAnyRole($roles)
	{
		return null !== $this->roles()->whereIn('name', $roles)->first();
	}
	
	/**
	* Check one role
	* @param string $role
	*/
	public function hasRole($role)
	{
		return null !== $this->roles()->where('name', $role)->first();
	}
	
	public function isEmployee(){
		return $this->hasRole('Internal');
	}

	public function hasPermission($permission){
		return count($this->roles()->whereHas('permissions', function ($query) use ($permission) {
    		$query->where('permissions.name', $permission);
		})->get());
	}
	public function sendPasswordResetNotification($token)
    {
        // Your your own implementation.
        $this->notify(new ResetPasswordNotification($token));
    }
}