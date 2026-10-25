<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'role:student']);
    // }

    public function index()
    {
        $grades = Grade::with('subject', 'teacher')
            ->where('student_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('student.grades.index', compact('grades'));
    }

    public function history()
    {
        $grades = Grade::with('histories.modifier', 'subject')
            ->where('student_id', auth()->id())
            ->get();

        return view('student.grades.history', compact('grades'));
    }
}
