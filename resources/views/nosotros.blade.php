<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="/img/logo.png"type="image/x-icon" />
	<title>ICUVER -  Nosotros</title>
	<meta name="description" content="Pasión por lo que haces">

	<link href='http://fonts.googleapis.com/css?family=PT+Serif|Droid+Serif' rel='stylesheet' type='text/css'>
	{!! Html::style('css/nosotros.css') !!}

</head>

<body>

	<div id="container">

		<header>
			<aside class='inline'>
				<a href="/" title="Inicio">
					<span class="icon-circle-left"></span>
					Inicio
				</a>
			</aside>
			<h1 class='inline'>{{$data['section']}}</h1>
		</header>

		<div id="derecha"></div>

		<div id="content">

			<h2> ¿Qué es ICUVER? </h2> 
			<p> 
				ICUVER es una institución con la finalidad de impulsar a nuestros alumnos a ejercer su profesión en empresas de clase mundial,  con la meta de posicionar a méxico en un importante nivel dentro del ámbito gastronómico, así como lograr expandir nuestro nombre como una de las mas importantes instituciones culinarias del país. 
			</p>



			
		</div>
		<div id="izquierda"></div>

		
		



		<footer>
			<nav>
				<ul>

					<li id='que' data-color = '#806B3C'>¿Qué es ICUVER?</li>
					<li id='valores'  data-color='#E1C035'>Valores</li>
					<li id='chef' data-color='#786E29'>¿Qué es un Chef?</li>
					<li id='mision' data-color='#B89C6A'>Misión</li>
					<li id='vision' data-color='#E8D994'>Visión</li>

				</ul>
			</nav>
		</footer>

	</div>

	{!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js')!!}
	
	<script>

	var data = {

				que : '<h2> ¿Qué es ICUVER? </h2> <p> ICUVER es una institución con la finalidad de impulsar a nuestros alumnos a ejercer su profesión en empresas de clase mundial,  con la meta de posicionar a méxico en un importante nivel dentro del ámbito gastronómico, así como lograr expandir nuestro nombre como una de las mas importantes instituciones culinarias del país. </p>',

				valores : '<iframe width="640" height="360" src="https://www.youtube.com/embed/0gHPf9DkkRk" frameborder="0" allowfullscreen></iframe>',

				chef : '<h2> ¿Qué es un Chef? </h2> <p> Persona que prepara comida como ocupacón en un restaurante, casa privada, hotel, etc.<br> Toman un rol importante en la sociedad en el siglo V con la administración de las cocinas y el establecimiento de un organigrama que define las actividades y responsabilidades dentro de la cocina. </p>',

				mision: '<h2>Misión</h2> <p> Somos una institución educativa capaz de expandir el arte culinario, aprovechando al máximo el gran potencial que poseen los jóvenes para crear e innovar, guiándolos a lograr sus aspiraciones por medio de una formación ética y profesional que les brinde oportunidades para desenvolverse en la industria gastronómica con alto sentido de responsabilidad y compromiso social. </p>',

				vision: '<h2>Visión</h2> <p> Impulsar a nuestros alumnos a ejercer su profesión en empresas de clase mundial, con la meta de posicionar a México en un importante nivel dentro del ámbito gastronómico, así como lograr expandir nuestro nombre como una de las más importante instituciones culinarias del país.</p>'

			}

			$(document).on('ready',menu);

			function menu(){

				$('footer ul li').on('click',showInfo);

			}

			function showInfo(){

				var color 		= $(this).data('color');
				var id 			= $(this).attr('id');

				var contenido 	= data[id];

				$('#content').html(contenido);

				$('#content').css('background',color);
				$('#derecha').css('border-bottom-color',color);
				$('#izquierda').css('border-top-color',color);

				$('html, body').animate({scrollTop: '0px'}, 1000);


			}


	</script>

	
</body>
</html>

