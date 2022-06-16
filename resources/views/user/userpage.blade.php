@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-EerieBlack p-6 rounded-lg">
            <h1 class="text-3xl text-white text-center">User´s Profile</h1>
        </div>
    </div><br>
    <div class="flex justify-center">
        <div class="w-10/12 bg-EerieBlack p-6 rounded-lg">
            <div class="text-slate-100 m-3">
                <h1 class = "text-2xl font-medium mb-4">{{$user->username}}</h1>
                <p>
                    Has posted {{$videogames->count()}} {{Str::plural('videogame',$videogames->count())}}
                </p>
                <p>
                   User joined the platform {{$user->created_at->diffForHumans()}} 
                </p>
                <p>
                   Has received {{$user->receivedLikes->count()}} {{Str::plural('like',$user->receivedLikes->count())}}
                </p>
                <p>
                   Has received {{$user->receivedDislikes->count()}} {{Str::plural('dislike',$user->receivedDislikes->count())}}
                </p>
                @auth
                    @if(auth()->user()->id == $user->id)
                        <p>You have {{$user->userCredit}} Credits</p>
                    @endif
                @endauth
            </div>
        </div>
    </div>
    <br><br>
    <!--SEllING GAMES-->
    <div class="flex justify-center">
        <div class="w-10/12 bg-EerieBlack p-6 rounded-lg">
            <h1 class = "text-2xl font-medium mb-1 text-slate-100">{{$user->username}}´s games for sale:</h1>
            @if($videogames->count())
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-center text-white dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-EerieBlackLight dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Cover</th>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Description</th>
                                <th scope="col" class="px-6 py-3">Genre</th>
                                <th scope="col" class="px-6 py-3">Platform</th>
                                <th scope="col" class="px-6 py-3">Price</th>
                                @auth
                                    @if(auth()->user()->id == $user->id)
                                        <th scope="col" class="px-6 py-3">Options</th>
                                    @endif
                                @endauth
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videogames as $videogame)
                                <x-user-selling-videogames :videogame="$videogame"/>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-slate-100">No videogames for sale</p>
            @endif
        </div>
    </div>
    <br><br>
    @auth
        @if(auth()->user()->id == $user->id)
            <div class="flex justify-center">
                <div class="w-10/12 bg-EerieBlack p-6 rounded-lg">
                    <h1 class = "text-2xl font-medium mb-1 text-slate-100">Your games:</h1>
                    @if($ownedVideogames->count())
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-center text-white dark:text-gray-400">
                                <thead class="text-xs text-white uppercase bg-EerieBlackLight dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Cover</th>
                                        <th scope="col" class="px-6 py-3">Name</th>
                                        <th scope="col" class="px-6 py-3">Description</th>
                                        <th scope="col" class="px-6 py-3">Genre</th>
                                        <th scope="col" class="px-6 py-3">Platform</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ownedVideogames as $ownedVideogame)
                                        <x-user-owned-videogames :ownedVideogame="$ownedVideogame"/>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-slate-100">You dont own any videogames</p>
                    @endif
                </div>
            </div>
        @endif
    @endauth
@endsection