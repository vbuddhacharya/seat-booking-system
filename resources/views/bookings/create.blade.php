@extends('layout.customer', ['title' => 'Book a Seat'])

@section('customer-content')
    <div class=" w-2/4 px-3">
        <form action="{{ route('booking.store', $theatreSession->id) }}" method="post">
            @csrf
            <x-form.select label="Seat" name="seat_id" :options="$seats" required="true" />
            <x-form.input label="Name" name="user_name" required="true" />
            <x-form.input label="Email" name="email" required="true" />
            <span class="block">Price: {{ $ticket }}</span>
            <button class="button">Confirm</button>
        </form>
    </div>
@endsection
