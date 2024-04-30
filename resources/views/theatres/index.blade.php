@extends('layout.admin', [
    'title' => 'Theatres',
])

@section('admin-content')
    <div class="flex justify-end">
        <a href="{{ route('admin.theatres.create') }}"
            class="border text-gray-100 border-purple-400 rounded-lg p-2 mb-2 bg-primary">Create Theatre</a>
    </div>

    <div class="overflow-x-auto">
        <table class="table bg-white">
            <thead>
                <tr>
                    <th>
                        Theatre Name
                    </th>
                    <th>Capacity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($theatres as $theatre)
                    <tr>
                        <th>
                            {{ $theatre->name }}
                        </th>
                        <td>
                            {{ $theatre->capacity }}
                        </td>
                        <th>
                            <form action="{{ route('admin.theatres.edit', $theatre->id) }}" method="get">
                                <button class="btn btn-ghost btn-xs">Edit</button>
                            </form>
                            <form action="{{ route('admin.theatres.destroy', $theatre->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-ghost btn-xs" onclick="return beforeDelete()">Delete</button>
                            </form>
                        </th>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <script>
        function beforeDelete() {
            return confirm('Are you sure you want to delete?');
        }
    </script>
@endsection
