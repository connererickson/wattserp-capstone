<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    //
    protected $fillable = [
        'name', 'type', 'description'
    ];
}
