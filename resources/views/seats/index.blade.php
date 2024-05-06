@extends('layout.admin', ['title' => 'Seats'])

@section('admin-content')
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th>Seat Number</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($seats as $seat)
                    <tr>
                        <th>{{$seat->number}}</th>
                        <td>{{$seat->status}}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    {{$seats->links()}}
@endsection
