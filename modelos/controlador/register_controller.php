<?php
header("Content-Type: text/html; charset=iso-8859-1");
	require_once('../configuracion/vars.php'); // ruta relativa a include/config.php
	require_once('../configuracion/connect.php'); // ruta relativa a include/config.php
	$db=conectar();
	session_name($session_name);
	session_start();
		
	if(!empty($_POST['iden']))
	{

		$username = $_POST['iden'];
			/* Adaptáis la query a vuestra tabla de usuarios */
		echo "<script>alert('ESTAS AQUI');</script>";
		$result = mysql_query("SELECT
								  usuario.id_usu,
								  usuario.nom_usu,
								  usuario.apellido1_usu,
								  usuario.apellido2_usu,
								  usuario.direccion_usu,
								  usuario.telefono_usu,
								  usuario.edad_usu,
								  usuario.cedula_usu,
								  usuario.pass_usu,
								  usuario.correo_usu,
								  usuario.fecha_registro_usu,
								  usuario.id_roll,
								  usuario.id_profesion_propie,
								  usuario.tipo_id_usu
								FROM
								  usuario WHERE cedula_usu = '$username' ");
		
		
			if(mysql_num_rows($result) == 0) 
			{
			
				// Mostramos NO si no existe
				
				echo "NO";  
				
			} 
			
			
			else 
			{
				
				// Mostramos YES si ya existe
				
				echo "ESTE USUARIO YA ESTA REGISTRADO";  
			
			}
	
	}
mysql_close($db);
?>