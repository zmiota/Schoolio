<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Grade;
use App\Models\GradeHistory;
use App\Models\Subject;

class GradeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'role:teacher']);
    // }

    public function index()
    {
        $grades = Grade::with('student', 'subject')
            ->where('teacher_id', auth()->id())
            ->get();

        return view('teacher.grades.index', compact('grades'));
    }

    public function create()
    {
        $teacher = auth()->user();

        $subjects = $teacher->subjects;
        $students = User::where('role', 'student')
            ->whereNotNull('class_id')
            ->get();

        return view('teacher.grades.create', compact('subjects', 'students'));
    }

    public function edit(Grade $grade)
    {
        if ($grade->teacher_id !== auth()->id()) {
            return redirect()->route('teacher.grades.index')
                ->with('error', 'Nie możesz edytować oceny innego nauczyciela.');
        }

        return view('teacher.grades.edit', compact('grade'));
    }

    public function history(Grade $grade)
    {
        $histories = $grade->histories()->with('modifier')->get();
        return view('teacher.grades.history', compact('grade', 'histories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,id',
            'value' => 'required|integer|min:1|max:6',
            'description' => 'nullable|string|max:255',
        ]);

        $grade = Grade::create([
            'student_id' => $request->student_id,
            'teacher_id' => auth()->id(),
            'subject_id' => $request->subject_id,
            'value' => $request->value,
            'description' => $request->description,
        ]);

        GradeHistory::create([
            'grade_id' => $grade->id,
            'old_value' => null,
            'new_value' => $request->value,
            'modified_by' => auth()->id(),
        ]);

        return redirect()->route('teacher.grades.index')->with('success', 'Ocena została dodana.');
    }

    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'value' => 'required|integer|min:1|max:6',
            'description' => 'nullable|string|max:255',
        ]);

        if ($grade->value != $request->value) {
            // zapis do historii
            \App\Models\GradeHistory::create([
                'grade_id' => $grade->id,
                'old_value' => $grade->value,
                'new_value' => $request->value,
                'modified_by' => auth()->id(),
            ]);
        }

        $grade->value = $request->value;
        $grade->description = $request->description;
        $grade->save();

        return redirect()->route('teacher.grades.index')->with('success', 'Ocena zaktualizowana.');
    }

    public function destroy(Grade $grade)
    {
        if ($grade->teacher_id !== auth()->id()) {
            return redirect()->route('teacher.grades.index')
                ->with('error', 'Nie możesz usunąć oceny innego nauczyciela.');
        }

        $grade->delete();

        return redirect()->route('teacher.grades.index')
            ->with('success', 'Ocena została usunięta.');
    }

    public function subjectsForStudent(User $student)
    {
        $teacher = auth()->user();

        if ($student->role !== 'student') {
            return response()->json([]);
        }

        // przedmioty nauczyciela
        $teacherSubjectIds = $teacher->subjects()->pluck('subjects.id');

        // przedmioty ucznia
        $studentSubjectIds = $student->subjects()->pluck('subjects.id');

        // przedmioy wspólne
        $subjectIds = $teacherSubjectIds->intersect($studentSubjectIds);

        $subjects = Subject::whereIn('id', $subjectIds)->get();

        return response()->json($subjects);
    }
}
