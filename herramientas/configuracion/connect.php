<?php
function conectar()	{
	global $servidor,$bd,$usuario,$clave;
	$link = mysql_connect($servidor, $usuario, $clave);
	if (!$link) {
		die('Error conectando a la base de datos: ' . mysql_error());
	}
	if ( !mysql_select_db($bd, $link) ) {
		die('Error seleccionando la base de datos: ' . mysql_error());
	}
	
	return $link;
}
?>
