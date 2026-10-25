@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-lg overflow-hidden border border-gray-200">
                
                <div class="p-6 bg-white border-b border-gray-200 flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-gray-800">Dziennik Ocen</h1>
                    <a href="{{ route('teacher.grades.create') }}" 
                       class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:opacity-90 transition shadow-sm"
                       style="background-color: #059669;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Dodaj ocenę
                    </a>
                </div>

                <div class="overflow-x-auto flex justify-center p-4">
                    <table class="w-auto divide-y divide-gray-200 text-sm border border-gray-100 rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-left font-bold text-gray-600 uppercase tracking-wider border-r border-gray-200">ID</th>
                                <th class="px-6 py-4 text-left font-bold text-gray-600 uppercase tracking-wider border-r border-gray-200">Uczeń</th>
                                <th class="px-6 py-4 text-left font-bold text-gray-600 uppercase tracking-wider border-r border-gray-200">Przedmiot</th>
                                <th class="px-6 py-4 text-center font-bold text-gray-600 uppercase tracking-wider border-r border-gray-200">Ocena</th>
                                <th class="px-6 py-4 text-left font-bold text-gray-600 uppercase tracking-wider border-r border-gray-200">Opis</th>
                                <th class="px-6 py-4 text-left font-bold text-gray-600 uppercase tracking-wider border-r border-gray-200">Data</th>
                                <th class="px-6 py-4 text-right font-bold text-gray-600 uppercase tracking-wider">Akcje</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($grades as $grade)
                                <tr class="hover:bg-blue-50 transition duration-150 ease-in-out even:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-500 border-r border-gray-200">{{ $grade->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-800 border-r border-gray-200">{{ $grade->student->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-600 border-r border-gray-200">{{ $grade->subject->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center font-bold text-lg border-r border-gray-200" style="color: #4f46e5;">{{ $grade->value }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-500 italic border-r border-gray-200">{{ $grade->description ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-500 font-mono border-r border-gray-200">{{ $grade->created_at->format('Y-m-d') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('teacher.grades.edit', $grade->id) }}" 
                                               class="inline-flex items-center px-3 py-1.5 border border-transparent rounded shadow-sm text-xs font-semibold text-white uppercase hover:opacity-80 transition"
                                               style="background-color: #eab308;">Edytuj</a>
                                            
                                            <form action="{{ route('teacher.grades.destroy', $grade->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="inline-flex items-center px-3 py-1.5 border border-transparent rounded shadow-sm text-xs font-semibold text-white uppercase hover:opacity-80 transition"
                                                        style="background-color: #dc2626;"
                                                        onclick="return confirm('Na pewno chcesz usunąć?')">Usuń</button>
                                            </form>
                                            
                                            <a href="{{ route('teacher.grades.history', $grade->id) }}" 
                                               class="inline-flex items-center px-3 py-1.5 border border-gray-300 rounded shadow-sm text-xs font-semibold text-white uppercase hover:opacity-80 transition"
                                               style="background-color: #6b7280;">Historia</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="p-4 bg-gray-50 border-t border-gray-200">
                    <a href="{{ route('teacher.dashboard') }}" class="text-sm text-indigo-600 hover:text-indigo-900 font-medium">&larr; Wróć do panelu</a>
                </div>
            </div>
        </div>
    </div>
@endsection