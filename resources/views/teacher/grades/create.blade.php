@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border-b border-gray-200">
                    
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">Wystaw nową ocenę</h1>
                        <p class="text-sm text-gray-600 mt-1">Wybierz ucznia i przedmiot, aby dodać ocenę do dziennika.</p>
                    </div>

                    <form method="POST" action="{{ route('teacher.grades.store') }}" class="max-w-lg space-y-6">
                        @csrf
                        
                        <div>
                            <label for="student-select" class="block font-medium text-sm text-gray-700 mb-1">Uczeń</label>
                            <select name="student_id" id="student-select" required 
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full transition duration-150 ease-in-out">
                                <option value="">-- wybierz ucznia --</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                        {{ $student->name }} ({{ $student->class->name ?? 'Brak klasy' }})
                                    </option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="subject-select" class="block font-medium text-sm text-gray-700 mb-1">Przedmiot</label>
                            <select name="subject_id" id="subject-select" required disabled
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full bg-gray-100 disabled:opacity-75 transition duration-150 ease-in-out">
                                <option value="">-- najpierw wybierz ucznia --</option>
                            </select>
                            @error('subject_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="value" class="block font-medium text-sm text-gray-700 mb-1">Ocena (1-6)</label>
                                <input type="number" name="value" id="value" min="1" max="6" step="0.5" required
                                       value="{{ old('value') }}"
                                       class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full"
                                       placeholder="np. 4">
                                @error('value')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="description" class="block font-medium text-sm text-gray-700 mb-1">Opis (opcjonalnie)</label>
                                <input type="text" name="description" id="description"
                                       value="{{ old('description') }}"
                                       placeholder="np. Sprawdzian"
                                       class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full">
                                @error('description')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center gap-4 pt-2">
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                                                    style="background-color: #059669;">

                                    Zapisz
                            </button>
                            <a href="{{ url()->previous() }}" class="text-sm text-gray-600 hover:text-gray-900 underline transition">Anuluj</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const studentSelect = document.getElementById('student-select');
            const subjectSelect = document.getElementById('subject-select');
            
            // Przechowujemy ID przedmiotu z old(), jeśli formularz wrócił z błędem
            const oldSubjectId = "{{ old('subject_id') }}";

            function loadSubjects(studentId, selectedSubjectId = null) {
                // Reset selecta
                subjectSelect.innerHTML = '<option value="">Ładowanie...</option>';
                subjectSelect.disabled = true;
                subjectSelect.classList.add('bg-gray-100');

                if (!studentId) {
                    subjectSelect.innerHTML = '<option value="">-- najpierw wybierz ucznia --</option>';
                    return;
                }

                // Pobieranie danych
                fetch(`/teacher/grades/student/${studentId}/subjects`)
                    .then(response => response.json())
                    .then(subjects => {
                        subjectSelect.innerHTML = '<option value="">-- wybierz przedmiot --</option>';

                        if (subjects.length === 0) {
                            const option = document.createElement('option');
                            option.text = "Brak przypisanych przedmiotów";
                            subjectSelect.add(option);
                        } else {
                            subjects.forEach(subject => {
                                const option = document.createElement('option');
                                option.value = subject.id;
                                option.textContent = subject.name;
                                
                                // Jeśli mamy zapamiętane ID, zaznacz je
                                if (selectedSubjectId && String(subject.id) === String(selectedSubjectId)) {
                                    option.selected = true;
                                }
                                
                                subjectSelect.appendChild(option);
                            });
                            
                            subjectSelect.disabled = false;
                            subjectSelect.classList.remove('bg-gray-100');
                        }
                    })
                    .catch(error => {
                        console.error('Błąd pobierania przedmiotów:', error);
                        subjectSelect.innerHTML = '<option value="">Błąd ładowania</option>';
                    });
            }

            // Nasłuchiwanie zmiany ucznia
            studentSelect.addEventListener('change', function () {
                loadSubjects(this.value);
            });

            // Automatyczne ładowanie przy starcie
            if (studentSelect.value) {
                loadSubjects(studentSelect.value, oldSubjectId);
            }
        });
    </script>
@endsection