@extends('layout.app')

@section('content')
    <nav>
        <div class="w-full h-16 flex justify-between items-center border border-b-gray-300">
            <span class="block h-full pt-4 font-bold ml-2 text-xl text-purple-500">Tickets!</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="h-4/5">
                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                        class="rounded-full h-4/5 self-center" />
                </button>
            </form>
        </div>
    </nav>
    <main class="flex">
        <div class=" w-1/5 h-full text-left p-2 space-y-4">
            <ul>
                <li class="w-full">
                    <a href="{{ route('admin.dashboard') }}" @class([
                        'text-purple-600 bg-purple-50' =>
                            request()->fullUrl() === route('admin.dashboard'),
                        'hover:text-purple-600 hover:bg-purple-50 w-full px-5 py-3 rounded-md flex items-center space-x-5',
                    ])>
                        <x-icon name="home" />
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="w-full">
                    <a href="{{ route('admin.movies.index') }}" @class([
                        'text-purple-600 bg-purple-50' =>
                            request()->is('admin/movies/*') || request()->is('admin/movies'),
                        'hover:text-purple-600 hover:bg-purple-50 w-full px-5 py-3 rounded-md flex items-center space-x-5',
                    ])>
                        <x-icon name="film" />
                        <span>Movies</span>
                    </a>
                </li>
                <li class="w-full">
                    <a href="{{ route('admin.theatres.index') }}" @class([
                        'text-purple-600 bg-purple-50' =>
                            request()->is('admin/theatres/*') || request()->is('admin/theatres'),
                        'hover:text-purple-600 hover:bg-purple-50 w-full px-5 py-3 rounded-md flex items-center space-x-5',
                    ])>
                        <x-icon name="theatre" />
                        <span>Theatres</span>
                    </a>
                </li>
                <li class="w-full">
                    <a href="{{ route('admin.theatre-sessions.index') }}" @class([
                        'text-purple-600 bg-purple-50' =>
                            request()->is('admin/theatre-sessions/*') || request()->is('admin/theatre-sessions'),
                        'hover:text-purple-600 hover:bg-purple-50 w-full px-5 py-3 rounded-md flex items-center space-x-5',
                    ])>
                        <x-icon name="theatreSession" />
                        <span>Theatre Sessions</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="bg-gray-200 w-4/5 h-screen py-5 px-8">
            <span class="block font-bold text-4xl pt-4 pb-8">{{ $title ?? null }}</span>
            <x-notification />
            @yield('admin-content')
        </div>
    @endsection
