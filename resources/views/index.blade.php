<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="/img/logo.png"type="image/x-icon" />
	<title> ICUVER</title>


	<meta name="description" content="Pasión por lo que haces">
	<link href='http://fonts.googleapis.com/css?family=PT+Serif|Droid+Serif' rel='stylesheet' type='text/css'>
	{!! Html::style('css/styleIndex.css') !!}


</head>
<body>


	<div id ='container'>
		<header>
			<ul>
				<a href="/Nosotros" title="Nosotros" id='we'>
					<li >Nosotros</li>
				</a>
				<a href="/Contenido" title="Contenido" id='conte'>
					<li >Contenido Académico</li>
				</a>
				
				<a href="/Asesorias" title="Asesorias" id='aseso'>
					<li >Asesorias</li>
				</a>
				
				<a href="/Alumnos" title="Alumnos" id='alu'>
					<li >Alumnos</li>
				</a>

				<a href="/Galerias" title="" id='gale'>
					<li >Galerías</li>
				</a>

				<a href="/Hotel" title="Hotel" id='hotel'>
					<li >Hotel Escuela</li>
				</a>
				
				<a href="/Eventos" title="" id='event'>
					<li >Eventos</li>
				</a>
				
				<a href="/Contacto" title="" id='contact'>
					<li >Contacto</li>
				</a>
				

			</ul>
			
		</header>


		<section id="content">
			<h1 class='drop-shadow curved curved-hz-1'>
				Instituto Culinario de Veracruz
			</h1>
			<section id="slider">
				<div class="box_skitter box_skitter_large">
					<ul>

						@foreach($slider as $foto)
							<li><a href="#glassBlock"><img src="{{$foto->Archivo}}" class="circles" /></a></li>
						@endforeach

					</ul>
				</div>

				<img src="/image/logo.png" alt="" id='logo'>
			</section>

			<section id='redes'>

				<aside id='fb'  class='drop-shadow curved curved-hz-1'>
					<a href="https://twitter.com/icuver_oficial" title="Siguenos en Twitter" target='blank'>
						<span class="icon-twitter"></span>
					</a>
					&nbsp;
					&nbsp;
					<a href="https://www.facebook.com/InstitutoCulinarioDeVeracruz" title="Siguenos en facebook" target='blank'>
						<SPAN class="icon-facebook"></SPAN>
					</a>
					
				</aside>

				<aside id="slogan" class='drop-shadow curved curved-hz-1'>
					Pasión por lo que haces
				</aside>
				
			</section>

		</section>

		<footer>
			<center>
				<h2>Vinculaciones</h2>
				<IMG SRC="/image/pie.png">
			</center>
		</footer>
	
	</div>


	{!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js')!!}
	{!! Html::script('/js/jquery.easing.1.3.js')!!}
	{!! Html::script('/js/jquery.skitter.min.js')!!}


	<script type="text/javascript">
		$(document).ready(function() {
			$('.box_skitter_large').skitter({
				theme: 'default',
				animation:'glassCube',
				width_skitter:1200,
				dots: false, 
				preview: false,
				controls:false,
				navigation: false,
				numbers: false
			});
		});
	</script>


</body>
</html>