<div class="hidden lg:col-span-2 lg:flex min-h-screen flex-col items-center bg-white p-3 font-medium">
    <h1 class="mb-16 text-2xl">Bos<span class="text-reds">seller</span></h1>
    <img src="{{ asset('storage/' . auth()->user()->picture) }}" alt="" class="mb-3 h-24 w-24 rounded-full" />
    <p class="text-medium mb-1 text-lg">{{ auth()->user()->name }}</p>
    <p class="text-abu mb-20 text-xs">Warehouse Section</p>
    <div class="text-center">
        <ul class="flex flex-col gap-y-9">
            <li
                class="hover:bg-blues rounded-lg p-2 text-sm shadow-lg {{ Request()->path() === '/' ? 'bg-blues' : 'bg-bg' }}">
                <a href="{{ route('dashboard') }}">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="mr-2 h-5 w-5">
                            <path
                                d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                            <path
                                d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                        </svg>
                        Dashboard
                    </div>
                </a>
            </li>
            <li
                class="hover:bg-blues rounded-lg p-2 text-sm shadow-lg {{ Request()->is('transaction*') ? 'bg-blues' : 'bg-bg' }}">
                <a href="{{ route('transaction') }}">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="mr-2 h-5 w-5">
                            <path d="M4.5 3.75a3 3 0 00-3 3v.75h21v-.75a3 3 0 00-3-3h-15z" />
                            <path fill-rule="evenodd"
                                d="M22.5 9.75h-21v7.5a3 3 0 003 3h15a3 3 0 003-3v-7.5zm-18 3.75a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z"
                                clip-rule="evenodd" />
                        </svg>

                        Transcation
                    </div>
                </a>
            </li>
            <li
                class="hover:bg-blues rounded-lg p-2 text-sm shadow-lg {{ Request()->is('packages*') ? 'bg-blues' : 'bg-bg' }}">
                <a href="{{ route('packages') }}">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="mr-2 h-5 w-5">
                            <path
                                d="M15.75 8.25a.75.75 0 01.75.75c0 1.12-.492 2.126-1.27 2.812a.75.75 0 11-.992-1.124A2.243 2.243 0 0015 9a.75.75 0 01.75-.75z" />
                            <path fill-rule="evenodd"
                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM4.575 15.6a8.25 8.25 0 009.348 4.425 1.966 1.966 0 00-1.84-1.275.983.983 0 01-.97-.822l-.073-.437c-.094-.565.25-1.11.8-1.267l.99-.282c.427-.123.783-.418.982-.816l.036-.073a1.453 1.453 0 012.328-.377L16.5 15h.628a2.25 2.25 0 011.983 1.186 8.25 8.25 0 00-6.345-12.4c.044.262.18.503.389.676l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.575 15.6z"
                                clip-rule="evenodd" />
                        </svg>

                        Packages
                    </div>
                </a>
            </li>
            <li
                class="hover:bg-blues rounded-lg p-2 text-sm shadow-lg {{ Request()->is('user*') ? 'bg-blues' : 'bg-bg' }}">
                <a href="{{ route('user') }}">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="mr-2 h-5 w-5">
                            <path fill-rule="evenodd"
                                d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                clip-rule="evenodd" />
                        </svg>

                        User
                    </div>
                </a>
            </li>
            <li class="bg-bg hover:bg-blues rounded-lg p-2 text-sm shadow-lg">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="mr-2 h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                        </svg>
                        <button type="submit">Logout</button>
                    </div>
                </form>
            </li>
        </ul>
    </div>
</div>
