<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    // use HasFactory;
    protected $table = 'chats';

    protected $fillable = [
        'from',
        'message',
        'to',
    ];
    public function fromUserDatabase()
    {
        return $this->belongsTo(User::class, 'from', 'id');
    }

    public function toUserDatabase()
    {
        return $this->belongsTo(User::class, 'to', 'id');
    }
}
