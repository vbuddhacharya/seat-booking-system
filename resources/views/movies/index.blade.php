{{-- @extends('layout.admin')

@section('content')
    <div class="bg-gray-200 w-4/5 h-screen py-5 px-8">
        <span class="block font-bold text-4xl pt-4 pb-8">Movies</span>
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
                <!-- row 1 -->
                <tr>
                  <th>
                    123
                  </th>
                  <td>
                    <div class="flex items-center gap-3">
                      <div class="avatar">
                        <div class="mask mask-squircle w-12 h-12">
                          <img src="{{asset('posters/svt.jpg')}}" alt="Avatar Tailwind CSS Component" />
                        </div>
                      </div>
                      <div>
                        <div class="font-bold">Parasyte</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    Thriller
                  </td>
                  <td>28-04-2024</td>
                  <th>
                    <button class="btn btn-ghost btn-xs">View Sessions</button>
                    <button class="btn btn-ghost btn-xs">New Session</button>
                </th>
                </tr>
                <tr>
                    <th>
                      123
                    </th>
                    <td>
                      <div class="flex items-center gap-3">
                        <div class="avatar">
                          <div class="mask mask-squircle w-12 h-12">
                            <img src="{{asset('posters/svt.jpg')}}" alt="Avatar Tailwind CSS Component" />
                          </div>
                        </div>
                        <div>
                          <div class="font-bold">Parasyte</div>
                        </div>
                      </div>
                    </td>
                    <td>
                      Thriller
                    </td>
                    <td>28-04-2024</td>
                    <th>
                        <button class="btn btn-ghost btn-xs">View Sessions</button>
                        <button class="btn btn-ghost btn-xs">New Session</button>
                      </th>
                  </tr>
                  <tr>
                    <th>
                      123
                    </th>
                    <td>
                      <div class="flex items-center gap-3">
                        <div class="avatar">
                          <div class="mask mask-squircle w-12 h-12">
                            <img src="{{asset('posters/svt.jpg')}}" alt="Avatar Tailwind CSS Component" />
                          </div>
                        </div>
                        <div>
                          <div class="font-bold">Parasyte</div>
                        </div>
                      </div>
                    </td>
                    <td>
                      Thriller
                    </td>
                    <td>28-04-2024</td>
                    <th>
                      <button class="btn btn-ghost btn-xs">View Sessions</button>
                      <button class="btn btn-ghost btn-xs">New Session</button>
                    </th>
                  </tr>
              </tbody>
            </table>
          </div>
    </div>
@endsection --}}


@extends('layout.admin', [
    'title' => 'Movies',
])

@section('admin-content')
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
                <!-- row 1 -->
                <tr>
                    <th>
                        123
                    </th>
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="avatar">
                                <div class="mask mask-squircle w-12 h-12">
                                    <img src="{{ asset('posters/svt.jpg') }}" alt="Avatar Tailwind CSS Component" />
                                </div>
                            </div>
                            <div>
                                <div class="font-bold">Parasyte</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        Thriller
                    </td>
                    <td>28-04-2024</td>
                    <th>
                        <button class="btn btn-ghost btn-xs">View Sessions</button>
                        <button class="btn btn-ghost btn-xs">New Session</button>
                    </th>
                </tr>
                <tr>
                    <th>
                        123
                    </th>
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="avatar">
                                <div class="mask mask-squircle w-12 h-12">
                                    <img src="{{ asset('posters/svt.jpg') }}" alt="Avatar Tailwind CSS Component" />
                                </div>
                            </div>
                            <div>
                                <div class="font-bold">Parasyte</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        Thriller
                    </td>
                    <td>28-04-2024</td>
                    <th>
                        <button class="btn btn-ghost btn-xs">View Sessions</button>
                        <button class="btn btn-ghost btn-xs">New Session</button>
                    </th>
                </tr>
                <tr>
                    <th>
                        123
                    </th>
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="avatar">
                                <div class="mask mask-squircle w-12 h-12">
                                    <img src="{{ asset('posters/svt.jpg') }}" alt="Avatar Tailwind CSS Component" />
                                </div>
                            </div>
                            <div>
                                <div class="font-bold">Parasyte</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        Thriller
                    </td>
                    <td>28-04-2024</td>
                    <th>
                        <button class="btn btn-ghost btn-xs">View Sessions</button>
                        <button class="btn btn-ghost btn-xs">New Session</button>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
