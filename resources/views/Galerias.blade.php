@extends ('layout')


@section ('estilo')


{!! Html::style('/css/galerias.css') !!}

@stop


@section ('contenido')
		
	<a href="/Galerias/Actividades" title="">
		<figure>
		
			<img src="/image/galeria/g1.jpg" alt="">	
			<figcaption>Actividades Escolares</figcaption>
		</figure>
	</a>

	<a href="/Galerias/Equipo" title="">
		<figure>
			
			<img src="/image/galeria/g2.jpg" alt="">	
			<figcaption>Equipos de Trabajo</figcaption>
		</figure>

	</a>


	<a href="/Galerias/Chefs" title="">
		<figure>
		
			<img src="/image/galeria/g3.jpg" alt="">	
			<figcaption>Chefs Instructores</figcaption>
		</figure>

	</a>

	<a href="/Galerias/Instalaciones" title="">
		<figure>
		
			<img src="/image/galeria/g4.jpg" alt="">	
			<figcaption style='border:none'>Instalaciones</figcaption>
		</figure>


	</a>
	

	


		
@stop



@section ('script')
	
	
	
@stop

