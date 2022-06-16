<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'videogame_id',
    ];

    public function videogame()
    {
        return $this->belongsTo(Videogame::class);
    }
    
}
