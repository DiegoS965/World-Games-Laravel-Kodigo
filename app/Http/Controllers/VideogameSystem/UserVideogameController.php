<?php

namespace App\Http\Controllers\VideogameSystem;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserVideogameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('getOwnedGames');
    }

    public function index(User $user)
    {
        $sellingVideogames = $user->videogames()->where('isBought', '=', '0')->with('image')->paginate(5);

        foreach($sellingVideogames as $sellingVideogame) 
        {
            $sellingVideogame->genre_name = DB::table('videogames')->join('genres', 'videogames.genre_id', '=', 'genres.id')->where('videogames.genre_id', '=', $sellingVideogame->genre_id)->value('genres.genre');
            $sellingVideogame->platform_name = DB::table('videogames')->join('platforms', 'videogames.platform_id', '=', 'platforms.id')->where('videogames.platform_id', '=', $sellingVideogame->platform_id)->value('platforms.platform');
        }

        $ownedVideogames = $user->videogames()->where('isBought', '=', '1')->paginate(5);

        foreach($ownedVideogames as $ownedVideogame) 
        {
            $ownedVideogame->genre_name = DB::table('videogames')->join('genres', 'videogames.genre_id', '=', 'genres.id')->where('videogames.genre_id', '=', $ownedVideogame->genre_id)->value('genres.genre');
            $ownedVideogame->platform_name = DB::table('videogames')->join('platforms', 'videogames.platform_id', '=', 'platforms.id')->where('videogames.platform_id', '=', $ownedVideogame->platform_id)->value('platforms.platform');
        }

        return view('user.userpage',[
            'user'=>$user,
            'videogames'=>$sellingVideogames,
            'ownedVideogames'=>$ownedVideogames,
        ]);
    }
}