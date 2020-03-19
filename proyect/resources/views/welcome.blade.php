@extends('plantilla')
@section('seccion')

<h1 class="display-4">Notas</h1>

    @if(session('mensaje'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session('mensaje')}}
        </div>
    @endif

    <form action=" {{ route('notas.crear') }} " method="POST">
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
        
        <input type="text" name="nombre" placeholder="Nombre:" class="form-control mb-2" value="{{ old('nombre') }}" >
        <input type="text" name="descripcion" placeholder="Descripción:" class="form-control mb-2" value="{{ old('descripcion') }}" >
        <button class="btn btn-primary btn-block" type="submit">Agregar</button>

    </form> <br>

        <table class="table table-bordered table-hover table-sm">
  <thead class="thead-light">

    <tr>
      <th scope="col">#Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripción</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    @foreach($notas as $item)
    <tr>
      <th scope="row">{{ $item->id}}</th>
      <td>
        <a href="{{route('notas.detalle', $item)}}">{{ $item->nombre}}</a>
      </td>
      <td>{{ $item->descripcion}}</td>
      <td>
          <a href="{{ route('notas.editar', $item) }}" class="btn btn-warning btn-sm">Editar</a>
          <form action="{{ route('notas.eliminar', $item) }}" method="POST" class="d-inline">
            @method('delete')
            @csrf
          <a href="" class="btn btn-danger btn-sm" type="submit">Eliminar</a>
          </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection