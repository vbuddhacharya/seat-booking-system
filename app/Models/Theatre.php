<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theatre extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'capacity'
    ];

    public function theatre_sessions()
    {
        return $this->hasMany(TheatreSession::class);
    }
}
