@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2>Crear Nou Curs</h2>
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

<form action="{{ route('courses.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-md-12 mb-3">
            <label class="form-label">Nom:</label>
            <input type="text" name="name" class="form-control" placeholder="Nom del curs" value="{{ old('name') }}">
        </div>
        <div class="col-md-12 mb-3">
            <label class="form-label">Descripció:</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Descripció del curs">{{ old('description') }}</textarea>
        </div>
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a class="btn btn-secondary" href="{{ route('courses.index') }}">Tornar</a>
        </div>
    </div>
</form>
@endsection
