@extends('layouts.main')

@section('content')
    <div>
        <div class="h-full rounded-md">
            <div class="rounded-xl bg-white p-5">
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
                <h1 class="mb-5 text-2xl font-medium">Packages</h1>
                <p class="text-abu">Record all your product to make it</p>
                <p class="text-abu mb-5"><span class="font-semibold text-black">easier</span> to find</p>

                <form action="{{ route('packages.store') }}" method="post" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="grid lg:grid-cols-2 gap-6">
                        <div>
                            <div class="mb-5">
                                <label for="name" class="text-abu mb-3 block">Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                    class="border-blues focus:border-blues focus:ring-blues block w-full rounded-lg border p-2.5 text-sm text-gray-900 outline-blue-400"
                                    placeholder="" />
                                @error('name')
                                    <div class="text-reds mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label for="description" class="text-abu mb-3 block">Description</label>
                                <textarea id="description" rows="6" name="description"
                                    class="border-blues focus:border-blues focus:ring-blues block w-full rounded-lg border p-2.5 text-sm text-gray-900 outline-blue-400">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-reds mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="grid grid-cols-2 gap-x-5">
                                <div class="mb-5">
                                    <label for="size" class="text-abu mb-3 block">Size</label>
                                    <input type="text" id="size" name="size" value="{{ old('size') }}"
                                        class="border-blues focus:border-blues focus:ring-blues block w-full rounded-lg border p-2.5 text-sm text-gray-900 outline-blue-400"
                                        placeholder="" />
                                    @error('size')
                                        <div class="text-reds mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <label for="color" class="text-abu mb-3 block">Color</label>
                                    <input type="text" id="color" name="color" value="{{ old('color') }}"
                                        class="border-blues focus:border-blues focus:ring-blues block w-full rounded-lg border p-2.5 text-sm text-gray-900 outline-blue-400"
                                        placeholder="" />
                                    @error('color')
                                        <div class="text-reds mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="package" class="text-abu mb-3 block">Account</label>
                                <input type="text" id="account" name="account" value="{{ old('account') }}"
                                    class="border-blues focus:border-blues focus:ring-blues block w-full rounded-lg border p-2.5 text-sm text-gray-900 outline-blue-400"
                                    placeholder="" />
                                @error('account')
                                    <div class="text-reds mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="box_number" class="text-abu mb-3 block">Number Box</label>
                                <input type="text" id="box_number" name="box_number" value="{{ old('box_number') }}"
                                    class="border-blues focus:border-blues focus:ring-blues block w-full rounded-lg border p-2.5 text-sm text-gray-900 outline-blue-400"
                                    placeholder="" />
                                @error('box_number')
                                    <div class="text-reds mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-10">
                                <label for="size" class="text-abu mb-3 block">Picture</label>
                                <div class="mt-4">
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-blues rounded-lg cursor-pointer  dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 image"
                                        aria-describedby="file_input_help" id="picture" type="file" name="picture"
                                        onchange="PreviewImage()">
                                    <p class="my-2 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG,
                                        PNG,
                                        JPG or GIF
                                        (MAX.1024 Kb).</p>
                                    <x-input-error :messages="$errors->get('picture')" class="mt-2" />
                                </div>

                                <div class="mb-3">
                                    <img class="img-preview lg:w-1/2 w-full h-60">
                                </div>
                            </div>

                            <div class="flex justify-end gap-x-5">
                                <a href="{{ route('packages') }}"
                                    class="bg-reds rounded-md px-2.5 py-2 text-white">Back</a>
                                <button type="submit" class="bg-blues rounded-md px-2.5 py-2">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
