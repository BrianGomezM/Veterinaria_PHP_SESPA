<?php
header("Content-Type: text/html; charset=iso-8859-1");
include('herramientas/configuracion/vars.php');
set_include_path(get_include_path() . PATH_SEPARATOR  . $PathApp);
session_name($session_name);
session_start();

if (!$_SESSION[usu_activo]){
	include('modelos/etiquetas/etq_login.php');
	include_once('include/loguin.php');
}
else{
	echo"<script>parent.location.href='$UrlApp/modelos/vista/inicio.php'</script>";
}

//INICIO DE CONTENIDO DE MUDULO
?>
<?php
//FIN DE CONTENIDO DE MUDULO
//include_once('include/pie.php');
?>