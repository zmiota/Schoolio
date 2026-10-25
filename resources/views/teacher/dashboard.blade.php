<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Nauczyciela - {{ config('app.name', 'Dziennik Lekcyjny') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 text-gray-900 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">

        <aside class="w-64 bg-gray-900 text-white flex flex-col shadow-2xl transition-all duration-300" style="background-color: #111827; color: white;">
            <div class="h-16 flex items-center justify-center border-b border-gray-800" style="border-color: #1f2937;">
                <div class="flex items-center space-x-2 font-bold text-xl tracking-wider">
                    <div class="w-8 h-8 bg-emerald-600 rounded-lg flex items-center justify-center text-white" style="background-color: #059669;">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <span style="color: white;">NAUCZYCIEL</span>
                </div>
            </div>

            <nav class="flex-1 px-2 py-6 space-y-1 overflow-y-auto">
                <p class="px-3 text-xs font-bold text-gray-400 uppercase tracking-wider mb-2" style="color: #9ca3af;">Główne</p>
                
                <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-3 bg-emerald-600 text-white rounded-md group transition-colors shadow-sm" style="background-color: #059669; color: white;">
                    <svg class="w-5 h-5 mr-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span class="font-semibold">Panel startowy</span>
                </a>

                <p class="px-3 text-xs font-bold text-gray-400 uppercase tracking-wider mt-6 mb-2" style="color: #9ca3af;">Dziennik</p>

                <a href="{{ route('teacher.grades.create') }}" class="flex items-center px-3 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-md group transition-colors">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    <span class="font-medium">Wystaw Oceny</span>
                </a>
                
                <a href="{{ route('teacher.grades.index') }}" class="flex items-center px-3 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-md group transition-colors">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-medium">Przeglądaj dzienni</span>
                </a>
            </nav>
        </aside>

        <main class="flex-1 flex flex-col h-screen overflow-y-auto bg-gray-50">
            
            <header class="bg-white shadow-sm border-b border-gray-200 h-16 relative flex items-center justify-between px-6 z-10">
                <h1 class="text-2xl font-bold text-gray-900">Panel Nauczyciela</h1>

                <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2">
                    <div class="px-4 py-1.5 bg-gray-100 rounded-full border border-gray-200 text-sm font-semibold text-gray-600 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Dziś jest {{ date('d.m.Y') }}
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-gray-900 leading-none">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500 mt-1">Nauczyciel</p>
                    </div>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="flex items-center text-sm font-bold text-red-600 hover:text-red-800 transition-colors bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-lg border border-red-100">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            Wyloguj
                        </button>
                    </form>
                </div>
            </header>

            <div class="p-6 space-y-6">
                

                    <div class="p-5 rounded-xl shadow-md text-white flex flex-col justify-center border border-emerald-700" style="background-color: #059669; color: white;">
                        <p class="text-xs opacity-90 uppercase font-bold tracking-wide">Dziennik Elektroniczny</p>
                        <p class="text-xl font-bold mt-1">Aktywny</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-300 p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4 border-b pb-2 border-gray-200">Szybkie Akcje</h3>
                        <div class="space-y-3">
                            <a href="{{ route('teacher.grades.create') }}" class="block w-full text-left px-4 py-4 bg-gray-50 hover:bg-emerald-50 border border-gray-200 hover:border-emerald-300 rounded-lg transition-colors flex items-center justify-between group">
                                <span class="font-bold text-gray-800 group-hover:text-emerald-800">Wystaw nową ocenę</span>
                                <span class="text-gray-400 group-hover:text-emerald-600 font-bold text-xl">+</span>
                            </a>
                            <a href="{{ route('teacher.grades.index') }}" class="block w-full text-left px-4 py-4 bg-gray-50 hover:bg-emerald-50 border border-gray-200 hover:border-emerald-300 rounded-lg transition-colors flex items-center justify-between group">
                                <span class="font-bold text-gray-800 group-hover:text-emerald-800">Przeglądaj dziennik</span>
                                <span class="text-gray-400 group-hover:text-emerald-600 font-bold text-xl">&rarr;</span>
                            </a>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-300 p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4 border-b pb-2 border-gray-200">Wiadomości</h3>
                        <div class="text-sm space-y-4">
                            <div class="bg-blue-50 text-blue-900 p-4 rounded-lg border-l-4 border-blue-600 shadow-sm">
                                <strong class="block mb-1 font-bold">Rada Pedagogiczna:</strong> 
                                Przypominamy o uzupełnieniu ocen do końca tygodnia.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</body>
</html>