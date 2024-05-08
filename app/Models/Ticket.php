<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Ticket extends Model
{
    use HasFactory;
    use Notifiable;
    protected $fillable = [
        'code',
        'user_name',
        'seat_id',
        'email',
    ];

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
}
