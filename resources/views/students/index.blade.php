@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Students</h1>

    <!-- Crear nuevo estudiante -->
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Create New Student</a>

    <div class="list-group">
        @foreach ($students as $student)
        <div class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <strong>{{ $student->name }}</strong> -
                <span class="text-muted">{{ $student->email }}</span> -
                School: <em>{{ $student->school->name }}</em>
            </div>

            <div>
                <!-- Ver detalles (Show) -->
                <a href="{{ route('students.show', $student) }}" class="btn btn-info btn-sm">Show</a>
                <!-- Editar -->
                <a href="{{ route('students.edit', $student) }}" class="btn btn-warning btn-sm">Edit</a>

                <!-- Eliminar -->
                <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection