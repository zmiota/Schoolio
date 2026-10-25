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
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            @if(session('success') || session('error'))
                <div id="toast" class="{{ session('success') ? 'toast-success' : 'toast-error' }}">
                    {{ session('success') ?? session('error') }}
                </div>

                <!-- Tailwind coś świrował, dlatego plain css -->
                <style> 
                    #toast {
                        position: fixed;
                        top: 1rem;
                        right: 1rem;
                        padding: 1rem 1.5rem;
                        border-radius: 0.5rem;
                        box-shadow: 0 4px 6px rgba(0,0,0,0.2);
                        color: white;
                        opacity: 0;
                        pointer-events: none;
                        transition: opacity 0.5s ease, transform 0.5s ease;
                        transform: translateX(100%);
                        z-index: 9999;
                    }

                    .toast-success {
                        background-color: #16a34a;
                        border: 2px solid #15803d;
                    }

                    .toast-error {
                        background-color: #dc2626;
                        border: 2px solid #b91c1c;
                    }

                    #toast.show {
                        opacity: 1;
                        pointer-events: auto;
                        transform: translateX(0);
                    }
                </style>

                <script>
                    const toast = document.getElementById('toast');
                    if(toast){
                        toast.classList.add('show');

                        setTimeout(() => {
                            toast.classList.remove('show');
                        }, 3000);
                    }
                </script>
            @endif

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>
