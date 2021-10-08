<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingCourse extends Model
{
    //
    protected $fillable = [
        'org_id', 'name', 'description', 'active'
    ];
	
	protected $hidden = [
	
	];
	
	public function organization()
	{
  		return $this->belongsToMany(Organization::class, 'training_courses_organizations')->withTimestamps();;
	}
	public function employee()
	{
  		return $this->belongsToMany(Employee::class, 'training_courses_employees')->withTimestamps();
	}
	public function slides()
	{
  		return $this->hasMany('App\Slide', 'training_course_id');
	}
}
