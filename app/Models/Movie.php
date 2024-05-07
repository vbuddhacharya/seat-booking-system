<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
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

    protected function poster(): CastsAttribute
    {
        return CastsAttribute::make(
            get: fn (string $value) => url('storage/images/' . $value)
        );
    }

    public function theatreSessions()
    {
        return $this->hasMany(TheatreSession::class);
    }
}
