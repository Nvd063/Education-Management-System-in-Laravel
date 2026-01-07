<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * 1. Display a listing of the resource.
     * (Fixes the "$students undefined" error)
     */
    public function index()
    {
        $students = Student::all(); 
        return view('students.index', compact('students'));
    }

    /**
     * 2. Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * 3. Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable', // Added phone since your view showed it
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    /**
     * 4. Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * 5. Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'nullable',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully');
    }

    /**
     * 6. Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully');
    }
}