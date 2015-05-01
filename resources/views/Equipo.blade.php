@extends ('layout')


@section ('estilo')


{!! Html::style('/css/equipo.css') !!}

@stop


@section ('contenido')

	<h3><a href="/Galerias" title=""><span class="icon-circle-left"></span></a> Equipo de Trabajo</h3>


	<section class="images">
		<div class='figures'>

			<img src="/image/galeria/e4.jpg" alt="">
			<img src="/image/galeria/e5.jpg" alt="">
			<img src="/image/galeria/e6.jpg" alt="" style='margin-right:0'>

		</div>
		
		<div class='text'>
			<div class='itext'>

				<aside>
					Lic. Rosio casas Peralta <br>
					Auxiliar Administrativo
				</aside>
				<aside>
					Isis Guadalupe Colorado <br>
					Publicidad y Relaciones Públicas 
				</aside>

				<aside style='margin-right:0'>

					Lic. Mario Jesús Gamboa  <br>
					Director Académico
					
				</aside>
				
			</div>

			
		</div>

		<br>
		<br>
		<br>




		<div class='figures'>

			<img src="/image/galeria/e1.jpg" alt="">
			<img src="/image/galeria/e2.jpg" alt="">
			<img src="/image/galeria/e3.jpg" alt="" style='margin-right:0'>

		</div>
		
		<div class='text'>
			<div class='itext'>

				<aside>
					Chef Alejandro Martínez Gutiérrez <br>
					 Director General
				</aside>
				<aside>
					Lic. Ana Sherezada Angli Rodríguez  <br> 
					Vicepresidenta del Consejo  
				</aside>

				<aside style='margin-right:0'>

					Lic. Carmen Haydeé Díaz de León Pardío <br>
					Directora Administrativa   
					
				</aside>
				
			</div>
			
		

	</section>
		<br>
		<br>
		<br>

		
@stop



@section ('script')
	
	
	
@stop

