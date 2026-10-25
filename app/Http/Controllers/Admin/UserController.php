<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SchoolClass;
use App\Models\Subject;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'role:admin']);
    // }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $classes = SchoolClass::all();
        $subjects = Subject::all();
        return view('admin.users.create', compact('classes', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,teacher,student',
            'class_id' => 'nullable|exists:classes,id',
            'subjects' => 'nullable|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'class_id' =>  $request->class_id,
        ]);

        if ($request->has('subjects')) {
            $user->subjects()->sync($request->input('subjects', []));
        }

        return redirect()->route('admin.users.index')->with('success', 'Użytkownik dodany pomyślnie.');
    }

    public function edit(User $user)
    {
        $classes = SchoolClass::all();
        $subjects = Subject::all();

        return view('admin.users.edit', compact('user', 'classes', 'subjects'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:admin,teacher,student',
            'class_id' => 'nullable|exists:classes,id',
            'subjects' => 'nullable|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->class_id = $request->class_id;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $user->subjects()->sync($request->input('subjects', []));

        return redirect()->route('admin.users.index')->with('success', 'Użytkownik zaktualizowany.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Użytkownik usunięty.');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
}
