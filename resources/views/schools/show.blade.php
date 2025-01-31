@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">{{ $school->name }}</h1>
    <p class="lead">City: <strong>{{ $school->city }}</strong></p>

    <a href="{{ route('schools.index') }}" class="btn btn-secondary">Back to list</a>
</div>
@endsection
