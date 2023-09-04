<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    // Devices of the user
    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    // Conversations initiated by the user
    public function initiatedConversations()
    {
        return $this->hasMany(Conversation::class, 'initiator_user_id');
    }

    // Conversations in which the user is a participant
    public function conversations()
    {
        return $this->belongsToMany(Conversation::class, 'participants');
    }

    // Messages sent by the user
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}