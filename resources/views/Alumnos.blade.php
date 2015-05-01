@extends ('layout')


@section ('estilo')


{!! Html::style('/css/alumnos.css') !!}


@stop


@section ('contenido')
		
	<h2>Portal Estudiante</h2>

	<img src="/image/icuver.png" alt="" id='img'>


	<form action="/Boleta" method="POST" accept-charset="utf-8">

		<div id="izquierda"></div>
		<div id="formContainer">

			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
			<label for="user">Número de Alumno</label>
			<input type='text' name='user'>

			<label for="pass">Clave</label>
			<input type='password' name='pass'>


		</div>

		<button  type='submit' id='slogan'>

			Pasión por lo que haces
			
		</button>

	
	</form>



		
@stop



@section ('script')
	
	<script>

	

	</script>

	
@stop

