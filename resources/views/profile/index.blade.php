@extends('layouts.main')

@section('content')
    <div>
        <form action="{{ route('user') }}" method="get">
            <div class="rouded-xl mb-4 grid grid-cols-5 lg:grid-cols-9 gap-x-5 rounded-lg bg-white px-4 py-3 shadow-xl">
                <div class="col-span-2">
                    <select id="username" name="username"
                        class="select-2 bg-bg block w-full rounded-lg border border-gray-300 p-1.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        <option selected value="">Username</option>
                        @foreach ($values as $val)
                            <option {{ request()->username == $val->username ? 'selected' : '' }}
                                value="{{ $val->username }}">
                                {{ $val->username }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-span-2">
                    <select id="email" name="email"
                        class="select-2 bg-bg block w-full rounded-lg border border-gray-300 p-1.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        <option selected value="">Email</option>
                        @foreach ($values as $val)
                            <option {{ request()->email == $val->email ? 'selected' : '' }} value="{{ $val->email }}">
                                {{ $val->email }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-span-2">
                    <input type="date" id="startDate" name="startTime" value="{{ date('Y-m-d', strtotime('-7 days')) }}"
                        class="border-blues focus:border-blues focus:ring-blues text-abu block w-full rounded-lg border p-2.5
                        text-sm outline-blue-400" />
                </div>

                <div class="col-span-2">
                    <input type="date" id="endDate" name="endTime" value="{{ date('Y-m-d') }}"
                        class="border-blues focus:border-blues focus:ring-blues text-abu block w-full rounded-lg border p-2.5
                        text-sm outline-blue-400" />
                </div>

                <button class="bg-blues flex items-center justify-center rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
            </div>
        </form>

        <div class="h-full rounded-md bg-white">
            @if (Session::get('success'))
                <div class="flex p-4 mb-10 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800 "
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif
            <div class="text-abu flex justify-between px-10 py-4 text-sm">
                <a href="{{ route('register') }}">Created</a>
                <a href="">Download</a>
            </div>


            <div class="px-4">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400 mb-10">
                        <thead class="bg-gray-50 text-xs text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">#</th>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">Username</th>
                                <th scope="col" class="px-6 py-3">Created</th>
                                <th scope="col" class="px-6 py-3">Picture</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                                    <td class="px-6 py-4">
                                        {{ $users->count() * ($users->currentPage() - 1) + $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4">{{ $user->name }}</td>
                                    <td class="px-6 py-4">{{ $user->email }}</td>
                                    <td class="px-6 py-4">{{ $user->username }}</td>
                                    <td class="px-6 py-4">{{ $user->created_at->format('d M , Y H:s') }}</td>
                                    <td class="px-6 py-4">
                                        <a target="_blank" href="{{ asset('storage/' . $user->picture) }}">
                                            <img src="{{ asset('storage/' . $user->picture) }}" alt="Picture"
                                                class="w-32 h-32 rounded-full">
                                        </a>

                                    </td>

                                    <td>
                                        <a href="{{ route('user.edit', $user->id) }}" class="hover:font-bold mr-2">Edit</a>
                                        <form action="{{ route('profile.destroy', $user->id) }}" method="post"
                                            class="inline">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Apakah sudah yakin ?')"
                                                class="text-reds">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
