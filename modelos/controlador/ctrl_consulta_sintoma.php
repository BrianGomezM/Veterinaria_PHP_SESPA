<?php
	require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
	require_once('../../herramientas/configuracion/connect.php'); // ruta relativa a include/config.php
	$db=conectar();
	session_name($session_name);
	session_start();
	$var_dato_bus=$_POST[dato_bus];
	$var_estado_bus=$_POST[id_tipo_busqueda];
	if($var_estado_bus==1){  $var_sql_01=" WHERE  id_sin LIKE '%$var_dato_bus%'" ; }
	if($var_estado_bus==2){  $var_sql_01=" WHERE localizacion_sin LIKE '%$var_dato_bus%' "; }
	if($var_estado_bus==3){  $var_sql_01=""; }
	$sql="SELECT sintoma.id_sin,descripcion_sin,localizacion_sin
		FROM sintoma $var_sql_01";
	
		//echo "<br>SQL: $sql";
		echo"<table width='100%' border='1' align='center' cellpadding='0' cellspacing='0'>
				<tr>
					<th width='10%'>Seleccione</th>
					<th>Codigo</th>
					<th>Descripcion</th>
					<th>Lugar del sintoma</th>
					
					
				
					
				</tr>";											
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res))
				 {
					 
					 $var_id=$row[id_sin];
					 $var_des=$row[descripcion_sin];
					 $var_lug=$row[localizacion_sin];
								
				echo "<tr>";
					echo "<th><input type='radio' name='sele' id='sele' 
					onclick=\"parent.parent.document.register_form.des.value='".$row[descripcion_sin]."';										
					parent.parent.document.register_form.luga.value='".$row[localizacion_sin]."';
					parent.parent.document.register_form.id.value='".$row[id_sin]."';
					
					window.parent.parent.$('#ventana1').dialog('close');
					\"></th>";
					echo "<td>$var_id</td>";				
					echo "<td>$var_des</td>";
					echo "<td>$var_lug</td>";
					
					}
				echo "</tr>";
		echo "</table>";
			
	mysql_close($db);
?>
