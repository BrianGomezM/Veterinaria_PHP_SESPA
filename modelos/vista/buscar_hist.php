<?php
	require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
	require_once('../../herramientas/configuracion/connect.php'); // ruta relativa a include/config.php
	$db=conectar();
	session_name($session_name);
	session_start();
	$var_id_usuario=$_GET[id_usuario];
	$var_id_animal=$_GET[id_animal];
	// echo "valor id_usuario: 	$var_id_usuario";
	// echo "valor id_animal: 	$var_id_animal";
	//exit;
	/*if($var_estado_bus==1){  $var_sql_01=" WHERE id_pac  LIKE '%$var_dato_bus%'" ; }
	if($var_estado_bus==2){  $var_sql_01=" WHERE nomb_pac LIKE '%$var_dato_bus%' "; }
	if($var_estado_bus==3){  $var_sql_01=" WHERE fecha_nac_masc LIKE '%$var_dato_bus%' "; }
	if($var_estado_bus==4){  $var_sql_01=""; }*/
	
	
	/*******************  iicio lista del animal ***************************************/
		$sql="	SELECT  animal.id_pac, animal.nomb_pac, animal.peso_pac, animal.color_pac, animal.fecha_nac_pac, animal.tama_o_pac,
					animal.alzada_pac, animal.genero, animal.fech_regist_anim
				FROM  animal 
				WHERE animal.id_pac='$var_id_animal'";
		$res=mysql_query($sql);
		
		// echo "<br>SQL: $sql";
		echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
		echo"<p align='center'> <img src='../../imagenes/logo_sespa.png'  width='1000'  /></p>";
		echo "<br><br>";
		echo"<table class='tabla' align='center'>
		<tr><th colspan='8' bgcolor='#238276'>DATOS DEL ANIMAL</th></tr>
				<tr>
				
					<th bgcolor='#FBD294'>Id animal</th>
					<th bgcolor='#FBD294'>Nombre</th>
					<th bgcolor='#FBD294'>Color</th>
					<th bgcolor='#FBD294'>Tama&ntilde;o</th>
					<th bgcolor='#FBD294'>Peso</th>
					<th bgcolor='#FBD294'>Fecha de nacimiento</th>
					<th bgcolor='#FBD294'>Alzada</th>
					<th bgcolor='#FBD294'>Fecha de registro</th>
	
				</tr>";											
		while($row=mysql_fetch_array($res))
				{
					 $var_id=$row[id_pac];
					 $var_nom=$row[nomb_pac];
					 $var_color=$row[color_pac];
					 $var_tama=$row[tama_o_pac];
					 $var_peso=$row[peso_pac];
					 $var_fecha_nac=$row[fecha_nac_pac];
					 $var_alzada=$row[alzada_pac];	
					 $var_f_r=$row[fech_regist_anim];	
					


					echo "<tr><td bgcolor='#F2F8F8'>$var_id</td>";				
					echo "<td bgcolor='#F2F8F8'>$var_nom</td>";
					echo "<td bgcolor='#F2F8F8'>$var_color</td>";
					echo "<td bgcolor='#F2F8F8'>$var_tama</td>";
					echo "<td bgcolor='#F2F8F8'>$var_peso</td>";
					echo "<td bgcolor='#F2F8F8'>$var_fecha_nac</td>";
					echo "<td bgcolor='#F2F8F8'>$var_alzada</td>";
					echo "<td bgcolor='#F2F8F8'>$var_f_r</td></tr>";
								
				}
				echo "</tr></table>";
/*******************  fin lista del animal ***************************************/				
/*******************  inicio lista del historial ***************************************/	
			$sql="	SELECT
					  animal.id_pac, animal.nomb_pac, animal.peso_pac,
					  animal.color_pac, animal.fecha_nac_pac, animal.tama_o_pac,
					  animal.alzada_pac, animal.genero, historial.id_hist,
					  historial.fecha_hist, historial.motiv_consult_h,
					  historial.antecedente_h, historial.diagnostico_presuntivo,
					  historial.diagnostico_diferencial, historial.diagnostico_instaurado,
					  historial.pronostico
					FROM
					  animal INNER JOIN  historial ON animal.id_pac = historial.id_pac
					WHERE animal.id_pac='$var_id_animal'";
					$res=mysql_query($sql);
					// echo "$sql";
					
					while($row=mysql_fetch_array($res))
				{
					 $var_id_hist=$row[id_hist];
					 $var_fecha=$row[fecha_hist];
					 $var_motiv_consult=$row[motiv_consult_h];
					 $var_antecedente_h=$row[antecedente_h];
					 $var_diag_pre=$row[diagnostico_presuntivo];
					 $var_diag_dif=$row[diagnostico_diferencial];	
					 $var_diag_inst=$row[diagnostico_instaurado];	
					 $var_pro=$row[pronostico];				
				}		
				if($var_fecha=='')
					{
					
						echo"<table class='tabla1' align='center' >
							<tr>
								<th colspan='2' bgcolor='#238276'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th bgcolor='#FBD294'>
									 $var_nom AUN NO TIENE UN HISTORIAL
								</th>
							</tr>	
							<tr>								
								<th  bgcolor='#F2F8F8'>
								Click en crear historial para crear un historial para $var_nom
								 <link href='../../css/estilo_busc.css' rel='stylesheet' type='text/css'>
									<form name='form_bus1' id='form_bus1' method='post' action='../controlador/ctrl_ing_buscar_usu.php'>
										<input type='hidden' name='id_animal' id='id_animal' SIZE='5%' value='$var_id' >	
										<p align='center' ><input type='submit' class='boton1' style='cursor:pointer;' title='Crear historial' name='crear' value='Crear historial'></p>
									</form>
								</th>	 
							</tr>";		
					echo "</table>";
					
					}
					else
					{
					
					echo"<table class='tabla1' align='center' >
					<tr><th colspan='9' >CONSULTAS</th></tr>
					<tr><th rowspan='2'>Id:</th><th rowspan='2'>Fecha registro</th>
					<th rowspan='2' style='width:700px;'>Motivo de consulta</th>
					<th rowspan='2'>Antecedentes</th><th colspan='3'>Diagnostico</th><th rowspan='2'>Pronostico</th><th rowspan='2'>Op:</th><tr>					
					<th bgcolor='#FBD294'>Presuntivo</td>
					<th bgcolor='#FBD294'>Diferencial</td>
					<th bgcolor='#FBD294'>Instaurado</td>
				</tr>";	
					echo "<tr><link href='../../css/estilo_busc.css' rel='stylesheet' type='text/css'>";										echo "<td bgcolor='#F2F8F8'>$var_id_hist</td>";				
					echo "<td bgcolor='#F2F8F8'>$var_fecha</td>";
					echo "<td style='width:700px;'>$var_motiv_consult</td>";
					echo "<td bgcolor='#F2F8F8'>$var_antecedente_h</td>";
					echo "<td bgcolor='#F2F8F8'>$var_diag_pre</td>";
					echo "<td bgcolor='#F2F8F8'>$var_diag_dif</td>";
					echo "<td bgcolor='#F2F8F8'>$var_diag_inst</td>";	
					echo "<td bgcolor='#F2F8F8'>$var_pro</td>";	
					echo "<td width='100' bgcolor='#F2F8F8'><input type='button' class='boton1' value='Abrir' name='sele' title='Abrir Historial' id='sele' 
					onclick=\"parent.parent.Listarhistoria('$var_id_hist');
							window.parent.parent.$('#ventana1').dialog('close');
							\"></td></tr><br><br>";

				    }
		echo "</font></table>";
/*******************  fin lista del historial ***************************************/						
			
	mysql_close($db);
?>
