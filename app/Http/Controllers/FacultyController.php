<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::with('user')->latest()->get();
        return view('faculty.index', compact('faculties'));
    }

    public function create()
    {
        return view('faculty.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:faculties,email',
            'phone' => 'required|max:20',
            'department' => 'required|max:255',
        ]);

        Faculty::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'department' => $request->department,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('faculty.index')
            ->with('success', 'Faculty member added successfully!');
    }

    public function show(Faculty $faculty)
    {
        return view('faculty.show', compact('faculty'));
    }

    public function edit(Faculty $faculty)
    {
        if ($faculty->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('faculty.edit', compact('faculty'));
    }

    public function update(Request $request, Faculty $faculty)
    {
        if ($faculty->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:faculties,email,' . $faculty->id,
            'phone' => 'required|max:20',
            'department' => 'required|max:255',
        ]);

        $faculty->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'department' => $request->department,
        ]);

        return redirect()->route('faculty.index')
            ->with('success', 'Faculty member updated successfully!');
    }

    public function destroy(Faculty $faculty)
    {
        if ($faculty->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $faculty->delete();

        return redirect()->route('faculty.index')
            ->with('success', 'Faculty member deleted successfully!');
    }
}
