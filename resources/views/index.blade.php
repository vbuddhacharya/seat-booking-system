@extends('layout.customer', ['title' => 'Available Movies'])

@section('customer-content')
    <div class="flex flex-row flex-wrap justify-center">
        @foreach ($theatreSessions as $session)
            <div class="card card-compact w-1/5 bg-base-100 shadow-xl mx-4 my-2">
                <figure>
                    <img src="{{$session->movie->poster }}">
                </figure>
                <div class="card-body">
                    <h2 class="card-title">{{ $session->movie->name }}</h2>
                    <p>{{ $session->movie->release_date }}</p>
                    <div class="card-actions justify-end">
                        <form action="{{ route('movies.show', $session->movie->id) }}" method="get">
                            <button class="btn btn-primary">Get Tickets</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
