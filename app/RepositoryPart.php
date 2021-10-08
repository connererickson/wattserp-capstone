<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepositoryPart extends Model
{
    protected $fillable = [
        'org_id', 'sku', 'part_no', 'manufacturer', 'description', 'parent_type',
        'pricing_unit', 'stocking_unit', 'length', 'length_unit', 'height',
        'height_unit', 'width', 'width_unit', 'weight', 'color', 'volts',
        'watts', 'amps', 'stock', 'image', 'barcode_image', 'location'
    ];
	
	protected $hidden = [
	
	];
	
	public function organization()
	{
  		return $this->belongsToOne(Organization::class, 'org_id')->withTimestamps();
	}
	public function inventory_pull()
	{
  		return $this->belongsToMany(InventoryPull::class, 'inventory_pulls_parts')->withTimestamps();
	}
	public function inventory_order()
	{
  		return $this->belongsToMany(InventoryOrder::class, 'inventory_orders_parts')->withTimestamps();
	}
	public function companies(){
		return $this->belongsToMany(Company::class, 'repository_parts_vendors');
	}
}
