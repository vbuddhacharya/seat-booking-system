@extends('layout.customer', ['title' => 'Available Movies'])

@section('customer-content')
<div class="flex flex-row flex-wrap justify-between">
    @foreach ($movies as $movie)
        <div class="card card-compact w-3/12 bg-base-100 shadow-xl m-2">
            <figure>
                <img src="{{ url('storage/images/' . $movie->poster) }}">
            </figure>
            <div class="card-body">
                <h2 class="card-title">{{$movie->name}}</h2>
                <p>{{$movie->release_date}}</p>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary">Get Tickets</button>
                </div>
            </div>
        </div>
    @endforeach

</div>

@endsection
