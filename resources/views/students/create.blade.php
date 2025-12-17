@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2>Crear Nou Estudiant</h2>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('students.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-md-12 mb-3">
            <label class="form-label">Nom:</label>
            <input type="text" name="name" class="form-control" placeholder="Nom de l'estudiant" value="{{ old('name') }}">
        </div>
        <div class="col-md-12 mb-3">
            <label class="form-label">Curs:</label>
            <select name="course_id" class="form-control">
                <option value="">Selecciona un curs</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a class="btn btn-secondary" href="{{ route('students.index') }}">Tornar</a>
        </div>
    </div>
</form>
@endsection
