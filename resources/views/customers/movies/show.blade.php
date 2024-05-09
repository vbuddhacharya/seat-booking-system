@extends('layout.customer', [
    'title' => 'Movie Details',
])

@section('customer-content')
    <div>
        <div class="flex w-1/2 m-auto flex-wrap justify-center align-top">
            <img src="{{ $movie->poster }}" alt="Poster" class=" max-h-80">
            <div class="bg-white flex flex-col p-3 min-w-60">
                <h2 class="card-title">{{ $movie->name }}</h2>
                <div>
                    <span>{{ $movie->release_date }}</span>
                    <span class="badge badge-neutral">{{ $movie->genre }}</span>

                </div>
            </div>
        </div>
        <div class="overflow-x-auto bg-white mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Theatre Name</th>
                        <th>Time</th>
                        <th>Available Seats</th>
                        <th>Book a Seat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movie->theatreSessions as $theatreSession)
                        @if ($theatreSession->seats_count > 0)
                            <tr>
                                <th>{{ $theatreSession->date }}</th>
                                <td>{{ $theatreSession->theatre->name }}</td>
                                <td>{{ $theatreSession->start_time }} to {{ $theatreSession->end_time }}</td>
                                <td>{{ $theatreSession->seats_count }}</td>
                                <td>
                                    <form action="{{ route('booking.create', $theatreSession->id) }}">

                                        <button class="button">Book</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
