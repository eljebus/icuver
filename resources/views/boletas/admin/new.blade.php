@extends ('/Boletas/admin/layout')


@section ('estilo')

<meta name="csrf-token" content="{{ csrf_token() }}" />

{!! Html::style('/css/Boletas/admin/new.css') !!}


@stop


@section ('contenido')
		

		<h3> Nuevo registro</h3>

		<br>
		<br>
		
    	{!! form($data['form']) !!}


		
			
@stop



@section ('script')
	
	
	
@stop

