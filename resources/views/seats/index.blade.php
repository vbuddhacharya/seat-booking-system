@extends('layout.admin', ['title' => 'Seats'])

@section('admin-content')
    <div class="flex px-2 mb-2 space-x-2 font-semibold">
        <span>Available: {{ $available }}
        </span>
        <span>Booked: {{ $booked }}</span>
    </div>
    <div class="overflow-x-auto">
        <table class="table bg-white">
            <thead>
                <tr>
                    <th>Seat Number</th>
                    <th>Status</th>
                    <th>Ticket Holder</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($seats as $seat)
                    <tr>
                        <th>{{ $seat->number }}</th>
                        <td>{{ $seat->status->getLabel() }}</td>
                        <td>
                            @if ($seat->status == App\Enums\SeatStatus::BOOKED)
                                {{ $seat->ticket->user_name }}
                            @endif
                        </td>
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
