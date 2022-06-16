<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>World Games</title>
</head>
<body class = "flex bg-SmokeyBlack flex-col h-screen">
    <main class= "mb-auto">
        <nav class = "p-6 bg-red-900 flex justify-between mb-6 text-slate-100">
            <ul class="flex items-center">
                <li>
                    <a href="/" class="p-3">Home</a>
                </li>
                @auth
                    <li>
                        <a href="{{route('credit.index',auth()->user())}}" class="p-3">Get credit</a>
                    </li>
                    <li>
                        <a href="{{route('videogames.registerIndex')}}" class="p-3">Register a game</a>
                    </li>
                @endauth
                <li>
                    <a href="{{route('videogames.index')}}" class="p-3">Videogames</a>
                </li>
            </ul>

            <ul class="flex items-center">
                @auth
                    <li>
                        <a href="{{route('users.videogames',auth()->user())}}" class="p-3">{{auth()->user()->username}}</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li>
                        <a href="{{ route('login')}}" class="p-3">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register')}}" class="p-3">Register</a>
                    </li>
                @endguest
            </ul>
        </nav>
        @yield('content')
        <br><br>
    </main>
    <footer class=" mb-0 mb-0 p-4 bg-red-900 shadow">
        <span class="text-sm text-slate-100 sm:text-center dark:text-gray-400">© 2022 Group 1 Kodigo. All Rights Reserved.</span>
    </footer>
    <script src="https://unpkg.com/flowbite@1.4.6/dist/flowbite.js"></script>
</body>
</html>