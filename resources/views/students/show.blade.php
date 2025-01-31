@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">{{ $student->name }}</h1>
    <p class="lead">Email: <strong>{{ $student->email }}</strong></p>
    <p class="lead">School: <strong>{{ $student->school->name }}</strong></p>

    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to list</a>
</div>
@endsection
