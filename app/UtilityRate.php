<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zoha\Metable;

class UtilityRate extends Model
{
    use Metable;
    
    protected $metaTable = 'utility_rate_meta';
    
    protected $fillable = [
        'org_id', 'utility', 'rate_name', 'rate_description', 'frozen'
    ];
    
    protected $hidden = [
    
    ];
    
    public function company()
    {
        return $this->belongsToOne(Company::class);
    }
}
