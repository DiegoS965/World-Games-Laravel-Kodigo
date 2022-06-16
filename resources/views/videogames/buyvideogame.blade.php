@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-EerieBlack p-6 rounded-lg">
            <h1 class="text-3xl text-white text-center">Buy videogame</h1>
        </div>
    </div><br>
    <div class="flex justify-center">
        <div class="w-4/12 bg-EerieBlack p-6 rounded-lg">
            <img src="../VImages/{{$videogame->image->image}}" class="object-cover">
        </div>
    </div><br>
    <div class="flex justify-center">
        <div class="w-4/12 bg-EerieBlack p-6 rounded-lg  text-slate-100">
            <p class="text-lg">Title: {{$videogame->title}}</p><br>
            <p class="text-lg">Description: {{$videogame->description}}</p><br>
            <p class="text-lg">Genre: {{$videogame->genre_name}}</p><br>
            <p class="text-lg">Platform: {{$videogame->platform_name}}</p><br>
            <p class="text-lg">Price: {{$videogame->price}}</p><br>
            <p class="text-lg">Your current balance is: {{auth()->user()->userCredit}}</p><br>
            <form action="{{ route('buyVideogames.buy',$videogame) }}" method="post">
                @csrf
                <div>
                <input type="number" hidden value="{{auth()->user()->id}}" name="id" id="id">
                <button type="submit" class="bg-red-900 hover:bg-youtubeRed text-white px-4 py-3 rounded
                font-medium w-full">Buy Videogame</button>
            </div>
            </form>
        </div>
    </div>
@endsection