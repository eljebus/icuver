@extends ('/Boletas/alumnos/layout')

@section ('estilo')

<meta name="csrf-token" content="{{ csrf_token() }}" />

{!! Html::style('/css/Boletas/index.css') !!}




@stop


@section ('contenido')
		

	<ul class='list-none'>

	@foreach($data['boletas'] as $boleta)

		<li>
			<a href="{{$boleta->Archivo}}" title="">
				{{$boleta->periodo->Nombre}}
			</a>
		</li>
		

	@endforeach
	
		
	</ul>

	
		
			
@stop



@section ('script')
	
		
	
@stop

