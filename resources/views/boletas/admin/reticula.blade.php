@extends ('/Boletas/admin/layout')


@section ('estilo')

<meta name="csrf-token" content="{{ csrf_token() }}" />



{!! Html::style('/css/Boletas/admin/jquery.tagsinput.css') !!}

{!! Html::style('/css/Boletas/admin/reticula.css') !!}


@stop


@section ('contenido')
		

		<h3> Nuevo registro de {{$data['item']}}</h3>

		<br>
		<br>
		

    	{!! Form::open(array('url' => '/Boletas/saveCarrer','method' => 'POST')) !!}

    		<div id="izquierda">
				<label for='Nombre'>Nombre</label>
	    		<input type="text" name="Nombre" value="">

	    		<label for="Descripcion">Descripción</label>
	    		<textarea name='Descripcion'></textarea>
    		</div>

    		<div id="derecha">
    			<label for="categorias">Academias</label>
    			
    			<select name='categorias' id='categorias'>
    				<option value="">Academias</option>}
    				option
    				@foreach($data['academias']->get() as $academia)
    					<option value="{{$academia->Nombre}}">{{$academia->Nombre}}</option>
    				@endforeach
    			
    			</select>

    			<label for="Materias">Materias</label>
    			<input name="Materias" id="tags" />




    		</div>
    		<br>
    		<br>
    		<button type="input">Guardar Carrera</button>
    	
    	{!! Form::close() !!}



		
			
@stop



@section ('script')
	
	<script src="/vendors/js/jquery.tagsinput.js"></script>
	<script>

 		


 		$(document).on('ready',iniciar);

 		function iniciar(){

 			$('#tags').tagsInput();
 			$('#categorias').on('change',getAll);
 		}

 		function getAll(){



 			var categoria 	= $('#categorias').val();
 			var formData 	= {categoria:categoria};


 	
 			$.ajax({
			    url : "/Boletas/getMaterias",
			    type: "POST",
			    data : formData,
			    success: function(data, textStatus, jqXHR)
			    {
			       setTags(data);
			    },

			    headers: {
			        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
			    }
			});
 		}

 		function setTags(data){

 			var tags = $('#tags').val()+"," ;



 			for( tag in data.materias){

 				if (!$('#tags').tagExist(data.materias[tag].Nombre)) {

 					$('#tags').addTag(data.materias[tag].Nombre);
 				}
 			

 			}
 			


 		}

	</script>
@stop

