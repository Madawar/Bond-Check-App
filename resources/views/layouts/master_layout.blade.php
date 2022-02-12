<!doctype html>

<html lang="en" class="h-full bg-gray-50 ">

<head>
    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles
    @stack('styles')
</head>

<body class="h-full ">

    <div x-data="{ sidebarIsOpen: false }">
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <div class="fixed inset-0 flex z-40 md:hidden" role="dialog" aria-modal="true" x-cloak x-show="sidebarIsOpen">

            <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
            </div>
            <div class="relative flex-1 flex flex-col max-w-xs w-full bg-white"
                x-transition:enter="transition ease-in-out duration-300 transform"
                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in-out duration-300 transform"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full">

                <div class="absolute top-0 right-0 -mr-12 pt-2" x-transition:enter="ease-in-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in-out duration-300" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
                    <button type="button" @click="sidebarIsOpen = !sidebarIsOpen"
                        class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Close sidebar</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                    <div class="flex-shrink-0 flex items-center px-4">
                        {{ env('APP_NAME') }}
                    </div>
                    <nav class="mt-5 px-2 space-y-1">

                        @foreach ($navs as $nav)
                            <x-link link="{{ $nav['url'] }}" title="{{ $nav['title'] }}"
                                match="{{ $nav['active'] }}" :mobile="false">
                                {!! $nav['attributes']['svg'] !!}
                            </x-link>
                        @endforeach

                    </nav>
                </div>
                <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                    <a href="#" class="flex-shrink-0 group block">
                        <div class="flex items-center">

                            <div class="ml-3">
                                <p class="text-base font-medium text-gray-700 group-hover:text-gray-900">
                                    {{ Auth::user()->displayname[0] }}
                                </p>
                                <a href="/logout"
                                    class="text-xs font-medium text-gray-500 group-hover:text-gray-700">Logout</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="flex-shrink-0 w-14">
                <!-- Force sidebar to shrink to fit close icon -->
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white">
                <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                    <div
                        class="flex items-center flex-shrink-0 px-4 text-base font-medium text-center text-gray-900 uppercase tracking-widest">
                        <svg data-name="019_transport" id="_019_transport" viewBox="0 0 24 24" class="h-10 w-10"
                            xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #333;
                                    }

                                </style>
                            </defs>
                            <path class="cls-1"
                                d="M5,22a3,3,0,1,1,3-3A3,3,0,0,1,5,22Zm0-4a1,1,0,1,0,1,1A1,1,0,0,0,5,18Z" />
                            <path class="cls-1"
                                d="M13,22a3,3,0,1,1,3-3A3,3,0,0,1,13,22Zm0-4a1,1,0,1,0,1,1A1,1,0,0,0,13,18Z" />
                            <path class="cls-1"
                                d="M3,20a1,1,0,0,1-1-1V11a1,1,0,0,1,1-1H4V5A1,1,0,0,1,5,4H9a1,1,0,0,1,.83.45l6,9a1,1,0,0,1-1.66,1.1L8.46,6H6v5a1,1,0,0,1-1,1H4v7A1,1,0,0,1,3,20Z" />
                            <path class="cls-1"
                                d="M22,20H18a1,1,0,0,1-1-1V7a1,1,0,0,1,2,0V18h3a1,1,0,0,1,0,2Z" />
                            <path class="cls-1" d="M13,12H8a1,1,0,0,1,0-2h5a1,1,0,0,1,0,2Z" />
                            <polygon class="cls-1" points="13 11 9 11 9 5 13 11" />
                            <path class="cls-1" d="M11,20H7a1,1,0,0,1,0-2h4a1,1,0,0,1,0,2Z" />
                        </svg> {{ env('APP_NAME') }}
                    </div>
                    <nav class="mt-5 flex-1 px-2 bg-white space-y-1">
                        <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                        @foreach ($navs as $nav)
                            <x-link link="{{ $nav['url'] }}" title="{{ $nav['title'] }}"
                                match="{{ $nav['active'] }}" :mobile="false">
                                {!! $nav['attributes']['svg'] !!}
                            </x-link>
                        @endforeach
                    </nav>
                </div>
                <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                    <a href="logout" class="flex-shrink-0 w-full group block">
                        <div class="flex items-center">

                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">
                                    {{ Auth::user()->displayname[0] }}</p>
                                <p class="text-xs font-medium text-gray-500 group-hover:text-gray-700">
                                    Logout
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="md:pl-64 flex flex-col flex-1">
            <div class="sticky top-0 z-10 md:hidden pl-1 pt-1 sm:pl-3 sm:pt-3 bg-white">
                <button type="button" @click="sidebarIsOpen = !sidebarIsOpen"
                    class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <span class="sr-only">Open sidebar</span>
                    <!-- Heroicon name: outline/menu -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <main class="flex-1">
                <div class="py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <h1 class="text-2xl font-semibold text-gray-900"> @section('title')

                            @show</h1>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <!-- Replace with your content -->
                        @yield('content')
                        <!-- /End replace -->
                    </div>
                </div>
            </main>
        </div>
    </div>

    @livewireScripts

    @section('js')

    @show
    <script src="{{ mix('js/app.js') }}"></script>


</body>

</html>
