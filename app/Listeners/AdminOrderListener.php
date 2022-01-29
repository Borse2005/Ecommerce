<?php

namespace App\Listeners;

use App\Events\AdminOrderEvent;
use App\Jobs\ThrottlMail;
use App\Mail\AdminOrderPlaced;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AdminOrderListener implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle(AdminOrderEvent $event)
    {
        ThrottlMail::dispatch(new AdminOrderPlaced, $event->user);
    }
}
