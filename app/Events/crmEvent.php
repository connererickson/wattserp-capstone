<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\User;

class crmEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
	
	public $user, $event_text;
	
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, $event_text)
    {
        $this->user = $user;
		$this->event_text = $event_text;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
