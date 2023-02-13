@extends('layouts.main')

@section('content')
    <div>
        <div class="h-full rounded-md bg-white">
            <div class="grid rounded-xl bg-white p-5 md:grid-cols-2">
                <div class="ml-10">
                    <h1 class="text-2xl mb-5 font-semibold">Detail | Package</h1>
                    <div class="mt-5 grid grid-cols-8 font-medium">
                        <p>Name</p>
                        <p class="text-center">:</p>
                        <p class="col-span-3">{{ $package->name }}</p>
                    </div>
                    <div class="mt-5 grid grid-cols-8 font-medium">
                        <p>Code</p>
                        <p class="text-center">:</p>
                        <p class="col-span-3">{{ $package->account }}</p>
                    </div>
                    <div class="mt-5 grid grid-cols-8 font-medium">
                        <p>Size</p>
                        <p class="text-center">:</p>
                        <p class="col-span-3">{{ $package->size }}</p>
                    </div>
                    <div class="mt-5 grid grid-cols-8">
                        <div class="mt-10 flex gap-x-3">
                            <h1 class="text-reds text-5xl font-semibold">{{ number_format($package->stock, 0, ',', '.') }}
                            </h1>
                            <p class="text-abu">Package</p>
                        </div>
                    </div>
                </div>
                <div class="pt-8 md:px-8 flex justify-center">
                    <img src="{{ asset('storage/' . $package->picture) }}" class="h-52 w-80 rounded-xl" alt="" />
                </div>
            </div>
            <div class="px-4 mt-10">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400 mb-10">
                        <thead class="bg-gray-50 text-xs text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">#</th>
                                <th scope="col" class="px-6 py-3">Invoice</th>
                                <th scope="col" class="px-6 py-3">Type</th>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <th scope="col" class="px-6 py-3">Platfrom</th>
                                <th scope="col" class="px-6 py-3">Name Package</th>
                                <th scope="col" class="px-6 py-3">Color</th>
                                <th scope="col" class="px-6 py-3">Size </th>
                                <th scope="col" class="px-6 py-3">Qty</th>
                                <th scope="col" class="px-6 py-3">Date Send</th>
                                <th scope="col" class="px-6 py-3">Consignee</th>
                                <th scope="col" class="px-6 py-3">Airwaybill</th>
                                <th scope="col" class="px-6 py-3">Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                                    <td class="px-6 py-4">
                                        {{ $transactions->count() * ($transactions->currentPage() - 1) + $loop->iteration }}
                                    </td>
                                    <th scope="row"
                                        class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $transaction->invoice }}</th>
                                    <td class="px-6 py-4">
                                        @if ($transaction->type == 'in')
                                            <div class="rounded-lg bg-green-100 px-3 py-2 text-green-700">
                                                {{ $transaction->type }}</div>
                                        @else
                                            <div class="rounded-lg bg-reds px-3 py-2 text-white font-medium">
                                                {{ $transaction->type }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">{{ $transaction->package->account }}</td>
                                    <td class="px-6 py-4">{{ $transaction->platform }}</td>
                                    <td class="px-6 py-4">
                                        <a
                                            href="/transaction/{{ $transaction->package_id }}">{{ $transaction->package->name }}</a>
                                    </td>
                                    <td class="px-6 py-4">{{ $transaction->package->color }}</td>
                                    <td class="px-6 py-4">{{ $transaction->package->size }}</td>
                                    <td class="px-6 py-4">{{ $transaction->qty }}</td>
                                    <td class="px-6 py-4">{{ $transaction->send }}</td>
                                    <td class="px-6 py-4">{{ $transaction->consignee }}</td>
                                    <td class="px-6 py-4">{{ $transaction->airwaybill }}</td>
                                    <td class="px-6 py-4">{{ $transaction->created_at->format('d M , Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
