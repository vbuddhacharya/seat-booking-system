@extends('layout.admin', [
    'title' => 'Edit Seat',
])

@section('admin-content')
    <div class="w-1/2">
        <form action="{{ route('admin.seats.update', [$theatreSession->id, $seat->id]) }}" method="post" class="space-y-2"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form.input label="Seat Number" name="number" value="{{ $seat->number }}" required="true" />
            <x-form.select label="Status" name="status" :options="$statuses" selected="{{ $seat->status->name }}"
                required="true" />
            <button type="submit" class="button w-1/3">Update</button>
        </form>
    </div>
@endsection
