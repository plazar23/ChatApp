<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_data',
        'device_id',
    ];

    // Device of the session
    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}