<?php

namespace App\Listeners;

use App\Events\ProductCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendProductCreatedEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductCreatedEvent $event): void
    {
        Log::info('New product created : ', $event->product->toArray());
    }
}
