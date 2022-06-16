@extends('layouts.app')

@section('content')
    @auth  
    <div class="flex justify-center">
        <div class="w-4/12 bg-EerieBlack p-6 rounded-lg">
            <h1 class="text-3xl text-white text-center">Update videogame</h1>
        </div>
    </div><br>
        <div class="flex justify-center">
            <div class="text-white w-4/12 bg-EerieBlack p-6 rounded-lg">
                <form action="{{ route('videogames.update',$videogame) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="title" class="sr-only text-slate-100">Title</label>
                        <input type="text" name="title" id="title"
                        class="bg-EerieBlackLight border-2 w-full p-4 rounded-lg @error('title')
                            border-red-500
                        @enderror('title')" value="{{ $videogame->title }}">
    
                        @error('title')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="sr-only text-slate-100">Description</label>
                        <textarea name="description" id="description" rows="4"
                        class="bg-EerieBlackLight border-2 w-full p-4 rounded-lg @error('description')
                            border-red-500
                        @enderror('description')">{{ $videogame->description }}</textarea>

                        @error('description')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="genre_id" class="sr-only text-slate-100">Genre ID</label>
                        <input type="text" name="genre_id" id="genre_id"
                        class="bg-EerieBlackLight border-2 w-full p-4 rounded-lg @error('genre_id')
                            border-red-500
                        @enderror('genre_id')" value="{{ $videogame->genre_id }}">
    
                        @error('genre_id')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="platform_id" class="sr-only text-slate-100">Platform</label>
                        <input type="text" name="platform_id" id="platform_id" 
                        class="bg-EerieBlackLight border-2 w-full p-4 rounded-lg @error('platform_id')
                            border-red-500
                        @enderror('platform_id')" value="{{ $videogame->platform_id }}">
    
                        @error('platform_id')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="price" class="sr-only text-slate-100">Price</label>
                        <input type="text" name="price" id="price"
                        class="bg-EerieBlackLight border-2 w-full p-4 rounded-lg @error('price')
                            border-red-500
                        @enderror('price')" value="{{$videogame->price}}">

                        @error('price')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    
                    <div>
                        <button type="submit" class="bg-red-900 hover:bg-youtubeRed text-white px-4 py-3 rounded
                        font-medium w-full">Update Videogame</button>
                    </div>
                </form>
            </div>
        </div>
    @endauth
@endsection