<?php
	require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
	require_once('../../herramientas/configuracion/connect.php'); // ruta relativa a include/config.php
	$db=conectar();
	session_name($session_name);
	session_start();
	$var_dato_bus=$_POST[dato_bus];
	$var_estado_bus=$_POST[id_tipo_busqueda];
	if($var_estado_bus==1){  $var_sql_01=" WHERE cedula_usu LIKE '%$var_dato_bus%' " ; }
	if($var_estado_bus==2){  $var_sql_01=" WHERE nom_usu  LIKE '%$var_dato_bus%' "; }	
	if($var_estado_bus==3){  $var_sql_01=" WHERE apellido1_usu  LIKE '%$var_dato_bus%'"; }	
	if($var_estado_bus==4){  $var_sql_01=" WHERE correo_usu  LIKE '%$var_dato_bus%'  "; }	
	if($var_estado_bus==5){  $var_sql_01=" "; }
	$sql="SELECT
				  roll.id_roll,
				  usuario.id_roll AS id_roll1,
				  usuario.fecha_registro_usu,
				  usuario.correo_usu,
				  usuario.pass_usu,
				  usuario.cedula_usu,
				  usuario.edad_usu,
				  usuario.telefono_usu,
				  usuario.direccion_usu,
				  usuario.apellido2_usu,
				  usuario.apellido1_usu,
				  usuario.nom_usu,
				  usuario.id_usu,
				  roll.nombre_roll
				FROM
				  usuario
				  INNER JOIN roll ON roll.id_roll = usuario.id_roll $var_sql_01 ";
	
		//echo "<br>SQL: $sql";
		echo"<table width='100%' border='1' align='center' cellpadding='0' cellspacing='0'>
				<tr>
					
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Roll</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Fecha registro</th>
				</tr>";											
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res))
				 {
					 
					 $var_nom_vet=$row[id_usu];
					 $var_cod_vet=$row[nom_usu];
					 $var_ape_propie=$row[apellido1_usu];
					 $var_ape2_propie=$row[apellido2_usu];
					 $var_roll=$row[nombre_roll];
					 $var_direccion=$row[direccion_usu];
					 $var_telefono=$row[telefono_usu];
					 $var_fecha_reg=$row[fecha_registro_usu];
				}
					echo "<td>$var_cod_vet</td>";				
					echo "<td>$var_nom_vet</td>";				
					echo "<td>$var_ape_propie $var_ape2_propie</td>";
					echo "<td>$var_roll</td>";
					echo "<td>$var_direccion</td>";
					echo "<td>$var_telefono</td>";
					echo "<td>$var_fecha_reg</td>";
				echo "</tr>";
		echo "</table>";
			
	mysql_close($db);
?>