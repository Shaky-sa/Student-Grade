@extends('layouts.app')

@section('content')
<h1>Students</h1>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<a href="{{ route('students.create') }}">Add Student</a>

<table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->student_name }}</td>
            <td>
                <a href="{{ route('students.edit', $student) }}">Edit</a> |
                <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete this student?')" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="3">No students found.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $students->links() }}

@endsection
