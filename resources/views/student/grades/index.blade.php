@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-lg overflow-hidden border border-gray-200">
                
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-gray-800">Moje Oceny</h1>
                    <p class="text-sm text-gray-600 mt-1">Poniżej znajduje się wykaz Twoich ocen z poszczególnych przedmiotów.</p>
                </div>

                <div class="overflow-x-auto flex justify-center p-4">
                    <table class="w-auto divide-y divide-gray-200 text-sm border border-gray-100 rounded-lg shadow-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-left font-bold text-gray-600 uppercase tracking-wider border-r border-gray-200">Przedmiot</th>
                                <th class="px-6 py-4 text-center font-bold text-gray-600 uppercase tracking-wider border-r border-gray-200">Ocena</th>
                                <th class="px-6 py-4 text-left font-bold text-gray-600 uppercase tracking-wider border-r border-gray-200">Nauczyciel</th>
                                <th class="px-6 py-4 text-left font-bold text-gray-600 uppercase tracking-wider">Data wystawienia</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($grades as $grade)
                                <tr class="hover:bg-blue-50 transition duration-150 ease-in-out even:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-800 border-r border-gray-200">
                                        {{ $grade->subject->name }}
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-center border-r border-gray-200">
                                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full text-lg font-bold text-white shadow-sm"
                                              style="background-color: {{ $grade->value >= 4 ? '#059669' : ($grade->value >= 2 ? '#d97706' : '#dc2626') }};">
                                            {{ $grade->value }}
                                        </span>
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-600 border-r border-gray-200">
                                        {{ $grade->teacher->name }}
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-500 font-mono">
                                        {{ $grade->created_at->format('d.m.Y') }}
                                    </td>
                                </tr>
                            @endforeach
                            
                            @if($grades->isEmpty())
                                <tr>
                                    <td colspan="4" class="px-6 py-8 text-center text-gray-500 italic">
                                        Nie masz jeszcze wystawionych żadnych ocen.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                
                <div class="p-4 bg-gray-50 border-t border-gray-200">
                    <a href="{{ route('student.dashboard') }}" class="text-sm text-indigo-600 hover:text-indigo-900 font-medium">&larr; Wróć do panelu</a>
                </div>
            </div>
        </div>
    </div>
@endsection