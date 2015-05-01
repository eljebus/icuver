<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{$data['section']}}</title>
	<link href='http://fonts.googleapis.com/css?family=PT+Serif|Droid+Serif' rel='stylesheet' type='text/css'>

	@yield('estilo')

	<style>

		#{{$data['section']}}{

			text-decoration: underline
		}
		
	</style>
</head>
<body>

	<div id="container">


		<header id="header" class="">
			

			<aside>
				<a href="{{ url('/Boletas/Admin/exit') }}">
					<span class="icon-circle-left"></span>
					Salir
				</a>
			</aside>
			<figure>
				<img src="/image/icuver.png" alt="">
			</figure>
			

			<h1>{{$data['section']}}</h1>

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
		<nav>
				<ul>

					
					<li id='Alumnos'>
						<a href="/Boletas/Admin/Alumnos" title="">
							Alumnos
						</a>
					</li>
					<li id='Periodos'>
						<a href="/Boletas/Admin/Periodos" title="">
							Períodos
						</a>
					</li>
	
				
				</ul>
			</nav>

		<section id="content">

		
			<section id="mainContainer">

				@yield('contenido')

			</section>

			

		</section>


		<footer>
			
		</footer>
	</div>

{!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js')!!}

@yield('script')

<script>

		$(document).on('ready',iniciar);

		function iniciar(){

			$('.delete').on('click',remove);

		}

		function remove(){

			var idItem 	= $(this).data('id');
			var section 	= $(this).data('section');
			var element 	= $(this);


			$.ajax({

				url : '/Boletas/deleteItem',
				type : 'POST',
				dataType: 'json',
				data : { id:idItem, seccion: section},
				success : function(res){

					if(res.Error ==  'false'){

						$(element).parent().parent().remove();
					}
				},
				headers: {
			       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			}); 
		}
	
</script>
	
</body>
</html>