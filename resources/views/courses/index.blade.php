@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Llista de Cursos</h2>
    <div>
        <a class="btn btn-primary" href="{{ route('courses.create') }}">Crear Curs</a>
        <a class="btn btn-secondary" href="{{ route('students.index') }}">Estudiants</a>
        <a class="btn btn-success" href="{{ route('courses.export') }}">Exportar CSV</a>
    </div>
</div>
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Estudiants</th>
        <th>Accions</th>
    </tr>
    @foreach ($courses as $course)
    <tr>
        <td>{{ $course->id }}</td>
        <td>{{ $course->name }}</td>
        <td>{{ $course->students_count }}</td>
        <td>
            <a class="btn btn-info btn-sm" href="{{ route('courses.show', $course) }}">Veure</a>
            <a class="btn btn-warning btn-sm" href="{{ route('courses.edit', $course) }}">Editar</a>
            <form action="{{ route('courses.destroy', $course) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Estàs segur?')">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
