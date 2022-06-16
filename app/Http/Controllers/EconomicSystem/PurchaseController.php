<?php

namespace App\Http\Controllers\EconomicSystem;

use App\Models\User;
use App\Models\Videogame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Videogame $videogame)
    {
        $videogame->genre_name = DB::table('videogames')->join('genres', 'videogames.genre_id', '=', 'genres.id')->where('videogames.genre_id', '=', $videogame->genre_id)->value('genres.genre');
        $videogame->platform_name = DB::table('videogames')->join('platforms', 'videogames.platform_id', '=', 'platforms.id')->where('videogames.platform_id', '=', $videogame->platform_id)->value('platforms.platform');

        return view('videogames.buyvideogame',[
            'videogame' => $videogame,
        ]);
    }

    public function buyVideogame(Videogame $videogame)
    {
        $this->authorize('buyVideogame', $videogame);

        $user = auth()->user();
        $user = User::find($_POST['id']);

        if($user->userCredit < $videogame->price)
        {
            return back()->with('error', 'You do not have enough credit to buy this videogame');
        }else
        {
            $videogame->update([
                'isBought' => 1,
            ]);
             
            $user->userCredit -= $videogame->price;
            $user->save();
            $user->videogames()->save($videogame);
            return view('home');
        }
    }
}
