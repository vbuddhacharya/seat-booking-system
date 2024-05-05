@extends('layout.admin', [
    'title' => 'Edit Theatre Session',
])

@section('admin-content')
    <div class="w-1/2">
        <form action="{{ route('admin.theatre-sessions.update', $theatreSession->id) }}" method="post" class="space-y-2"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form.select label="Movie" name="movie_id" :options="$movies" required="true"
                selected="{{ $theatreSession->movie_id }}" />
            <x-form.select label="Theatre" name="theatre_id" :options="$theatres" required="true"
                selected="{{ $theatreSession->theatre_id }}" />
            <x-form.input type="date" label="Date" name="date" required="true"
                value="{{ $theatreSession->date }}" />
            <x-form.input type="time" label="From" name="start_time" required="true"
                value="{{ $theatreSession->start_time }}" />
            <x-form.input type="time" label="To" name="end_time" required="true"
                value="{{ $theatreSession->end_time }}" />
            <button type="submit" class="button w-1/3">Update</button>
        </form>
    </div>
@endsection
