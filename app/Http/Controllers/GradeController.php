<?php
namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index(Request $request)
    {
        $query = Grade::with(['student', 'subject']);

        if ($request->filled('search')) {
            $query->whereHas('student', fn($q) => $q->where('student_name', 'like', '%' . $request->search . '%'));
        }

        if ($request->filled('filter')) {
            if ($request->filter == 'PASS') {
                $query->where('grade', '>=', 75);
            } elseif ($request->filter == 'FAIL') {
                $query->where('grade', '<', 75);
            }
        }

        $grades = $query->paginate(10);

        return view('grades.index', compact('grades'));
    }

    public function create()
    {
        return view('grades.create', [
            'students' => Student::all(),
            'subjects' => Subject::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'grade' => 'required|integer|min:0|max:100'
        ]);

        Grade::create($request->only('student_id', 'subject_id', 'grade'));

        return redirect()->route('grades.index')->with('success', 'Grade added.');
    }

    public function edit(Grade $grade)
    {
        return view('grades.edit', [
            'grade' => $grade,
            'students' => Student::all(),
            'subjects' => Subject::all()
        ]);
    }

    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'grade' => 'required|integer|min:0|max:100'
        ]);

        $grade->update($request->only('student_id', 'subject_id', 'grade'));

        return redirect()->route('grades.index')->with('success', 'Grade updated.');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('grades.index')->with('success', 'Grade deleted.');
    }
}
