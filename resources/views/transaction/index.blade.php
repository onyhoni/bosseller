@extends('layouts.main')

@section('content')
    <div>

        <form action="{{ route('transaction') }}" method="get">
            <div class="rouded-xl mb-4 grid grid-cols-5 lg:grid-cols-9 gap-x-5 rounded-lg bg-white px-4 py-3 shadow-xl">
                <div class="col-span-2">
                    <select id="platform" name="platform"
                        class="select-2 bg-bg block w-full rounded-lg border border-gray-300 p-1.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        <option selected value="">Platform</option>
                        <option value="Shopee">Shopee</option>
                        <option value="Lazada">Lazada</option>
                        <option value="Tokopedia">Tokopedia</option>
                    </select>
                </div>

                <div class="col-span-2">
                    <select id="type" name="type"
                        class="select-2 bg-bg block w-full rounded-lg border border-gray-300 p-1.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        <option selected value="">Type</option>
                        <option value="in">In</option>
                        <option value="out">Out</option>
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
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
            </div>
        </form>
        @if (Session::get('success'))
            <div class="flex px-10 py-4 mb-10 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800 "
                role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
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
            <div class="flex px-10 py-4 mb-10 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800 "
                role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
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
        <div class="h-full rounded-md bg-white">
            <div class="text-abu flex justify-between px-10 py-4 text-sm">
                <a href="{{ route('transaction.create') }}" class="hover:font-bold">Created</a>
                <a href="transaction/export?platform={{ request()->platform }}&type={{ request()->type }}&startTime={{ request()->startTime }}&endTime={{ request()->endTime }}"
                    class="hover:font-bold">Download</a>
            </div>

            <div class="px-4">
                <div class="relative overflow-x-auto pb-5">
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
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                                    <td class="px-6 py-4">
                                        {{ ++$i }}
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
                                        <a href="/transaction/{{ $transaction->package_id }}"
                                            class="hover:font-semibold hover:underline hover:decoration-blues">{{ $transaction->package->name }}</a>
                                    </td>
                                    <td class="px-6 py-4">{{ $transaction->package->color }}</td>
                                    <td class="px-6 py-4">{{ $transaction->package->size }}</td>
                                    <td class="px-6 py-4">{{ $transaction->qty }}</td>
                                    <td class="px-6 py-4">{{ $transaction->send }}</td>
                                    <td class="px-6 py-4">{{ $transaction->consignee }}</td>
                                    <td class="px-6 py-4">{{ $transaction->airwaybill }}</td>
                                    <td class="px-6 py-4">{{ $transaction->created_at->format('d M , Y H:i') }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('transaction.edit', $transaction->id) }}"
                                            class="hover:font-bold">Edit</a>
                                        <form action="{{ route('transaction.delete', $transaction->id) }}" method="post"
                                            class="inline">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="qty" value="{{ $transaction->qty }}">
                                            <input type="hidden" name="type" value="{{ $transaction->type }}">
                                            <input type="hidden" name="package_id"
                                                value="{{ $transaction->package_id }}">
                                            <button onclick="return confirm('Apakah sudah yakin ?')"
                                                class="text-reds">Delete</button>
                                        </form>
                                    </td>
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
