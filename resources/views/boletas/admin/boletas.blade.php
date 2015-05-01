@extends ('/Boletas/admin/layout')


@section ('estilo')

<meta name="csrf-token" content="{{ csrf_token() }}" />

{!! Html::style('/css/Boletas/admin/boletas.css') !!}




@stop


@section ('contenido')
		
	
	<h3> Boletas de alumn@ {{$data['alumno']->Nombre}} {{$data['alumno']->Apellidos}}</h3>
	<br>
	<br>
	<ul class='list-none'>

		<li>
			<a href="/Boletas/Admin/newTicket/{{$data['alumno']->idAlumno}}" title="">
				<label class="icon-plus"></label>
				Nueva
			</a>
		</li>
	@foreach($data['boletas'] as $boleta)

		<li>
			<a href="{{$boleta->Archivo}}" title="">
				{{$boleta->periodo->Nombre}}
			</a>
			&nbsp;&nbsp;&nbsp;
			<a href="/Boletas/Admin/verTicket/{{$boleta->idBoleta}}" title="Actualizar">
				<label class="icon-pencil edit"></label>
			</a>
		</li>
		

	@endforeach
	
		
	</ul>

	
		
			
@stop



@section ('script')
	
		
	
@stop

