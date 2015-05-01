@extends ('/Boletas/admin/layout')


@section ('estilo')

<meta name="csrf-token" content="{{ csrf_token() }}" />

{!! Html::style('/css/Boletas/admin/index.css') !!}




@stop


@section ('contenido')
		
	
		
				
	<table>
		<caption>Lista de Períodos</caption>

		<caption id='new'>
			<a href="/Boletas/Admin/NuevoPeriodo" title="Nuevo Alumno">
				<label class="icon-plus"></label>
				Nuevo Período
			</a>
		</caption>
		<thead>
			<tr>
				<th>NP</th>
				<th>Nombre</th>
				<th>
					Inicio
				</th>
				<th>Fin</th>
				<th>Ver</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data['periodo'] as $student)
			<tr>
				<td>
					{{$student->idPeriodo}}
				</td>
				<td>
					{{$student->Nombre}} {{$student->Apellidos}}
				</td>
				<td>
                    {{$student->Inicio}}
				</td>

				<td>
                    {{$student->Fin}}
				</td>

				<td class='icon'>
					<a href="/Boletas/Admin/Periodo/{{$student->idPeriodo}}" title="Ver Periodo">
						<label class="icon-eye"></label>
					</a>
				</td>
				
		
				<td class='icon'>
					<label class="icon-cross delete" data-id="{{$student->idPeriodo}}" data-section="{{$data['section']}}"></label>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
				

	<p>
		<center>
			  {!! $data['periodo']->render() !!}
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

