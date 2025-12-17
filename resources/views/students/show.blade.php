@extends('layouts.app')

@section('content')
<div class="row mb-3">
    <div class="col-lg-12">
        <h2>Detalls de l'Estudiant</h2>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-3"><strong>Nom:</strong></div>
            <div class="col-md-9">{{ $student->name }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Curs:</strong></div>
            <div class="col-md-9">
                @if($student->course)
                    <a href="{{ route('courses.show', $student->course) }}">{{ $student->course->name }}</a>
                @else
                    N/A
                @endif
            </div>
        </div>
    </div>
</div>

<div class="mt-3">
    <a class="btn btn-secondary" href="{{ route('students.index') }}">Tornar</a>
</div>
@endsection
