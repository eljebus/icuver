@extends ('layout')


@section ('estilo')


{!! Html::style('/css/eventos.css') !!}


@stop


@section ('contenido')


	@foreach($data['events'] as $evento)
		<figure>
			
			<img src="{{$evento->Archivo}}" alt="">
			
		</figure>
	@endforeach
		

	
		
@stop



@section ('script')
	
	
@stop

