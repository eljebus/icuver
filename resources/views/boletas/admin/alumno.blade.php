@extends ('/Boletas/admin/layout')


@section ('estilo')

<meta name="csrf-token" content="{{ csrf_token() }}" />


{!! Html::style('/css/Boletas/admin/maestro.css') !!}


@stop


@section ('contenido')
		

		<h3> Registro de Alumnos</h3>
		@if(array_key_exists ( 'error' , $data ))
			<br>
			<label class="error">
				{{$data['error']}}
			</label>
			
		@endif
		<br>
		<br>


		
		@if(array_key_exists ( 'student' , $data ))

			{!! Form::open(array('url' => '/Boletas/modifyStudent','method' => 'POST')) !!}
					<input type='hidden' value="{{$data['student']->idAlumno}}" name ='originalId'>
	    			<label for='Clave'>Clave</label>
		    		<input type="text" name="Clave" value="{{$data['student']->idAlumno}}" required>

					<label for='Nombre'>Nombre</label>
		    		<input type="text" name="Nombre" value="{{$data['student']->Nombre}}"required> 

		    		<label for="Apellidos">Apellidos</label>
		    		<input type='text' name='Apellidos' value="{{$data['student']->Apellidos}}" required>
		    		<label for="Estado">Estado</label>
		    		<select name="Estado" style='width:270px' required>
		    			<option value="{{$data['student']->Estado}}">{{$data['student']->Estado}}</option>}
		    			<option value="Aguascalientes">Aguascalientes</option>
						<option value="Baja California">Baja California</option>
						<option value="Baja California Sur">Baja California Sur</option>
						<option value="Campeche">Campeche</option>
						<option value="Chiapas">Chiapas</option>
						<option value="Chihuahua">Chihuahua</option>
						<option value="Coahuila">Coahuila</option>
						<option value="Colima">Colima</option>
						<option value="Distrito Federal">Distrito Federal</option>
						<option value="Durango">Durango</option>
						<option value="Estado de México">Estado de México</option>
						<option value="Guanajuato">Guanajuato</option>
						<option value="Guerrero">Guerrero</option>
						<option value="Hidalgo">Hidalgo</option>
						<option value="Jalisco">Jalisco</option>
						<option value="Michoacán">Michoacán</option>
						<option value="Morelos">Morelos</option>
						<option value="Nayarit">Nayarit</option>
						<option value="Nuevo León">Nuevo León</option>
						<option value="Oaxaca">Oaxaca</option>
						<option value="Puebla">Puebla</option>
						<option value="Querétaro">Querétaro</option>
						<option value="Quintana Roo">Quintana Roo</option>
						<option value="San Luis Potosí">San Luis Potosí</option>
						<option value="Sinaloa">Sinaloa</option>
						<option value="Sonora">Sonora</option>
						<option value="Tabasco">Tabasco</option>
						<option value="Tamaulipas">Tamaulipas</option>
						<option value="Tlaxcala">Tlaxcala</option>
						<option value="Veracruz">Veracruz</option>
						<option value="Yucatán">Yucatán</option>
						<option value="Zacatecas">Zacatecas</option>>
		    		</select>

		    		<label for="Domicilio">Domicilio</label>
		    		<input type='text' name='Domicilio'  value ="{{$data['student']->Domicilio}}"required>



		    		<label for="Tel">Teléfono</label>
		    		<input type='tel' name='Tel' value = "{{$data['student']->Tel}}">

		    		<label for="Mail">Mail</label>
		    		<input type='email' name='Mail' value = "{{$data['student']->Mail}}"required>

		    		<label for="Nacimiento">Nacimiento</label>
		    		<input type='date' name='Nacimiento' value="{{$data['student']->Nacimiento}}" required>

		    		<select name="Genero" required>
		    			@if($data['student']->Genero === 'M')
		    				<option value="M" selected>Masculino</option>
		    			@else 
		    				<option value="M">Masculino</option>
		    			@endif


		    			@if($data['student']->Genero === 'F')
		    				<option value="M" selected>Femenino</option>
		    			@else 
		    				<option value="M">Femenino</option>
		    			@endif

		    			
		    		</select>

		    		<label for="Nacimiento">Contraseña</label>
		    		
		    		<input type='password' name='pass' placeholder='Clave' value="{{$data['student']->pass}}" required>

	    		
	    		<br>
	    		<br>
	    		<button type="input">Guardar Cambios</button>
	    	
	    	{!! Form::close() !!}

		@else


	    	{!! Form::open(array('url' => '/Boletas/saveStudent','method' => 'POST')) !!}

	    			<label for='Clave'>Clave</label>
		    		<input type="text" name="Clave" value="" required>

					<label for='Nombre'>Nombre</label>
		    		<input type="text" name="Nombre" value=""required> 

		    		<label for="Apellidos">Apellidos</label>
		    		<input type='text' name='Apellidos' required>
		    		<label for="Estado">Estado</label>
		    		<select name="Estado" style='width:270px' required>
		    			<option value="Aguascalientes">Aguascalientes</option>
						<option value="Baja California">Baja California</option>
						<option value="Baja California Sur">Baja California Sur</option>
						<option value="Campeche">Campeche</option>
						<option value="Chiapas">Chiapas</option>
						<option value="Chihuahua">Chihuahua</option>
						<option value="Coahuila">Coahuila</option>
						<option value="Colima">Colima</option>
						<option value="Distrito Federal">Distrito Federal</option>
						<option value="Durango">Durango</option>
						<option value="Estado de México">Estado de México</option>
						<option value="Guanajuato">Guanajuato</option>
						<option value="Guerrero">Guerrero</option>
						<option value="Hidalgo">Hidalgo</option>
						<option value="Jalisco">Jalisco</option>
						<option value="Michoacán">Michoacán</option>
						<option value="Morelos">Morelos</option>
						<option value="Nayarit">Nayarit</option>
						<option value="Nuevo León">Nuevo León</option>
						<option value="Oaxaca">Oaxaca</option>
						<option value="Puebla">Puebla</option>
						<option value="Querétaro">Querétaro</option>
						<option value="Quintana Roo">Quintana Roo</option>
						<option value="San Luis Potosí">San Luis Potosí</option>
						<option value="Sinaloa">Sinaloa</option>
						<option value="Sonora">Sonora</option>
						<option value="Tabasco">Tabasco</option>
						<option value="Tamaulipas">Tamaulipas</option>
						<option value="Tlaxcala">Tlaxcala</option>
						<option value="Veracruz">Veracruz</option>
						<option value="Yucatán">Yucatán</option>
						<option value="Zacatecas">Zacatecas</option>>
		    		</select>

		    		<label for="Domicilio">Domicilio</label>
		    		<input type='text' name='Domicilio' required>



		    		<label for="Tel">Teléfono</label>
		    		<input type='tel' name='Tel'>

		    		<label for="Mail">Mail</label>
		    		<input type='email' name='Mail' required>

		    		<label for="Nacimiento">Nacimiento</label>
		    		<input type='date' name='Nacimiento' required>

		    		<select name="Genero" required>
		    			<option value="M">Masculino</option>
		    			<option value="F">Femenino</option>
		    		</select>

		    		<label for="Nacimiento">Contraseña</label>
		    		
		    		<input type='password' name='pass' placeholder='Clave' required>

	    		
	    		<br>
	    		<br>
	    		<button type="input">Guardar Cambios</button>
	    	
	    	{!! Form::close() !!}

	    @endif



		
			
@stop



@section ('script')
	
	
@stop

