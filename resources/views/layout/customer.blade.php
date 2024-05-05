@extends('layout.app')

@section('content')
    <nav>
        <div class="w-full h-16 flex justify-between items-center border border-b-gray-300">
            <span class="block h-full pt-4 font-bold ml-2 text-xl text-purple-500">Tickets!</span>
            {{-- <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" class="rounded-full h-4/5" /> --}}
        </div>
    </nav>
    <div class="bg-gray-200 w-full h-screen py-5 px-8">
        <span class="block font-bold text-4xl pt-4 pb-8">{{ $title ?? null }}</span>
        <x-notification />
        @yield('customer-content')
    </div>
@endsection
