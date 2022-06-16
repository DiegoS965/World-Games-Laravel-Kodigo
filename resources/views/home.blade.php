@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-EerieBlack p-6 rounded-lg">
            <h1 class="text-3xl text-white text-center">All videogames</h1>
        </div>
    </div><br>

    <div class="flex justify-between bg-EerieBlack">
        <div class="w-10/12 bg-EerieBlackLight rounded-lg text-white">
            <img src="../images/WORLD.png" class="object-fill">
        </div>
        <div class="w-10/12 bg-EerieBlackLight p-6 rounded-lg text-white">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            Welcome to World Games, our prestige site where you can find all the videogames you want. We have a huge collection of games, from the most popular to the most obscure. You are welcome to explore out site, you can buy videogames using credits, and also sell the games.
            Fell free to create an account, and start playing. We hope you enjoy your stay.
        </div>
    </div><br>
    <div class="flex justify-center">
        <section class="text-white w-1/5 bg-EerieBlack p-6 rounded-lg" id="pricing">
            <h2 class="flex justify-center text-xl text-white uppercase">Trend 2022</h2>
            <p class="flex justify-center">the newest for 2022</p>
        </section>
    </div>
    <br><br>
    
    <x-home-trending-games/>
@endsection
