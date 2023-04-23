<?php
header("Content-Type: text/html; charset=iso-8859-1");
	require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
	require_once('../../herramientas/configuracion/connect.php'); // ruta relativa a include/config.php
	$db=conectar();
	session_name($session_name);
	session_start();
	$var_usu=$_POST[action];
	switch ($var_usu)
	{
	case 'reg':
	
		$var_ident=$_POST[iden];
		//echo "<script>alert('regitrar');</script>";
		echo "Ident : $var_ident<BR>";
		$sql="SELECT cita.id_cita, fecha_cita, hora_cita, id_pago,id_roll	FROM  cita WHERE cita.id_cita = '$var_ident'";
		echo "SQL: $sql<BR>";
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res))
			{
				$var_tt=$row[id_cita];
			}
		if($var_tt>0)
				{
					echo "<script>alert('usuario ya existe');</script>";
				}
			else
				{
					$var_f_cita=$_POST[calendar];
					echo "Nom: $var_f_cita<br>";
					$var_hora= time("H:i:s");
					echo "Color:  $var_color<br>";
					$var_usu=$_POST[propie];
					echo "Ape:  $var_tama <br>";
				
							
					$sql="insert into cita(fecha_cita, hora_cita,id_usu)
					                 values  ('$var_f_cita', '$var_hora', '$var_usu')";
					ECHO "$sql<BR>";
					$est=mysql_query($sql);
					if(!$est)
						{
							echo "<script>alert('error al isnertar en la base de datos');</script>";
						}
						else
						{
							echo "<script>alert('datos insertados correctamente');</script>";
							//echo"<script>parent.location.href='$UrlApp/modelos/vista/crear_usu.php'</script>";
							ECHO " <script>parent.document.register_form.calendar.value=''</script> ";
							ECHO " <script>parent.document.register_form.propie.value='0'</script> ";

						}
				}
	break;
	case 'updt':
		$sql="UPDATE cita SET
		
		fecha_cita='".$_POST[calendar]."',
		id_usu='".$_POST[propie]."', 
	
		WHERE fecha_cita='".$_POST[calendar]."' ";
		
		
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se actualizo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.form_nuevo_usu.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al actualizar');</script>";
			}
	break;
	case 'query':
		echo "<script>alert('consultar');</script>";
	break;
	case 'dell':
			$sql="DELETE from cita where fecha_cita ='$_POST[nomb]'";		
		if($res=mysql_query($sql))
			{
			//$conex=CommitTrans();
			echo "<script>alert('Se elimino correctamente');</script>";
			echo "$sql<br>";
			ECHO " <script>parent.document.register_form.calendar.value=''</script> ";
			ECHO " <script>parent.document.register_form.cita.value=''</script> ";
									
						
			//ECHO "parent.document.form_nuevo_usu.num_docu.disabled=none;";
			}
		else
			{
			//$conex->RollbackTrans();	
			echo "<script>alert('No se puedo eliminar');</script>";
			}	
	break;
	}
	mysql_close($db);
?>
