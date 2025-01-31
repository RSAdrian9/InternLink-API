@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Student</h1>

    <!-- Formulario de edición de estudiante -->
    <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" required>
        </div>

        <div class="mb-3">
            <label for="school_id" class="form-label">School:</label>
            <select class="form-select" id="school_id" name="school_id" required>
                <option value="" disabled selected>Select a school</option>
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}" {{ $student->school_id == $school->id ? 'selected' : '' }}>
                        {{ $school->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
