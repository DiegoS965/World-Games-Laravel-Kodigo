<?php

namespace App\Http\Controllers\VideogameSystem;

use App\Models\Image;
use App\Models\Videogame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VideogameController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store','destroy']);
    }

    public function index()
    {
        $videogames = Videogame::latest()->where('isBought', '=', '0')->with(['user','likes','dislikes','image'])->paginate(5);

        foreach($videogames as $videogame) 
        {
            $videogame->genre_name = DB::table('videogames')->join('genres', 'videogames.genre_id', '=', 'genres.id')->where('videogames.genre_id', '=', $videogame->genre_id)->value('genres.genre');
            $videogame->platform_name = DB::table('videogames')->join('platforms', 'videogames.platform_id', '=', 'platforms.id')->where('videogames.platform_id', '=', $videogame->platform_id)->value('platforms.platform');
        }

        return view('videogames.index',[
            'videogames' => $videogames,
        ], compact('videogames'));
    }

    public function registerIndex()
    {
        return view('videogames.registervideogame');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required|string',
            'description'=>'required|string',
            'genre_id'=>'required|integer',
            'platform_id'=>'required|integer',
            'price'=>'required|numeric',
        ]);

        $image = new Image();

        if($request->file('image'))
        {
           $file = $request->file('image');
           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('VImages'), $filename);
           $image['image'] = $filename;
        }

        $request->user()->videogames()->create($request->all());
        $image->videogame_id = $request->user()->videogames->last()->id;
        $image->save();

        return back();
    }

    public function show(Videogame $videogame)
    {
        $videogame->genre_name = DB::table('videogames')->join('genres', 'videogames.genre_id', '=', 'genres.id')->where('videogames.genre_id', '=', $videogame->genre_id)->value('genres.genre');
        $videogame->platform_name = DB::table('videogames')->join('platforms', 'videogames.platform_id', '=', 'platforms.id')->where('videogames.platform_id', '=', $videogame->platform_id)->value('platforms.platform');

        return view('videogames.videogamepage',[
            'videogame' => $videogame,
        ]);
    }
}
