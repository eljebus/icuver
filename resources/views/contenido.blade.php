@extends ('layout')


@section ('estilo')


{!! Html::style('css/contenido.css') !!}


@stop


@section ('contenido')
		
			<section id='lic'>
				<h3>Licenciaturas</h3>

				<p>
					<a href="/Gastronomia" title="Gastronomía">Gastronomía</a>
				</p>
				<p>
					<a href="/Laia" title="Administración de la Industria de los Alimentos (LAIA)">Administración de la Industria de los Alimentos (LAIA)</a>
				</p>
			</section>

			<section id='dip'>
				<h3>Diplomados</h3>
				<p><a href="/Reposteria" title="Especialidad en Repostería">Especialidad en Repostería</a></p>
				<p><a href="/Culinarias" title="Especialidades Culinarías (Mediterraneas)">Especialidades Culinarías (Mediterraneas)</a></p>
				<p><a href="/EGastronomia" title="Gastronomía">Gastronomía</a></p>
				
			</section>
@stop



@section ('script')
	
	<script>

	

	</script>

	
@stop

