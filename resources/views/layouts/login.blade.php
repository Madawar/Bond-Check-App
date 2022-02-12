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

    <div class="min-h-full flex">
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>

                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Sign in to your account</h2>

                </div>

                <div class="">


                    <div class="mt-6">
                        <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700"> Username
                                </label>
                                <div class="mt-1">
                                    <input id="username" name="username" type="username" autocomplete="username"
                                        required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                                <div class="mt-1">
                                    <input id="password" name="password" type="password" autocomplete="current-password"
                                        required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input id="remember-me" name="remember-me" type="checkbox"
                                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Remember me
                                    </label>
                                </div>

                                <div class="text-sm">
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> Forgot your
                                        password? </a>
                                </div>
                            </div>

                            <div>
                                <button type="submit"
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sign
                                    in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover" src="warehouse.jpg" alt="">
        </div>
    </div>
    @livewireScripts

    @section('js')

    @show
    <script src="{{ mix('js/app.js') }}"></script>


</body>

</html>
