@extends('layout.customer', [
    'title' => 'Movie Details',
])

@section('customer-content')
    <div>
        <div class="card lg:card-side bg-base-100 shadow-xl">
            <figure class=" w-2/5"> <img src="{{ url('storage/images/' . $movie->poster) }}" class="h-auto">
            </figure>
            <div class="card-body">
                <h2 class="card-title">{{ $movie->name }}</h2>
                <div>
                    <span>{{ $movie->release_date }}</span>
                    <span class="badge badge-neutral">{{ $movie->genre }}</span>
                </div>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary">Listen</button>
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
                    @foreach ($theatreSessions as $theatreSession)
                        @if ($theatreSession->available > 0)
                            <tr>
                                <th>{{ $theatreSession->date }}</th>
                                <td>{{ $theatreSession->theatre->name }}</td>
                                <td>{{ $theatreSession->start_time }} to {{ $theatreSession->end_time }}</td>
                                <td>{{ $theatreSession->seats->count() }}</td>
                                <td>
                                    <form action="/">

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
