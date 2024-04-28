<!doctype html>
<html class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="h-full box-border">
    <nav>
        <div class="w-full h-16 flex justify-between items-center border border-b-gray-300">
            <span class="block h-full pt-4 font-bold ml-2 text-xl text-purple-500">Tickets!</span>
            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" class="rounded-full h-4/5" />
        </div>
    </nav>
    <main class="flex">
        <div class=" w-1/5 h-full">
            <ul>
                <li class="nav-list"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="nav-list"><a href="{{route('admin.movies')}}">Movies</a></li>
                <li class="nav-list"><a href="/">Theatres</a></li>
            </ul>
        </div>
        @yield('content')    
    </main>
</body>

</html>

