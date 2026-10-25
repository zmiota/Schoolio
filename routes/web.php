<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Teacher\GradeController as TeacherGradeController;
use App\Http\Controllers\Student\GradeController as StudentGradeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route(auth()->user()->dashboardRoute());
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('users', UserController::class);
        Route::resource('classes', ClassController::class);
        Route::resource('subjects', SubjectController::class);
    });

Route::middleware(['auth', 'role:teacher,admin'])
    ->prefix('teacher')
    ->name('teacher.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('teacher.dashboard');
        })->name('dashboard');

        Route::get('/grades', [TeacherGradeController::class, 'index'])->name('grades.index');

        Route::get('/grades/create', [TeacherGradeController::class, 'create'])
            ->name('grades.create');
        Route::post('/grades', [TeacherGradeController::class, 'store'])
            ->name('grades.store');
        
        Route::get('/grades/{grade}/history', [TeacherGradeController::class, 'history'])
            ->name('grades.history');

        Route::get('/grades/{grade}/edit', [TeacherGradeController::class, 'edit'])
            ->name('grades.edit');
        Route::put('/grades/{grade}', [TeacherGradeController::class, 'update'])
            ->name('grades.update');
        Route::delete('/grades/{grade}', [TeacherGradeController::class, 'destroy'])
            ->name('grades.destroy');

        Route::get('/grades/student/{student}/subjects', [TeacherGradeController::class, 'subjectsForStudent'])
            ->name('grades.student.subjects');
    });

Route::middleware(['auth', 'role:student'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('student.dashboard');
        })->name('dashboard');

        Route::get('/grades', [StudentGradeController::class, 'index'])->name('grades.index');
        Route::get('/grades/history', [StudentGradeController::class, 'history'])
            ->name('grades.history');
    });

require __DIR__.'/auth.php';
