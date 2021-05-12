<?php

namespace App\Listeners;

use App\Events\EventCreated;
use App\Models\Event;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;

class NotifyEventCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EventCreated $event
     * @return void
     */
    public function handle(EventCreated $event)
    {
        Log::info('Event Created!');
    }
}
