<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    protected $fillable = [
        'proposal_id', 'name', 'description'
    ];
	
    public function project()
	{
  		return $this->belongsToOne(Project::class);
	}
}
