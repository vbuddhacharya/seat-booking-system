@extends('layout.app')

@section('content')
    <nav>
        <div class="w-full h-16 flex justify-between items-center border border-b-gray-300">
            <span class="block h-full pt-4 font-bold ml-2 text-xl text-purple-500">Tickets!</span>
            {{-- <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" class="rounded-full h-4/5" /> --}}
        </div>
    </nav>
    <main class="flex">
        <div class=" w-1/5 h-full text-left p-2 space-y-4">
            <ul>
                <li class="w-full">
                    <a href="/" @class([
                        'text-purple-600 bg-purple-50' =>
                            request()->is('movies/*') ||
                            request()->is('movies'),
                        'hover:text-purple-600 hover:bg-purple-50 w-full px-5 py-3 rounded-md flex items-center space-x-5',
                    ])>
                        <x-icon name="home" />
                        <span>Movies</span>
                    </a>
                </li>
                <li class="w-full">
                    <a href="/">
                        <x-icon name="film" />
                        <span>My Tickets</span>
                    </a>
                </li>
                <li class="w-full">
                    <a href="/">
                        <x-icon name="theatre" />
                        <span>My Profile</span>
                    </a>
                </li>


            </ul>
        </div>
        <div class="bg-gray-200 w-4/5 h-screen py-5 px-8">
            <span class="block font-bold text-4xl pt-4 pb-8">{{ $title ?? null }}</span>
            <x-notification />
            @yield('customer-content')
        </div>
@endsection
