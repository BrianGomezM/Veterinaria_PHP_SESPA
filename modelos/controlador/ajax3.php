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
	$raza=$_GET['id'];
	$consulta = mysql_query("select id_raza, nom_raza from raza where id_esp=".$_GET['id']."");
	echo "<select style='cursor:pointer;' name='raza' id='raza' title='Seleccione la Mascota del propietario'>";
			echo "<option value='0'>Seleccione...</option>";
		while ($fila = mysql_fetch_array($consulta)) 
			{
			echo "<option value='" . $fila[id_raza] . "'>" . utf8_encode($fila[nom_raza]) . "</option>";
			}
	echo "</select><button	type='button' id='n_raza' width='2%' name='n_raza' value='nuevo raza'  Onclick='ventana1('agregar_raza.php', 800, 400, 'AGREGAR RAZA');return false;' title='AGREGAR NUEVA RAZA' >	
									<img src='../../imagenes/dog.png'>
								</button>";
?>