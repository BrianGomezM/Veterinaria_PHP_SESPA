<?php
	require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
	require_once('../../herramientas/configuracion/connect.php'); // ruta relativa a include/config.php
	$db=conectar();
	session_name($session_name);
	session_start();
	$var_dato_bus=$_POST[dato_bus];
	$var_estado_bus=$_POST[id_tipo_busqueda];
	if($var_estado_bus==1){  $var_sql_01=" WHERE  id_medi  LIKE '%$var_dato_bus%'" ; }
	if($var_estado_bus==2){  $var_sql_01=" WHERE nombre_generico  LIKE '%$var_dato_bus%' "; }
	if($var_estado_bus==3){  $var_sql_01=" WHERE fecha_fabricacion LIKE '$%var_dato_bus%'"; }
	if($var_estado_bus==4){  $var_sql_01=""; }
	$sql="SELECT medicamento.id_medi, nombre_generico, fecha_fabricacion,fecha_vencimiento, id_medic, Id_tipo_admin_medic
		FROM medicamento  $var_sql_01";
	
		//echo "<br>SQL: $sql";
		echo"<table width='100%' border='1' align='center' cellpadding='0' cellspacing='0'>
				<tr>
					<th width='10%'>Seleccione</th>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Fecha de Fabricacion</th>
					<th>Fecha de Vencimiento</th>	
				</tr>";											
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res))
				 {
					 
					 $var_ident=$row[id_medi];
					 $var_nomb=$row[nombre_generico];
					 $var_fecha_f=$row[fecha_fabricacion];
					 $var_fecha_v=$row[fecha_vencimiento];
					
					
				echo "<tr>";
					echo "<th><input type='radio' name='sele' id='sele' 
					onclick=\"parent.parent.document.register_form.nombre.value='".$row[nombre_generico]."';
					parent.parent.document.register_form.tipodoc.value='".$row[fecha_fabricacion]."';					
					parent.parent.document.register_form.v_admin.value='".$row[fecha_fabricacion]."';					
					parent.parent.document.register_form.calendar1.value='".$row[fecha_fabricacion]."';					
					parent.parent.document.register_form.calendar2.value='".$row[fecha_vencimiento]."';
					parent.parent.document.register_form.id.value='".$row[id_medi]."';
					
					
					
					window.parent.parent.$('#ventana1').dialog('close');
					\"></th>";
					echo "<td>$var_ident</td>";				
					echo "<td>$var_nomb</td>";
					echo "<td>$var_fecha_f</td>";
					echo "<td>$var_fecha_v</td>";
								
					}
				echo "</tr>";
		echo "</table>";
			
	mysql_close($db);
?>
