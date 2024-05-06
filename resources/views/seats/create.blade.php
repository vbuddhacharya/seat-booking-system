@extends('layout.admin', [
    'title' => 'Create Seat',
])

@section('admin-content')
    <div class="w-1/2">
        <form action="/" method="post" class="space-y-2" enctype="multipart/form-data">
            @csrf
            <x-form.input label="Theatre Session" name="theatreSessionId" required="true" />
            <x-form.input label="Number of Seats" name="seatnums" required="true" type="number" />
            <button type="submit" class="button">Create</button>
        </form>
    </div>
@endsection
