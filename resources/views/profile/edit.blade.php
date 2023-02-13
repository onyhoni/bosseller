@extends('layouts.main')

@section('content')
    <div class="flex justify-center items-center min-h-screen">
        <div class="w-3/12 bg-white p-5 rounded-lg">
            <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data" autocomplete="off"
                novalidate>
                @csrf
                @method('patch')
                <input type="hidden" name="oldPicture" value="{{ $user->picture }}">
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ? old('name') : $user->name"
                        required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Username -->
                <div class="mt-4">
                    <x-input-label for="username" :value="__('Username')" />
                    <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username') ? old('username') : $user->username"
                        required />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email') ? old('email') : $user->email"
                        required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                        file</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 image"
                        aria-describedby="file_input_help" id="picture" type="file" name="picture"
                        onchange="PreviewImage()">
                    <p class="my-2 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF
                        (MAX.1024 Kb).</p>
                    <x-input-error :messages="$errors->get('picture')" class="mt-2" />

                </div>

                <div class="mb-3">
                    <img class="img-preview w-full h-60" src="{{ asset('storage/' . $user->picture) }}" alt="Picture">
                </div>


                <div class="flex items-center justify-end mt-4">

                    <x-primary-button class="ml-4">
                        {{ __('Edit') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
@endsection
