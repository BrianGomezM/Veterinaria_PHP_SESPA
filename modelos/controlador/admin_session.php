<?php
header("Content-Type: text/html; charset=iso-8859-1");
	include('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
	include('../../herramientas/configuracion/connect.php'); // ruta relativa a include/config.php
	$db=conectar();
	session_name($session_name);
	session_start();	
				$var_usu=$_POST[clv];
				echo "Usuario: $var_usu";
				$var_pas=$_POST[contra];
				echo "Clave: $var_pas";

					$query=" SELECT 
								  usuario.id_usu,
								  usuario.nom_usu,
								  usuario.apellido1_usu,
								  usuario.apellido2_usu,
								  usuario.edad_usu,
								  usuario.cedula_usu,
								  usuario.id_roll,
								  usuario.id_profesion_propie,
								  usuario.pass_usu ,
								  roll.nombre_roll,roll.id_roll
							FROM usuario INNER JOIN roll ON roll.id_roll = usuario.id_roll
							WHERE usuario.pass_usu = '$var_pas' AND usuario.cedula_usu = '$var_usu'";  	
					ECHO  "$query <BR>";			
					$res=mysql_query($query);
					while($row=mysql_fetch_array($res))	
						 {
							$_SESSION[usu_activo]=trim($row[nom_usu]." ".$row[apellido1_usu]." ".$row[apellido2_usu]);
							$_SESSION[id_roll]=trim($row[id_roll]);	
							$_SESSION[nombre_roll]=trim($row[nombre_roll]);	
						 }
					if($_SESSION['id_roll']=='')	 
						{
							echo"<script>alert('USUARIO NO REGISTRADO');</script>";	
							echo"<script>parent.location.href='$UrlApp'</script>";					
						}
					else
						{				
							echo"<script>parent.location.href='$UrlApp'</script>";
						}	
	
mysql_close($db);	
?>
