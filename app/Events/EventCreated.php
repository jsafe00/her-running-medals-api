<?php

namespace App\Events;

use App\Models\Event;
use Illuminate\Queue\SerializesModels;

class EventCreated
{
    use SerializesModels;
 
    public $event;
 
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Event $event)
    {
        $this->event = $event;   
    }
}
