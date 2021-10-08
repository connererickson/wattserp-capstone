<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'user_id', 'activity'
    ];
	
	protected $hidden = [
	
	];
	
    public function users()
	{
  		return $this->belongsTo(User::class);
	}
}
