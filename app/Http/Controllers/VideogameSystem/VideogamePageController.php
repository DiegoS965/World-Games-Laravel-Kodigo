<?php

namespace App\Http\Controllers\VideogameSystem;

use App\Models\Videogame;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideogamePageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['update','destroy']);
    }

    public function index(Videogame $videogame)
    {
        return view('videogames.updatevideogame',[
            'videogame' => $videogame,
        ]);
    }

    public function update(Request $request, Videogame $videogame)
    {
        $this->authorize('update', $videogame);
        
        $this->validate($request, [
            'title'=>'required|string',
            'description'=>'required|string',
            'genre_id'=>'required|integer',
            'platform_id'=>'required|integer',
            'price'=>'required|numeric',
        ]);
        
        $videogame->update($request->all());

        return back();
    }

    public function destroy(Videogame $videogame)
    {
        $this->authorize('delete', $videogame);
        
        $videogame->delete();

        return back();
    }
}

