<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserOnline implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function broadcastOn()
    {
        return new PresenceChannel('online-users');
    }

    public function broadcastWith()
    {
        return [
            'users' => $this->users
        ];
    }
}
