<?php

namespace App\Events;

use App\Http\Requests\Products\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Product $product;
    public ProductStoreRequest $request;

    /**
     * Create a new event instance.
     */
    public function __construct(Product $product, ProductStoreRequest $request)
    {
        //
        $this->product = $product;
        $this->request = $request;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
