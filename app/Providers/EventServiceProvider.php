<?php

namespace App\Providers;

use App\Events\AdminOrderEvent;
use App\Events\OrderPlacedEvent;
use App\Events\OrderUpdateEvent;
use App\Events\OutOfStockEvent;
use App\Listeners\AdminOrderListener;
use App\Listeners\OrderPlacedListener;
use App\Listeners\OrderUpdateListener;
use App\Listeners\OutOfStockListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderPlacedEvent::class => [
            OrderPlacedListener::class
        ],
        AdminOrderEvent::class => [
            AdminOrderListener::class
        ],
        OrderUpdateEvent::class => [
            OrderUpdateListener::class
        ],
        OutOfStockEvent::class => [
            OutOfStockListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
