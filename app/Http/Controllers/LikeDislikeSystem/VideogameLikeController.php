<?php

namespace App\Http\Controllers\LikeDislikeSystem;

use App\Models\Videogame;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideogameLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Videogame $videogame, Request $request)
    {
        if ($videogame->likedBy($request->user()))
        {
            return response(null,409);
        }

        $videogame->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        return back();
    }

    public function destroy(Videogame $videogame, Request $request)
    {
        $request->user()->likes()->where('videogame_id', $videogame->id)->delete();

        return back();
    }

}
