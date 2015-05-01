@extends ('/Boletas/admin/layout')


@section ('estilo')

<meta name="csrf-token" content="{{ csrf_token() }}" />

{!! Html::style('/css/Boletas/admin/index.css') !!}




@stop


@section ('contenido')
		
	
		
				
	<table>
		<caption>Lista de Alumnos</caption>

		<caption id='new'>
			<a href="/Boletas/Admin/NuevoAlumno" title="Nuevo Alumno">
				<label class="icon-plus"></label>
				Nuevo alumno
			</a>
		</caption>
		<thead>
			<tr>
				<th>NIP</th>
				<th>Nombre</th>
				<th>
					Mail
				</th>
				<th>Datos</th>
				<th>Boletas</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data['students'] as $student)
			<tr>
				<td>
					{{$student->idAlumno}}
				</td>
				<td>
					{{$student->Nombre}} {{$student->Apellidos}}
				</td>
				<td>
                    {{$student->Mail}}
				</td>

				<td class='icon'>
					<a href="/Boletas/Admin/Alumno/{{$student->idAlumno}}" title="Ver Perfil">
						<label class="icon-eye"></label>
					</a>
				</td>
				
				<td class='icon'>
					<a href="/Boletas/Admin/Boletas/{{$student->idAlumno}}" title="Boletas">
						<label class="icon-profile"></label>
					</a>
				</td>

				<td class='icon'>
					<label class="icon-cross delete" data-id="{{$student->idAlumno}}" data-section="{{$data['section']}}"></label>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
				

	<p>
		<center>
			  {!! $data['students']->render() !!}
		</center>
	</p>

		<section id="controls">

			<label class="icon-download" title='Descargar'></label> &nbsp;
			&nbsp;
			<label class="icon-printer" title='Imprimir'></label>


		</section>

		
			
@stop



@section ('script')
	
		
	
@stop

