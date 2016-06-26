@extends('layouts.panelpublicaciones')

@section('titulo-pagina')
	Listar
@stop

@section('contenido')
	@if(Session::has('mensaje'))
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		  	{{ Session::get('mensaje') }}
		</div>
	@endif

	@if(isset($publicaciones))
		@if($publicaciones)
			<table class="table">
				<thead>
					<th>Nombre</th>
					<th>Resumen</th>
					<th>Tipo</th>
					<th>Fecha publicado</th>
					<th>Fecha cierre</th>
					<th>Acciones</th>
				</thead>
					@foreach($publicaciones as $publicacion)
						@if($publicacion->estado == 'activa')
							@include('publicacion.listado')
						@endif
					@endforeach
			</table>
			<div class="row">
			    <div class="col-md-2 col-md-offset-5">
			    	<div class="form-group">
						<a href="/publicacion/create" class="form-control btn btn-primary">Crear nueva</a>
					</div>
			    </div>
			</div>	
		@else
			<h3 class="text-center">No tiene publicaciones</h3>
			<div class="row">
			    <div class="col-md-2 col-md-offset-5">
			    	<div class="form-group">
						<a href="/publicacion/create" class="form-control btn btn-primary">Crear nueva</a>
					</div>
			    </div>
			</div>			
		@endif
	@endif
@stop