@extends('layout.admin')

@section('admin-content')
    <div class="card lg:card-side bg-base-100 shadow-xl">
        <figure class="flex-none">
            <img src="https://image.tmdb.org/t/p/w342/{{ $movieDetails['poster_path'] }}" alt="poster" class="h-full w-auto">
        </figure>
        <div class="card-body w-2/3">
            <h2 class="card-title">{{$movieDetails['title']}}
                ({{$movieDetails['year']}})</h2>
            <div class="flex justify-between">
                <div>
                    {{$movieDetails['release_date']}} |
                    @foreach ($movieDetails['genres'] as $genre)
                        {{$genre['name']}}@if (!$loop->last),@endif
                    @endforeach
    
                </div>
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
                      </svg>
                      @php
                          $trailer = $movieDetails['videos']['results'][0]['key'];
                      @endphp
                    <a href="https://www.youtube.com/watch?v={{$trailer}}">Clip</a>
                </div>
            </div>
            
            <div>
                <p class="mt-2">{{$movieDetails['overview']}}</p>
            </div>
            <div class="card-actions justify-end">
                <form action="{{route('admin.thirdparty.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value = {{$movieDetails['id']}}>
                    <button class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
