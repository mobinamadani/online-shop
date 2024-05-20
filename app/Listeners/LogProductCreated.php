<?php

namespace App\Listeners;

use App\Events\ProductCreatedEvent;
use App\Models\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogProductCreated
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
//        Log::query()->create([
//            'user_id' => $event->request->get('user_id'),
//            'user_ip' => $event->request->get('user_ip'),
//            'user_agent' => $event->request->get('user_agent'),
//            'action' => 'create',
//            'model' => get_class($event->product),
//            'inputs' => $event->request->only(['name', 'cost', 'count', 'description', 'category_id', 'tags'])
//        ]);

        //creating log modified in order to be used in observer
        Log::query()->create([
            'user_id' => auth()->id(),
            'user_ip' => $event->request->ip(),
            'user_agent' => $event->request->userAgent(),
            'action' => 'create',
            'model' => get_class($event->product),
            'inputs' => $event->request->only(['name', 'cost', 'count', 'description', 'category_id', 'tags'])
        ]);

    }
}
