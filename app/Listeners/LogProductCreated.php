<?php

namespace App\Listeners;

use App\Events\ProductcreatedEvent;
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
    public function handle(ProductcreatedEvent $event): void
    {

        Log::query()->create([
            'user_id'=>$event->request->get('user_id'),
            'user_ip'=> $event->request->get('user_ip'),
            'user_agent'=>$event->request->get('user_agent'),
            'action'=> $event->request->get('action'),
            'model'=> get_class($event->product),
            'inputs'=>$event->request->only('name', 'count', 'cost', 'description', 'category_id', 'tags')

        ]);
    }
}
