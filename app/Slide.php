<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    //
    protected $fillable = [
        'training_course_id', 'name', 'image', 'audio', 'seconds', 'slide_order'
    ];
	
	protected $hidden = [
	
	];
	
	public function training_courses()
	{
  		return $this->belongsTo('App\TrainingCourse', 'id');
	}
}
