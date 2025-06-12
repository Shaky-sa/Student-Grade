@extends('layouts.app')

@section('content')
<h1>Subjects</h1>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<a href="{{ route('subjects.create') }}">Add Subject</a>

<table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Subject Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($subjects as $subject)
        <tr>
            <td>{{ $subject->id }}</td>
            <td>{{ $subject->subject_name }}</td>
            <td>
                <a href="{{ route('subjects.edit', $subject) }}">Edit</a> |
                <form action="{{ route('subjects.destroy', $subject) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete this subject?')" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="3">No subjects found.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $subjects->links() }}

@endsection
