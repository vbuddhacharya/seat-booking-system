@extends('layout.admin', [
    'title' => 'Edit Theatre',
])

@section('admin-content')
    <div class="w-1/2">
        <form action="{{ route('admin.theatres.update', $theatre->id) }}" method="post" class="space-y-2"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form.input label="Name" name="name" value="{{ $theatre->name }}" required="true" />
            <x-form.input label="Capacity" name="capacity" value="{{ $theatre->capacity }}" required="true" />
            <button type="submit" class="button w-1/3">Update</button>
        </form>
    </div>
@endsection
