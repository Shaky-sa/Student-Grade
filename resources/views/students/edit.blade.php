@extends('layouts.app')

@section('content')
<h1>Edit Student</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('students.update', $student) }}">
    @csrf
    @method('PUT')

    <label>Student Name:</label>
    <input type="text" name="student_name" value="{{ old('student_name', $student->student_name) }}" required>
    <br><br>

    <button type="submit">Update</button>
</form>

<a href="{{ route('students.index') }}">Back to Students</a>
@endsection
