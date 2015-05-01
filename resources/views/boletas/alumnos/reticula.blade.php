@extends ('/Boletas/alumnos/layout')


@section ('estilo')

<meta name="csrf-token" content="{{ csrf_token() }}" />

{!! Html::style('/css/Boletas/reticula.css') !!}


@stop


@section ('contenido')
		

		<h3> Tecnico en Contabilidad</h3>

		<table >
		
			<thead>
				<tr>
					<th>Primer Grado</th>
					<th>Segundo Grado</th>
					<th>Tercer Grado</th>

				</tr>
			</thead>
			<tbody>

				<tr>
					<td class='ok'>Fisica</td>
					<td>Quimica</td>
					<td>Quimica</td>
		
				</tr>
				<tr>
					<td class='ok'>Quimica</td>
					<td>Quimica</td>
					<td>Quimica</td>

				</tr>
				


			</tbody>
		</table>


		<section id="controls">

			<label class="icon-download" title='Descargar'></label> &nbsp;
			&nbsp;
			<label class="icon-printer" title='Imprimir'></label>


		</section>

		
			
@stop



@section ('script')
	
	<script>

		$(document).on('ready',iniciar);

		function iniciar(){

			$('.delete').on('click',remove);

		}

		function remove(){

			var idPhoto = $(this).data('id');
			var section = $(this).data('section');
			var element = $(this);


			$.ajax({

				url : '/Admin/remove',
				type : 'POST',
				dataType: 'json',
				data : { id:idPhoto, seccion: section},
				success : function(res){

					if(res.Error ==  'false'){

						$(element).parent().remove();
					}
				},
				headers: {
			       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			}); 
		}
	

	</script>

	
@stop

