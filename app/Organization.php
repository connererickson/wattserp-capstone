<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public function users()
	{
  		return $this->hasMany('App\User', 'org_id');
	}
	public function projects()
	{
  		return $this->hasMany('App\Project', 'org_id');
	}
	public function repository_parts()
	{
  		return $this->hasMany('App\RepositoryPart', 'org_id');
	}
	public function training_course()
	{
  		return $this->belongsToMany(TrainingCourse::class, 'training_courses_organizations')->withTimestamps();;
	}
	public function companies(){
		return $this->belongsToMany('App\Company', 'organizations_companies', 'org_id');
	}
}
