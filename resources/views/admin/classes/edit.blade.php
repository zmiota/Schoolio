@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border-b border-gray-200">
                    
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">Edytuj oddział</h1>
                        <p class="text-sm text-gray-600 mt-1">Edytujesz klasę: <strong>{{ $class->name }}</strong></p>
                    </div>

                    <form action="{{ route('admin.classes.update', $class) }}" method="POST" class="max-w-lg space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="name">Nazwa oddziału</label>
                            <input type="text" 
                                   name="name" 
                                   id="name"
                                   value="{{ old('name', $class->name) }}" 
                                   class="border-gray-300 focus:border-amber-500 focus:ring-amber-500 rounded-md shadow-sm block w-full mt-1" 
                                   required maxlength="10">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="year">Rok szkolny</label>
                            <input type="text" 
                                   name="year" 
                                   id="year"
                                   value="{{ old('year', $class->year) }}" 
                                   class="border-gray-300 focus:border-amber-500 focus:ring-amber-500 rounded-md shadow-sm block w-full mt-1" 
                                   required maxlength="9">
                            @error('year')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                       <div class="flex items-center gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition">
                                Zapisz zmiany
                            </button>
                            <a href="{{ url()->previous() }}" class="text-sm text-gray-600 hover:text-gray-900 underline">Anuluj</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection