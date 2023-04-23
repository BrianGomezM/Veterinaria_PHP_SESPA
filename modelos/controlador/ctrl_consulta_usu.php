<?php
	require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
	require_once('../../herramientas/configuracion/connect.php'); // ruta relativa a include/config.php
	$db=conectar();
	session_name($session_name);
	session_start();
	$var_dato_bus=$_POST[dato_bus];
	$var_estado_bus=$_POST[id_tipo_busqueda];
	if($var_estado_bus==1){  $var_sql_01=" WHERE  cedula_usu  LIKE '%$var_dato_bus%'" ; }
	if($var_estado_bus==2){  $var_sql_01=" WHERE nom_usu  LIKE '%$var_dato_bus%' "; }
	if($var_estado_bus==3){  $var_sql_01=" WHERE apellido2_usu LIKE '%$var_dato_bus%'"; }
	if($var_estado_bus==4){  $var_sql_01=" WHERE fecha_nac_usu LIKE '%$var_dato_bus%'"; }
	if($var_estado_bus==5){  $var_sql_01=""; }
	$sql="SELECT id_usu, nom_usu, apellido1_usu,
				  apellido2_usu, direccion_usu,
				  telefono_usu, edad_usu, cedula_usu,
				  pass_usu, correo_usu, fecha_registro_usu,
				  id_roll, id_profesion_propie, tipo_id_usu
		FROM usuario  $var_sql_01";
		echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
		echo"<table class='tabla' align='center'>
		<tr><th colspan='10' bgcolor='#238276'>DATOS ENCONTRADOS</th></tr>
				<tr>
					<th width='10%' bgcolor='#FBD294'>Seleccione</th>
					<th bgcolor='#FBD294'>Nombre</th>
					<th bgcolor='#FBD294'>Apellidos</th>
					<th bgcolor='#FBD294'>Correo</th>
					<th bgcolor='#FBD294'>Direccion</th>	
					<th bgcolor='#FBD294'>Telefono</th>	
					<th bgcolor='#FBD294'>Fecha De Registro</th>	
					<th bgcolor='#FBD294'>Tipo De Documento</th>	
					<th bgcolor='#FBD294'>Cedula</th>
					
				</tr>";											
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res))
				 {
					 
					 $var_ident=$row[cedula_usu];
					 $var_nom=$row[nom_usu];
					 $var_apel=$row[apellido1_usu];
					 $var_apel2=$row[apellido2_usu];
					 $var_correo=$row[correo_usu];
					 $var_pass=$row[pass_usu];
					 $var_dire=$row[direccion_usu];
					 $var_tele=$row[telefono_usu];
					 $var_f_regis=$row[fecha_registro_usu];
					 $var_tipodoc=$row[tipo_id_usu];
				echo "<tr>";
				echo "<link href='../../css/estilo_busc.css' rel='stylesheet' type='text/css'>";
					echo "<td bgcolor='#F2F8F8'><input type='button' class='boton1' title='Seleccionar datos' value='Cargar datos' name='sele' id='sele' 
					onclick=\"parent.parent.document.register_form.usu.value='".$row[nom_usu]."';
					parent.parent.document.register_form.apel.value='".$row[apellido1_usu]."';					
					parent.parent.document.register_form.iden.value='".$row[cedula_usu]."';
					parent.parent.document.register_form.apel2.value='".$row[apellido2_usu]."';
					parent.parent.document.register_form.corre.value='".$row[correo_usu]."';
					parent.parent.document.register_form.dir.value='".$row[direccion_usu]."';
					parent.parent.document.register_form.tel.value='".$row[telefono_usu]."';
					parent.parent.document.register_form.id.value='".$row[id_usu]."';
					parent.parent.document.register_form.profesion.value='".$row[id_profesion_propie]."';
					parent.parent.Botones_Des();
					
					window.parent.parent.$('#ventana1').dialog('close') ;
					\"></td>";
								
					echo "<td bgcolor='#F2F8F8'>$var_nom</td>";
					echo "<td bgcolor='#F2F8F8'>$var_apel $var_apel2</td>";
					echo "<td bgcolor='#F2F8F8'>$var_correo</td>";
					echo "<td bgcolor='#F2F8F8'>$var_dire</td>";					
					echo "<td bgcolor='#F2F8F8'>$var_tele</td>";					
					echo "<td bgcolor='#F2F8F8'>$var_f_regis</td>";	
					echo "<td bgcolor='#F2F8F8'>$var_tipodoc</td>";					
					echo "<td bgcolor='#F2F8F8'>$var_ident</td>";						
					}
				echo "</tr>";
		echo "</table></font>";
		
	mysql_close($db);
?>
