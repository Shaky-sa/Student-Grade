@extends('layouts.app')

@section('content')
<h1>Add Subject</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('subjects.store') }}">
    @csrf

    <label>Subject Name:</label>
    <input type="text" name="subject_name" value="{{ old('subject_name') }}" required>
    <br><br>

    <button type="submit">Add</button>
</form>

<a href="{{ route('subjects.index') }}">Back to Subjects</a>
@endsection
