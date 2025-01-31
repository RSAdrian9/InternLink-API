@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Schools</h1>
    
    <!-- Crear nueva escuela -->
    <a href="{{ route('schools.create') }}" class="btn btn-primary mb-3">Create New School</a>
    
    <div class="list-group">
        @foreach ($schools as $school)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <!-- Enlace a la escuela -->
                    <a href="{{ route('schools.show', $school) }}" class="h5 text-decoration-none">{{ $school->name }}</a> - 
                    <span class="text-muted">{{ $school->city }}</span>
                </div>
                
                <div>
                    <!-- Editar -->
                    <a href="{{ route('schools.edit', $school) }}" class="btn btn-warning btn-sm">Edit</a>
                    
                    <!-- Eliminar -->
                    <form action="{{ route('schools.destroy', $school) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this school?')">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
