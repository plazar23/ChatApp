<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Participant extends Pivot
{
    use HasFactory;

    // You can set this to false if you don't want timestamps to be auto-handled in this table.
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'conversation_id',
    ];

    // User participating in the conversation
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Conversation the user is participating in
    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
}