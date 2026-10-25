<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset hasła - {{ config('app.name', 'Dziennik Lekcyjny') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-gray-200">
    <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4">
        
        <div class="text-center mb-6">
            <div class="mx-auto h-12 w-12 bg-indigo-600 rounded-full flex items-center justify-center text-white mb-3 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                </svg>
            </div>
            <h2 class="text-xl font-bold text-gray-900">
                Dziennik Lekcyjny
            </h2>
        </div>

        <div class="w-full max-w-[320px] bg-white p-5 shadow-lg rounded-xl border border-gray-200">
            
            <div class="mb-4 text-xs text-gray-600 text-center leading-relaxed">
                Zapomniałeś hasła? Żaden problem. Podaj swój adres email, a wyślemy Ci link, który pozwoli ustawić nowe hasło.
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-medium text-gray-700 mb-1">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                           class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm py-1.5 px-3" 
                           placeholder="email@szkola.pl">
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <div class="pt-2">
                    <button type="submit" 
                            style="background-color: #4f46e5; color: white;"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150">
                        Wyślij link resetujący
                    </button>
                    
                    <div class="mt-3 text-center text-xs">
                        <a href="{{ route('login') }}" class="font-medium text-gray-500 hover:text-gray-900 transition-colors">
                            &larr; Wróć do logowania
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <div class="mt-6 text-center text-xs text-gray-400">
            &copy; {{ date('Y') }} Dziennik Lekcyjny
        </div>

    </div>
</body>
</html>