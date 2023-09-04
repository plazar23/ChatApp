<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'initiator_user_id',
    ];

    // User who initiated the conversation
    public function initiator()
    {
        return $this->belongsTo(User::class, 'initiator_user_id');
    }

    // Participants of the conversation
    public function participants()
    {
        return $this->belongsToMany(User::class, 'participants');
    }

    // Messages in the conversation
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}