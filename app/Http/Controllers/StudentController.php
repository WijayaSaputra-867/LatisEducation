<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Models\Institution;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index()
    {
        $total_students = Student::count();

        $total_latis = Student::whereHas('institution', function ($query) {
            $query->where('name', 'LatisEducation');
        })->count();

        $total_tutor = Student::whereHas('institution', function ($query) {
            $query->where('name', 'TutorIndonesia');
        })->count();

        $students = Student::with('institution')->latest()->get();

        $institutions = Institution::orderBy('name')->get();

        return view('students.index', compact('students', 'institutions', 'total_students', 'total_latis', 'total_tutor'));
    }

    public function create(){
        $institutions = Institution::all();

        return view('students.create', compact('institutions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'institution_id' => ['required', 'exists:institutions,id'],
            'nis' => ['required', 'unique:students', 'numeric'],
            'email' => ['required', 'email', 'max:254'],
            'photo' => ['nullable',  'image', 'mimes:png,jpg', 'max:100'],
        ]);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('students', 'public');
        }

        Student::create([
            'name' => $request->name,
            'institution_id' => $request->institution_id,
            'nis' => $request->nis,
            'email' => $request->email,
            'photo' => $photoPath,
        ]);

        return redirect()->route('students.index');
    }

    public function edit(Student $student)
    {
        $institutions = Institution::all();

        return view('students.edit', compact('student', 'institutions'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'institution_id' => ['required', 'exists:institutions,id'],
            'nis' => ['required', 'unique:students,nis,' . $student->id, 'numeric'],
            'email' => ['required', 'email', 'max:254'],
            'photo' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:100'],
        ]);

        $photoPath = $student->photo;

        if ($request->hasFile('photo')) {
            if ($student->photo) {
                Storage::disk('public')->delete($student->photo);
            }

            $photoPath = $request->file('photo')->store('students', 'public');
        }

        $student->update([
            'name' => $request->name,
            'institution_id' => $request->institution_id,
            'nis' => $request->nis,
            'email' => $request->email,
            'photo' => $photoPath,
        ]);

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        if ($student->photo) {
            Storage::disk('public')->delete($student->photo);
        }

        $student->delete();

        return redirect()->route('students.index');
    }

    public function export()
    {
        return Excel::download(new StudentExport, 'students.xlsx');
    }
}
