<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_name',
        'device_type',
        'user_id',
    ];

    // User who owns the device
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Sessions of the device
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}