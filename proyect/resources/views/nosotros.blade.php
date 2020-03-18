@extends('plantilla')

@section('seccion')

	<h1>Este es mi equipo de trabajo</h1>

@foreach($equipo as $item)
	<a href="{{route('nosotros', $item)}}" class="h4 text-danger">{{$item}}</a><br>	
@endforeach

@if(!empty($nombre))
	<p>La variable existe</p>

	@switch($nombre)
		@case($nombre=='Angel')	

			<h2 class="mt-5"> El nombre es {{ $nombre }}: </h2>
			<p>{{ $nombre }} es de Hidalgo, donde hay mucha agua.</p>
		@break
		@case($nombre=='Miguel')	

			<h2 class="mt-5"> El nombre es {{ $nombre }}: </h2>
			<p>{{ $nombre }} es de Hidalgo, donde hay mucha agua.</p>
		@break
		@case($nombre=='Victor')	

			<h2 class="mt-5"> El nombre es {{ $nombre }}: </h2>
			<p>{{ $nombre }} es de Hidalgo, donde hay mucha agua.</p>
		@break
	@endswitch

@endif

@endsection