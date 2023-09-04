<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'conversation_id',
    ];

    // User who sent the message
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Conversation of the message
    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
}