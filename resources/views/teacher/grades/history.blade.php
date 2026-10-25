@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-lg overflow-hidden border border-gray-200">
                
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-gray-800">Historia zmian oceny</h1>
                    <p class="mt-2 text-sm text-gray-600">
                        Uczeń: <span class="font-semibold text-gray-900">{{ $grade->student->name }}</span> 
                        <span class="mx-2 text-gray-300">|</span>
                        Przedmiot: <span class="font-semibold text-gray-900">{{ $grade->subject->name }}</span>
                    </p>
                </div>

                <div class="overflow-x-auto flex justify-center p-4">
                    <table class="w-auto divide-y divide-gray-200 text-sm border border-gray-100 rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-left font-bold text-gray-600 uppercase tracking-wider border-r border-gray-200">Stara ocena</th>
                                <th class="px-6 py-4 text-left font-bold text-gray-600 uppercase tracking-wider border-r border-gray-200">Nowa ocena</th>
                                <th class="px-6 py-4 text-left font-bold text-gray-600 uppercase tracking-wider border-r border-gray-200">Kto zmienił</th>
                                <th class="px-6 py-4 text-left font-bold text-gray-600 uppercase tracking-wider">Data zmiany</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($histories as $h)
                                <tr class="hover:bg-blue-50 transition duration-150 ease-in-out even:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-500 border-r border-gray-200">
                                        {{ $h->old_value ? $h->old_value : '-' }}
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap font-bold text-gray-800 border-r border-gray-200">
                                        {{ $h->new_value }}
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-600 border-r border-gray-200">
                                        {{ $h->modifier->name }}
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-500 font-mono">
                                        {{ $h->created_at->format('d.m.Y H:i') }}
                                    </td>
                                </tr>
                            @endforeach

                            @if($histories->isEmpty())
                                <tr>
                                    <td colspan="4" class="px-6 py-8 text-center text-gray-500 italic">
                                        Brak historii zmian dla tej oceny.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="p-4 bg-gray-50 border-t border-gray-200">
                    <a href="{{ route('teacher.grades.index') }}" class="text-sm text-indigo-600 hover:text-indigo-900 font-medium">&larr; Wróć do listy ocen</a>
                </div>
            </div>
        </div>
    </div>
@endsection