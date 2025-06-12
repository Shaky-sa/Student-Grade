@extends('layouts.app')

@section('content')
<h1>Edit Grade</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('grades.update', $grade) }}">
    @csrf
    @method('PUT')

    <label>Student:</label>
    <select name="student_id" required>
        @foreach ($students as $student)
            <option value="{{ $student->id }}" {{ $grade->student_id == $student->id ? 'selected' : '' }}>
                {{ $student->student_name }}
            </option>
        @endforeach
    </select><br><br>

    <label>Subject:</label>
    <select name="subject_id" required>
        @foreach ($subjects as $subject)
            <option value="{{ $subject->id }}" {{ $grade->subject_id == $subject->id ? 'selected' : '' }}>
                {{ $subject->subject_name }}
            </option>
        @endforeach
    </select><br><br>

    <label>Grade (0-100):</label>
    <input type="number" name="grade" min="0" max="100" value="{{ $grade->grade }}" required><br><br>

    <button type="submit">Update</button>
</form>

<a href="{{ route('grades.index') }}">Back to Grades</a>
@endsection
