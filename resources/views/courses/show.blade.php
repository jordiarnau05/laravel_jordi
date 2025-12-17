@extends('layouts.app')

@section('content')
<div class="row mb-3">
    <div class="col-lg-12">
        <h2>Detalls del Curs</h2>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-3"><strong>Nom:</strong></div>
            <div class="col-md-9">{{ $course->name }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Descripció:</strong></div>
            <div class="col-md-9">{{ $course->description ?? 'N/A' }}</div>
        </div>
    </div>
</div>

<div class="mt-4">
    <h4>Estudiants del Curs ({{ $course->students->count() }})</h4>
    @if($course->students->count() > 0)
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Nom</th>
            </tr>
            @foreach ($course->students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
            </tr>
            @endforeach
        </table>
    @else
        <p>No hi ha estudiants inscrits en aquest curs.</p>
    @endif
</div>

<div class="mt-3">
    <a class="btn btn-secondary" href="{{ route('courses.index') }}">Tornar</a>
</div>
@endsection
