<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Videogame;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\HandlesAuthorization;

class VideogamePolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Videogame $videogame)
    {
        return $user->id === $videogame->user_id;
    }

    public function update(User $user, Videogame $videogame)
    {
        return $user->id === $videogame->user_id;
    }

    public function buyVideogame(User $user, Videogame $videogame)
    {
        return $user->id != $videogame->user_id;
    }
}
