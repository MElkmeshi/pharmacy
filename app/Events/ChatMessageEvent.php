<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $message;
    public $user;
    public $to;
    public function __construct(string $message, array $user,array $to)
    {
        $this->message = $message;
        $this->user = $user;
        $this->to = $to;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('public.chat.1'),
        ];
    }
    public function broadcastAs(): string
    {
        return 'chat-message';
    }
    public function broadcastWith(): array
    {
        if($this->user['role']=='admin')
        {
            return [
                'message' => $this->message,
                'username' => $this->user['username'],
                'role' => $this->user['role'],
                'to'=> $this->to,
            ];
        }
        else{
            return [
                'message' => $this->message,
                'from' => [
                    'id' => $this->user['id'],
                    'name' => $this->user['username'],
                ],
                'to'=> $this->to,
            ];
        }
        // return [
        //     'message' => $this->message,
        // ];
    }
}
