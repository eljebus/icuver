<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="/img/logo.png"type="image/x-icon" />
	<title>{{$data['section']}}</title>
	<link href='http://fonts.googleapis.com/css?family=PT+Serif|Droid+Serif' rel='stylesheet' type='text/css'>

	@yield('estilo')
</head>
<body>

	<div id="container">


		<header id="header" class="">
			

			<aside>
				<a href="/" title="Inicio">
					<span class="icon-circle-left"></span>
					Inicio
				</a>
			</aside>
			<figure>
				<img src="/image/icuver.png" alt="">
			</figure>
			

			<h1>{{$data['titulo']}}</h1>

			<aside id='redes'>
					<a href="https://twitter.com/icuver_oficial" title="Siguenos en Twitter" target='blank'>
						<span class="icon-twitter"></span>
					</a>
					&nbsp;
					&nbsp;
					<a href="https://www.facebook.com/InstitutoCulinarioDeVeracruz" title="Siguenos en facebook" target='blank'>
						<SPAN class="icon-facebook"></SPAN>
					</a>
			</aside>



		</header>

		<section id="content">

			@yield('contenido')

		</section>


		<footer>
			
		</footer>
	</div>

{!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js')!!}

@yield('script')
	
</body>
</html>