@extends('layout.customer', ['title' => 'Ticket Details'])

@section('customer-content')
    <div class="flex flex-col bg-white h-36 justify-center text-center">
        <h1 class=" font-bold text-xl">Ticket Code {{ $ticket->code }}</h1>
        <p class="font-semibold">Your ticket has been booked! Please check your email for ticket details.</p>
    </div>
@endsection
