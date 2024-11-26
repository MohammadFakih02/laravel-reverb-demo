<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ContentUpdated implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function broadcastOn()
    {
        return new Channel('content-channel'); // Public channel
    }

    public function broadcastAs()
    {
        return 'updateContent'; // Event name used on the frontend
    }
}


