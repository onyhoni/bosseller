@extends('layouts.main')

@section('content')
    <div>
        <form action="{{ route('packages') }}" method="get">
            <div class="rouded-xl mb-4 grid grid-cols-5 lg:grid-cols-9 gap-x-5 rounded-lg bg-white px-4 py-3 shadow-xl">
                <div class="col-span-2">
                    <select id="platform" name="name"
                        class="select-2 bg-bg block w-full rounded-lg border border-gray-300 p-1.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        <option selected value="">Name</option>
                        @foreach ($values as $val)
                            <option {{ request()->name == $val->slug ? 'selected' : '' }} value="{{ $val->slug }}">
                                {{ $val->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-span-2">
                    <select id="type" name="size"
                        class="select-2 bg-bg block w-full rounded-lg border border-gray-300 p-1.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        <option selected value="">Size</option>
                        @foreach ($values as $val)
                            <option {{ request()->size == $val->size ? 'selected' : '' }} value="{{ $val->size }}">
                                {{ $val->size }}</option>
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
            <div class="text-abu flex justify-between px-10 py-4 text-sm">
                <a href="{{ route('packages.create') }}" class="hover:font-bold">Created</a>
                <a href="/packages/export?name={{ request()->name }}&size={{ request()->size }}&startTime={{ request()->startTime }}&endTime={{ request()->endTime }}"
                    class="hover:font-bold">Download</a>
            </div>
            @if (Session::get('success'))
                <div class="flex px-10 py-4 mb-10 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800 "
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
            <div class="px-4">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400 mb-10">
                        <thead class="bg-gray-50 text-xs text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">#</th>
                                <th scope="col" class="px-6 py-3">Account</th>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Size</th>
                                <th scope="col" class="px-6 py-3">Description</th>
                                <th scope="col" class="px-6 py-3">Stock</th>
                                <th scope="col" class="px-6 py-3">Color</th>
                                <th scope="col" class="px-6 py-3">Created</th>
                                <th scope="col" class="px-6 py-3">Picture</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packages as $package)
                                <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                                    <td class="px-6 py-4">
                                        {{ $packages->count() * ($packages->currentPage() - 1) + $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4">{{ $package->account }}</td>
                                    <td class="px-6 py-4">{{ $package->name }}</td>
                                    <td class="px-6 py-4">{{ $package->size }}</td>
                                    <td class="px-6 py-4">{{ $package->description }}</td>
                                    <td class="px-6 py-4">{{ $package->stock }}</td>
                                    <td class="px-6 py-4">{{ $package->color }}</td>
                                    <td class="px-6 py-4">{{ $package->created_at->format('d M , Y H:m') }}</td>
                                    <td class="px-6 py-4">
                                        <a target="_blank" href="{{ asset('storage/' . $package->picture) }}">
                                            <img src="{{ asset('storage/' . $package->picture) }}" alt="Picture"
                                                class="w-40 h-30 rounded-xl">
                                        </a>

                                    </td>
                                    <td>
                                        <a href="{{ route('packages.edit', $package->id) }}"
                                            class="hover:font-bold mr-2">Edit</a>
                                        <form action="{{ route('packages.delete', $package->id) }}" method="post"
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
                    {{ $packages->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
