@extends('layout.admin', ['title' => 'Seats'])

@section('admin-content')
    <div class="overflow-x-auto">
        <table class="table bg-white">
            <thead>
                <tr>
                    <th>Seat Number</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($seats as $seat)
                    <tr>
                        <th>{{ $seat->number }}</th>
                        <td>{{ $seat->status->getLabel() }}</td>
                        <th>
                            <form action="{{ route('admin.seats.edit', [$seat->theatreSession->id, $seat->id]) }}"
                                method="get">
                                <button class="btn btn-ghost btn-xs">Edit</button>
                            </form>
                        </th>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    {{ $seats->links() }}
@endsection
