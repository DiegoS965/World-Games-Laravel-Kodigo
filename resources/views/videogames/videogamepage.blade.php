@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-EerieBlack p-6 rounded-lg">
            <h1 class="text-3xl text-white text-center">Videogame information</h1>
        </div>
    </div><br><br>
    <div class="flex justify-between">
        <div class="w-auto bg-EerieBlack p-6 rounded-lg text-white m-3 flex justify-between">
            <div class="bg-EerieBlackLight w-10/12 p-6 rounded-lg">
                <h1 class = "text-2xl font-medium mb-4">{{$videogame->title}}</h1>
                <p>
                    Description: {{$videogame->description}}
                </p>
                <p>
                    Genre: {{$videogame->genre_name}}
                </p>
                <p>
                    Platform: {{$videogame->platform_name}}
                </p>
                <p>
                    Price: {{$videogame->price}}
                </p>
                <p>
                    Videogame posted {{$videogame->created_at->diffForHumans()}} 
                </p>
                <p>
                    Has received {{$videogame->likes->count()}} {{Str::plural('like', $videogame->likes->count())}}
                </p>
                <p>
                    Has received {{$videogame->dislikes->count()}} {{Str::plural('dislike', $videogame->dislikes->count())}}
                </p>
                @auth
                    @if (!$videogame->likedBy(auth()->user()) && !$videogame->dislikedBy(auth()->user()))
                        <form action="{{ route('videogame.likes', $videogame)}}" method="post" class="mr-1">
                            @csrf
                            <button type="submit" class="font-medium text-orange-500 hover:underline">Like</button>
                        </form>
                        <form action="{{ route('videogame.dislikes', $videogame)}}" method="post" class="mr-1">
                            @csrf
                            <button type="submit" class="font-medium text-orange-500 hover:underline">Dislike</button>
                        </form>
                    @elseif ($videogame->likedBy(auth()->user()))
                        <form action="{{ route('videogame.likes', $videogame)}}" method="post" class="mr-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-orange-500 hover:underline">Undo Like</button>
                        </form>
                    @elseif ($videogame->dislikedBy(auth()->user()))
                        <form action="{{ route('videogame.dislikes', $videogame)}}" method="post" class="mr-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-orange-500 hover:underline">Undo Dislike</button>
                        </form>
                    @endif
                @endauth
            </div>
            
            <div class="bg-EerieBlackLight w-fit p-6 rounded-lg">
                <img src="../VImages/{{$videogame->image->image}}" class="object-cover">
            </div>
        </div>
    </div>
    <br><br>
    <div class="flex justify-center">
        <div class="w-1/8 bg-EerieBlack p-6 rounded-lg">
            @if($videogame->isBought == 0)
                <a class="bg-red-900 hover:bg-youtubeRed text-white px-4 py-3 rounded font-medium w-full" href="{{route('buyVideogames.index', $videogame)}}">Go to checkout page</a>
            @else
                <p>We´re sorry, the game is not available for buying</p>
            @endif
        </div>
    </div>
@endsection