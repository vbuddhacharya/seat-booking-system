@extends('layout.admin', [
    'title' => 'Movies',
])

@section('admin-content')
    @if (session()->has('deleted'))
        <div role="alert" class="alert mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>{{ session()->get('deleted') }}
            </span>
        </div>
    @endif
    <div class="flex justify-end">
        <a href="{{ route('admin.movies.create') }}"
            class="border text-gray-100 border-purple-400 rounded-lg p-2 mb-2 bg-primary">Create Movie</a>
    </div>

    <div class="overflow-x-auto">
        <table class="table bg-white">
            <thead>
                <tr>
                    <th>
                        IMDB ID
                    </th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Release Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <th>
                            {{ $movie->imdb_id }}
                        </th>
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                        <img src="{{ url('storage/images/' . $movie->poster) }}"
                                            alt="Avatar Tailwind CSS Component" />
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">{{ $movie->name }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ $movie->genre }}
                        </td>
                        <td>{{ $movie->release_date }}</td>
                        <th>
                            <form action="{{ route('admin.movies.edit', $movie->id) }}" method="get">
                                <button class="btn btn-ghost btn-xs">Edit</button>
                            </form>
                            <form action="{{ route('admin.movies.delete', $movie->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-ghost btn-xs" onclick="beforeDelete()">Delete</button>
                            </form>
                        </th>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <script>
        function beforeDelete() {
            confirm('Are you sure you want to delete?');
        }
    </script>
@endsection
