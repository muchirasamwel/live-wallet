<?php

namespace App\Events;

use App\Models\Accounts;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WhenAccountIsUpdated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $account = null;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Accounts $accounts)
    {
        $this->account = $accounts;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('accounts-channel');
    }
}
