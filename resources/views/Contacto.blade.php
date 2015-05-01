@extends ('layout')


@section ('estilo')


<meta name="csrf-token" content="{{ csrf_token() }}" />

{!! Html::style('/css/contacto.css') !!}


@stop


@section ('contenido')
		
		<br>
		<br>
		<div id="derecha"></div>


		<section id="contact">


			<p>
				Cristóbal Colón 216, esq. Ernesto Domínguez, Fracc. Reforma, Veracruz, Veracruz.
				<br>Tel. 01(229) 2 00 90 02/ 9 35 07 92
			</p>

			<p>
				Relaciones Públicas: Lic. Isis Colorado Vázquez 
				<br>Cristóbal Colón 300, Fracc. Reforma, Veracruz, Veracruz.
				<br>Tel. 01(229) 9 80 80 44
				<br>Director Académico: Lic. Mario Gamboa Baeza 
			</p>

			<aside>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7536.8392066886!2d-96.12874344574536!3d19.176866851598366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c3413192b05f33%3A0x1c2e0c46fe8959d7!2sCrist%C3%B3bal+Col%C3%B3n+216%2C+Reforma%2C+91919+Veracruz%2C+Vereda!5e0!3m2!1ses-419!2smx!4v1426364409430" width="100%" height="350" frameborder="0" style="border:0"></iframe>

			</aside>
			<aside>
				<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1884.2371041149233!2d-96.12230409524814!3d19.174479529308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zQ3Jpc3TDs2JhbCBDb2zDs24gMzAw!5e0!3m2!1ses-419!2smx!4v1426364683340" width="100%" height="350" frameborder="0" style="border:0"></iframe>
			</aside>




		</section>


		<div id="izquierda"></div>

		<ul>
			<li>
				<a href="https://twitter.com/icuver_oficial" title="Siguenos en Twitter" target='blank'>
						<span class="icon-twitter"></span>
						@Icuver_Oficial
				</a>
					
			</li>
			<li>
				<a href="https://www.facebook.com/InstitutoCulinarioDeVeracruz" title="Siguenos en facebook" target='blank'>
					<SPAN class="icon-facebook"></SPAN>
					ICUVER VERACRUZ
				</a>

			</li>
		</ul>
		<br>

			<form id='contactForm'>

				<input type='text'  name = 'name' placeholder ='Nombre Completo' required>
				<input type='email' name = 'mail' placeholder='Correo Electrónico' required>
				<textarea name="message" placeholder='Comentarios' required></textarea>

				<button type="submit">Enviar</button>

			</form>


		

		
@stop



@section ('script')

	{!! Html::script('/vendors/js/mail.js')!!}
	
	<script>

		
		$(document).on('ready',iniciar);

		var form =  '#contactForm';

	    var mail =  new Mail();

	    mail.element 	= form;
	    mail.url 		='/sendMail';
	    mail.funcion 	= exito;

		function iniciar(){

		    $(form).on('submit',sendMail);

		}


		function sendMail(e){

			e.preventDefault();
			mail.sendData();
			
		}


		function exito(){

			$(form).html('<center>Tu comentario fue enviado, pronto nos comunicaremos contigo</center>');
		}

	</script>

	
@stop

