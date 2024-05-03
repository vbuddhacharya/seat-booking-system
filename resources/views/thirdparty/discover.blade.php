@extends('layout.admin', [
    'title' => 'Discover Movies',
])

@section('admin-content')
    <div class="flex justify-end">
        <form action="{{ route('admin.thirdparty.discover') }}" method="get" class="w-full flex">
            @csrf
            <div class="join w-full flex justify-end mb-7">
                <select class="select select-bordered w-full max-w-xs" name="genre">
                    <option disabled selected>None</option>
                    @foreach ($genres as $genre_id=>$genre_name)
                        <option value="{{$genre_id}}">{{$genre_name}}</option>
                    @endforeach
                </select> <button class="btn join-item " type="submit">Search</button>
            </div>
        </form>
    </div>
    <div class="flex w-full flex-wrap justify-between">
        @foreach ($movies['results'] as $movie)
            <div class="card w-1/5 bg-base-100 shadow-xl mx-1 my-2">
                <figure>
                    @if ($movie['poster_path'] == null)
                        <img src="{{ url('storage/images/noimg.png') }}" alt="poster">
                    @else
                        <img src="https://image.tmdb.org/t/p/w342/{{ $movie['poster_path'] }}" alt="poster">
                    @endif
                </figure>
                <div class="card-body py-3 px-2 my-2">
                    <h2 class="card-title text-lg">
                        {{ $movie['title'] }}
                        <div class="badge badge-secondary">Add</div>
                    </h2>
                    <p>{{ $movie['release_date'] }}</p>
                    <div class="card-actions">
                        @foreach ($movie['genre_ids'] as $genre_id)
                            <div class="badge badge-outline">{{ $genres[$genre_id] }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <x-paginate :current="$movies['page']" :pages="$pages" :genreId="$genreId" />
@endsection
