<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChannelPartner extends Model
{
    protected $fillable = [
        'org_id', 'user_id', 'cp_company_name', 'cp_main_phone', 'cp_mailing_address', 'cp_mailing_city', 'cp_mailing_state', 'cp_mailing_zip', 'cp_website', 'cp_taxid', 'start_date', 'end_date'
    ];
	
	protected $hidden = [
	
	];
	
	public function user()
	{
  		return $this->hasOne('App\User');
	}
	public function address()
	{
		return $this->belongsToMany(Address::class, 'channel_partners_addresses');
	}
    public function contact()
    {
        return $this->belongsToMany(Contact::class, 'channel_partners_contacts');
    }
}
