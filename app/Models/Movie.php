<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'poster',
        'genre',
        'release_date',
        'imdb_id',
    ];

    public function theatre_sessions()
    {
        return $this->hasMany(TheatreSession::class);
    }

}
