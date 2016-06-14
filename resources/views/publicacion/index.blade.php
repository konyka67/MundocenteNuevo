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
					<th>Descripción</th>
					<th>Tipo</th>
					<th>Fecha publicado</th>
					<th>Fecha cierre</th>
					<th>Acciones</th>
				</thead>
					@foreach($publicaciones as $publicacion)
						<tbody>
							<th>{{ $publicacion->nombre }}</th>
							<th>{{ $publicacion->descripcion }}</th>
							<th>{{ $publicacion->tipo }}</th>
							<th>{{ $publicacion->created_at }}</th>
							<th>{{ $publicacion->fecha_cierre }}</th>
							<th>
								{!!link_to_route('publicacion.edit', $title = 'Editar', $parameters = $publicacion->id, $atrributes = ['class' => 'btn btn-primary'])!!}
								<button class="borrar btn btn-default" data-toggle="modal" data-target="#{{ $publicacion->id }}">
								    ¿Borrar?
								</button>
								<div class="modal fade" id="{{ $publicacion->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								    <div class="modal-dialog">
								        <div class="modal-content">
								            <div class="modal-header">
								            	<button type="button" class="close" data-dismiss="modal">&times;</button>
								                <h4 class="text-center modal-title">Borrar {{ $publicacion->nombre }}</h4>
								            </div>
								            <div class="modal-body">
								                <p>¿Seguro que desea eliminar la siguiente publicación?</p>
								                <ul>
								                	<li><h4>Nombre </h4>{{ $publicacion->nombre }}</li>
								                	<li><h4>Descripción </h4>{{ $publicacion->descripcion }}</li>
								                </ul>
								            </div>
								            <div class="modal-footer">
								                {!!Form::open(['route'=>['publicacion.destroy', $publicacion->id], 'method'=>'delete'])!!}
								                <a class="btn btn-default" data-toggle="modal" data-target="#{{ $publicacion->id }}">
										    		Cancelar
												</a>
												{!!Form::submit('Borrar', ['class'=>'btn btn-danger'])!!}
												{!!Form::close()!!}
								            </div>
								        </div>
								    </div>
								</div>
							</th>
						</tbody>
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