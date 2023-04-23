<?php
	require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
	require_once('../../herramientas/configuracion/connect.php'); // ruta relativa a include/config.php
	$db=conectar();
	session_name($session_name);
	session_start();
	$var_dato_bus=$_POST[dato_bus];
	$var_estado_bus=$_POST[id_tipo_busqueda];
	if($var_estado_bus==1){  $var_sql_01=" WHERE  id_raza  LIKE '%$var_dato_bus%'" ; }
	if($var_estado_bus==2){  $var_sql_01=" WHERE nom_raza LIKE '%$var_dato_bus%' "; }
	if($var_estado_bus==3){  $var_sql_01=""; }
	$sql="SELECT
			  raza.id_raza,
			  raza.nom_raza,
			  raza.id_esp,
			  especie.id_esp AS id_esp1,
			  especie.nom_esp
			FROM
			  raza
			  INNER JOIN especie ON especie.id_esp = raza.id_esp $var_sql_01";
				
		//echo "<br>SQL: $sql";
			echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
		echo"<table class='tabla' align='center'>
		<tr><th colspan='4' bgcolor='#238276'>DATOS ENCONTRADOS</th></tr>
				<tr>
					<th width='10%' bgcolor='#FBD294'>Seleccione</th>
					<th bgcolor='#FBD294'>Codigo</th>
					<th bgcolor='#FBD294'>Raza</th>
					<th bgcolor='#FBD294'>Especie</th>
				</tr>";											
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res))
				 {
					 
					 $var_id=$row[id_raza];
					 $var_nom=$row[nom_raza];
					 $var_espe=$row[nom_esp];
					
				echo "<tr>";
				 echo "<link href='../../css/estilo_busc.css' rel='stylesheet' type='text/css'>";
					echo "<td bgcolor='#F2F8F8'><input type='button' class='boton1' value='Cargar datos' name='sele' id='sele' 
					onclick=\"parent.parent.document.register_form.raza.value='".$row[nom_raza]."';
					parent.parent.document.register_form.id.value='".$row[id_raza]."';
					parent.parent.document.register_form.especie.value='".$row[id_esp]."';
					parent.parent.Botones_Des();
					
					
					window.parent.parent.$('#ventana1').dialog('close');
					\"></td>";
					echo "<td bgcolor='#F2F8F8'>$var_id</td>";				
					echo "<td bgcolor='#F2F8F8'>$var_nom</td>";
					echo "<td bgcolor='#F2F8F8'>$var_espe</td>";
								
					}
				echo "</tr>";
		echo "</table></font>";
			
	mysql_close($db);
?>
