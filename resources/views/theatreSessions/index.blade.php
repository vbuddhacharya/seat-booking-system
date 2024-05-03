@extends('layout.admin', [
    'title' => 'Theatre Sessions',
])

@section('admin-content')
    <div class="flex justify-end">
        <a href="{{ route('admin.theatres.create') }}"
            class="border text-gray-100 border-purple-400 rounded-lg p-2 mb-2 bg-primary">Create Theatre Session</a>
    </div>

    <div class="overflow-x-auto">
        <table class="table bg-white">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Movie Name</th>
                    <th>Theatre Name</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($theatreSessions as $session)
                    <tr>
                        <th>
                            {{ $session->date }}
                        </th>
                        <td>
                            {{ $session->movie->name }}
                        </td>
                        <td>
                            {{ $session->theatre->name }}
                        </td>
                        <td>
                            {{ $session->start_time }}
                        </td>
                        <td>
                            {{ $session->end_time }}
                        </td>
                        <td> {{ $session->status }}
                        </td>
                        <th>
                            <form action="/" method="get">
                                <button class="btn btn-ghost btn-xs">Edit</button>
                            </form>
                            <form action="/" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-ghost btn-xs" onclick="return beforeDelete()">Delete</button>
                            </form>
                        </th>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="mt-3">
            {{ $theatreSessions->links() }}

        </div>
    </div>
    <script>
        function beforeDelete() {
            return confirm('Are you sure you want to delete?');
        }
    </script>
@endsection
