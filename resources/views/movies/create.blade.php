@extends('layout.admin', [
    'title' => 'Create Movie',
])

@section('admin-content')
    <div class="w-1/2 m-auto">
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
        <form action="{{ route('admin.storemovie') }}" method="post" class="space-y-2" enctype="multipart/form-data">
            @csrf
            <x-form.input label="Title" name="name" required="true" />
            <x-form.input label="Genre" name="genre" required="true" />
            <x-form.input label="Release Date" name="release_date" type="date" required="true"/>
            <x-form.input label="IMDB ID" name="imdb_id" required="true" />
            <x-form.input label="Poster" name="poster" type="file" class="file-input file-input-bordered w-full" />
            <button type="submit" class="button">Create</button>
        </form>
    </div>
@endsection
