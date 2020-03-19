@extends('plantilla')
@section('seccion')
	<h1>Editar Nota: {{ $nota->id }}</h1>
	<form action=" {{ route('notas.update', $nota->id) }} " method="POST">
		@method('PUT')
        @csrf <!-- token de seguridad, evita que el sitio web colapse -->

        @error('nombre')
            <div class="alert alert-danger">El nombre es obligatorio
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @enderror

        @error('descripcion')
            <div class="alert alert-danger">La descripcion es oblogatoria
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @enderror
        
        <input type="text" name="nombre" placeholder="Nombre:" class="form-control mb-2" value="{{ $nota->nombre }}" >

        <input type="text" name="descripcion" placeholder="Descripción:" class="form-control mb-2" value="{{ $nota->descripcion }}" >

        <button class="btn btn-warning btn-block" type="submit">Editar</button>

    </form>
@endsection