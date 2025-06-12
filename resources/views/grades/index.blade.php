@extends('layouts.app')

@section('content')
<h1>Grades</h1>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<form method="GET" action="{{ route('grades.index') }}">
    <input type="text" name="search" placeholder="Search student" value="{{ request('search') }}">
    <select name="filter">
        <option value="">All</option>
        <option value="PASS" {{ request('filter') == 'PASS' ? 'selected' : '' }}>PASS</option>
        <option value="FAIL" {{ request('filter') == 'FAIL' ? 'selected' : '' }}>FAIL</option>
    </select>
    <button type="submit">Filter</button>
</form>

<a href="{{ route('grades.create') }}">Add Grade</a>

<table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px;">
    <thead>
        <tr>
            <th>Student</th>
            <th>Subject</th>
            <th>Grade</th>
            <th>Remarks</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($grades as $grade)
        <tr>
            <td>{{ $grade->student->student_name }}</td>
            <td>{{ $grade->subject->subject_name }}</td>
            <td>{{ $grade->grade }}</td>
            <td>{{ $grade->remarks }}</td>
            <td>
                <a href="{{ route('grades.edit', $grade) }}">Edit</a> |
                <form action="{{ route('grades.destroy', $grade) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete this grade?')" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5">No grades found.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $grades->links() }}

@endsection
