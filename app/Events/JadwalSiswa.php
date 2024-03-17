<?php

namespace App\Events;

use App\Models\Jadwal;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class JadwalSiswa
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $jadwal;

    public function __construct(Jadwal $jadwal)
    {
        $this->jadwal = $jadwal;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
