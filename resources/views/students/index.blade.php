@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Llista d'Estudiants</h2>
    <a class="btn btn-primary" href="{{ route('students.create') }}">Crear Estudiant</a>
    <a class="btn btn-secondary" href="{{ route('courses.index') }}"> Cursos</a>
</div>
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Curs</th>
        <th>Accions</th>
    </tr>
    @foreach ($students as $student)
    <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->course->name ?? 'N/A' }}</td>
        <td>
            <a class="btn btn-info btn-sm" href="{{ route('students.show', $student) }}">Veure</a>
            <a class="btn btn-warning btn-sm" href="{{ route('students.edit', $student) }}">Editar</a>
            <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Estàs segur?')">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
