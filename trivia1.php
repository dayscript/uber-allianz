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
	<link rel="stylesheet" type="text/css" href="includes/styles.css">
</head>
<body>
	<!-- <h1>Trivia</h1> -->
	<iframe id="typeform-full" width="100%" height="100%" frameborder="0" src="https://soportecolombia.typeform.com/to/hJyP2s"></iframe>
	<script type="text/javascript" src="https://embed.typeform.com/embed.js"></script>
</body>
</html>