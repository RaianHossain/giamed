<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                    <!-- SVG Logo -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="88" height="87" viewBox="0 0 33 32" fill="none">
                        <g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
                            <g transform="translate(-71.000000, -207.000000)">
                                <g transform="translate(71.428571, 207.000000)">
                                    <path d="M10,0 L22,0 C27.5228475,0 32,4.4771525 32,10 L32,22 C32,27.5228475 27.5228475,32 22,32 L10,32 C4.4771525,32 0,27.5228475 0,22 L0,10 C0,4.4771525 4.4771525,0 10,0 Z" fill="white" />
                                    <path stroke="rgba(15, 191, 151, 1)" stroke-linecap="round" stroke-width="1.3" d="M7,16.2964521 C10.0319936,16.2964521 11.3785735,18.1607115 11.6442424,18.1153545 C12.1294083,18.0325235 11.6525482,13.9560076 12.9174351,15.5024231 C14.1823221,17.0488387 12.7557605,21.8087492 14.2373887,19.8957446 C15.719017,17.9827399 15.4068303,7.59036727 16.5201075,8.01250578 C17.6333847,8.43464429 17.7882931,21.8740486 18.4865214,22.9037782 C19.1847498,23.9335078 19.910292,16.3602962 20.5033257,16.2964521 C20.8986815,16.2538894 22.7309063,16.2538894 26,16.2964521" />
                                </g>
                            </g>
                        </g>
                    </svg>
                    <!-- Logo Text -->
                    <h4 class="mt-1">GIA Medical</h4>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
