<?php
	header("Content-Type: text/html; charset=iso-8859-1");
	require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php	
	session_name($session_name);
	session_start();
		if(!$_SESSION[id_roll])
			{
				echo"<script>parent.location.href='$UrlApp'</script>";
				exit;		
			}
		else
			{
				require_once('../../herramientas/configuracion/connect.php');
				require_once('../etiquetas/etq_login.php');
				$db = conectar();			
			}	
			
	$consulta = mysql_query("select id_pac, nomb_pac,fech_regist_anim from animal where id_usu=".$_GET['id']."");
	echo "<select name='animal' id='animal' title='Seleccione la Mascota del propietario' style='width:300px; cursor:pointer'>";
			echo "<option value='0'>Seleccione...</option>";
		while ($fila = mysql_fetch_array($consulta)) 
			{
			echo "<option value='" . $fila[id_pac] . "'>" . utf8_encode($fila[nomb_pac]) . " - Fecha-Registro - " . utf8_encode($fila[fech_regist_anim]) . "</option>";
			}
	echo "</select>";
?>