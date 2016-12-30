<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendMailToAdminEvent
{
    use InteractsWithSockets, SerializesModels;

    public $mailData;
    public $adminUser;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($mailData, $adminUser)
    {
        $this->mailData = $mailData;
        $this->adminUser = $adminUser;
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
