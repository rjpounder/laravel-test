<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\OrderCreated;

class SendOrderDetailsNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param OrderCreated $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        if ($this->attempts() === 0) {
            $this->release(30 * 60);
        } else {
            \Mail::to('info@pretendcompany.com')->send(new \App\Mail\OrderCreated($event->order));
        }
    }
}
