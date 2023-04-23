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
		$var_ident=$_POST[nombre];
		//echo "<script>alert('regitrar');</script>";
		echo "Ident : $var_ident<BR>";
		$sql="
		SELECT SELECT medicamento.id_medi, nombre_generico, fecha_fabricacion,fecha_vencimiento,id_medic,Id_tipo_admin_medic
		FROM medicamento
		WHERE medicamento.nombre_generico = '$var_ident'";
		echo "SQL: $sql<BR>";
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res))
			{
			$var_1=$row[nombre_generico];
			}
		if ($var_1>0)
			{
				echo "<script>alert('Medicamento ya existe');</script>";
				exit;
			}
		else
			{
					$var_nom=$_POST[nombre];
					echo "Nom: $var_nom<br>";
					$var_tipo_medic=$_POST[tipodoc];
					echo "Nom: $var_tipo_medic<br>";	
					$var_via_administracion=$_POST[v_admin];
					echo "Nom: $var_via_administracion<br>";
					$var_f_fabricacion=$_POST[calendar1];
					echo "Ape:  $var_f_fabricacion<br>";
					$var_f_vencimiento=$_POST[calendar2];
					echo "Ape:  $var_f_vencimiento<br>";
					
					
					$sql="insert into medicamento(nombre_generico, fecha_fabricacion,fecha_vencimiento, id_medic, Id_tipo_admin_medic)
					                 values  ('$var_nom', '$var_f_fabricacion', '$var_f_vencimiento','$var_tipo_medic', '$var_via_administracion')";
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
							ECHO " <script>parent.document.register_form.nombre.value=''</script> ";
							ECHO " <script>parent.document.register_form.tipodoc.value='0'</script> ";
							ECHO " <script>parent.document.register_form.v_admin.value='0'</script> ";
							ECHO " <script>parent.document.register_form.calendar1.value=''</script> ";
							ECHO " <script>parent.document.register_form.calendar2.value=''</script> ";
						}
			}
						
					
	break;
	case 'updt':
	
		$sql="UPDATE medicamento SET
		id_medi='".$_POST[id]."',
		nombre_generico='".$_POST[nombre]."',
		fecha_fabricacion='".$_POST[tipodoc]."',
		fecha_vencimiento='".$_POST[v_admin]."', 
		id_medic='".$_POST[calendar1]."',
		Id_tipo_admin_medic='".$_POST[calendar1]."'
		
		WHERE id_medi='".$_POST[id]."' ";
		
		
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
	$sql="DELETE from medicamento where id_medi ='$_POST[id]'";		
		if($res=mysql_query($sql))
			{
			//$conex=CommitTrans();
			echo "<script>alert('Se elimino correctamente');</script>";
			echo "$sql<br>";
			ECHO " <script>parent.document.register_form.nombre.value=''</script> ";
			ECHO " <script>parent.document.register_form.tipodoc.value='0'</script> ";
			ECHO " <script>parent.document.register_form.v_admin.value='0'</script> ";
			ECHO " <script>parent.document.register_form.calendar1.value=''</script> ";
			ECHO " <script>parent.document.register_form.calendar2.value=''</script> ";
							
							
			
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
