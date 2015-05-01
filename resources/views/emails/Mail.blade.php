<html>
<head>
	<title>Mail</title>

	<link href='http://fonts.googleapis.com/css?family=Metrophobic' rel='stylesheet' type='text/css'>


	<style>

	 @import url(http://fonts.googleapis.com/css?family=Metrophobic);
	
	 body,h1{
	 	  font-family: 'Open Sans', Arial, sans-serif;
	 }


	#contenedor{

		width: 100%;
		margin:auto;
		overflow: hidden;
	}

	#superior{


		width:100%;

		padding: 1em;
		background: #1ba1e2;
	}

	#superior img{
		width: 150px;
		display:  inline-block;
		vertical-align: middle;
	}
	#superior h1{
		display:  inline-block;
		vertical-align: middle;
		color: white;
		text-align: center;
	}

	#contenido{
		margin-top:  16px;
	}
	a{
		text-decoration: none;
	}
		
	</style>
</head>
<body>

	<font face="'Open Sans', Arial, sans-serif">
	<div id="contenedor">

		<div id="superior">

			<a href="http://icuver.edu.mx" title="ICUVER">
				<img src="http://icuver.edu.mx/image/icuver.png" alt="">
			</a>
			&nbsp;
			&nbsp;
			&nbsp;
			&nbsp;

			<h1>{{$asunto}}</h1>
	
			

		</div>
		<br>
		<br>
		<div id='contenido'>
			{{$contenido}}

			
		</div>


	</div>
	</font>

	


</body>
</html>