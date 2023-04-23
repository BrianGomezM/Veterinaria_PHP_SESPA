<?php
	require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
	require_once('../../herramientas/configuracion/connect.php'); // ruta relativa a include/config.php
	$db=conectar();
	session_name($session_name);
	session_start();
	$var_dato_bus=$_POST[dato_bus];
	$var_estado_bus=$_POST[id_tipo_busqueda];
	if($var_estado_bus==1){  $var_sql_01=" WHERE  id_ale LIKE '%$var_dato_bus%'" ; }
	if($var_estado_bus==2){  $var_sql_01=" WHERE nom_ale LIKE '%$var_dato_bus%' "; }
	if($var_estado_bus==3){  $var_sql_01=""; }
	$sql="SELECT alergia.id_ale,nom_ale,id_sin
		FROM alergia $var_sql_01";
	
		//echo "<br>SQL: $sql";
		echo"<table width='100%' border='1' align='center' cellpadding='0' cellspacing='0'>
				<tr>
					<th width='10%'>Seleccione</th>
					<th>Codigo</th>
					<th>Nombre</th>		
				</tr>";											
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res))
				 {
					 
					 $var_id=$row[id_ale];
					 $var_nom=$row[nom_ale];
					 							
				echo "<tr>";
					echo "<th><input type='radio' name='sele' id='sele' 
					onclick=\"parent.parent.document.register_form.alerg.value='".$row[nom_ale]."';	
					parent.parent.document.register_form.id.value='".$row[id_ale]."';															
					
					window.parent.parent.$('#ventana1').dialog('close');
					\"></th>";
					echo "<td>$var_id</td>";				
					echo "<td>$var_nom</td>";
				
					
					}
				echo "</tr>";
		echo "</table>";
			
	mysql_close($db);
?>
