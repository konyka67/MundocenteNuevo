@include('alerts.request')
@if(isset($user))
	<h1>Editar</h1>
	@if($user->idrol == 1)		
		{!!Form::model($user, ['route'=>['usuario.update', $user->id], 'method'=>'put','id'=>'formulario','name'=>'fo'])!!}
		 <input type="hidden" name="_token" value="{{csrf_token()}}" id="tokenn"/>
			@include('usuario.forms.docente')
			{!!Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

		<!-- {!!Form::open(['route'=>['usuario.destroy', $user->id], 'method'=>'delete'])!!}
			{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!} -->
	@elseif($user->idrol == 2)
		{!!Form::model($user, ['route'=>['usuario.update', $user->id], 'method'=>'put'])!!}
			@include('usuario.forms.funcionario')
			{!!Form::submit('Actualizar', ['id'=>'btn-actualizar','class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

	<!-- 	{!!Form::open(['route'=>['usuario.destroy', $user->id], 'method'=>'delete'])!!}
			{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!} -->
	@endif

@endif