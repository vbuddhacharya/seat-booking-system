@extends('layout.admin', [
    'title' => 'TMDB Movies',
])

@section('admin-content')
    <div class="flex justify-center">
        <form action="{{ route('admin.thirdparty.index') }}" method="get" class="w-full flex">
            @csrf
            <div class="join w-full flex justify-center mb-7">
                <input class="input input-bordered join-item w-10/12" placeholder="Movie Name" name="movie"
                    value="{{ $movieName }}" />
                <button class="btn join-item " type="submit">Search</button>
            </div>
        </form>
    </div>
    <div class="flex justify-center mb-3">
        <a href="{{ route('admin.thirdparty.discover') }}"
            class=" bg-primary text-primary-content p-3 rounded-md">Discover</a>
    </div>
    @if (!empty($movies['results']))
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
                        <a href="{{ route('admin.thirdparty.show', ['movie' => $movie['id']]) }}">

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
                        </a>

                    </div>
                </div>
            @endforeach
        </div>
        <x-paginate :current="$movies['page']" :pages="$pages" :genreId="$genreId" :movieName="$movieName" />
    @endif

@endsection
