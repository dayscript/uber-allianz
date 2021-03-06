<?php

	date_default_timezone_set('America/Bogota');


	require "includes/functions.php";

	// Extraemos UTM desde la URL
	$utm = ( isset($_GET['code']) && strlen($_GET['code']) == 36 ) ? $_GET['code'] : "" ;

	// Asignamos la variable fecha para utilizar UTM y Fecha al momento de actualizar el 
	// estado de redención del bono en la base de datos
	$fecha = date("Y-m-d H:i:s");

	if ( $utm == "" ) {
		
		header("Location: https://www.uber.com/es-CO/blog/");

	} else {
		

		session_start();
		$_SESSION['utm'] = $utm;
		$_SESSION['fecha'] = $fecha;

		insert_registro( $utm, $fecha );

		//save_redencion($utm, $fecha);

	}


?>
<!DOCTYPE html>
<html> 
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> 
	<title>Trivia Uber Allianz</title>
	<link rel="stylesheet" type="text/css" href="includes/styles.css?v=<?php echo rand(100, 999); ?>">
	<script type="text/javascript">
		
		function terminos( str ) {
			if ( str == 1 ) {
				
				var terminos = document.getElementById("terminos");
				var ver_terminos = document.getElementById("ver-terminos");
				var trivia = document.getElementById("typeform-full");

				if ( document.getElementById('check-terminos').checked && document.getElementById('check-privacidad').checked ) {
					terminos.style.display = "none";
					ver_terminos.style.display = "block";
					// trivia.style.display = "block";

					var d1 = document.getElementById('container');
					d1.insertAdjacentHTML('beforeend', '<iframe id="typeform-full" width="100%" height="100%" frameborder="0" src="https://soportecolombia.typeform.com/to/l61eFc"></iframe>');


				} else {
					if (!document.getElementById('check-terminos').checked) {
						alert("Debe aceptar términos y condiciones")
					}
					if (!document.getElementById('check-privacidad').checked) {
						alert("Debe aceptar política de privacidad")
					}
				}

			} else {
				window.location.href = "https://www.uber.com/es-CO/blog/";
			}
		}

	</script>
</head>
<body>
	<div class="container" id="container">
		<div class="intro">
			<img src="includes/Texto-inicial-uber-pantalla.png">
			<p>Para participar debes leer y aceptar los términos y condiciones del concurso.</p>
		</div>
		<div id="terminos">
			<div class="texto-terminos">
				<h2>Consulta los términos y condiciones <a href="https://uberallianzchallenge.com/Terminos-condiciones-uberallianzchallenge2.pdf" target="_blank">haciendo clic aquí</a></h2>
				<?php //include "terminos.html"; ?>
				<br><span>
					<input type="checkbox" name="terminos" id="check-terminos"><label for="check-terminos">Acepto términos y condiciones</label>
				</span>
				<span>
					<input type="checkbox" name="privacidad" id="check-privacidad"><label for="check-privacidad">Acepto política de privacidad</label>
				</span>
				<br>

				<a href="#" id="acepto" onclick="terminos(1)">Acepto</a>
				<a href="#" id="no-acepto" onclick="terminos(0)">No acepto</a>
			</div>
		</div>
	</div>

	<div id="ver-terminos">
		<a href="Terminos-condiciones-uberallianzchallenge2.pdf" target="_blank">Términos y condiciones</a>
	</div>
		
	<!-- <iframe id="typeform-full" width="100%" height="100%" frameborder="0" src="https://soportecolombia.typeform.com/to/hJyP2s"></iframe> -->
	<script type="text/javascript" src="https://embed.typeform.com/embed.js"></script>

	
</body>
</html>