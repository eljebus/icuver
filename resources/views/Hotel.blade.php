@extends ('layout')


@section ('estilo')


{!! Html::style('/css/hotel.css') !!}
{!! Html::style('/css/skitter.styles.css') !!}

@stop


@section ('contenido')
		
		<section id="data">
			<p>Cristóbal Colón 216, esq. Ernesto Domínguez, Fracc. Reforma, Veracruz, Veracruz.
			<br>Tel. 01(229) 2 00 90 02/ 9 35 07 92</p>

			<p>Relaciones Públicas: Lic. Isis Colorado Vázquez 
			<br>Cristóbal Colón 300, Fracc. Reforma, Veracruz, Veracruz.
			<br>Tel. 01(229) 9 80 80 44</p>
			Director Académico: Lic. Mario Gamboa Baeza 
			Fan page: Instituto Culinario de Veracruz
			Facebook: ICUVER VERACRUZ
			Twitter: @Icuver_Oficial


		</section>
		<section id="mapa">
			<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3768.472797707006!2d-96.1222525!3d19.174541200880345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sveracruz+Cristobal+Colon+216!5e0!3m2!1ses-419!2smx!4v1426200367813" width="100%" height="350" frameborder="0" style="border:0"></iframe>
		</section>
		<div id="izquierda"></div>

		<section id="slider">

			<div class="box_skitter box_skitter_large">
				<ul>
					<li><a href="#glassBlock"><img src="/image/main.png" class="circles" /></a></li>
					<li><a href="#glassBlock"><img src="/image/main2.png" class="circles" /></a></li>
					<li><a href="#glassBlock"><img src="/image/main3.png" class="circles" /></a></li>

				</ul>
			</div>

		</section>



		
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

