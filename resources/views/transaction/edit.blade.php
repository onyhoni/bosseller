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

                @if (Session::get('error'))
                    <div class="flex p-4 mb-10 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800 "
                        role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            {{ Session::get('error') }}
                        </div>
                    </div>
                @endif

                <h1 class="mb-5 text-2xl font-medium">Edit | Transcation</h1>
                <p class="text-abu">Record all package traffic activity</p>
                <p class="text-abu mb-5">properly and easily</p>
                <form action="{{ route('transaction.update') }}" method="post" autocomplete="off">
                    @csrf
                    @method('patch')
                    <div class="grid lg:grid-cols-5 gap-6">
                        <div class="lg:col-span-3">
                            <input type="hidden" name="old_qty" value="{{ $transaction->qty }}">
                            <input type="hidden" name="old_type" value="{{ $transaction->type }}">
                            <input type="hidden" name="id" value="{{ $transaction->id }}">
                            <div class="mb-5">
                                <label for="first_name" class="text-abu mb-3 block">Invoice</label>
                                <input type="text" id="invoice" name="invoice"
                                    value="{{ old('invoice') ? old('invoice') : $transaction->invoice }}"
                                    class="border-blues focus:border-blues focus:ring-blues block w-full rounded-lg border p-2.5 text-sm text-gray-900 outline-blue-4   00"
                                    placeholder="INV0001" />
                                @error('invoice')
                                    <p class="text-reds mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="platform" class="text-abu mb-3 block">Platform</label>
                                <select id="platform" name="platform"
                                    class="border-blues focus:border-blues focus:ring-blues text-abu block w-full rounded-lg border p-2.5 text-sm outline-blue-400">
                                    <option selected value="">Platrform</option>
                                    <option {{ $transaction->platform == 'Shopee' ? 'selected' : '' }} value="Shopee">Shopee
                                    </option>
                                    <option {{ $transaction->platform == 'Lazada' ? 'selected' : '' }} value="Lazada">Lazada
                                    </option>
                                    <option {{ $transaction->platform == 'Tokopedia' ? 'selected' : '' }}
                                        value="Tokopedia">
                                        Tokopedia
                                    </option>
                                </select>
                                @error('platform')
                                    <p class="text-reds mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <div class="grid grid-cols-2 gap-x-5">
                                    <div>
                                        <label for="expedisi" class="text-abu mb-3 block">Expedisi</label>
                                        <input type="text" id="expedisi" name="expedisi"
                                            value="{{ old('expedisi') ? old('expedisi') : $transaction->expedisi }}"
                                            class="border-blues focus:border-blues focus:ring-blues block w-full rounded-lg border p-2.5 text-sm text-gray-900 outline-blue-400"
                                            placeholder="JNE" />
                                        @error('expedisi')
                                            <p class="text-reds mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="airwaybill" class="text-abu mb-3 block">Airwaybill</label>
                                        <input type="text" id="airwaybill" name="airwaybill"
                                            value="{{ old('airwaybill') ? old('airwaybill') : $transaction->airwaybill }}"
                                            class="border-blues focus:border-blues focus:ring-blues block w-full rounded-lg border p-2.5 text-sm text-gray-900 outline-blue-400"
                                            placeholder="RT00192" />
                                        @error('airwaybill')
                                            <p class="text-reds mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5">
                                <label for="consignee" class="text-abu mb-3 block">Consignee</label>
                                <input type="text" id="consignee" name="consignee"
                                    value="{{ old('consignee') ? old('consignee') : $transaction->consignee }}"
                                    class="border-blues focus:border-blues focus:ring-blues block w-full rounded-lg border p-2.5 text-sm text-gray-900 outline-blue-400"
                                    placeholder="Mariam F" />
                                @error('consignee')
                                    <p class="text-reds mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="send" class="text-abu mb-3 block">Date Send</label>
                                <input type="date" id="send" name="send"
                                    value="{{ old('send') ? old('send') : $transaction->send }}"
                                    class="border-blues focus:border-blues focus:ring-blues text-abu block w-full rounded-lg border p-2.5 text-sm outline-blue-400" />
                                @error('send')
                                    <p class="text-reds mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="lg:col-span-2">
                            <div class="mb-5">
                                <label for="package" class="text-abu mb-3 block">Package</label>
                                <select id="package" name="package_id"
                                    class="border-blues select-2
                                    focus:border-blues focus:ring-blues text-abu block w-full rounded-lg border p-2.5
                                    text-sm outline-blue-400">
                                    <option selected value="">Package</option>
                                    @foreach ($packages as $package)
                                        <option {{ $transaction->package_id == $package->id ? 'selected' : '' }}
                                            value="{{ $package->id }}">
                                            {{ $package->name . ' Size ' . $package->size . ' Color ' . $package->color }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('package_id')
                                    <p class="text-reds mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label for="type" class="text-abu mb-3 block">Type</label>
                                <select id="type" name="type"
                                    class="border-blues focus:border-blues focus:ring-blues text-abu block w-full rounded-lg border p-2.5 text-sm outline-blue-400">
                                    <option {{ $transaction->type == 'in' ? 'selected' : '' }} value="in">In
                                    </option>
                                    <option {{ $transaction->type == 'out' ? 'selected' : '' }} value="out">Out
                                    </option>
                                </select>
                            </div>
                            <div class="mb-44">
                                <label for="qty" class="text-abu mb-3 block">Qty</label>
                                <input type="text" id="qty" name="qty"
                                    value="{{ old('qty') ? old('qty') : $transaction->qty }}"
                                    class="border-blues focus:border-blues focus:ring-blues block w-full rounded-lg border p-2.5 text-sm text-gray-900 outline-blue-400"
                                    placeholder="100" />
                                @error('qty')
                                    <p class="text-reds mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex justify-center gap-x-5">
                                <a href="{{ route('transaction') }}"
                                    class="bg-reds rounded-md px-2.5 py-2 text-white">Back</a>
                                <button type="submit" class="bg-blues rounded-md px-2.5 py-2">Edit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
