@extends('layouts.main')

@section('content')
    <div>
        <div class="grid lg:grid-cols-3 gap-5">
            <div class="h-40 w-full rounded-xl bg-white p-5">
                <div class="grid h-full grid-cols-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="text-blue-400 h-20 w-20">
                        <path
                            d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 116 0h3a.75.75 0 00.75-.75V15z" />
                        <path
                            d="M8.25 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0zM15.75 6.75a.75.75 0 00-.75.75v11.25c0 .087.015.17.042.248a3 3 0 015.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 00-3.732-10.104 1.837 1.837 0 00-1.47-.725H15.75z" />
                        <path d="M19.5 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                    </svg>
                    <div class="flex items-end justify-end">
                        <div class="text-end">
                            <p class="text-4xl font-semibold" id="product"></p>
                            <p class="text-abu text-xs">Product</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h-40 w-full rounded-xl bg-white p-5">
                <div class="grid h-full grid-cols-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="text-blue-400 h-20 w-20">
                        <path fill-rule="evenodd"
                            d="M19.5 21a3 3 0 003-3V9a3 3 0 00-3-3h-5.379a.75.75 0 01-.53-.22L11.47 3.66A2.25 2.25 0 009.879 3H4.5a3 3 0 00-3 3v12a3 3 0 003 3h15zm-6.75-10.5a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V10.5z"
                            clip-rule="evenodd" />
                    </svg>

                    <div class="flex items-end justify-end">
                        <div class="text-end">
                            <p class="text-4xl font-semibold" id="inTrans"></p>
                            <p class="text-abu text-xs">In Trans</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h-40 w-full rounded-xl bg-white p-5">
                <div class="grid h-full grid-cols-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="text-blue-400 h-20 w-20">
                        <path fill-rule="evenodd"
                            d="M19.5 21a3 3 0 003-3V9a3 3 0 00-3-3h-5.379a.75.75 0 01-.53-.22L11.47 3.66A2.25 2.25 0 009.879 3H4.5a3 3 0 00-3 3v12a3 3 0 003 3h15zM9 12.75a.75.75 0 000 1.5h6a.75.75 0 000-1.5H9z"
                            clip-rule="evenodd" />
                    </svg>
                    <div class="flex items-end justify-end">
                        <div class="text-end">
                            <p class="text-4xl font-semibold" id="outTrans"></p>
                            <p class="text-abu text-xs">Out Trans</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 grid lg:grid-cols-3 gap-5">
            <div class="lg:col-span-2 w-full">
                <div class="w-full rounded-xl bg-white">
                    <div class="grid h-full p-2">
                        <p class="text-sm">Transcation</p>
                        <div class="w-full h-96">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:col-span-1 rounded-xl bg-white">
                <div class="h-full p-2">
                    <p class="text-sm">Platform</p>
                    <div class="w-full h-96">
                        <canvas id="PlatformChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 grid lg:grid-cols-8 gap-5">
            <div class="lg:col-span-4">
                <div class="h-full w-full rounded-xl bg-white p-2">
                    <div class="grid h-full p-3" id="stockPackage">
                        <p class="text-sm">Stock Package</p>

                    </div>
                </div>
            </div>
            <div class="lg:col-span-2">
                <div class="h-full w-full rounded-xl bg-white p-2">
                    <div class="grid h-full">
                        <p class="text-sm">Down 5 Stock</p>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="down5">
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-2">
                <div class="h-full w-full rounded-xl bg-white p-2">
                    <div class="grid h-full">
                        <p class="text-sm">Top 5 Stock</p>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="top5">
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
