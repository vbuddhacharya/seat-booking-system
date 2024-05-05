@extends('layout.app')

@section('content')
    <nav>
        <div class="w-full h-16 flex justify-between items-center border border-b-gray-300">
            <span class="block h-full pt-4 font-bold ml-2 text-xl text-purple-500">Tickets!</span>
            {{-- <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" class="rounded-full h-4/5" /> --}}
        </div>
    </nav>
    @yield('customer-content')
@endsection
