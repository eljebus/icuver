@extends ('/Admin/layout')


@section ('estilo')

<meta name="csrf-token" content="{{ csrf_token() }}" />

{!! Html::style('/css/Admin/index.css') !!}


@stop


@section ('contenido')
		

		<ul>
			
			<li id='add'>
				<a href="/Admin/new/{{$data['section']}}" class='add'>
					<label class="icon-box-remove"></label><br>
					Agregar imagenes
				</a>
			</li>
			
			@foreach ($data['fotos']  as $foto)

				<li>
					<span class="icon-cross delete" data-id='{{$foto->idFotos}}' data-section="{{$data['section']}}"></span>
					<img src="{{$foto->Archivo}}" alt="">
				</li>

			@endforeach
		
		</ul>

			
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

