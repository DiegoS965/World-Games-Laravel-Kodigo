<?php

namespace App\Http\Controllers\LikeDislikeSystem;

use App\Models\Videogame;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideogameDislikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Videogame $videogame, Request $request)
    {
        if ($videogame->dislikedBy($request->user()))
        {
            return response(null,409);
        }

        $videogame->dislikes()->create([
            'user_id' => $request->user()->id,
        ]);
        
        return back();
    }

    public function destroy(Videogame $videogame, Request $request)
    {
        $request->user()->dislikes()->where('videogame_id', $videogame->id)->delete();
        
        return back();
    }
}
