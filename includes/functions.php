<?php

function db() {
	
	try {
	    $mbd = new PDO('mysql:host=localhost;dbname=uberallianz', 'uberallianz', 'ubera11ianz');

	    return $mbd;

	} catch (PDOException $e) {
	    print "No es posible conectarse a la base de datos.";
	    die();
	}
	
}


function insert_registro( $utm, $fecha ) {

	// try {

		$conn = db();
		$sql = "INSERT INTO registros (utm, fecha, ip)
				VALUES ('$utm', '" . $fecha . "','" . $_SERVER['REMOTE_ADDR'] . "');";
		// $stmt = $conn->prepare($sql);	    
	    $conn->exec($sql);
		
	// } catch (Exception $e) {
		
		// print "No se pudo actualizar el estado de la redención";
	// }
}

function save_redencion( $utm, $fecha ) {

	// try {
		$conn = db();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "UPDATE registros SET finalizo=1 WHERE utm='" . $utm . "' AND fecha='" . $fecha . "';";

		// $stmt = $conn->prepare($sql);	    
	    $conn->exec($sql);
	// }
	// catch(PDOException $e) {
		// print "No se pudo actualizar el estado de la redención";
	// }

}



?>