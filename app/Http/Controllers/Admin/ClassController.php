<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolClass;

class ClassController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'role:admin']);
    // }

    public function index()
    {
        $classes = SchoolClass::all();
        return view('admin.classes.index', compact('classes'));
    }

    public function create()
    {
        return view('admin.classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:10',
            'year' => 'required|string|max:9',
        ]);

        SchoolClass::create([
            'name' => $request->name,
            'year' => $request->year,
        ]);

        return redirect()->route('admin.classes.index')
            ->with('success', 'Oddział dodany pomyślnie.');
    }

    public function edit(SchoolClass $class)
    {
        return view('admin.classes.edit', compact('class'));
    }

    public function update(Request $request, SchoolClass $class)
    {
        $request->validate([
            'name' => 'required|string|max:10',
            'year' => 'required|string|max:9',
        ]);

        $class->update([
            'name' => $request->name,
            'year' => $request->year,
        ]);

        return redirect()->route('admin.classes.index')
            ->with('success', 'Oddział zaktualizowany.');
    }

    public function destroy(SchoolClass $class)
    {
        $class->delete();

        return redirect()->route('admin.classes.index')
            ->with('success', 'Oddział usunięty.');
    }
}