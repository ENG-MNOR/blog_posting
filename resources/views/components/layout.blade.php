<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resoursed/css/app.css'])

    <title>{{ env('APP_NAME') }}</title>
</head>

<body class="bg-slate-100 text-slate-900">
    <header class="bg-slate-800 shadow-lg">
        <nav class="flex ">
            <a href="{{ route('dashboard') }}" class="nav-link flex-1 text-white py-3 pl-3">Home</a>
            @auth
                <div x-data="{ open: false }" class="relative grid place-items-center pr-5">
                    <button @click="open=!open" @click.outside="open=false" type="button"
                        class="rounded-full overflow-hidden w-8 h-8 mb-1">
                        <img src="https://picsum.photos/200" height="50" width="50" alt="Profile Picture"
                            class="w-full h-full object-cover">
                    </button>
                    <div x-show="open"
                        class="bg-white show-lg absolute top-10 right-2 rounded-lg overflow-hidden font-light">
                        <p class="px-2 text-lg">{{ Auth()->user()->name }}</p>
                        <a href="{{ route('home') }}" class="block hover:bg-slate-100 pl-4 pr-4 py-2 mb-1">Dahboard</a>
                        <a href="{{ route('view') }}" class="block hover:bg-slate-100 pl-4 pr-4 py-2 mb-1">send</a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="block hover:bg-slate-100 pl-4 pr-4 py-2 mb-1">Logout</button>
                        </form>
                    </div>
                </div>
            @endauth

            @guest
                <div class="flex items-center gap-4 text-white pr-4">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                </div>
            @endguest

        </nav>

    </header>
    <main class="py-8 px-4 mx-auto max-w-screen-lg">
        {{ $slot }}
    </main>

</body>

</html>
