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
	
	$var_ident=$_POST[espe];
		//echo "<script>alert('regitrar');</script>";
		echo "Ident : $var_ident<BR>";
		$sql="SELECT especie.id_esp,nom_esp	FROM especie WHERE especie.id_esp = '$var_ident'";
		echo "SQL: $sql<BR>";
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res))
			{
			$var_1=$row[nom_esp];
			}
		if ($var_1>0)
			{
				echo "<script>alert('Esta especie ya existe');</script>";
				exit;
			}

			else
				{
					$var_nom_especie=$_POST[espe];
					echo "Nom: $var_nom_especie<br>";
					
					
					
					$sql="insert into especie(nom_esp)
					                 values  ('$var_nom_especie')";
					ECHO "$sql<BR>";
					$est=mysql_query($sql);
					if(!$est)
						{
							echo "<script>alert('error al insertar en la base de datos');</script>";
						}
						else
						{
							echo "<script>alert('datos insertados correctamente');</script>";
							//echo"<script>parent.location.href='$UrlApp/modelos/vista/crear_usu.php'</script>";
							ECHO " <script>parent.document.register_form.espe.value=''</script> ";
						
						
						}
				}
	break;
	case 'updt':
			$sql="UPDATE especie SET
		id_esp='".$_POST[id]."',
		nom_esp='".$_POST[espe]."'
		WHERE id_esp='".$_POST[id]."' ";
		
		
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
			$sql="DELETE from especie where id_esp ='$_POST[id]'";		
		if($res=mysql_query($sql))
			{
			//$conex=CommitTrans();
			echo "<script>alert('Se elimino correctamente');</script>";
			echo "$sql<br>";
			ECHO " <script>parent.document.register_form.espe.value=''</script> ";
	
							
			
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
