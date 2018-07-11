<?php

	date_default_timezone_set('America/Bogota');

	session_start();

	require "includes/functions.php";

	if ( isset( $_SESSION['utm'] ) && (strlen($_SESSION['utm']) == 36) && isset( $_SESSION['fecha']  ) ) {
		save_redencion( $_SESSION['utm'], $_SESSION['fecha'] );
	} else {
		header("Location: https://www.uber.com/es-CO/blog/");

	}

	$_SESSION = array();

?>
<!DOCTYPE html>
<html> 
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> 
	<title>Trivia Uber Allianz</title>
	<link rel="stylesheet" type="text/css" href="includes/styles.css?v=<?php echo rand(100, 999); ?>">
</head>
<body id="redencion">
		
	<div class="bono">
		<img src="includes/Bono-Color-Siete.jpg">
		<p>Descarga este bono en el siguiente botón, imprímelo y preséntalo en el establecimiento para hacerlo efectivo.</p>
		<a href="Bono-Color-Siete-triviauberallianz.pdf" target="_blank" download class="descarga">Descargar bono</a>
	</div>
		

<link href="https://fonts.googleapis.com/css?family=Exo:300,400,600,800" rel="stylesheet">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121188631-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-121188631-1');
</script>

	
</body>
</html>