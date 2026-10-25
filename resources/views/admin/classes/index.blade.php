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
                    <h1 class="text-2xl font-bold text-gray-800">Oddziały</h1>
                    
                    <a href="{{ route('admin.classes.create') }}" 
                       class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:opacity-90 transition shadow-sm"
                       style="background-color: #059669;"> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"></svg>
                        Dodaj oddział
                    </a>
                </div>

                <div class="overflow-x-auto flex justify-center p-4">
                    <table class="w-auto divide-y divide-gray-200 text-sm border border-gray-100 rounded-lg shadow-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-left font-bold text-gray-600 uppercase tracking-wider border-r border-gray-200">Nazwa Oddziału</th>
                                <th class="px-6 py-4 text-left font-bold text-gray-600 uppercase tracking-wider border-r border-gray-200">Rok Szkolny</th>
                                <th class="px-6 py-4 text-right font-bold text-gray-600 uppercase tracking-wider">Akcje</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($classes as $class)
                                <tr class="hover:bg-blue-50 transition duration-150 ease-in-out even:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-800 border-r border-gray-200">
                                        {{ $class->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-600 border-r border-gray-200 font-mono">
                                        {{ $class->year }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('admin.classes.edit', $class) }}" 
                                               
                                               class="inline-flex items-center px-3 py-1.5 border border-transparent rounded shadow-sm text-xs font-semibold text-white uppercase hover:opacity-80 transition"

                                               style="background-color: #eab308;" title="Edytuj">

                                                Edytuj
                                            </a>
                                            
                                            <form action="{{ route('admin.classes.destroy', $class) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="inline-flex items-center px-3 py-1.5 bg-red-600 border border-transparent rounded shadow-sm text-xs font-semibold text-white uppercase hover:bg-red-700 transition focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                                                        onclick="return confirm('Czy na pewno chcesz usunąć ten oddział?')" 
                                                        title="Usuń">
                                                    Usuń
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            
                            @if($classes->isEmpty())
                                <tr>
                                    <td colspan="3" class="px-6 py-8 text-center text-gray-500 italic">
                                        Brak oddziałów w systemie.
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