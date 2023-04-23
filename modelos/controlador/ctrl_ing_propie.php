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
		$var_correo=$_POST[corre];
		
		//echo "<script>alert('regitrar');</script>";
		echo "Ident : $var_ident<BR>";
		$sql="
		SELECT id_usu, nom_usu, apellido1_usu,
				  apellido2_usu, direccion_usu,
				  telefono_usu, edad_usu, cedula_usu,
				  correo_usu, fecha_registro_usu,id_roll,
				  id_profesion_propie,tipo_id_usu	
		FROM usuario 
		WHERE usuario.cedula_usu = '$var_ident' and usuario.correo_usu= '$var_correo'";
		echo "SQL: $sql<BR>";
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res))
			{
			$var_1=$row[corre];
			}
		if (($var_1>0) && ($var_2 >0))
			{
				echo "<script>alert('Numero de cedula ya existe');</script>";
				exit;
			}
		else
			{
					$var_nom=$_POST[usu];
					echo "Nom: $var_nom<br>";
					$var_p_apellido=$_POST[apel];
					echo "p apellid:  $var_p_apellido<br>";
					$var_s_apellido=$_POST[apel2];
					echo "s Ape:  $var_s_apellido<br>";
					$var_direccion=$_POST[dir];
					echo "direccion:  $var_direccion<br>";
					$var_telefono=$_POST[tel];
					echo "telefono:  $var_telefono<br>";
					$dia=date(j);
					$mes=date(n);
					$ano=date(Y);
					//fecha de nacimiento
					$dianaz=$_POST[calendar];
					$mesnaz=$_POST[calendar];
					$anonaz=$_POST[calendar];
				//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual
					if (($mesnaz == $mes) && ($dianaz > $dia)) {
					$ano=($ano-1); }
				//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual
					if ($mesnaz > $mes) {
					$ano=($ano-1);}
					//ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad
					$var_edad=($ano-$anonaz);
					echo "edad:  $var_edad<br>";
					$var_fecha_naci= date("y:m:d");
					echo "fecha:  $var_fecha_naci<br>";
					$var_email=$_POST[corre];
					echo "Email: $var_email<br>";
					$var_cc=$_POST[iden];
					echo " Ident:  $var_cc<br>";
					$var_tipo_doc=$_POST[tipodoc];
					echo "Tipo_doc: $var_tipo_doc<br>";
					$var_profesion=$_POST[propie];
					echo "PROFESION: $var_profesion<br>";
					$var_roll=3;
					echo "ROLL: $var_roll<br>";
					
					$sql="insert into usuario(nom_usu, apellido1_usu,apellido2_usu,direccion_usu,edad_usu, cedula_usu,telefono_usu, correo_usu,fecha_registro_usu,id_roll,id_profesion_propie,tipo_id_usu)
					                 values  ('$var_nom', '$var_p_apellido', '$var_s_apellido','$var_direccion','$var_edad', '$var_cc','$var_telefono','$var_email','$var_fecha_naci','$var_roll','$var_profesion','$var_tipo_doc')";
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
							ECHO " <script>parent.document.register_form.usu.value=''</script> ";
							ECHO " <script>parent.document.register_form.apel.value=''</script> ";
							ECHO " <script>parent.document.register_form.apel2.value=''</script> ";
							ECHO " <script>parent.document.register_form.dir.value=''</script> ";
							ECHO " <script>parent.document.register_form.tel.value=''</script> ";
							ECHO " <script>parent.document.register_form.area.value='0'</script>";
							ECHO " <script>parent.document.register_form.corre.value=''</script> ";
							ECHO " <script>parent.document.register_form.iden.value=''</script> ";
							ECHO " <script>parent.document.register_form.calendar.value=''</script> ";
							ECHO " <script>parent.document.register_form.tipodoc.value=''</script> ";
							ECHO " <script>parent.document.register_form.profesion.value='0'</script> ";
						}
			}		
	break;
	case 'updt':
	
		$sql="UPDATE usuario SET
		id_usu='".$_POST[id]."',
		nom_usu='".$_POST[usu]."',
		apellido1_usu='".$_POST[apel]."',
		apellido2_usu='".$_POST[apel2]."', 
		direccion_usu='".$_POST[dir]."',
		edad_usu='".$_POST[edad]."',
		cedula_usu='".$_POST[iden]."',
		telefono_usu='".$_POST[tel]."',
		correo_usu='".$_POST[corre]."',
		id_roll='".$_POST[area]."',
		id_profesion_propie='".$_POST[profesion]."',
		tipo_id_usu='".$_POST[tipodoc]."'
		WHERE id_usu='".$_POST[id]."' ";
		
		
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se actualizo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
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
	$sql="DELETE from usuario where id_usu ='$_POST[id]'";		
		if($res=mysql_query($sql))
			{
			//$conex=CommitTrans();
			echo "<script>alert('Se elimino correctamente');</script>";
			echo "$sql<br>";
			ECHO " <script>parent.document.register_form.id.value=''</script> ";
			ECHO " <script>parent.document.register_form.usu.value=''</script> ";
			ECHO " <script>parent.document.register_form.apel.value=''</script> ";
			ECHO " <script>parent.document.register_form.apel2.value=''</script> ";
			ECHO " <script>parent.document.register_form.dir.value=''</script> ";
			ECHO " <script>parent.document.register_form.tel.value=''</script> ";						
			ECHO " <script>parent.document.register_form.corre.value=''</script> ";				
			ECHO " <script>parent.document.register_form.iden.value=''</script> ";						
			ECHO " <script>parent.document.register_form.area.value='0'</script> ";						
			ECHO " <script>parent.document.register_form.tipodoc.value='0'</script> ";		
            ECHO " <script>parent.document.register_form.profesion.value='0'</script> ";			
            ECHO " <script>parent.document.register_form.edad.value='0'</script> ";			
							
			
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
