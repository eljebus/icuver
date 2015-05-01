@extends ('layout')


@section ('estilo')


{!! Html::style('/css/instalaciones.css') !!}

{!! Html::style('/css/skitter.styles.css') !!}


@stop


@section ('contenido')





	<div id="contentSlider">

		<section id="slider">

				<div class="box_skitter box_skitter_large">
					<ul>

						@foreach($data['fotos'] as $foto)
							<li><a href="#glassBlock"><img src="{{$foto->Archivo}}" class="circles" /></a></li>
						@endforeach

					</ul>
				</div>

			</section>

	</div>

	<h3><a href="/Galerias" title=""><span class="icon-circle-left"></span></a> Instalaciones</h3>
	<br>
	<br>


		
@stop



@section ('script')
	
	{!! Html::script('/js/jquery.easing.1.3.js')!!}
	{!! Html::script('/js/jquery.skitter.min.js')!!}


	<script type="text/javascript">
		$(document).ready(function() {
			$('.box_skitter_large').skitter({
				theme: 'default',
				animation:'upBars',
				width_skitter:1200,
				dots: false, 
				preview: false,
				controls:false,
				navigation: true,
				numbers: false
			});
		});
	</script>
	
@stop

