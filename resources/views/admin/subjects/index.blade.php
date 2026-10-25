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
                    <h1 class="text-2xl font-bold text-gray-800">Przedmioty</h1>
                    
                    <a href="{{ route('admin.subjects.create') }}" 
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:opacity-90 transition shadow-sm"
                       style="background-color: #7c3aed;"> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Dodaj przedmiot
                    </a>
                </div>

                <div class="overflow-x-auto flex justify-center p-4">
                    <table class="w-auto divide-y divide-gray-200 text-sm border border-gray-100 rounded-lg shadow-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-left font-bold text-gray-600 uppercase tracking-wider border-r border-gray-200 w-64">Nazwa Przedmiotu</th>
                                <th class="px-6 py-4 text-right font-bold text-gray-600 uppercase tracking-wider w-48">Akcje</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($subjects as $subject)
                                <tr class="hover:bg-blue-50 transition duration-150 ease-in-out even:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-800 border-r border-gray-200">
                                        {{ $subject->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('admin.subjects.edit', $subject) }}" 
                                               class="inline-flex items-center px-3 py-1.5 border border-transparent rounded shadow-sm text-xs font-semibold text-white uppercase hover:opacity-80 transition"
                                               style="background-color: #eab308;" title="Edytuj">
                                                Edytuj
                                            </a>
                                            
                                            <form action="{{ route('admin.subjects.destroy', $subject) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="inline-flex items-center px-3 py-1.5 bg-red-600 border border-transparent rounded shadow-sm text-xs font-semibold text-white uppercase hover:bg-red-700 transition focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                                                        onclick="return confirm('Czy na pewno usunąć przedmiot: {{ $subject->name }}?')" 
                                                        title="Usuń">
                                                    Usuń
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            @if($subjects->isEmpty())
                                <tr>
                                    <td colspan="2" class="px-6 py-8 text-center text-gray-500 italic">
                                        Brak dodanych przedmiotów.
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