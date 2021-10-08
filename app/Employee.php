<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'org_id', 'user_id', 'first_name', 'middle_name', 'last_name', 'phone', 'ssn', 'hire_date', 'dob', 'end_date', 'emergency_contact'
    ];
	
	protected $hidden = [
	
	];
	
	public function user()
	{
  		return $this->hasOne('App\User');
	}
	public function training_course()
	{
  		return $this->belongsToMany(TrainingCourse::class, 'training_courses_employees')->withTimestamps();
	}
	public function address()
	{
		return $this->belongsToMany(Address::class, 'employees_addresses');
	}
	public function contact()
	{
		return $this->belongsTo(Contact::class, 'emergency_contact', 'id');
	}
}
