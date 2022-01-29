<?php

namespace App\Listeners;

use App\Events\OutOfStockEvent;
use App\Jobs\ThrottlMail;
use App\Mail\OutOfStock;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OutOfStockListener implements ShouldQueue
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
     * @param  \App\Events\OutOfStockEvent  $event
     * @return void
     */
    public function handle(OutOfStockEvent $event)
    {
        ThrottlMail::dispatch(new OutOfStock($event->product), $event->user);
    }
}
