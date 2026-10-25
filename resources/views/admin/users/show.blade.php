@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-lg overflow-hidden border border-gray-200">
                
                <div class="px-6 py-5 border-b border-gray-200 bg-gray-50 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Szczegóły użytkownika</h1>
                        <p class="text-sm text-gray-500 mt-1">ID: <span class="font-mono text-gray-700">#{{ $user->id }}</span></p>
                    </div>

                    <div>
                        @if($user->role === 'admin')
                            <span class="px-4 py-2 inline-flex text-sm leading-5 font-bold rounded-full bg-red-100 text-red-800 border border-red-200">
                                Administrator
                            </span>
                        @elseif($user->role === 'teacher')
                            <span class="px-4 py-2 inline-flex text-sm leading-5 font-bold rounded-full bg-blue-100 text-blue-800 border border-blue-200">
                                Nauczyciel
                            </span>
                        @else
                            <span class="px-4 py-2 inline-flex text-sm leading-5 font-bold rounded-full bg-green-100 text-green-800 border border-green-200">
                                Uczeń
                            </span>
                        @endif
                    </div>
                </div>

                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                            <dt class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-1">
                                Imię i Nazwisko
                            </dt>
                            <dd class="text-lg font-semibold text-gray-900 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ $user->name }}
                            </dd>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                            <dt class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-1">
                                Adres Email
                            </dt>
                            <dd class="text-lg font-semibold text-gray-900 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <a href="mailto:{{ $user->email }}" class="hover:text-blue-600 transition">
                                    {{ $user->email }}
                                </a>
                            </dd>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                            <dt class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-1">
                                Data rejestracji
                            </dt>
                            <dd class="text-lg font-semibold text-gray-900 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                {{ $user->created_at->format('d.m.Y H:i') }}
                            </dd>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                            <dt class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-1">
                                Ostatnia modyfikacja
                            </dt>
                            <dd class="text-lg font-semibold text-gray-900 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $user->updated_at->format('d.m.Y H:i') }}
                            </dd>
                        </div>

                    </div>
                </div>

                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-4">
                    
                    <a href="{{ route('admin.users.index') }}" class="text-sm text-gray-600 hover:text-gray-900 font-medium flex items-center transition">
                        &larr; Wróć do listy użytkowników
                    </a>

                </div>

            </div>
        </div>
    </div>
@endsection