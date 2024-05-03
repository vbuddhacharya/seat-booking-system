@extends('layout.admin', [
    'title' => 'Create Theatre',
])

@section('admin-content')
    <div class="w-1/2">
        <form action="{{ route('admin.theatres.store') }}" method="post" class="space-y-2" enctype="multipart/form-data">
            @csrf
            <x-form.input label="Name" name="name" required="true" />
            <x-form.input label="Capacity" name="capacity" required="true" type="number" />
            <button type="submit" class="button">Create</button>
        </form>
    </div>
@endsection
