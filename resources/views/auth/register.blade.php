@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-EerieBlack p-6 rounded-lg">
            <h1 class="text-3xl text-white text-center">Register</h1>
        </div>
    </div><br>
    <div class="flex justify-center">
        <div class="text-white w-4/12 bg-EerieBlack p-6 rounded-lg">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only text-slate-100">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your name"
                    class="bg-EerieBlackLight border-2 w-full p-4 rounded-lg @error('name')
                        border-red-500
                    @enderror('name')" value="{{ old('name') }}">

                    @error('name')
                        <div class = "text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="sr-only text-slate-100">Username</label>
                    <input type="text" name="username" id="username" placeholder="Your username"
                    class="bg-EerieBlackLight border-2 w-full p-4 rounded-lg @error('username')
                        border-red-500
                    @enderror('name')" value="{{ old('username') }}">

                    @error('username')
                        <div class = "text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="sr-only text-slate-100">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your email"
                    class="bg-EerieBlackLight border-2 w-full p-4 rounded-lg @error('email')
                        border-red-500
                    @enderror('email')" value="{{ old('email') }}">

                    @error('email')
                        <div class = "text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only text-slate-100">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose a password"
                    class="bg-EerieBlackLight border-2 w-full p-4 rounded-lg @error('password')
                        border-red-500
                    @enderror('password')" value="">

                    @error('password')
                        <div class = "text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only text-slate-100">Password confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password"
                    class="bg-EerieBlackLight border-2 w-full p-4 rounded-lg @error('password_confirmation')
                        border-red-500
                    @enderror('password_confirmation')" value="">

                    @error('password_confirmation')
                        <div class = "text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-red-900 hover:bg-youtubeRed text-white px-4 py-3 rounded
                    font-medium w-full">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection