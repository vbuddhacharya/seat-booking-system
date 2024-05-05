<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheatreSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time',
        'end_time',
        'date',
        'movie_id',
        'theatre_id',
    ];
    public function theatre()
    {
        return $this->belongsTo(Theatre::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
