<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link href='http://fonts.googleapis.com/css?family=PT+Serif|Droid+Serif' rel='stylesheet' type='text/css'>
	<link href='/css/Admin/index.css' rel='stylesheet' type='text/css'>
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<style>
		body{
			font-family: 'Droid Serif',serif !important;
		}
		a{
			color:white !important;
		}
		#mainContainer{
			width:  100% !important;
			margin-left: 0px !important;
			padding-top: 2em
		}
		
	</style>

</head>
<body>

	<div id="container">


		<header id="header" class="">
			

			<aside>
				<a href="{{ url('/auth/logout') }}">
					<span class="icon-circle-left"></span>
					Inicio
				</a>
			</aside>
			<figure>
				<img src="/image/icuver.png" alt="">
			</figure>
			

			<h1>Administración</h1>

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

			<section id="mainContainer">

				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="panel panel-default">
								<div class="panel-heading">Ingresa tus datos</div>
								<div class="panel-body">
									@if (count($errors) > 0)
										<div class="alert alert-danger">
											<strong>Whoops!</strong> Hay problemas con tus datos.<br><br>
											
										</div>
									@endif

									<form class="form-horizontal" role="form" method="POST" action="/auth/login">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">

										<div class="form-group">
											<label class="col-md-4 control-label">Usuario</label>
											<div class="col-md-6">
												<input type="email" class="form-control" name="email" value="{{ old('email') }}">
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-4 control-label">Clave</label>
											<div class="col-md-6">
												<input type="password" class="form-control" name="password">
											</div>
										</div>

										<div class="form-group">
											<div class="col-md-6 col-md-offset-4">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="remember"> Recordarme
													</label>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="col-md-6 col-md-offset-4">
												<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
													Ingresar
												</button>


											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

			</section>

			

		</section>


		<footer>
			
		</footer>
	</div>



	
</body>
</html>

