<?php

namespace App\Models;

use App\Enums\SeatStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'status',
    ];

    protected $casts = [
        'status' => SeatStatus::class
    ];

    public function theatreSession()
    {
        return $this->belongsTo(TheatreSession::class);
    }
}
