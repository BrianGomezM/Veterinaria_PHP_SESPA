<?php
	require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
	require_once('../../herramientas/configuracion/connect.php'); // ruta relativa a include/config.php
	$db=conectar();
	session_name($session_name);
	session_start();
	$var_dato_bus=$_POST[dato_bus];
	$var_estado_bus=$_POST[id_tipo_busqueda];
	if($var_estado_bus==1){  $var_sql_01=" WHERE  id_pac  LIKE '%$var_dato_bus%'" ; }
	if($var_estado_bus==2){  $var_sql_01=" WHERE nomb_pac LIKE '%$var_dato_bus%' "; }
	if($var_estado_bus==3){  $var_sql_01=" WHERE fecha_nac_masc LIKE '%$var_dato_bus%' "; }
	if($var_estado_bus==4){  $var_sql_01=""; }
		$sql="SELECT   id_pac, nomb_pac, color_pac,
						 peso_pac, fecha_nac_pac, tama_o_pac,
						alzada_pac, genero, id_usu, id_raza,fech_regist_anim
			FROM animal $var_sql_01";
	
			echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
		echo"<table class='tabla' align='center'>
		<tr><th colspan='8' bgcolor='#238276'>DATOS ENCONTRADOS</th></tr>
				<tr>
					<th width='10%' bgcolor='#FBD294'>Seleccione</th>
					<th bgcolor='#FBD294'>Codigo</th>
					<th bgcolor='#FBD294'>Nombre</th>
					<th bgcolor='#FBD294'>Color</th>
					<th bgcolor='#FBD294'>Tama&ntilde;o</th>
					<th bgcolor='#FBD294'>Peso</th>
					<th bgcolor='#FBD294'>Fecha de nacimiento</th>
					<th bgcolor='#FBD294'>Alzada</th>
	
				</tr>";											
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res))
				 {
					 
					 $var_id=$row[id_pac];
					 $var_nom=$row[nomb_pac];
					 $var_color=$row[color_pac];
					 $var_tama=$row[tama_o_pac];
					 $var_peso=$row[peso_pac];
					 $var_fecha_nac=$row[fecha_nac_pac];
					 $var_alzada=$row[alzada_pac];
				
					
				echo "<tr>";
				    echo "<link href='../../css/estilo_busc.css' rel='stylesheet' type='text/css'>";
					echo "<td bgcolor='#F2F8F8'><input type='button' class='boton1' value='Cargar datos' name='sele' id='sele' 
					onclick=\"parent.parent.document.register_form.nomb.value='".$row[nomb_pac]."';										
					parent.parent.document.register_form.id.value='".$row[id_pac]."';
					parent.parent.document.register_form.color.value='".$row[color_pac]."';
					parent.parent.document.register_form.tama.value='".$row[tama_o_pac]."';
					parent.parent.document.register_form.peso.value='".$row[peso_pac]."';
					parent.parent.document.register_form.calendar.value='".$row[fecha_nac_masc]."';
					parent.parent.document.register_form.alzada.value='".$row[alzada_pac]."';
					parent.parent.document.register_form.genero.value='".$row[genero]."';
					parent.parent.Botones_Des();
					
					
					
				
					window.parent.parent.$('#ventana1').dialog('close');
					\"></td>";
					echo "<td bgcolor='#F2F8F8'>$var_id</td>";				
					echo "<td bgcolor='#F2F8F8'>$var_nom</td>";
					echo "<td bgcolor='#F2F8F8'>$var_color</td>";
					echo "<td bgcolor='#F2F8F8'>$var_tama</td>";
					echo "<td bgcolor='#F2F8F8'>$var_peso</td>";
					echo "<td bgcolor='#F2F8F8'>$var_fecha_nac</td>";
					echo "<td bgcolor='#F2F8F8'>$var_alzada</td>";
								
					}
				echo "</tr>";
		echo "</font></table>";
			
	mysql_close($db);
?>
