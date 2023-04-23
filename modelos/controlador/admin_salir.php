<?php	
	include('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
	session_name($session_name);
	session_start();
	session_destroy();
	echo"<script>parent.location.href='$UrlApp'</script>";			
//mysql_close($db);	
?>
