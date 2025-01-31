@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Dashboard</h1>

    <!-- Schools Section -->
    <h2 class="mb-3">Schools</h2>
    <div class="list-group">
        @foreach ($schools as $school)
            <div class="list-group-item">
                <strong>{{ $school->name }}</strong> ({{ $school->city }})
                <ul class="list-unstyled mt-2">
                    @foreach ($school->students as $student)
                        <li>{{ $student->name }} - <small class="text-muted">{{ $student->email }}</small></li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>

    <!-- Students Section -->
    <h2 class="mt-5 mb-3">Students</h2>
    <div class="list-group">
        @foreach ($students as $student)
            <div class="list-group-item">
                {{ $student->name }} - <small class="text-muted">{{ $student->email }}</small> 
                (School: <strong>{{ $student->school->name }}</strong>)
            </div>
        @endforeach
    </div>
</div>
@endsection
