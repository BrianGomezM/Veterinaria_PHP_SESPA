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
		$var_ident=$_POST[des];
		//echo "<script>alert('regitrar');</script>";
		echo "Ident : $var_ident<BR>";
		$sql=" SELECT diagnostico.id_diag, descripcion_diag, recomendaciones_medicas,fecha_diag, 
		id_cita, id_pago,id_usu,id_roll,id_cons
		FROM diagnostico 
		WHERE diagnostico.id_diag = '$var_ident'";
		echo "SQL: $sql<BR>";
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res))
			{
			$var_1=$row[id_diag];
			}
		if ($var_1>0)
			{
				echo "<script>alert('Numero de cedula ya existe');</script>";
				exit;
			}
		else
			{
					$var_desc=$_POST[des];
					echo "Nom: $var_desc<br>";
					$var_rec=$_POST[rec];
					echo "Ape:  $var_rec<br>";
					$var_due=$_POST[d_masc];
					echo "Ape:  $var_due<br>";
					$var_calendar=$_POST[calendar];
					echo "Ape:  $var_calendar<br>";
					$var_cita=$_POST[cita];
					echo "Ape:  $var_cita<br>";
				  
				
					
					$sql="insert into diagnostico( descripcion_diag, recomendaciones_medicas,fecha_diag, id_cita, id_pago,id_usu,id_roll,id_cons)
					                 values  ('$var_desc','$var_rec','$var_calendar','$var_cita','1','$var_due','1','1')";
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
							ECHO " <script>parent.document.register_form.des.value=''</script> ";
							ECHO " <script>parent.document.register_form.rec.value=''</script> ";
							ECHO " <script>parent.document.register_form.calendar.value=''</script> ";
							ECHO " <script>parent.document.register_form.d_masc.value=''</script> ";
							ECHO " <script>parent.document.register_form.cita.value=''</script> ";
						}
			}
	break;
	case 'updt':	
		$sql="UPDATE diagnostico SET
		id_diag='".$_POST[id]."',
		descripcion_diag='".$_POST[des]."',
		recomendaciones_medicas='".$_POST[rec]."',
		fecha_diag='".$_POST[calendar]."', 
		id_usu='".$_POST[d_masc]."',
		id_cita='".$_POST[cita]."'
		WHERE id_diag='".$_POST[id]."' ";
		
		
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
	$sql="DELETE from diagnostico where id_diag ='$_POST[id]'";		
		if($res=mysql_query($sql))
			{
			//$conex=CommitTrans();
			echo "<script>alert('Se elimino correctamente');</script>";
			echo "$sql<br>";
			ECHO " <script>parent.document.register_form.des.value=''</script> ";
			ECHO " <script>parent.document.register_form.rec.value=''</script> ";
			ECHO " <script>parent.document.register_form.calendar.value=''</script> ";
			ECHO " <script>parent.document.register_form.d_masc.value='0'</script> ";
			ECHO " <script>parent.document.register_form.cita.value='0'</script> ";						
			
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
