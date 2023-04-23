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
	$var_ident=$_POST[enfer];
		//echo "<script>alert('regitrar');</script>";
		echo "Ident : $var_ident<BR>";
		$sql="SELECT enfermedad.id_enf,nom_enf, id_sin	FROM  enfermedad WHERE enfermedad.nom_enf = '$var_ident'";
		echo "SQL: $sql<BR>";
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res))
			{
			$var_1=$row[id_enf];
			}
		if ($var_1>0)
			{
				echo "<script>alert('Esta Enfermedad ya esta registrada');</script>";
				exit;
			}
			else
				{
					$var_nom_enfer=$_POST[enfer];
					echo "Nom: $var_nom_enfer<br>";
					$var_id_sin=$_POST[area];
					echo "lugar: $var_sintoma<br>";
					
					$sql="insert into enfermedad (nom_enf, id_sin)
					                 values  ('$var_nom_enfer','$var_id_sin')";
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
							ECHO " <script>parent.document.register_form.enfer.value=''</script> ";
							ECHO " <script>parent.document.register_form.area.value=''</script> ";
						
						}
				}
	break;
	case 'updt':
			$sql="UPDATE enfermedad SET
		id_enf='".$_POST[id]."',
		nom_enf='".$_POST[enfer]."',
		id_sin='".$_POST[area]."',

		WHERE nom_enf='".$_POST[enfer]."' ";
		
		
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
		$sql="DELETE from enfermedad where nom_enf ='$_POST[enfer]'";		
		if($res=mysql_query($sql))
			{
			//$conex=CommitTrans();
			echo "<script>alert('Se elimino correctamente');</script>";
			echo "$sql<br>";
			ECHO " <script>parent.document.register_form.enfer.value=''</script> ";
			ECHO " <script>parent.document.register_form.area.value='0'</script> ";
					
			
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
