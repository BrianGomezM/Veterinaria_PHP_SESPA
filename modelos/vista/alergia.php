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
				require_once('../etiquetas/etq_animal.php');
				require_once('../etiquetas/etq_usuario.php');
				$db = conectar();			
			}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		
	
		<title>Historial</title>	
		
	
		<link href="../../css/estilos_hist.css" rel="stylesheet" type="text/css">
		<link href="../../css/estilo_menu.css" rel="stylesheet" type="text/css">
		<link href="../../css/estilo_busc.css" rel="stylesheet" type="text/css">
		<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css">
		<link href="../../css/estilos_tablas.css" rel="stylesheet" type="text/css" >

		
	</head>
	<body>	
			
			
			<?php include('menu_tab.php');	?>
					
				
<?php  mysql_close($db); 	?>
</body>
</html>