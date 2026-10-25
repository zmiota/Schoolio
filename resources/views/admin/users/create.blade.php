@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border-b border-gray-200">
                    
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">Dodaj użytkownika</h1>
                        <p class="text-sm text-gray-600 mt-1">Utwórz nowego użytkownika (nauczyciela, ucznia lub admina).</p>
                    </div>

                    <form action="{{ route('admin.users.store') }}" method="POST" class="max-w-lg space-y-6">
                        @csrf

                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="name">Imię i Nazwisko</label>
                            <input type="text" 
                                   name="name" 
                                   id="name"
                                   value="{{ old('name') }}" 
                                   class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm block w-full mt-1" 
                                   required 
                                   placeholder="np. Jan Kowalski">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="email">Adres Email</label>
                            <input type="email" 
                                   name="email" 
                                   id="email"
                                   value="{{ old('email') }}" 
                                   class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm block w-full mt-1" 
                                   required 
                                   placeholder="np. jan@szkola.pl">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="role">Rola</label>
                            <select name="role" id="role" class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm block w-full mt-1">
                                <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Uczeń</option>
                                <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Nauczyciel</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrator</option>
                            </select>
                            @error('role')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="password">Hasło</label>
                            <input type="password" 
                                   name="password" 
                                   id="password"
                                   class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm block w-full mt-1" 
                                   required autocomplete="new-password">
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="password_confirmation">Potwierdź hasło</label>
                            <input type="password" 
                                   name="password_confirmation" 
                                   id="password_confirmation"
                                   class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm block w-full mt-1" 
                                   required>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Klasa (tylko dla uczniów)</label>
                            <select name="class_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1">
                                <option value="">— brak —</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700 mb-1">Przedmioty (opcjonalne)</label>
                            <select name="subjects[]" multiple size="5" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1">
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                            <p class="text-xs text-gray-500 mt-1">Przytrzymaj Ctrl (lub Cmd), aby zaznaczyć wiele.</p>
                        </div>

                        <div class="flex items-center gap-4 pt-2">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                            style="background-color: #059669;">

                                Utwórz użytkownika
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">Anuluj</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection