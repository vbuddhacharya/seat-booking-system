@extends('layout.customer')

@section('customer-content')
    <div>
        <form action="{{route('booking.store',$theatreSession->id)}}" method="post">
            @csrf
            <x-form.select label="Seat" name="seat" :options="$seats" required="true"/>
            <x-form.input label="Name" name="name" required="true"/>
            <x-form.input label="Email" name="email" required="true"/>
            <span class="block">Price: {{$ticket}}</span>
            <button class="button">Confirm</button>
        </form>
    </div>
@endsection