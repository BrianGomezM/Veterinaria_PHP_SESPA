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
		$sql="SELECT tipo_admin_medic.Id_tipo_admin_medic, nom_medic,dosis_medic	FROM tipo_admin_medic WHERE tipo_admin_medic.nom_medic = '$var_ident'";
		echo "SQL: $sql<BR>";
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res))
			{
			$var_1=$row[Id_tipo_admin_medic];
			}
		if ($var_1>0)
			{
				echo "<script>alert('Esta especie ya existe');</script>";
				exit;
			}

			else
				{
					$var_nom_tipo_med=$_POST[espe];
					echo "Nom: $var_nom_tipo_med<br>";
					$var_nom_dosis=$_POST[dosis];
					echo "Nom: $var_nom_dosis<br>";
					
					
					$sql="insert into tipo_admin_medic(nom_medic,dosis_medic)
					                 values  ('$var_nom_tipo_med','$var_nom_tipo_med')";
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
							ECHO " <script>parent.document.register_form.dosis.value=''</script> ";
						
						
						}
				}
	break;
	case 'updt':
			$sql="UPDATE tipo_admin_medic SET
		Id_tipo_admin_medic='".$_POST[id]."',
		nom_medic='".$_POST[espe]."',
		dosis_medic='".$_POST[dosis]."'
		
		WHERE Id_tipo_admin_medic='".$_POST[id]."'";
		
		
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
			$sql="DELETE from tipo_admin_medic where Id_tipo_admin_medic ='$_POST[id]'";		
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
