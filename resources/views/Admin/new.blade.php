@extends ('/Admin/layout')


@section ('estilo')

<meta name="csrf-token" content="{{ csrf_token() }}" />

{!! Html::style('/css/Admin/new.css') !!}


@stop


@section ('contenido')
		

		
		<form id='articleForm'>
			<input type='hidden' value="{{$data['section']}}" id='section'>
			<section>
				<ul id='itemContainer'>
					<li id='new'>

						<input type='file' multiple='true' name="files[]" id='add-imagen'>
						<div >
							<aside class="icon-box-remove"></aside><br>
							Agregar Imagenes

						</div>
					</li>
				
				</ul>
			</section>

			<button type="submit">Guardar</button>

		</form>
		

			
@stop



@section ('script')

	{!! Html::script('/vendors/js/uploadNew.js')!!}
	{!! Html::script('/js/new.js')!!}
	
@stop

