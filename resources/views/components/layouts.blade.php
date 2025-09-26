<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> {{ $title ?? 'null title' }}</title>

    @vite('resources/css/app.css')
</head>

<body class="h-screen overflow-y-hidden">

    <div class="flex h-screen ">
        {{-- Sidebar --}}
        <aside x-data="{ open: true }" :class="open ? 'w-72' : 'w-15'"
            class="bg-white dark:bg-gray-800 shadow-md transition-all duration-300 flex flex-col ">

            {{-- Logo --}}
            <div class="flex items-center justify-between p-4 border-b dark:border-gray-700">
                <a href="/dashboard" class="flex items-center" x-show="open">
                    <img src="{{ asset('images/logo/logo-icon.svg') }}" alt="Logo" class="h-8 w-8 mr-2">
                    <span x-show="open" class="font-bold text-lg text-gray-800 dark:text-white">MyApp</span>
                </a>
                <button @click="open = !open"
                    class="flex items-center justify-center w-8 h-8 rounded-full hover:bg-gray-200 dark:hover:bg-gray-200 dark:text-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

            </div>

            {{-- Menu Scroll --}}
            <nav class="flex-1 overflow-y-auto p-4" x-show="open">
                <ul class="space-y-2">
                    {{-- Dashboard --}}
                    <li>
                        <a href="/dashboard"
                            class="block items-center p-2 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
                            <span x-show="open">Dashboard</span>
                        </a>
                    </li>

                    {{-- Users --}}
                    <li>
                        <a href="#"
                            class="block items-center p-2 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
                            <span x-show="open">Users</span>
                        </a>
                    </li>

                    {{-- Try Out --}}
                    <li>
                        <a href="/tryout"
                            class="block items-center p-2 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
                            <span x-show="open">Try Out</span>
                        </a>
                    </li>


                    {{-- Orders Dropdown --}}
                    <li x-data="{ openMenu: false }">
                        <button @click="openMenu = !openMenu"
                            class="flex items-center justify-between w-full p-2 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-300 cursor-pointer ">
                            <div class="flex items-center cursor-pointer">
                                <span x-show="open" class="cursor-pointer">Orders</span>
                            </div>
                            {{-- Arrow icon --}}
                            <svg :class="{ 'rotate-90': openMenu }" xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 transition-transform duration-200" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        {{-- Submenu --}}
                        <ul x-show="openMenu" x-collapse class="pl-6 mt-1 space-y-1 transition-all duration-1000">
                            <li>
                                <a href="/orders/pending"
                                    class="block p-2 rounded-md text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700">
                                    Pending Orders
                                </a>
                            </li>
                            <li>
                                <a href="/orders/completed"
                                    class="block p-2 rounded-md text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700">
                                    Completed Orders
                                </a>
                            </li>
                            <li>
                                <a href="/orders/cancelled"
                                    class="block p-2 rounded-md text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700">
                                    Cancelled Orders
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>




        {{-- Main Content --}}
        <div class="flex flex-col flex-1">
            <header class="bg-white shadow-md dark:bg-gray-800 p-4 flex justify-between items-center">

                <h1 class="text-xl font-bold text-gray-800 dark:text-white">{{ $title ?? 'null header' }}</h1>
                <div>
                    <span class="text-gray-600 dark:text-gray-300">Hallo,{{ Auth::user()->name ?? 'Guest' }}</span>
                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button class="ml-3 bg-red-500 text-white px-3 py-1 rounded-md">Logout</button>
                    </form>
                </div>
            </header>
            <main class="flex-1 overflow-y-auto p-6 bg-gray-50 dark:bg-gray-200 dark:text-black-900">
                {{ $slot }}
            </main>
        </div>
    </div>

    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
