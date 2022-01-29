<?php

namespace App\Listeners;

use App\Events\OrderPlacedEvent;
use App\Jobs\ThrottlMail;
use App\Mail\OrderPlaced;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderPlacedListener implements ShouldQueue
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
     * @param  \App\Events\OrderPlacedEvent  $event
     * @return void
     */
    public function handle(OrderPlacedEvent $event)
    {
        ThrottlMail::dispatch(new OrderPlaced, $event->user);
    }
}
