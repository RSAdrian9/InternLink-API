@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit School</h1>

    <!-- Formulario de edición de escuela -->
    <form action="{{ route('schools.update', $school) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $school->name }}" required>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">City:</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ $school->city }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
