@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-EerieBlack p-6 rounded-lg">
            <h1 class="text-3xl text-white text-center">Login</h1>
        </div>
    </div><br>
    <div class="flex justify-center">
        <div class="text-white w-4/12 bg-EerieBlack p-6 rounded-lg">
            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
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
                    <input type="password" name="password" id="password" placeholder="Password"
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
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember" class="text-slate-100">Remember me</label>
                    </div>
                </div>

                <div>
                    <button type="submit" class="bg-red-900 hover:bg-youtubeRed text-white px-4 py-3 rounded
                    font-medium w-full">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection