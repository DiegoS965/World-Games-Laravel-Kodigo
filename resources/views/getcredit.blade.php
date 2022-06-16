@extends('layouts.app')

@section('content')
    @auth
        <div class="flex justify-center">
            <div class="w-4/12 bg-EerieBlack p-6 rounded-lg">
                <h1 class="text-3xl text-white text-center">Purchanse Credits</h1>
            </div>
        </div><br>
        <div class="flex justify-center">
            <div class="w-4/12 bg-EerieBlack p-6 rounded-lg text-white">
                <form action="{{ route('credit.update',$user) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <h4 class="text-xl text-slate-100">Get credits to buy videogames</h4><br>
                        <label for="userCredit" class="text-white">Max cuantity is 9999 credits</label>
                        <input type="number" name="userCredit" id="userCredit" placeholder="Amount of credits"
                        class="bg-EerieBlackLight border-2 w-full p-4 rounded-lg @error('userCredit')
                            border-red-500
                        @enderror('userCredit')">

                        @error('userCredit')
                            <div class = "text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="bg-red-900 text-white px-4 py-3 rounded
                        font-medium w-full">Buy credits</button>
                    </div>
                </form>
            </div>
        </div>
    @endauth
@endsection
