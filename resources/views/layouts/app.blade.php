<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles xx -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    @if  ( Session::has('success') )
                    <div x-data="{ show: true }" x-show.transition="show" x-init="setTimeout(() => show = false, 3000)" 
                        class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mt-4" role="alert">
                        <p class="font-bold">Exito</p>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                    @endif
                    @if ( Session::has('error') )
                    <div x-data="{ show: true }" x-show.transition="show" x-init="setTimeout(() => show = false, 3000)" 
                        class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-4" role="alert">
                        <p class="font-bold">Error</p>
                        <p>{{ Session::get('error') }}</p>
                    </div>
                    @endif
                </div>

                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        @stack('scripts')
    </body>
</html>
