<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles


</head>

<body class="font-sans antialiased">
    @include('popup.CategoryDelete')

    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex flex-row">
                    <div class="">
                        {{ $header }}
                    </div>
                    @if (isset($anchor))
                        <div style="margin-left: auto">
                            {{ $anchor }}
                        </div>
                    @endif
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    <div>
        <footer aria-labelledby="footer-heading" class="bg-white border-t border-gray-200">
            <h2 id="footer-heading" class="sr-only">Footer</h2>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="py-20 grid grid-cols-2 gap-8 sm:gap-y-0 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="grid grid-cols-1 gap-y-10 lg:col-span-2 lg:grid-cols-2 lg:gap-y-0 lg:gap-x-8">
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">Account</h3>
                            <ul role="list" class="mt-6 space-y-6">
                                <li class="text-sm"><a href="#" class="text-gray-500 hover:text-gray-600">Manage
                                        Account</a></li>
                                <li class="text-sm"><a href="#" class="text-gray-500 hover:text-gray-600">Saved
                                        Items</a></li>
                                <li class="text-sm"><a href="#"
                                        class="text-gray-500 hover:text-gray-600">Orders</a></li>
                                <li class="text-sm"><a href="#" class="text-gray-500 hover:text-gray-600">Redeem
                                        Gift card</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">Service</h3>
                            <ul role="list" class="mt-6 space-y-6">
                                <li class="text-sm"><a href="#"
                                        class="text-gray-500 hover:text-gray-600">Shipping &amp; Returns</a></li>
                                <li class="text-sm"><a href="#"
                                        class="text-gray-500 hover:text-gray-600">Warranty</a></li>
                                <li class="text-sm"><a href="#" class="text-gray-500 hover:text-gray-600">FAQ</a>
                                </li>
                                <li class="text-sm"><a href="#" class="text-gray-500 hover:text-gray-600">Find a
                                        store</a></li>
                                <li class="text-sm"><a href="#" class="text-gray-500 hover:text-gray-600">Get in
                                        touch</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-y-10 lg:col-span-2 lg:grid-cols-2 lg:gap-y-0 lg:gap-x-8">
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">Company</h3>
                            <ul role="list" class="mt-6 space-y-6">
                                <li class="text-sm"><a href="#" class="text-gray-500 hover:text-gray-600">Who we
                                        are</a></li>
                                <li class="text-sm"><a href="#"
                                        class="text-gray-500 hover:text-gray-600">Press</a></li>
                                <li class="text-sm"><a href="#"
                                        class="text-gray-500 hover:text-gray-600">Careers</a></li>
                                <li class="text-sm"><a href="#" class="text-gray-500 hover:text-gray-600">Terms
                                        &amp; Conditions</a></li>
                                <li class="text-sm"><a href="#"
                                        class="text-gray-500 hover:text-gray-600">Privacy</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">Connect</h3>
                            <ul role="list" class="mt-6 space-y-6">
                                <li class="text-sm"><a href="#"
                                        class="text-gray-500 hover:text-gray-600">Instagram</a></li>
                                <li class="text-sm"><a href="#"
                                        class="text-gray-500 hover:text-gray-600">Pinterest</a></li>
                                <li class="text-sm"><a href="#"
                                        class="text-gray-500 hover:text-gray-600">Twitter</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-100 py-10 sm:flex sm:items-center sm:justify-between">
                    <div class="flex items-center justify-center text-sm text-gray-500">
                        <p>Shipping to Canada ($CAD)</p>
                        <p class="ml-3 border-l border-gray-200 pl-3">English</p>
                    </div>
                    <p class="mt-6 text-sm text-gray-500 text-center sm:mt-0">© 2021 Clothing Company, Ltd.</p>
                </div>
            </div>
        </footer>
    </div>

    {{-- CK Editor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

    {{-- Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    @yield('script')
</body>

</html>
