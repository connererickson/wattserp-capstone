<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\Activity;
use App\Events\crmEvent;

class LogActivity
{
    /**
     * Create the event listener.
     *
     * @param  Request  $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  Activity  $activity
     * @return void
     */
    public function handle(crmEvent $event)
    {
    	$input['user_id'] = $event->user->id;
		$input['activity'] = $event->event_text;
		$activity = Activity::create($input);
        /*$user = $activity->user;
        $user->last_login_at = date('Y-m-d H:i:s');
        $user->last_login_ip = $this->request->ip();
        $user->save();*/
    }
}
