@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white shadow-lg sm:rounded-lg overflow-hidden border border-gray-200">
                
                <div class="p-6 bg-white border-b border-gray-200 flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-gray-800">Użytkownicy</h1>
                    
                    <a href="{{ route('admin.users.create') }}" 
class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:opacity-90 transition shadow-sm"
                       style="background-color: #4f46e5;">                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        Dodaj użytkownika
                    </a>
                </div>

                <div class="overflow-x-auto flex justify-center p-4">
                    <table class="w-auto divide-y divide-gray-200 text-sm border border-gray-100 rounded-lg shadow-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-left font-bold text-gray-600 uppercase tracking-wider border-r border-gray-200">Imię i Nazwisko</th>
                                <th class="px-6 py-4 text-left font-bold text-gray-600 uppercase tracking-wider border-r border-gray-200">Email</th>
                                <th class="px-6 py-4 text-center font-bold text-gray-600 uppercase tracking-wider border-r border-gray-200">Rola</th>
                                <th class="px-6 py-4 text-right font-bold text-gray-600 uppercase tracking-wider">Akcje</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($users as $user)
                                <tr class="hover:bg-blue-50 transition duration-150 ease-in-out even:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-800 border-r border-gray-200">
                                        {{ $user->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-600 border-r border-gray-200">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border-r border-gray-200">
                                    @php
                                        $roleColors = [
                                            'admin' => 'bg-red-100 text-red-800 border-red-200',
                                            'teacher' => 'bg-green-100 text-green-800 border-green-200',
                                            'student' => 'bg-blue-100 text-blue-800 border-blue-200'
                                        ];
                                        $userRoleColor = $roleColors[$user->role] ?? 'bg-gray-100 text-gray-800';
                                    @endphp
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full border {{ $userRoleColor }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end gap-2">
                                             <a href="{{ route('admin.users.show', $user->id) }}" 
                                           class="inline-flex items-center px-3 py-1.5 border border-gray-300 rounded shadow-sm text-xs font-semibold text-white uppercase hover:opacity-80 transition"
                                           style="background-color: #6b7280;" title="Podgląd">
                                            Podgląd
                                        </a>
                                            <a href="{{ route('admin.users.edit', $user) }}" 
                                                  class="inline-flex items-center px-3 py-1.5 border border-transparent rounded shadow-sm text-xs font-semibold text-white uppercase hover:opacity-80 transition"
                                           style="background-color: #eab308;" title="Edytuj">
                                            Edytuj
                                            </a>
                                            
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="inline-flex items-center px-3 py-1.5 bg-red-600 border border-transparent rounded shadow-sm text-xs font-semibold text-white uppercase hover:bg-red-700 transition focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                                                        onclick="return confirm('Czy na pewno chcesz usunąć tego użytkownika?')" 
                                                        title="Usuń">
                                                    Usuń
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            @if($users->isEmpty())
                                <tr>
                                    <td colspan="4" class="px-6 py-8 text-center text-gray-500 italic">
                                        Brak użytkowników w systemie.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                
                <div class="p-4 bg-gray-50 border-t border-gray-200">
                    <a href="{{ route('admin.dashboard') }}" class="text-sm text-indigo-600 hover:text-indigo-900 font-medium">&larr; Wróć do panelu głównego</a>
                </div>
            </div>
        </div>
    </div>
@endsection