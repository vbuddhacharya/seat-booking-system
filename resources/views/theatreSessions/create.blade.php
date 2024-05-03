@extends('layout.admin', [
    'title' => 'Create Theatre Session',
])

@section('admin-content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="w-1/2">
        <form action="{{ route('admin.theatre-sessions.store') }}" method="post" class="space-y-2"
            enctype="multipart/form-data">
            @csrf
            <x-form.select label="Movie" name="movie_id" :options="$movies" required="true"/>
            <x-form.select label="Theatre" name="theatre_id" :options="$theatres" required="true"/>
            <x-form.input type="date" label="Date" name="date" required="true" />
            <x-form.input type="time" label="From" name="start_time" required="true" />
            <x-form.input type="time" label="To" name="end_time" required="true" />
            <input type="hidden" name="status" value="Upcoming">
            <button type="submit" class="button">Create</button>
        </form>
    </div>
@endsection
