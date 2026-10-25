@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-lg overflow-hidden border border-gray-200">
                
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-gray-800">Historia zmian ocen</h1>
                    <p class="mt-2 text-sm text-gray-600">Poniżej znajduje się lista przedmiotów, w których dokonano zmian ocen.</p>
                </div>

                <div class="p-6 bg-gray-50">
                    @forelse($grades as $grade)
                        <div class="bg-white rounded-lg border border-gray-200 shadow-sm mb-8 overflow-hidden last:mb-0">
                            <div class="px-6 py-4 bg-gray-100 border-b border-gray-200 flex items-center justify-between">
                                <h3 class="text-lg font-bold text-gray-800 flex items-center">
                                    <span class="w-2 h-6 bg-indigo-500 rounded-full mr-3"></span>
                                    {{ $grade->subject->name }}
                                </h3>
                                <span class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Aktualna ocena: {{ $grade->value }}</span>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 text-sm">
                                    <thead class="bg-white">
                                        <tr>
                                            <th class="px-6 py-3 text-left font-bold text-gray-500 uppercase tracking-wider w-1/4">Stara ocena</th>
                                            <th class="px-6 py-3 text-left font-bold text-gray-500 uppercase tracking-wider w-1/4">Nowa ocena</th>
                                            <th class="px-6 py-3 text-left font-bold text-gray-500 uppercase tracking-wider w-1/4">Kto zmienił</th>
                                            <th class="px-6 py-3 text-left font-bold text-gray-500 uppercase tracking-wider w-1/4">Data</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        @foreach($grade->histories as $h)
                                        <tr class="hover:bg-gray-50 transition">
                                            <td class="px-6 py-3 text-gray-500">{{ $h->old_value ? $h->old_value : '-' }}</td>
                                            <td class="px-6 py-3 font-bold text-gray-800">{{ $h->new_value }}</td>
                                            <td class="px-6 py-3 text-gray-600">{{ $h->modifier->name }}</td>
                                            <td class="px-6 py-3 text-gray-500 font-mono text-xs">{{ $h->created_at->format('d.m.Y H:i') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-10">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Brak historii</h3>
                            <p class="mt-1 text-gray-500">Nie odnotowano żadnych zmian w Twoich ocenach.</p>
                        </div>
                    @endforelse
                </div>

                <div class="p-4 bg-white border-t border-gray-200">
                    <a href="{{ route('student.dashboard') }}" class="text-sm text-indigo-600 hover:text-indigo-900 font-medium">&larr; Wróć do panelu</a>
                </div>
            </div>
        </div>
    </div>
@endsection