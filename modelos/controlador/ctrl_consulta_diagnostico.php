<?php
	require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
	require_once('../../herramientas/configuracion/connect.php'); // ruta relativa a include/config.php
	$db=conectar();
	session_name($session_name);
	session_start();
	$var_dato_bus=$_POST[dato_bus];
	$var_estado_bus=$_POST[id_tipo_busqueda];
	if($var_estado_bus==1){  $var_sql_01=" WHERE  id_diag LIKE '%$var_dato_bus%'" ; }
	if($var_estado_bus==2){  $var_sql_01=" WHERE fecha_diag LIKE '%$var_dato_bus%' "; }
	if($var_estado_bus==3){  $var_sql_01=""; }
	$sql="SELECT diagnostico.id_diag,descripcion_diag,recomendaciones_medicas,fecha_diag,id_cita,id_pago,id_usu,id_roll,id_cons
		FROM diagnostico $var_sql_01";
	
		//echo "<br>SQL: $sql";
		echo"<table width='100%' border='1' align='center' cellpadding='0' cellspacing='0'>
				<tr>
					<th width='10%'>Seleccione</th>
					<th>Codigo</th>
					<th>Descripcion</th>		
					<th>Recomendaciones Medicas</th>		
					<th>Fecha del Diagnostico</th>		
				</tr>";											
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res))
				 {
					 
					 $var_id=$row[id_diag];
					 $var_des=$row[descripcion_diag];
					 $var_rec=$row[recomendaciones_medicas];
					 $var_fecha=$row[fecha_diag];
					 							
				echo "<tr>";
					echo "<th><input type='radio' name='sele' id='sele' 
					onclick=\"parent.parent.document.register_form.des.value='".$row[descripcion_diag]."';															
					parent.parent.document.register_form.id.value='".$row[id_diag]."';															
					parent.parent.document.register_form.rec.value='".$row[recomendaciones_medicas]."';															
					parent.parent.document.register_form.calendar.value='".$row[fecha_diag]."';															
					parent.parent.document.register_form.d_masc.value='".$row[id_usu]."';															
					parent.parent.document.register_form.cita.value='".$row[id_cita]."';															
					
					window.parent.parent.$('#ventana1').dialog('close');
					\"></th>";
					echo "<td>$var_id</td>";				
					echo "<td>$var_des</td>";
					echo "<td>$var_rec</td>";
					echo "<td>$var_fecha</td>";
				
					
					}
				echo "</tr>";
		echo "</table>";
			
	mysql_close($db);
?>
