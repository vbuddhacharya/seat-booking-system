@extends('layout.admin', [
    'title' => 'Edit Movie',
])

@section('admin-content')
    <div class="w-1/2">
        @if (session()->has('success'))
            <div role="alert" class="alert">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>{{ session()->get('success') }}
                </span>
            </div>
        @endif
        <form action="{{ route('admin.movies.update', $movie->id) }}" method="post" class="space-y-2"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form.input label="Title" name="name" value="{{ $movie->name }}" required="true" />
            <x-form.input label="Genre" name="genre" value="{{ $movie->genre }}" required="true" />
            <x-form.input label="Release Date" name="release_date" type="date" value="{{ $movie->release_date }}"
                required="true" />
            <x-form.input label="IMDB ID" name="imdb_id" value="{{ $movie->imdb_id }}" required="true" />
            <x-form.input label="Poster" name="poster" type="file" class="file-input file-input-bordered w-full"
                value="{{ $movie->poster }}" />
            <button type="submit" class="button w-1/3">Update</button>
        </form>
    </div>
@endsection
