<?php
header("Content-Type: text/html; charset=utf-8");
	require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
	require_once('../../herramientas/configuracion/connect.php'); // ruta relativa a include/config.php
	// echo "<meta name='tipo_contenido'  content='text/html;' http-equiv='content-type' charset='utf-8'>";
	$db=conectar();
	session_name($session_name);
	session_start();
	$var_usu=$_POST[action];
	switch ($var_usu)
	{
	case 'reg':
	
		//$var_ident=$_POST[iden];
		//echo "<script>alert('regitrar');</script>";
		echo "Ident : $var_ident<BR>";
		$sql="SELECT id_pac, nomb_pac, color_pac,
						 peso_pac, fecha_nac_pac, tama_o_pac,
						alzada_pac, genero, id_usu, id_raza,fech_regist_anim	FROM  animal WHERE animal.id_pac = '$var_ident'";
		echo "SQL: $sql<BR>";
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res))
			{
				$var_tt=$row[id_pac];
			}
		if($var_tt>0)
				{
					echo "<script>alert('usuario ya existe');</script>";
				}
			else
				{
					$var_nom_pac=$_POST[nomb];
					echo "Nom: $var_nom_usu<br>";
					$var_color=$_POST[color];
					echo "Color:  $var_color<br>";
					$var_tama=$_POST[tama];
					echo "tamano:  $var_tama <br>";
					$var_especie=$_POST[raza];
					echo "especie:  $var_raza<br>";
					$var_duen=$_POST[propie];
					echo "Propietario:  $var_duen<br>";
				    $var_peso=$_POST[peso];
					echo "Peso:  $var_peso<br>";
				    $var_fecha_nac=$_POST[calendar];
					echo "fecha_nacimiento:  $var_fecha_nac<br>";
				    $var_alzada=$_POST[alzada];
					echo "Alzada:  $var_alzada<br>";
				    $var_genero_masc=$_POST[genero];
					echo "Genero_masc:  $var_genero_masc<br>";
					$var_fech_regist=date("Y-m-d");
					
				
				
					$sql="insert into animal(nomb_pac, color_pac, peso_pac, fecha_nac_pac, tama_o_pac,alzada_pac, genero, id_usu, id_raza,fech_regist_anim)
					                 values  ('$var_nom_pac', '$var_color', '$var_peso Kg', '$var_fecha_nac','$var_tama', '$var_alzada Cm', '$var_genero_masc', '$var_duen', '$var_especie', '$var_fech_regist')";
					ECHO "$sql<BR><br>";
					$est=mysql_query($sql);
					if(!$est)
						{
							echo "<script>alert('error al insertar en la base de datos');</script>";
						}
						else
						{
							echo "<script>alert('datos insertados correctamente');</script>";							
							//echo"<script>parent.location.href='$UrlApp/modelos/vista/crear_usu.php'</script>";
							ECHO " <script>parent.document.register_form.nomb.value=''</script> ";
							ECHO " <script>parent.document.register_form.color.value=''</script> ";
							ECHO " <script>parent.document.register_form.tama.value=''</script> ";
							ECHO " <script>parent.document.register_form.especie.value=''</script> ";
							ECHO " <script>parent.document.register_form.propie.value='0'</script> ";
							ECHO " <script>parent.document.register_form.alzada.value=''</script>";
							ECHO " <script>parent.document.register_form.calendar.value='0'</script>";
							ECHO " <script>parent.document.register_form.genero.value='0'</script>";
							ECHO " <script>parent.document.register_form.raza.value='0'</script>";	
							
							
						}
				}
	break;
	case 'updt':
		$sql="UPDATE animal SET
		nomb_pac='".$_POST[nomb]."',
		color_pac='".$_POST[color]."', 
		tama_o_pac='".$_POST[tama]."',
		id_raza='".$_POST[raza]."',
		genero='".$_POST[genero]."',
		id_usu='".$_POST[propie]."',
		peso_pac='".$_POST[peso]."',
		fecha_nac_pac='".$_POST[calendar]."',
		alzada_pac='".$_POST[alzada]."'
		WHERE id_pac='".$_POST[id]."' ";
		echo "$sql";
		
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
			$sql="DELETE from animal where id_pac ='$_POST[id]'";		
		if($res=mysql_query($sql))
			{
			
			echo "<script>alert('Se elimino correctamente');</script>";
			echo "$sql<br>";
				ECHO " <script>parent.document.register_form.nomb.value=''</script> ";
				ECHO " <script>parent.document.register_form.color.value=''</script> ";
				ECHO " <script>parent.document.register_form.tama.value='0'</script> ";
				ECHO " <script>parent.document.register_form.especie.value='0'</script> ";
				ECHO " <script>parent.document.register_form.propie.value='0'</script> ";
				ECHO " <script>parent.document.register_form.alzada.value=''</script>";
				ECHO " <script>parent.document.register_form.calendar.value=''</script>";
				ECHO " <script>parent.document.register_form.peso.value=''</script>";
				ECHO " <script>parent.document.register_form.genero.value='0'</script>";
				ECHO " <script>parent.document.register_form.raza.value='0'</script>";
			}
			
		else
			{
				echo "$sql<br>";
			echo "<script>alert('No se puede eliminar');</script>";
			}	
	break;
	}
	mysql_close($db);
?>
