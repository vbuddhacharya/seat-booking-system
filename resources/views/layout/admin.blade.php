{{-- <!doctype html>
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
                    <a href="{{ route('admin.movies') }}" @class([
                        'text-purple-600 bg-purple-50' =>
                            request()->fullUrl() === route('admin.movies'),
                        'hover:text-purple-600 hover:bg-purple-50 w-full px-5 py-3 rounded-md flex items-center space-x-5',
                    ])>
                        <x-icon name="film" />
                        <span>Movies</span>
                    </a>
                </li>
                <li class="w-full">
                    <a href="{{ route('admin.theatres') }}" @class([
                        'text-purple-600 bg-purple-50' =>
                            request()->fullUrl() === route('admin.theatres'),
                        'hover:text-purple-600 hover:bg-purple-50 w-full px-5 py-3 rounded-md flex items-center space-x-5',
                    ])>
                        <x-icon name="theatre" />
                        <span>Theatres</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="bg-gray-200 w-4/5 h-screen py-5 px-8">
            <span class="block font-bold text-4xl pt-4 pb-8">Movies</span>
            <div class="overflow-x-auto">
                <table class="table bg-white">
                  <thead>
                    <tr>
                      <th>
                        IMDB ID
                      </th>
                      <th>Title</th>
                      <th>Genre</th>
                      <th>Release Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- row 1 -->
                    <tr>
                      <th>
                        123
                      </th>
                      <td>
                        <div class="flex items-center gap-3">
                          <div class="avatar">
                            <div class="mask mask-squircle w-12 h-12">
                              <img src="{{asset('posters/svt.jpg')}}" alt="Avatar Tailwind CSS Component" />
                            </div>
                          </div>
                          <div>
                            <div class="font-bold">Parasyte</div>
                          </div>
                        </div>
                      </td>
                      <td>
                        Thriller
                      </td>
                      <td>28-04-2024</td>
                      <th>
                        <button class="btn btn-ghost btn-xs">View Sessions</button>
                        <button class="btn btn-ghost btn-xs">New Session</button>
                    </th>
                    </tr>
                    <tr>
                        <th>
                          123
                        </th>
                        <td>
                          <div class="flex items-center gap-3">
                            <div class="avatar">
                              <div class="mask mask-squircle w-12 h-12">
                                <img src="{{asset('posters/svt.jpg')}}" alt="Avatar Tailwind CSS Component" />
                              </div>
                            </div>
                            <div>
                              <div class="font-bold">Parasyte</div>
                            </div>
                          </div>
                        </td>
                        <td>
                          Thriller
                        </td>
                        <td>28-04-2024</td>
                        <th>
                            <button class="btn btn-ghost btn-xs">View Sessions</button>
                            <button class="btn btn-ghost btn-xs">New Session</button>
                          </th>
                      </tr>
                      <tr>
                        <th>
                          123
                        </th>
                        <td>
                          <div class="flex items-center gap-3">
                            <div class="avatar">
                              <div class="mask mask-squircle w-12 h-12">
                                <img src="{{asset('posters/svt.jpg')}}" alt="Avatar Tailwind CSS Component" />
                              </div>
                            </div>
                            <div>
                              <div class="font-bold">Parasyte</div>
                            </div>
                          </div>
                        </td>
                        <td>
                          Thriller
                        </td>
                        <td>28-04-2024</td>
                        <th>
                          <button class="btn btn-ghost btn-xs">View Sessions</button>
                          <button class="btn btn-ghost btn-xs">New Session</button>
                        </th>
                      </tr>
                  </tbody>
                </table>
              </div>
        </div>

    </main>
</body>

</html> --}}


@extends('layout.app')

@section('content')
    <nav>
        <div class="w-full h-16 flex justify-between items-center border border-b-gray-300">
            <span class="block h-full pt-4 font-bold ml-2 text-xl text-purple-500">Tickets!</span>
            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" class="rounded-full h-4/5" />
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
                    <a href="{{ route('admin.movies') }}" @class([
                        'text-purple-600 bg-purple-50' =>
                            request()->fullUrl() === route('admin.movies'),
                        'hover:text-purple-600 hover:bg-purple-50 w-full px-5 py-3 rounded-md flex items-center space-x-5',
                    ])>
                        <x-icon name="film" />
                        <span>Movies</span>
                    </a>
                </li>
                <li class="w-full">
                    <a href="{{ route('admin.theatres') }}" @class([
                        'text-purple-600 bg-purple-50' =>
                            request()->fullUrl() === route('admin.theatres'),
                        'hover:text-purple-600 hover:bg-purple-50 w-full px-5 py-3 rounded-md flex items-center space-x-5',
                    ])>
                        <x-icon name="theatre" />
                        <span>Theatres</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="bg-gray-200 w-4/5 h-screen py-5 px-8">
            <span class="block font-bold text-4xl pt-4 pb-8">{{ $title ?? null }}</span>
            @yield('admin-content')
        </div>
    @endsection
