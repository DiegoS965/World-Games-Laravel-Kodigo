@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-EerieBlack p-6 rounded-lg">
            <h1 class="text-3xl text-white text-center">Register videogame</h1>
        </div>
    </div><br>
    <div class="flex justify-center">
        <div class="text-white w-4/12 bg-EerieBlack p-6 rounded-lg">
            <form action="{{ route('videogames.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="titlename" class="sr-only text-slate-100">Title</label>
                    <input type="text" name="title" id="title" placeholder="Title of the game"
                    class="bg-EerieBlackLight border-2 w-full p-4 rounded-lg @error('title')
                        border-red-500
                    @enderror('title')" value="{{ old('title') }}">

                    @error('title')
                        <div class = "text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="sr-only text-slate-100">Description</label>
                    <textarea name="description" id="description" rows="4" placeholder="Description of the videogame"
                    class="bg-EerieBlackLight border-2 w-full p-4 rounded-lg @error('description')
                        border-red-500
                    @enderror('description')" value="{{ old('description') }}"></textarea>

                    @error('description')
                        <div class = "text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="genre_id" class="sr-only text-slate-100">Genre ID</label>
                    <input type="text" name="genre_id" id="genre_id" placeholder="Genre ID of the videogame"
                    class="bg-EerieBlackLight border-2 w-full p-4 rounded-lg @error('genre_id')
                        border-red-500
                    @enderror('genre_id')" value="{{ old('genre_id') }}">

                    @error('genre_id')
                        <div class = "text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="platform_id" class="sr-only text-slate-100">Platform ID</label>
                    <input type="text" name="platform_id" id="platform_id" placeholder="Platform ID of the videogame"
                    class="bg-EerieBlackLight border-2 w-full p-4 rounded-lg @error('platform_id')
                        border-red-500
                    @enderror('platform_id')" value="{{ old('platform_id') }}">

                    @error('platform_id')
                        <div class = "text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="price" class="sr-only text-slate-100">Price</label>
                    <input type="text" name="price" id="price" placeholder="Price of the videogame"
                    class="bg-EerieBlackLight border-2 w-full p-4 rounded-lg @error('price')
                        border-red-500
                    @enderror('price')" value="{{ old('price') }}">

                    @error('price')
                        <div class = "text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="sr-only text-slate-100">Upload image</label>
                    <input type="file" class="form-control" required name="image">
                </div>

                <div>
                    <button type="submit" class="bg-red-900 hover:bg-youtubeRed text-white px-4 py-3 rounded
                    font-medium w-full">Register Videogame</button>
                </div>
            </form>
        </div>
    </div>
@endsection