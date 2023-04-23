<?php
	require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
	require_once('../../herramientas/configuracion/connect.php'); // ruta relativa a include/config.php
	$db=conectar();
	session_name($session_name);
	session_start();
	$var_dato_bus=$_POST[dato_bus];
	$var_estado_bus=$_POST[id_tipo_busqueda];
	if($var_estado_bus==1){  $var_sql_01=" WHERE  id_roll	LIKE '%$var_dato_bus%'" ; }
	if($var_estado_bus==2){  $var_sql_01=" WHERE nombre_roll LIKE '%$var_dato_bus%' "; }	
	if($var_estado_bus==3){  $var_sql_01=""; }
	$sql="SELECT roll.id_roll, roll.nombre_roll
				FROM roll $var_sql_01";
	
		//echo "<br>SQL: $sql";
		echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
		echo"<table class='tabla' align='center'>	
			<tr><th colspan='3' bgcolor='#238276'>DATOS ENCONTRADOS</th></tr>
				<tr>
					<th width='10%' bgcolor='#FBD294'>Seleccione</th>
					<th width='20%'bgcolor='#FBD294'>Codigo</th>
					<th bgcolor='#FBD294'>Nombre</th>
				</tr>";											
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res))
				 {
					 
					 $var_ident=$row[id_roll];
					 $var_nom=$row[nombre_roll];
					
				echo "<tr>";
				 echo "<link href='../../css/estilo_busc.css' rel='stylesheet' type='text/css'>";
					echo "<td bgcolor='#F2F8F8'><input type='button'  class='boton1' value='Cargar datos' name='sele' id='sele' 
					onclick=\"parent.parent.document.register_form.id.value='".$row[id_roll]."';									
					parent.parent.document.register_form.nombre_roll.value='".$row[nombre_roll]."';									
					parent.parent.Botones_Des();
					window.parent.parent.$('#ventana1').dialog('close');
					\"></td>";
					echo "<td align='center' bgcolor='#F2F8F8'>$var_ident</td>";				
					echo "<td bgcolor='#F2F8F8'>$var_nom</td>";
				}
				echo "</tr>";
		echo "</font></table>";
			
	mysql_close($db);
?>