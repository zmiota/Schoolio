@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div class="mb-6 border-b border-gray-100 pb-4">
                        <h2 class="text-2xl font-bold text-gray-800">
                            Edytuj ocenę
                        </h2>
                        <p class="text-sm text-gray-600 mt-1">
                            Edytujesz wpis dla ucznia: <span class="font-semibold text-gray-900">{{ $grade->student->name }}</span>
                            (Przedmiot: {{ $grade->subject->name }})
                        </p>
                    </div>

                    <form method="POST" action="{{ route('teacher.grades.update', $grade->id) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="value" class="block text-sm font-medium text-gray-700">
                                Ocena
                            </label>
                            <input type="number" 
                                   name="value" 
                                   id="value" 
                                   min="1" max="6" step="0.5"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm"
                                   value="{{ old('value', $grade->value) }}" required>
                            
                            @error('value')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">
                                Opis (opcjonalnie)
                            </label>
                            <textarea id="description" 
                                      name="description" 
                                      rows="4" 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm">{{ old('description', $grade->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                            <a href="{{ route('teacher.grades.index') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">
                                Anuluj
                            </a>

                            <button type="submit" 
                                    class="inline-flex items-center px-6 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:opacity-90 transition shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2"
                                    style="background-color: #d97706;"> Zaktualizuj
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection