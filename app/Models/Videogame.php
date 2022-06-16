<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Image;
use App\Models\Dislike;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Videogame extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'genre_id',
        'platform_id',
        'price',
        'isBought',
    ];

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    public function dislikedBy(User $user)
    {
        return $this->dislikes->contains('user_id', $user->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function disLikes()
    {
        return $this->hasMany(Dislike::class);
    }

    public function genres()
    {
        return $this->hasMany(Genre::class);
    }

    public function platforms()
    {
        return $this->hasMany(Platform::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }
}
