@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-EerieBlack p-6 rounded-lg">
            <h1 class="text-3xl text-white text-center">All videogames</h1>
        </div>
    </div><br>
    
    <div class="flex justify-center">
        <div class="w-10/12 bg-EerieBlack p-6 rounded-lg">
            <x-carousel/>
        </div><br>
        <div class="flex justify-center">
            <div class="w-10/12 bg-EerieBlack p-6 rounded-lg">
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
                                <th scope="col" class="px-6 py-3">Sold by</th>
                                <th scope="col" class="px-6 py-3">Posted</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videogames as $videogame)
                                <x-videogame-index-table :videogame="$videogame"/>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    {{$videogames->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection