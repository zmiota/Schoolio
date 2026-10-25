@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border-b border-gray-200">
                    
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">Dodaj przedmiot</h1>
                        <p class="text-sm text-gray-600 mt-1">Wprowadź nazwę nowego przedmiotu szkolnego.</p>
                    </div>

                    <form action="{{ route('admin.subjects.store') }}" method="POST" class="max-w-lg space-y-6">
                        @csrf

                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="name">Nazwa przedmiotu</label>
                            <input type="text" 
                                   name="name" 
                                   id="name"
                                   value="{{ old('name') }}"
                                   class="border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-md shadow-sm block w-full mt-1" 
                                   required 
                                   placeholder="np. Matematyka">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition">
                                Zapisz
                            </button>
                            <a href="{{ url()->previous() }}" class="text-sm text-gray-600 hover:text-gray-900 underline">Anuluj</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection