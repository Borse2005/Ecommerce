<?php

namespace App\Listeners;

use App\Events\OrderUpdateEvent;
use App\Jobs\ThrottlMail;
use App\Mail\OrderUpdate;
use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderUpdateListener implements ShouldQueue
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
     * @param  \App\Events\OrderUpdateEvent  $event
     * @return void
     */
    public function handle(OrderUpdateEvent $event)
    {
        ThrottlMail::dispatch(new OrderUpdate($event->order), $event->user);
    }
}
