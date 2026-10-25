@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border-b border-gray-200">
                    
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">Edytuj użytkownika</h1>
                        <p class="text-sm text-gray-600 mt-1">Edytujesz konto: <strong>{{ $user->email }}</strong></p>
                    </div>

                    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="max-w-lg space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="name">Imię i Nazwisko</label>
                            <input type="text" 
                                   name="name" 
                                   id="name"
                                   value="{{ old('name', $user->name) }}" 
                                   class="border-gray-300 focus:border-amber-500 focus:ring-amber-500 rounded-md shadow-sm block w-full mt-1" 
                                   required>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="email">Adres Email</label>
                            <input type="email" 
                                   name="email" 
                                   id="email"
                                   value="{{ old('email', $user->email) }}" 
                                   class="border-gray-300 focus:border-amber-500 focus:ring-amber-500 rounded-md shadow-sm block w-full mt-1" 
                                   required>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="role">Rola</label>
                            <select name="role" id="role" class="border-gray-300 focus:border-amber-500 focus:ring-amber-500 rounded-md shadow-sm block w-full mt-1">
                                <option value="student" {{ old('role', $user->role) == 'student' ? 'selected' : '' }}>Uczeń</option>
                                <option value="teacher" {{ old('role', $user->role) == 'teacher' ? 'selected' : '' }}>Nauczyciel</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Administrator</option>
                            </select>
                            @error('role')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700 mb-1" for="subjects">
                                Przypisane przedmioty
                            </label>
                            
                            <select name="subjects[]" 
                                    id="subjects" 
                                    multiple 
                                    size="5" 
                                    class="border-gray-300 focus:border-amber-500 focus:ring-amber-500 rounded-md shadow-sm block w-full mt-1">
                                
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}"
                                        {{-- Sprawdź old input LUB czy użytkownik ma już ten przedmiot w bazie --}}
                                        {{ in_array($subject->id, old('subjects', $user->subjects->pluck('id')->toArray())) ? 'selected' : '' }}>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach

                            </select>
                            
                            <p class="text-xs text-gray-500 mt-2">
                                <span class="font-bold">Wskazówka:</span> Przytrzymaj <kbd class="font-mono bg-gray-100 border border-gray-300 rounded px-1">Ctrl</kbd> (lub <kbd>Cmd</kbd>), aby edytować zaznaczenie.
                            </p>
                            
                            @error('subjects')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
<div>
                            <label class="block font-medium text-sm text-gray-700">Klasa</label>
                            <select name="class_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1">
                                <option value="">— brak —</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}" {{ old('class_id', $user->class_id) == $class->id ? 'selected' : '' }}>
                                        {{ $class->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="border-t border-gray-100 pt-4 mt-4">
                            <label class="block font-medium text-sm text-gray-700" for="password">
                                Nowe hasło <span class="text-gray-400 font-normal">(pozostaw puste, aby nie zmieniać)</span>
                            </label>
                            <input type="password" 
                                   name="password" 
                                   id="password"
                                   class="border-gray-300 focus:border-amber-500 focus:ring-amber-500 rounded-md shadow-sm block w-full mt-1" 
                                   autocomplete="new-password">
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center gap-4 pt-2">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-amber-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-700 transition focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2"
                            style="background-color: #059669;">
                                Zaktualizuj
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">Anuluj</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection