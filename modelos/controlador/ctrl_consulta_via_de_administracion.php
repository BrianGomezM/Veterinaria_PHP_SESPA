<?php
	require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
	require_once('../../herramientas/configuracion/connect.php'); // ruta relativa a include/config.php
	$db=conectar();
	session_name($session_name);
	session_start();	

	$var_dato_id=$_POST[usuario];
	$busqueda=$_POST[estado_bus];
	$var_dato_bus=$_POST[animal];
	$var_estado_bus=$_POST[id_tipo_busqueda];
	switch ($busqueda)
	{
		case '1':
			if( $busqueda==1)
			{
				if($var_estado_bus==1){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'" ; }
				
				$sql="SELECT
					  animal.id_pac,
					  usuario.nom_usu,
					  usuario.apellido1_usu,
					  animal.nomb_pac,
					  constante_fisiologica.frecuencia_cardiaca,
					  constante_fisiologica.pulso,
					  constante_fisiologica.frecuenci_respira,
					  constante_fisiologica.temperatura_medic,
					  historial.id_hist,
					  usuario.id_usu			
					FROM
					  animal
					  INNER JOIN historial ON animal.id_pac = historial.id_pac
					  INNER JOIN constante_fisiologica ON historial.id_hist =
						constante_fisiologica.id_hist
					  INNER JOIN usuario ON usuario.id_usu = animal.id_usu $var_sql_01";
				
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									$var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $var_raza=$row[nom_esp];
									 $var_especie=$row[nom_raza];
									 $var_temperatura=$row[temperatura_medic];
									 $var_frecuencia=$row[frecuencia_cardiaca];
									 $var_pulso=$row[pulso];
									 $var_frecuencia_resp=$row[frecuenci_respira];	
									 $var_histo=$row[id_hist];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center'>
							<tr>
								<th colspan='4'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td ><b>ANIMAL:</b></td>
								<td colspan='4'>$var_animal</td>
							</tr>
							<tr>
								<td ><b>PROPIETARIO:</b></td>
								<td colspan='4' >$var_nom_propie $var_ape_propie</td>
							</tr>							
							<tr>
								<th colspan='14'>CONSTANTES FISIOLOGICAS</th>
							</tr>
							<tr>
								<td ><b>TEMPERATURA:</b></td>
								<td >$var_temperatura</td>
								<td ><b>FRECUENCIA CARDIACA:</b></td>
								<td >$var_frecuencia</td>
							</tr>
							<tr>
								<td ><b>PULSO:</b></td>
								<td >$var_temperatura</td>
								<td ><b>FRECUENCIA RESPIRATORIA:</b></td>
								<td >$var_frecuencia</td>
							<tr>
								<td colspan='15'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/pdf_constante_fisiologicas.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
									
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Click para generar PDF' name='btn_pdf' value='Generar pdf'>
																			
									</form>
								</td>
							</tr>";	
							
					echo "</table>";
						
				}
			}
			break;	
			case '2':
			if( $busqueda==2)
			{
				if($var_estado_bus==2){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'" ; }
				
				
				$sql="SELECT
					  animal.id_pac,
					  usuario.nom_usu,
					  usuario.apellido1_usu,
					  animal.nomb_pac,
					  dato_medio_ambien.nutricion_datos_medio_amb,
					  dato_medio_ambien.entorno_datos_medio_amb,
					  historial.id_hist,
					  usuario.id_usu,
					  estilo_v.id_estilo_v,
					  estilo_v.estilo_v					
					FROM
					  animal
					  INNER JOIN historial ON animal.id_pac = historial.id_pac
					  INNER JOIN dato_medio_ambien ON historial.id_hist =
						dato_medio_ambien.id_hist
					  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
					  INNER JOIN estilo_v ON estilo_v.id_estilo_v =
						dato_medio_ambien.id_estilo_v $var_sql_01";
			
					$res=mysql_query($sql);
			
					while($row=mysql_fetch_array($res))
								{
									 $var_animal=$row[nomb_pac];
									  $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $var_raza=$row[nom_esp];
									 $var_especie=$row[nom_raza];
									 $var_estilo_vida=$row[estilo_v];
									 $var_nutricion_datos=$row[nutricion_datos_medio_amb];	
									 $var_datos_entorno=$row[entorno_datos_medio_amb];	
									 $var_histo=$row[id_hist];	
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									lA MASCOTA QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADA
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
				echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table align='center' class='tabla'>
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL #$var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='6' >$var_animal</td>
							
								
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='6' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>
							<tr>
								<th colspan='6'>DATOS MEDIO AMBIENTALES</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ESTILO DE VIDA:</b></td>
								<td bgcolor='#F5F5F5'>$var_estilo_vida</td>
								<td bgcolor='#F5F5F5'><b>NUTRICION:</b></td>
								<td bgcolor='#F5F5F5'>$var_nutricion_datos</td>
								<td bgcolor='#F5F5F5'><b>DATOS DE ENTORNO:</b></td>
								<td bgcolor='#F5F5F5'>$var_datos_entorno</td>
								
							</tr>
							<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/datos_medio_ambientales_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
									
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Click para generar PDF' name='btn_pdf' value='Generar pdf'>
																			
									</form>
								</td>
							</tr>";
					echo "</table>";
				}
			}

			break;
			case '3':
			if( $busqueda==3)
			{
				if($var_estado_bus==3){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
					  animal.id_pac,
					  usuario.nom_usu,
					  usuario.apellido1_usu,
					  animal.nomb_pac,
					  historial.antecedente_h,
					  historial.motiv_consult_h,
					  historial.id_hist,
					  usuario.id_usu
					FROM
					  animal
					  INNER JOIN historial ON animal.id_pac = historial.id_pac
					  INNER JOIN usuario ON usuario.id_usu = animal.id_usu $var_sql_01";
			
					$res=mysql_query($sql);
			
					while($row=mysql_fetch_array($res))
								{
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $var_raza=$row[nom_esp];
									 $var_especie=$row[nom_raza];
									 $anteceden=$row[antecedente_h];	
									 $motiv_consult=$row[motiv_consult_h];	
									 $var_histo=$row[id_hist];	
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
				
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table align='center' class='tabla'>
							
							<tr>
								<th colspan='4'  bgcolor='#F5F5F5'>HISTORIAL #$var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='4'>$var_animal</td>
							
							
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='4' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>
							<tr>
								<th colspan='4' bgcolor='#336666'>ANTECEDENTES Y MOTIVO DE CONSULTA</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANTECEDENTES:</b></td>
								<td bgcolor='#F5F5F5'>$anteceden</td>
								<td bgcolor='#F5F5F5'><b>MOTIVO DE CONSULTA:</b></td>
								<td bgcolor='#F5F5F5'>$motiv_consult</td>
							</tr>
							<tr>
								<td colspan='4'> 
								
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/antecedent.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Click para generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";
					echo "</table>";
				}
			}

			break;
			case '4':
			if( $busqueda==4)
			{
				if($var_estado_bus==4){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
					  animal.id_pac,
					  usuario.nom_usu,
					  usuario.apellido1_usu,
					  animal.nomb_pac,
					  lesion.macula_les,
					  lesion.papula_les,
					  lesion.pustula_les,
					  lesion.habon_les,
					  lesion.vesicula_les,
					  lesion.placa_les,
					  lesion.nodulo_les,
					  lesion.tumor_les,
					  lesion.quiste_les,
					  lesion.comedon_les,
					  lesion.collarete_epidemico,
					  lesion.escama,
					  lesion.costra,
					  lesion.excoriacion,
					  lesion.erosion,
					  lesion.liquenificacion,
					  lesion.ulcera,
					  lesion.hiperpigmentacion,
					  lesion.hipopigmentacion,
					  lesion.cicatriz,
					  historial.id_hist,
					  usuario.id_usu
					FROM
					  animal
					  INNER JOIN historial ON animal.id_pac = historial.id_pac
					  INNER JOIN lesion ON historial.id_hist =
						lesion.id_hist
					  INNER JOIN usuario ON usuario.id_usu = animal.id_usu $var_sql_01";
				
					$res=mysql_query($sql);
			
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $var_raza=$row[nom_esp];
									 $var_especie=$row[nom_raza];
									 $macula=$row[macula_les];
									 $papula=$row[papula_les];
									 $pustula=$row[pustula_les];
									 $vesicula=$row[vesicula_les];
									 $placa=$row[placa_les];
									 $nodulo=$row[nodulo_les];
									 $tumor=$row[tumor_les];
									 $quiste=$row[quiste_les];
									 $comedon=$row[comedon_les];
									 $collarete=$row[collarete_epidemico];
									 $escama=$row[escama];
									 $costra=$row[costra];
									 $excoriacion=$row[excoriacion];
									 $erosion=$row[erosion];
									 $liquenificacion=$row[liquenificacion];
									 $ulcera=$row[ulcera];
									 $hiperpigmentacion=$row[hiperpigmentacion];
									 $hipopigmentacion=$row[hipopigmentacion];
									 $habon=$row[habon_les];
									 $cicatriz=$row[cicatriz];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table align='center' class='tabla'>
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td colspan='5'>$var_animal</td>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>LESIONES</th>
							</tr>
								</table>
							<table align='center' class='tabla'>	
							<tr>
								<th bgcolor='#F5F5F5' height='5%' ><b>LESIONES PRIMARIAS</b></th>
								<th bgcolor='#F5F5F5'> SI - NO </th>
								
								<th bgcolor='#F5F5F5' height='5%'><b>LESIONES SECUNDARIAS</b></th>
								<th bgcolor='#F5F5F5'> SI - NO </th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>MACULA:</b></td>
								<td bgcolor='#F5F5F5'>$macula</td>
								<td bgcolor='#F5F5F5'><b>COMEDON:</b></td>
								<td bgcolor='#F5F5F5'>$comedon</td>
							</tr>
							<tr>
							
								<td bgcolor='#F5F5F5'><b>PUPULA:</b></td>
								<td bgcolor='#F5F5F5'>$papula</td>
								<td bgcolor='#F5F5F5'><b>COLLARETE EPIDERMICO:</b></td>
								<td bgcolor='#F5F5F5'>$collarete</td>
							</tr>
							<tr>
							
								<td bgcolor='#F5F5F5'><b>PUSTULA:</b></td>
								<td bgcolor='#F5F5F5'>$pustula</td>
								<td  bgcolor='#F5F5F5'><b>COSTRA:</b></td>
								<td bgcolor='#F5F5F5'>$costra</td>
							</tr>
							<tr>
							
								<td  bgcolor='#F5F5F5'><b>HABON:</b></td>
								<td bgcolor='#F5F5F5'>$habon</td>
								<td bgcolor='#F5F5F5'><b>EXCORIACION:</b></td>
								<td bgcolor='#F5F5F5'>$excoriacion</td>
							</tr>
							<tr>
							
								<td bgcolor='#F5F5F5'><b>VESICULA:</b></td>
								<td bgcolor='#F5F5F5'>$vesicula</td>
								<td bgcolor='#F5F5F5'><b>EROSION:</b></td>
								<td bgcolor='#F5F5F5'>$erosion</td>
							</tr>
							<tr>
							
								<td bgcolor='#F5F5F5'><b>NODULO:</b></td>
								<td bgcolor='#F5F5F5'>$nodulo</td>
								<td bgcolor='#F5F5F5'><b>LIQUENIFICACION:</b></td>
								<td bgcolor='#F5F5F5'>$liquenificacion</td>
							</tr>
							<tr>
							
								<td bgcolor='#F5F5F5'><b>TUMOR:</b></td>
								<td bgcolor='#F5F5F5'>$tumor</td>
								<td bgcolor='#F5F5F5'><b>ULCERA:</b></td>
								<td bgcolor='#F5F5F5'>$ulcera</td>
							</tr>
							<tr>
							
								<td bgcolor='#F5F5F5'><b>PLACA:</b></td>
								<td bgcolor='#F5F5F5'>$placa</td>
								<td bgcolor='#F5F5F5'><b>ESCAMA:</b></td>
								<td bgcolor='#F5F5F5'>$escama</td>
							</tr>
							<tr>
							
								<td bgcolor='#F5F5F5'><b>QUISTE:</b></td>
								<td bgcolor='#F5F5F5'>$quiste</td>
								<td bgcolor='#F5F5F5'><b>HIPERPIGMENTACION:</b></td>
								<td bgcolor='#F5F5F5'>$hiperpigmentacion</td>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'></b></td>
								<td bgcolor='#F5F5F5'></td>
								<td bgcolor='#F5F5F5'><b>HIPOPIGMENTACION:</b></td>
								<td bgcolor='#F5F5F5'>$hipopigmentacion</td>
							</tr><tr>
								<td bgcolor='#F5F5F5'></b></td>
								<td bgcolor='#F5F5F5'></td>
								<td bgcolor='#F5F5F5'><b>CICATRIZ:</b></td>
								<td bgcolor='#F5F5F5'>$cicatriz</td>
							</tr>
							<tr>
								<td colspan='4'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/lesion_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
									
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title=' PDF' name='btn_pdf' value='Generar pdf'>
																			
									</form>
								</td>
							</tr>";	
							
					echo "</table>";
						
				}
			}
			break;	
				case '5':
			if( $busqueda==5)
			{
				if($var_estado_bus==5){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
					  animal.id_pac,
					  usuario.nom_usu,
					  usuario.apellido1_usu,
					  animal.nomb_pac,
					  linfonodo.id_lista_linfonodo,
					  linfonodo.estado_lin,
					  linfonodo.comentario,
					  historial.id_hist,
					  usuario.id_usu,
					  lista_linfon.nom_lista_linfonodo
					  
					FROM
					  animal
					  INNER JOIN historial ON animal.id_pac = historial.id_pac
					  INNER JOIN linfonodo ON historial.id_hist =
						linfonodo.id_hist
					  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
				   INNER JOIN lista_linfon ON lista_linfon.id_lista_linfonodo =
						linfonodo.id_lista_linfonodo $var_sql_01";
				
					$res=mysql_query($sql);
			
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $var_raza=$row[nom_esp];
									 $var_especie=$row[nom_raza];
									 $id_lista=$row[id_lista_linfonodo];
									 $lista_linfo=$row[nom_lista_linfonodo];
									 $estado=$row[estado_lin];
									 $comentario=$row[comentario];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
				echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='2'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  bgcolor='#F5F5F5'>$var_animal</td>
													
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='2'  bgcolor='#336666'>LINFONODOS</th>
							</tr>
								</table>
							<table align='center'  class='tabla'>
							<tr>	 
								<th colspan='1' bgcolor='#F5F5F5'><b>LINFONODO</b></th>
								<th bgcolor='#F5F5F5'><b>ESTADO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
						$sql="SELECT
								  lista_linfon.nom_lista_linfonodo,
								  linfonodo.id_lista_linfonodo,
								  linfonodo.estado_lin,
								  linfonodo.comentario,
								  historial.id_hist
								FROM
								  lista_linfon
								  INNER JOIN linfonodo ON lista_linfon.id_lista_linfonodo =
									linfonodo.id_lista_linfonodo
								  INNER JOIN historial ON historial.id_hist = linfonodo.id_hist WHERE  historial.id_hist='$var_histo' AND lista_linfon.id_lista_linfonodo='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_lista_linfonodo];
									 $lista_linfo1=$row[nom_lista_linfonodo];
									 $estado1=$row[estado_lin];
									 $comentario1=$row[comentario];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						$sql="SELECT
								  lista_linfon.nom_lista_linfonodo,
								  linfonodo.id_lista_linfonodo,
								  linfonodo.estado_lin,
								  linfonodo.comentario,
								  historial.id_hist
								FROM
								  lista_linfon
								  INNER JOIN linfonodo ON lista_linfon.id_lista_linfonodo =
									linfonodo.id_lista_linfonodo
								  INNER JOIN historial ON historial.id_hist = linfonodo.id_hist WHERE  historial.id_hist='$var_histo' AND lista_linfon.id_lista_linfonodo='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista2=$row[id_lista_linfonodo];
									 $lista_linfo2=$row[nom_lista_linfonodo];
									 $estado2=$row[estado_lin];
									 $comentario2=$row[comentario];
								}	
								
					echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo2</b></td>
								<td bgcolor='#F5F5F5'>$estado2</td>
								<td bgcolor='#F5F5F5'>$comentario2</td>
							</tr>";
					$sql="SELECT
								  lista_linfon.nom_lista_linfonodo,
								  linfonodo.id_lista_linfonodo,
								  linfonodo.estado_lin,
								  linfonodo.comentario,
								  historial.id_hist
								FROM
								  lista_linfon
								  INNER JOIN linfonodo ON lista_linfon.id_lista_linfonodo =
									linfonodo.id_lista_linfonodo
								  INNER JOIN historial ON historial.id_hist = linfonodo.id_hist WHERE  historial.id_hist='$var_histo' AND lista_linfon.id_lista_linfonodo='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista2=$row[id_lista_linfonodo];
									 $lista_linfo2=$row[nom_lista_linfonodo];
									 $estado2=$row[estado_lin];
									 $comentario2=$row[comentario];
								}	
								
					echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo2</b></td>
								<td bgcolor='#F5F5F5'>$estado2</td>
								<td bgcolor='#F5F5F5'>$comentario2</td>
							</tr>";
					$sql="SELECT
								  lista_linfon.nom_lista_linfonodo,
								  linfonodo.id_lista_linfonodo,
								  linfonodo.estado_lin,
								  linfonodo.comentario,
								  historial.id_hist
								FROM
								  lista_linfon
								  INNER JOIN linfonodo ON lista_linfon.id_lista_linfonodo =
									linfonodo.id_lista_linfonodo
								  INNER JOIN historial ON historial.id_hist = linfonodo.id_hist WHERE  historial.id_hist='$var_histo' AND lista_linfon.id_lista_linfonodo='4'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista2=$row[id_lista_linfonodo];
									 $lista_linfo2=$row[nom_lista_linfonodo];
									 $estado2=$row[estado_lin];
									 $comentario2=$row[comentario];
								}	
								
					echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo2</b></td>
								<td bgcolor='#F5F5F5'>$estado2</td>
								<td bgcolor='#F5F5F5'>$comentario2</td>
							</tr>";
						echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/linfonodo_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
									
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
																			
									</form>
								</td>
							</tr>";	
							
					echo "</table>";
						
				}
			}
			break;	
			/************************************************INSPECCION*****************************************************/
			case '6':
			if( $busqueda==6)
			{
				if($var_estado_bus==6){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
					  animal.id_pac,
					  usuario.nom_usu,
					  usuario.apellido1_usu,
					  animal.nomb_pac,
					 inspeccion.id_inspeccion,
					inspeccion.estado_inspeccion,
					inspeccion.comentario_inspeccion,
					inspeccion.id_hist,
					inspeccion.id_list_inspecc,
					  historial.id_hist,
					  usuario.id_usu,
					 listado_inspeccion.nom_lista_inspecc,
					listado_inspeccion.id_list_inspecc
					  
					FROM
					  animal
					  INNER JOIN historial ON animal.id_pac = historial.id_pac
					  INNER JOIN inspeccion ON historial.id_hist =
						inspeccion.id_hist
					  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
				   INNER JOIN listado_inspeccion ON listado_inspeccion.id_list_inspecc =
						inspeccion.id_list_inspecc $var_sql_01";
				
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $var_raza=$row[nom_esp];
									 $var_especie=$row[nom_raza];
									 $id_lista=$row[id_list_inspecc];
									 $lista_linfo=$row[nom_lista_inspecc];
									 $estado=$row[estado_inspeccion];
									 $comentario=$row[comentario_inspeccion];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>INSPECCION</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th colspan='1' bgcolor='#F5F5F5'><b>INSPECCION</b></th>
								<th bgcolor='#F5F5F5'><b>ESTADO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
						$sql="SELECT
								  listado_inspeccion.nom_lista_inspecc,
								  inspeccion.id_list_inspecc,
								  inspeccion.estado_inspeccion,
								  inspeccion.comentario_inspeccion,
								  historial.id_hist
								FROM
								  listado_inspeccion
								  INNER JOIN inspeccion ON listado_inspeccion.id_list_inspecc =
									inspeccion.id_list_inspecc
								  INNER JOIN historial ON historial.id_hist = inspeccion.id_hist WHERE  historial.id_hist='$var_histo' AND listado_inspeccion.id_list_inspecc='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_inspecc];
									 $lista_linfo1=$row[nom_lista_inspecc];
									 $estado1=$row[estado_inspeccion];
									 $comentario1=$row[comentario_inspeccion];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						$sql="SELECT
								  listado_inspeccion.nom_lista_inspecc,
								  inspeccion.id_list_inspecc,
								  inspeccion.estado_inspeccion,
								  inspeccion.comentario_inspeccion,
								  historial.id_hist
								FROM
									listado_inspeccion
								 INNER JOIN inspeccion ON listado_inspeccion.id_list_inspecc =
									inspeccion.id_list_inspecc
								  INNER JOIN historial ON historial.id_hist = inspeccion.id_hist WHERE  historial.id_hist='$var_histo' AND listado_inspeccion.id_list_inspecc='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista2=$row[id_list_inspecc];
									 $lista_linfo2=$row[nom_lista_inspecc];
									 $estado2=$row[estado_inspeccion];
									 $comentario2=$row[comentario_inspeccion];
								}	
								
					echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo2</b></td>
								<td bgcolor='#F5F5F5'>$estado2</td>
								<td bgcolor='#F5F5F5'>$comentario2</td>
							</tr>";
					$sql="SELECT
								  listado_inspeccion.nom_lista_inspecc,
								  inspeccion.id_list_inspecc,
								  inspeccion.estado_inspeccion,
								  inspeccion.comentario_inspeccion,
								  historial.id_hist
								FROM
									listado_inspeccion
								 INNER JOIN inspeccion ON listado_inspeccion.id_list_inspecc =
									inspeccion.id_list_inspecc
								  INNER JOIN historial ON historial.id_hist = inspeccion.id_hist WHERE  historial.id_hist='$var_histo' AND listado_inspeccion.id_list_inspecc='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista2=$row[id_list_inspecc];
									 $lista_linfo2=$row[nom_lista_inspecc];
									 $estado2=$row[estado_inspeccion];
									 $comentario2=$row[comentario_inspeccion];
								}	
								
					echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo2</b></td>
								<td bgcolor='#F5F5F5'>$estado2</td>
								<td bgcolor='#F5F5F5'>$comentario2</td>
							</tr>";
					echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/inspecc_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
									
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
																			
									</form>
								</td>
							</tr>";	
												
					echo "</table>";
						
				}
			}
			break;		
/*******************************************************PALPACION***************************************************************/
			case '7':
			if( $busqueda==7)
			{
				if($var_estado_bus==7){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  palpacion.id_palpacion,
						  palpacion.id_list_palpac,
						  palpacion.estado_palpacion,
						  palpacion.comentario_palpa,
						  palpacion.lado_palpac,
						  listado_palpacion.id_list_palpac AS id_list_palpac1,
						  listado_palpacion.nom_list_palpac
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN palpacion ON historial.id_hist = palpacion.id_hist
						  INNER JOIN listado_palpacion ON listado_palpacion.id_list_palpac =
							palpacion.id_list_palpac $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_palpac];
									 $lista_linfo=$row[nom_list_palpac];
									 $estado=$row[estado_palpacion];
									 $comentario=$row[comentario_palpa];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>PALPACION</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th colspan='1' bgcolor='#F5F5F5'><b>PALPACION</b></th>
								<th style='width:15px;'><b>ESTADO</b></td>
								<th style='width:10px; '><b>LADO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
						$sql="SELECT
								  listado_palpacion.nom_list_palpac,
								  palpacion.id_list_palpac,
								  palpacion.estado_palpacion,
								  palpacion.comentario_palpa,
								  palpacion.lado_palpac,
								  historial.id_hist
								FROM
								  listado_palpacion
								  INNER JOIN palpacion ON listado_palpacion.id_list_palpac =
									palpacion.id_list_palpac
								  INNER JOIN historial ON historial.id_hist = palpacion.id_hist WHERE  historial.id_hist='$var_histo' AND listado_palpacion.id_list_palpac='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_palpac];
									 $lado=$row[lado_palpac];
									 $lista_linfo1=$row[nom_list_palpac];
									 $estado1=$row[estado_palpacion];
									 $comentario1=$row[comentario_palpa];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
					$sql="SELECT
								  listado_palpacion.nom_list_palpac,
								  palpacion.id_list_palpac,
								  palpacion.estado_palpacion,
								  palpacion.comentario_palpa,
								   palpacion.lado_palpac,
								  historial.id_hist
								FROM
								  listado_palpacion
								  INNER JOIN palpacion ON listado_palpacion.id_list_palpac =
									palpacion.id_list_palpac
								  INNER JOIN historial ON historial.id_hist = palpacion.id_hist WHERE  historial.id_hist='$var_histo' AND listado_palpacion.id_list_palpac='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista2=$row[id_list_palpac];
									 $lista_linfo2=$row[nom_list_palpac];
									 $lado=$row[lado_palpac];
									 $estado2=$row[estado_palpacion];
									 $comentario2=$row[comentario_palpa];
								}	
								
					echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo2</b></td>
								<td bgcolor='#F5F5F5'>$estado2</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario2</td>
							</tr>";
					$sql="SELECT
								  listado_palpacion.nom_list_palpac,
								  palpacion.id_list_palpac,
								  palpacion.estado_palpacion,
								  palpacion.comentario_palpa,
								  palpacion.lado_palpac,
								  historial.id_hist
								FROM
								  listado_palpacion
								  INNER JOIN palpacion ON listado_palpacion.id_list_palpac =
									palpacion.id_list_palpac
								  INNER JOIN historial ON historial.id_hist = palpacion.id_hist WHERE  historial.id_hist='$var_histo' AND listado_palpacion.id_list_palpac='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista2=$row[id_list_palpac];
									 $lista_linfo2=$row[nom_list_palpac];
									 $estado2=$row[estado_palpacion];
									  $lado=$row[lado_palpac];
									 $comentario2=$row[comentario_palpa];
								}	
								
					echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo2</b></td>
								<td bgcolor='#F5F5F5'>$estado2</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario2</td>
							</tr>";
					$sql="SELECT
								  listado_palpacion.nom_list_palpac,
								  palpacion.id_list_palpac,
								  palpacion.estado_palpacion,
								  palpacion.comentario_palpa,
								  palpacion.lado_palpac,
								  historial.id_hist
								FROM
								  listado_palpacion
								  INNER JOIN palpacion ON listado_palpacion.id_list_palpac =
									palpacion.id_list_palpac
								  INNER JOIN historial ON historial.id_hist = palpacion.id_hist WHERE  historial.id_hist='$var_histo' AND listado_palpacion.id_list_palpac='4'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista2=$row[id_list_palpac];
									 $lista_linfo2=$row[nom_list_palpac];
									  $lado=$row[lado_palpac];
									 $estado2=$row[estado_palpacion];
									 $comentario2=$row[comentario_palpa];
								}	
								
					echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo2</b></td>
								<td bgcolor='#F5F5F5'>$estado2</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario2</td>
							</tr>";
					$sql="SELECT
								  listado_palpacion.nom_list_palpac,
								  palpacion.id_list_palpac,
								  palpacion.estado_palpacion,
								  palpacion.comentario_palpa,
								  palpacion.lado_palpac,
								  historial.id_hist
								FROM
								  listado_palpacion
								  INNER JOIN palpacion ON listado_palpacion.id_list_palpac =
									palpacion.id_list_palpac
								  INNER JOIN historial ON historial.id_hist = palpacion.id_hist WHERE  historial.id_hist='$var_histo' AND listado_palpacion.id_list_palpac='5'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista2=$row[id_list_palpac];
									 $lista_linfo2=$row[nom_list_palpac];
									  $lado=$row[lado_palpac];
									 $estado2=$row[estado_palpacion];
									 $comentario2=$row[comentario_palpa];
								}	
								
					echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo2</b></td>
								<td bgcolor='#F5F5F5'>$estado2</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario2</td>
							</tr>";
					$sql="SELECT
								  listado_palpacion.nom_list_palpac,
								  palpacion.id_list_palpac,
								  palpacion.estado_palpacion,
								  palpacion.comentario_palpa,
								  palpacion.lado_palpac,
								  historial.id_hist
								FROM
								  listado_palpacion
								  INNER JOIN palpacion ON listado_palpacion.id_list_palpac =
									palpacion.id_list_palpac
								  INNER JOIN historial ON historial.id_hist = palpacion.id_hist WHERE  historial.id_hist='$var_histo' AND listado_palpacion.id_list_palpac='6'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista2=$row[id_list_palpac];
									 $lista_linfo2=$row[nom_list_palpac];
									  $lado=$row[lado_palpac];
									 $estado2=$row[estado_palpacion];
									 $comentario2=$row[comentario_palpa];
								}	
								
					echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo2</b></td>
								<td bgcolor='#F5F5F5'>$estado2</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario2</td>
							</tr>";
				$sql="SELECT
								  listado_palpacion.nom_list_palpac,
								  palpacion.id_list_palpac,
								  palpacion.estado_palpacion,
								  palpacion.comentario_palpa,
								  palpacion.lado_palpac,
								  historial.id_hist
								FROM
								  listado_palpacion
								  INNER JOIN palpacion ON listado_palpacion.id_list_palpac =
									palpacion.id_list_palpac
								  INNER JOIN historial ON historial.id_hist = palpacion.id_hist WHERE  historial.id_hist='$var_histo' AND listado_palpacion.id_list_palpac='7'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista2=$row[id_list_palpac];
									 $lista_linfo2=$row[nom_list_palpac];
									  $lado=$row[lado_palpac];
									 $estado2=$row[estado_palpacion];
									 $comentario2=$row[comentario_palpa];
								}	
								
					echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo2</b></td>
								<td bgcolor='#F5F5F5'>$estado2</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario2</td>
							</tr>";
					echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/palpac_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
									
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
																			
									</form>
								</td>
							</tr>";	
												
					echo "</table>";
						
				}
			}
			break;	
/***************************************************PRUEBAS ESPECIFICAS************************************************************************************/			
		case '8':
			if( $busqueda==8)
			{
				if($var_estado_bus==8){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  prueba_especifica.id_pru_especif,
						  prueba_especifica.id_list_prueb_especif,
						  prueba_especifica.estado_prueb_especif,
						  prueba_especifica.comentario_prueb_especif,
						  prueba_especifica.lado_prueb_especif,
						  listado_prueb_especifi.id_list_prueb_especif AS id_list_prueb_especif,
						  listado_prueb_especifi.nom_list_prueb_especif
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN prueba_especifica ON historial.id_hist = prueba_especifica.id_hist
						  INNER JOIN listado_prueb_especifi ON listado_prueb_especifi.id_list_prueb_especif =
							prueba_especifica.id_list_prueb_especif $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_prueb_especif];
									 $lista_linfo=$row[nom_list_prueb_especif];
									 $estado=$row[estado_prueb_especif];
									 $comentario=$row[comentario_prueb_especif];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>PRUEBAS ESPECIFICAS</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th colspan='1' bgcolor='#F5F5F5'><b>EXAMEN</b></th>
								<th style='width:15px;'><b>ESTADO</b></td>
								<th style='width:10px; '><b>LADO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
						$sql="SELECT
								  listado_prueb_especifi.nom_list_prueb_especif,
								  prueba_especifica.id_list_prueb_especif,
								  prueba_especifica.estado_prueb_especif,
								  prueba_especifica.comentario_prueb_especif,
								  prueba_especifica.lado_prueb_especif,
								  historial.id_hist
								FROM
								  listado_prueb_especifi
								  INNER JOIN prueba_especifica ON listado_prueb_especifi.id_list_prueb_especif =
									prueba_especifica.id_list_prueb_especif
								  INNER JOIN historial ON historial.id_hist = prueba_especifica.id_hist WHERE  historial.id_hist='$var_histo' AND listado_prueb_especifi.id_list_prueb_especif='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[nom_list_prueb_especif];
									 $lado=$row[lado_prueb_especif];
									 $lista_linfo1=$row[nom_list_prueb_especif];
									 $estado1=$row[estado_prueb_especif];
									 $comentario1=$row[comentario_prueb_especif];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						$sql="SELECT
								  listado_prueb_especifi.nom_list_prueb_especif,
								  prueba_especifica.id_list_prueb_especif,
								  prueba_especifica.estado_prueb_especif,
								  prueba_especifica.comentario_prueb_especif,
								  prueba_especifica.lado_prueb_especif,
								  historial.id_hist
								FROM
								  listado_prueb_especifi
								  INNER JOIN prueba_especifica ON listado_prueb_especifi.id_list_prueb_especif =
									prueba_especifica.id_list_prueb_especif
								  INNER JOIN historial ON historial.id_hist = prueba_especifica.id_hist WHERE  historial.id_hist='$var_histo' AND listado_prueb_especifi.id_list_prueb_especif='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[nom_list_prueb_especif];
									 $lado=$row[lado_prueb_especif];
									 $lista_linfo1=$row[nom_list_prueb_especif];
									 $estado1=$row[estado_prueb_especif];
									 $comentario1=$row[comentario_prueb_especif];
								}	
								
					echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
					$sql="SELECT
								  listado_prueb_especifi.nom_list_prueb_especif,
								  prueba_especifica.id_list_prueb_especif,
								  prueba_especifica.estado_prueb_especif,
								  prueba_especifica.comentario_prueb_especif,
								  prueba_especifica.lado_prueb_especif,
								  historial.id_hist
								FROM
								  listado_prueb_especifi
								  INNER JOIN prueba_especifica ON listado_prueb_especifi.id_list_prueb_especif =
									prueba_especifica.id_list_prueb_especif
								  INNER JOIN historial ON historial.id_hist = prueba_especifica.id_hist WHERE  historial.id_hist='$var_histo' AND listado_prueb_especifi.id_list_prueb_especif='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[nom_list_prueb_especif];
									 $lado=$row[lado_prueb_especif];
									 $lista_linfo1=$row[nom_list_prueb_especif];
									 $estado1=$row[estado_prueb_especif];
									 $comentario1=$row[comentario_prueb_especif];
								}	
							
								
					echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
					echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/p_especif_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
					
					echo "</table>";
						
				}
			}
			break;	
/****************************************PARES CRANEALES****************************************************************************************/
			case '9':
			if( $busqueda==9)
			{
				if($var_estado_bus==9){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  par_craneal.id_par_craneal,
						  par_craneal.id_list_par_craneal,
						  par_craneal.estado_par_craneal,
						  par_craneal.comentario_par_craneal,
						  par_craneal.lado_par_craneal,
						  listado_par_craneal.id_list_par_craneal AS id_list_par_craneal,
						  listado_par_craneal.nom_list_par_craneal
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN par_craneal ON historial.id_hist = par_craneal.id_hist
						  INNER JOIN listado_par_craneal ON listado_par_craneal.id_list_par_craneal =
							par_craneal.id_list_par_craneal $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_par_craneal];
									 $lista_linfo=$row[nom_list_par_craneal];
									 $estado=$row[estado_par_craneal];
									 $comentario=$row[comentario_par_craneal];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>PALPACION</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th colspan='1' bgcolor='#F5F5F5'><b>PALPACION</b></th>
								<th style='width:15px;'><b>ESTADO</b></td>
								<th style='width:10px; '><b>LADO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
					
						
						$sql="SELECT
								  listado_par_craneal.nom_list_par_craneal,
								  par_craneal.id_list_par_craneal,
								  par_craneal.estado_par_craneal,
								  par_craneal.comentario_par_craneal,
								  par_craneal.lado_par_craneal,
								  historial.id_hist
								FROM
								  listado_par_craneal
								  INNER JOIN par_craneal ON listado_par_craneal.id_list_par_craneal =
									par_craneal.id_list_par_craneal
								  INNER JOIN historial ON historial.id_hist = par_craneal.id_hist WHERE  historial.id_hist='$var_histo' AND listado_par_craneal.id_list_par_craneal='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_par_craneal];
									 $lado=$row[lado_par_craneal];
									 $lista_linfo1=$row[nom_list_par_craneal];
									 $estado1=$row[estado_par_craneal];
									 $comentario1=$row[comentario_par_craneal];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_par_craneal.nom_list_par_craneal,
								  par_craneal.id_list_par_craneal,
								  par_craneal.estado_par_craneal,
								  par_craneal.comentario_par_craneal,
								  par_craneal.lado_par_craneal,
								  historial.id_hist
								FROM
								  listado_par_craneal
								  INNER JOIN par_craneal ON listado_par_craneal.id_list_par_craneal =
									par_craneal.id_list_par_craneal
								  INNER JOIN historial ON historial.id_hist = par_craneal.id_hist WHERE  historial.id_hist='$var_histo' AND listado_par_craneal.id_list_par_craneal='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_par_craneal];
									 $lado=$row[lado_par_craneal];
									 $lista_linfo1=$row[nom_list_par_craneal];
									 $estado1=$row[estado_par_craneal];
									 $comentario1=$row[comentario_par_craneal];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_par_craneal.nom_list_par_craneal,
								  par_craneal.id_list_par_craneal,
								  par_craneal.estado_par_craneal,
								  par_craneal.comentario_par_craneal,
								  par_craneal.lado_par_craneal,
								  historial.id_hist
								FROM
								  listado_par_craneal
								  INNER JOIN par_craneal ON listado_par_craneal.id_list_par_craneal =
									par_craneal.id_list_par_craneal
								  INNER JOIN historial ON historial.id_hist = par_craneal.id_hist WHERE  historial.id_hist='$var_histo' AND listado_par_craneal.id_list_par_craneal='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_par_craneal];
									 $lado=$row[lado_par_craneal];
									 $lista_linfo1=$row[nom_list_par_craneal];
									 $estado1=$row[estado_par_craneal];
									 $comentario1=$row[comentario_par_craneal];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_par_craneal.nom_list_par_craneal,
								  par_craneal.id_list_par_craneal,
								  par_craneal.estado_par_craneal,
								  par_craneal.comentario_par_craneal,
								  par_craneal.lado_par_craneal,
								  historial.id_hist
								FROM
								  listado_par_craneal
								  INNER JOIN par_craneal ON listado_par_craneal.id_list_par_craneal =
									par_craneal.id_list_par_craneal
								  INNER JOIN historial ON historial.id_hist = par_craneal.id_hist WHERE  historial.id_hist='$var_histo' AND listado_par_craneal.id_list_par_craneal='4'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_par_craneal];
									 $lado=$row[lado_par_craneal];
									 $lista_linfo1=$row[nom_list_par_craneal];
									 $estado1=$row[estado_par_craneal];
									 $comentario1=$row[comentario_par_craneal];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_par_craneal.nom_list_par_craneal,
								  par_craneal.id_list_par_craneal,
								  par_craneal.estado_par_craneal,
								  par_craneal.comentario_par_craneal,
								  par_craneal.lado_par_craneal,
								  historial.id_hist
								FROM
								  listado_par_craneal
								  INNER JOIN par_craneal ON listado_par_craneal.id_list_par_craneal =
									par_craneal.id_list_par_craneal
								  INNER JOIN historial ON historial.id_hist = par_craneal.id_hist WHERE  historial.id_hist='$var_histo' AND listado_par_craneal.id_list_par_craneal='5'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_par_craneal];
									 $lado=$row[lado_par_craneal];
									 $lista_linfo1=$row[nom_list_par_craneal];
									 $estado1=$row[estado_par_craneal];
									 $comentario1=$row[comentario_par_craneal];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_par_craneal.nom_list_par_craneal,
								  par_craneal.id_list_par_craneal,
								  par_craneal.estado_par_craneal,
								  par_craneal.comentario_par_craneal,
								  par_craneal.lado_par_craneal,
								  historial.id_hist
								FROM
								  listado_par_craneal
								  INNER JOIN par_craneal ON listado_par_craneal.id_list_par_craneal =
									par_craneal.id_list_par_craneal
								  INNER JOIN historial ON historial.id_hist = par_craneal.id_hist WHERE  historial.id_hist='$var_histo' AND listado_par_craneal.id_list_par_craneal='6'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_par_craneal];
									 $lado=$row[lado_par_craneal];
									 $lista_linfo1=$row[nom_list_par_craneal];
									 $estado1=$row[estado_par_craneal];
									 $comentario1=$row[comentario_par_craneal];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_par_craneal.nom_list_par_craneal,
								  par_craneal.id_list_par_craneal,
								  par_craneal.estado_par_craneal,
								  par_craneal.comentario_par_craneal,
								  par_craneal.lado_par_craneal,
								  historial.id_hist
								FROM
								  listado_par_craneal
								  INNER JOIN par_craneal ON listado_par_craneal.id_list_par_craneal =
									par_craneal.id_list_par_craneal
								  INNER JOIN historial ON historial.id_hist = par_craneal.id_hist WHERE  historial.id_hist='$var_histo' AND listado_par_craneal.id_list_par_craneal='7'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_par_craneal];
									 $lado=$row[lado_par_craneal];
									 $lista_linfo1=$row[nom_list_par_craneal];
									 $estado1=$row[estado_par_craneal];
									 $comentario1=$row[comentario_par_craneal];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_par_craneal.nom_list_par_craneal,
								  par_craneal.id_list_par_craneal,
								  par_craneal.estado_par_craneal,
								  par_craneal.comentario_par_craneal,
								  par_craneal.lado_par_craneal,
								  historial.id_hist
								FROM
								  listado_par_craneal
								  INNER JOIN par_craneal ON listado_par_craneal.id_list_par_craneal =
									par_craneal.id_list_par_craneal
								  INNER JOIN historial ON historial.id_hist = par_craneal.id_hist WHERE  historial.id_hist='$var_histo' AND listado_par_craneal.id_list_par_craneal='8'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_par_craneal];
									 $lado=$row[lado_par_craneal];
									 $lista_linfo1=$row[nom_list_par_craneal];
									 $estado1=$row[estado_par_craneal];
									 $comentario1=$row[comentario_par_craneal];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_par_craneal.nom_list_par_craneal,
								  par_craneal.id_list_par_craneal,
								  par_craneal.estado_par_craneal,
								  par_craneal.comentario_par_craneal,
								  par_craneal.lado_par_craneal,
								  historial.id_hist
								FROM
								  listado_par_craneal
								  INNER JOIN par_craneal ON listado_par_craneal.id_list_par_craneal =
									par_craneal.id_list_par_craneal
								  INNER JOIN historial ON historial.id_hist = par_craneal.id_hist WHERE  historial.id_hist='$var_histo' AND listado_par_craneal.id_list_par_craneal='9'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_par_craneal];
									 $lado=$row[lado_par_craneal];
									 $lista_linfo1=$row[nom_list_par_craneal];
									 $estado1=$row[estado_par_craneal];
									 $comentario1=$row[comentario_par_craneal];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_par_craneal.nom_list_par_craneal,
								  par_craneal.id_list_par_craneal,
								  par_craneal.estado_par_craneal,
								  par_craneal.comentario_par_craneal,
								  par_craneal.lado_par_craneal,
								  historial.id_hist
								FROM
								  listado_par_craneal
								  INNER JOIN par_craneal ON listado_par_craneal.id_list_par_craneal =
									par_craneal.id_list_par_craneal
								  INNER JOIN historial ON historial.id_hist = par_craneal.id_hist WHERE  historial.id_hist='$var_histo' AND listado_par_craneal.id_list_par_craneal='10'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_par_craneal];
									 $lado=$row[lado_par_craneal];
									 $lista_linfo1=$row[nom_list_par_craneal];
									 $estado1=$row[estado_par_craneal];
									 $comentario1=$row[comentario_par_craneal];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
								
						$sql="SELECT
								  listado_par_craneal.nom_list_par_craneal,
								  par_craneal.id_list_par_craneal,
								  par_craneal.estado_par_craneal,
								  par_craneal.comentario_par_craneal,
								  par_craneal.lado_par_craneal,
								  historial.id_hist
								FROM
								  listado_par_craneal
								  INNER JOIN par_craneal ON listado_par_craneal.id_list_par_craneal =
									par_craneal.id_list_par_craneal
								  INNER JOIN historial ON historial.id_hist = par_craneal.id_hist WHERE  historial.id_hist='$var_histo' AND listado_par_craneal.id_list_par_craneal='11'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_par_craneal];
									 $lado=$row[lado_par_craneal];
									 $lista_linfo1=$row[nom_list_par_craneal];
									 $estado1=$row[estado_par_craneal];
									 $comentario1=$row[comentario_par_craneal];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
								
						$sql="SELECT
								  listado_par_craneal.nom_list_par_craneal,
								  par_craneal.id_list_par_craneal,
								  par_craneal.estado_par_craneal,
								  par_craneal.comentario_par_craneal,
								  par_craneal.lado_par_craneal,
								  historial.id_hist
								FROM
								  listado_par_craneal
								  INNER JOIN par_craneal ON listado_par_craneal.id_list_par_craneal =
									par_craneal.id_list_par_craneal
								  INNER JOIN historial ON historial.id_hist = par_craneal.id_hist WHERE  historial.id_hist='$var_histo' AND listado_par_craneal.id_list_par_craneal='12'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_par_craneal];
									 $lado=$row[lado_par_craneal];
									 $lista_linfo1=$row[nom_list_par_craneal];
									 $estado1=$row[estado_par_craneal];
									 $comentario1=$row[comentario_par_craneal];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/par_c_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
							echo "</table>";					
				}
			}
			break;	
	/****************************************REFLEJOS POSTULARES****************************************************************************************/
			case '10':
			if( $busqueda==10)
			{
				if($var_estado_bus==10){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  reflejo_postural.id_reflejo_postural,
						  reflejo_postural.id_list_ref_postural,
						  reflejo_postural.estado_reflejo_postural,
						  reflejo_postural.comentario_reflejo_postural,
						  reflejo_postural.lado_reflejo_postural,
						  listado_reflejo_postural.id_list_ref_postural AS id_list_ref_postural,
						  listado_reflejo_postural.nom_list_ref_postural
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN reflejo_postural ON historial.id_hist = reflejo_postural.id_hist
						  INNER JOIN listado_reflejo_postural ON listado_reflejo_postural.id_list_ref_postural =
							reflejo_postural.id_list_ref_postural $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_ref_postural];
									 $lista_linfo=$row[nom_list_ref_postural];
									 $estado=$row[estado_reflejo_postural];
									 $comentario=$row[comentario_reflejo_postural];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>REFLEJO POSTURAL</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th colspan='1' bgcolor='#F5F5F5'><b>EXAMENES</b></th>
								<th style='width:15px;'><b>ESTADO</b></td>
								<th style='width:10px; '><b>LADO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
					
						
						$sql="SELECT
								  listado_reflejo_postural.nom_list_ref_postural,
								  reflejo_postural.id_list_ref_postural,
								  reflejo_postural.estado_reflejo_postural,
								  reflejo_postural.comentario_reflejo_postural,
								  reflejo_postural.lado_reflejo_postural,
								  historial.id_hist
								FROM
								  listado_reflejo_postural
								  INNER JOIN reflejo_postural ON listado_reflejo_postural.id_list_ref_postural =
									reflejo_postural.id_list_ref_postural
								  INNER JOIN historial ON historial.id_hist = reflejo_postural.id_hist WHERE  historial.id_hist='$var_histo' AND listado_reflejo_postural.id_list_ref_postural='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_ref_postural];
									 $lado=$row[lado_reflejo_postural];
									 $lista_linfo1=$row[nom_list_ref_postural];
									 $estado1=$row[estado_reflejo_postural];
									 $comentario1=$row[comentario_reflejo_postural];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_reflejo_postural.nom_list_ref_postural,
								  reflejo_postural.id_list_ref_postural,
								  reflejo_postural.estado_reflejo_postural,
								  reflejo_postural.comentario_reflejo_postural,
								  reflejo_postural.lado_reflejo_postural,
								  historial.id_hist
								FROM
								  listado_reflejo_postural
								  INNER JOIN reflejo_postural ON listado_reflejo_postural.id_list_ref_postural =
									reflejo_postural.id_list_ref_postural
								  INNER JOIN historial ON historial.id_hist = reflejo_postural.id_hist WHERE  historial.id_hist='$var_histo' AND listado_reflejo_postural.id_list_ref_postural='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_ref_postural];
									 $lado=$row[lado_reflejo_postural];
									 $lista_linfo1=$row[nom_list_ref_postural];
									 $estado1=$row[estado_reflejo_postural];
									 $comentario1=$row[comentario_reflejo_postural];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_reflejo_postural.nom_list_ref_postural,
								  reflejo_postural.id_list_ref_postural,
								  reflejo_postural.estado_reflejo_postural,
								  reflejo_postural.comentario_reflejo_postural,
								  reflejo_postural.lado_reflejo_postural,
								  historial.id_hist
								FROM
								  listado_reflejo_postural
								  INNER JOIN reflejo_postural ON listado_reflejo_postural.id_list_ref_postural =
									reflejo_postural.id_list_ref_postural
								  INNER JOIN historial ON historial.id_hist = reflejo_postural.id_hist WHERE  historial.id_hist='$var_histo' AND listado_reflejo_postural.id_list_ref_postural='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_ref_postural];
									 $lado=$row[lado_reflejo_postural];
									 $lista_linfo1=$row[nom_list_ref_postural];
									 $estado1=$row[estado_reflejo_postural];
									 $comentario1=$row[comentario_reflejo_postural];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_reflejo_postural.nom_list_ref_postural,
								  reflejo_postural.id_list_ref_postural,
								  reflejo_postural.estado_reflejo_postural,
								  reflejo_postural.comentario_reflejo_postural,
								  reflejo_postural.lado_reflejo_postural,
								  historial.id_hist
								FROM
								  listado_reflejo_postural
								  INNER JOIN reflejo_postural ON listado_reflejo_postural.id_list_ref_postural =
									reflejo_postural.id_list_ref_postural
								  INNER JOIN historial ON historial.id_hist = reflejo_postural.id_hist WHERE  historial.id_hist='$var_histo' AND listado_reflejo_postural.id_list_ref_postural='4'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_ref_postural];
									 $lado=$row[lado_reflejo_postural];
									 $lista_linfo1=$row[nom_list_ref_postural];
									 $estado1=$row[estado_reflejo_postural];
									 $comentario1=$row[comentario_reflejo_postural];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_reflejo_postural.nom_list_ref_postural,
								  reflejo_postural.id_list_ref_postural,
								  reflejo_postural.estado_reflejo_postural,
								  reflejo_postural.comentario_reflejo_postural,
								  reflejo_postural.lado_reflejo_postural,
								  historial.id_hist
								FROM
								  listado_reflejo_postural
								  INNER JOIN reflejo_postural ON listado_reflejo_postural.id_list_ref_postural =
									reflejo_postural.id_list_ref_postural
								  INNER JOIN historial ON historial.id_hist = reflejo_postural.id_hist WHERE  historial.id_hist='$var_histo' AND listado_reflejo_postural.id_list_ref_postural='5'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_ref_postural];
									 $lado=$row[lado_reflejo_postural];
									 $lista_linfo1=$row[nom_list_ref_postural];
									 $estado1=$row[estado_reflejo_postural];
									 $comentario1=$row[comentario_reflejo_postural];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_reflejo_postural.nom_list_ref_postural,
								  reflejo_postural.id_list_ref_postural,
								  reflejo_postural.estado_reflejo_postural,
								  reflejo_postural.comentario_reflejo_postural,
								  reflejo_postural.lado_reflejo_postural,
								  historial.id_hist
								FROM
								  listado_reflejo_postural
								  INNER JOIN reflejo_postural ON listado_reflejo_postural.id_list_ref_postural =
									reflejo_postural.id_list_ref_postural
								  INNER JOIN historial ON historial.id_hist = reflejo_postural.id_hist WHERE  historial.id_hist='$var_histo' AND listado_reflejo_postural.id_list_ref_postural='6'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_ref_postural];
									 $lado=$row[lado_reflejo_postural];
									 $lista_linfo1=$row[nom_list_ref_postural];
									 $estado1=$row[estado_reflejo_postural];
									 $comentario1=$row[comentario_reflejo_postural];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
								echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/reflejos_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
							echo "</table>";	
							
				}
			}
			break;	
			/****************************************ESTADO MENTAL****************************************************************************************/
			case '11':
			if( $busqueda==11)
			{
				if($var_estado_bus==11){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  estado_mental.id_reflejo_postural,
						  estado_mental.id_list_estado_mental,
						  estado_mental.estado_estado_mental,
						  estado_mental.comentario_estado_mental,
						  listado_estado_mental.id_list_estado_mental AS id_list_estado_mental,
						  listado_estado_mental.nom_list_estado_mental
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN estado_mental ON historial.id_hist = estado_mental.id_hist
						  INNER JOIN listado_estado_mental ON listado_estado_mental.id_list_estado_mental =
							estado_mental.id_list_estado_mental $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_estado_mental];
									 $lista_linfo=$row[nom_list_estado_mental];
									 $estado=$row[estado_estado_mental];
									 $comentario=$row[comentario_estado_mental];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>ESTADO MENTAL</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th colspan='1' bgcolor='#F5F5F5'><b>ESTADO MENTAL</b></th>
								<th style='width:15px;'><b>ESTADO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
					
						
						$sql="SELECT
								  listado_estado_mental.nom_list_estado_mental,
								  estado_mental.id_list_estado_mental,
								  estado_mental.estado_estado_mental,
								  estado_mental.comentario_estado_mental,
								  historial.id_hist
								FROM
								  listado_estado_mental
								  INNER JOIN estado_mental ON listado_estado_mental.id_list_estado_mental =
									estado_mental.id_list_estado_mental
								  INNER JOIN historial ON historial.id_hist = estado_mental.id_hist WHERE  historial.id_hist='$var_histo' AND listado_estado_mental.id_list_estado_mental='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_estado_mental];
									 $lista_linfo1=$row[nom_list_estado_mental];
									 $estado1=$row[estado_estado_mental];
									 $comentario1=$row[comentario_estado_mental];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_estado_mental.nom_list_estado_mental,
								  estado_mental.id_list_estado_mental,
								  estado_mental.estado_estado_mental,
								  estado_mental.comentario_estado_mental,
								  historial.id_hist
								FROM
								  listado_estado_mental
								  INNER JOIN estado_mental ON listado_estado_mental.id_list_estado_mental =
									estado_mental.id_list_estado_mental
								  INNER JOIN historial ON historial.id_hist = estado_mental.id_hist WHERE  historial.id_hist='$var_histo' AND listado_estado_mental.id_list_estado_mental='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_estado_mental];
									 $lista_linfo1=$row[nom_list_estado_mental];
									 $estado1=$row[estado_estado_mental];
									 $comentario1=$row[comentario_estado_mental];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_estado_mental.nom_list_estado_mental,
								  estado_mental.id_list_estado_mental,
								  estado_mental.estado_estado_mental,
								  estado_mental.comentario_estado_mental,
								  historial.id_hist
								FROM
								  listado_estado_mental
								  INNER JOIN estado_mental ON listado_estado_mental.id_list_estado_mental =
									estado_mental.id_list_estado_mental
								  INNER JOIN historial ON historial.id_hist = estado_mental.id_hist WHERE  historial.id_hist='$var_histo' AND listado_estado_mental.id_list_estado_mental='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_estado_mental];
									 $lista_linfo1=$row[nom_list_estado_mental];
									 $estado1=$row[estado_estado_mental];
									 $comentario1=$row[comentario_estado_mental];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
								echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/estado_m_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
							
						echo "</table>";	
				}
			}
			break;	
			/****************************************REACCION POSTULAR****************************************************************************************/
			case '12':
			if( $busqueda==12)
			{
				if($var_estado_bus==12){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  reaccion_postular.id_reaccion_postural,
						  reaccion_postular.id_list_reaccion_pos,
						  reaccion_postular.estado_reac_pos,
						  reaccion_postular.comentario_reac_pos,
						  listado_reaccion_postular.id_list_reaccion_pos AS id_list_reaccion_pos,
						  listado_reaccion_postular.nom_list_reacc_pos
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN reaccion_postular ON historial.id_hist = reaccion_postular.id_hist
						  INNER JOIN listado_reaccion_postular ON listado_reaccion_postular.id_list_reaccion_pos =
							reaccion_postular.id_list_reaccion_pos $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_reaccion_pos];
									 $lista_linfo=$row[nom_list_reacc_pos];
									 $estado=$row[estado_reac_pos];
									 $comentario=$row[comentario_reac_pos];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>REACCION POSTULAR</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th colspan='1' bgcolor='#F5F5F5'><b>EXAMENES</b></th>
								<th style='width:15px;'><b>ESTADO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
					
						
						$sql="SELECT
								  listado_reaccion_postular.nom_list_reacc_pos,
								  reaccion_postular.id_list_reaccion_pos,
								  reaccion_postular.estado_reac_pos,
								  reaccion_postular.comentario_reac_pos,
								  historial.id_hist
								FROM
								  listado_reaccion_postular
								  INNER JOIN reaccion_postular ON listado_reaccion_postular.id_list_reaccion_pos =
									reaccion_postular.id_list_reaccion_pos
								  INNER JOIN historial ON historial.id_hist = reaccion_postular.id_hist WHERE  historial.id_hist='$var_histo' AND listado_reaccion_postular.id_list_reaccion_pos='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_reaccion_pos];
									 $lista_linfo1=$row[nom_list_reacc_pos];
									 $estado1=$row[estado_reac_pos];
									 $comentario1=$row[comentario_reac_pos];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_reaccion_postular.nom_list_reacc_pos,
								  reaccion_postular.id_list_reaccion_pos,
								  reaccion_postular.estado_reac_pos,
								  reaccion_postular.comentario_reac_pos,
								  historial.id_hist
								FROM
								  listado_reaccion_postular
								  INNER JOIN reaccion_postular ON listado_reaccion_postular.id_list_reaccion_pos =
									reaccion_postular.id_list_reaccion_pos
								  INNER JOIN historial ON historial.id_hist = reaccion_postular.id_hist WHERE  historial.id_hist='$var_histo' AND listado_reaccion_postular.id_list_reaccion_pos='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_reaccion_pos];
									 $lista_linfo1=$row[nom_list_reacc_pos];
									 $estado1=$row[estado_reac_pos];
									 $comentario1=$row[comentario_reac_pos];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/r_p_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
							
							
						echo "</table>";	
				}
			}
			break;	
/****************************************REFLEJO ESPINAL****************************************************************************************/
			case '13':
			if( $busqueda==13)
			{
				if($var_estado_bus==13){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  reflejo_espinal.id_reflejo_espinal,
						  reflejo_espinal.id_list_reflejo_espinal,
						  reflejo_espinal.estado_reflejo_espinal,
						  listado_reflejo_espinal.id_list_reflejo_espinal AS id_list_reflejo_espinal,
						  listado_reflejo_espinal.nom_list_reflejo_espinal
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN reflejo_espinal ON historial.id_hist = reflejo_espinal.id_hist
						  INNER JOIN listado_reflejo_espinal ON listado_reflejo_espinal.id_list_reflejo_espinal =
							reflejo_espinal.id_list_reflejo_espinal $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_reflejo_espinal];
									 $lista_linfo=$row[nom_list_reflejo_espinal];
									 $estado=$row[estado_reflejo_espinal];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>REFLEJO ESPINAL</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th colspan='1' style='width:10px;'><b>EXAMENES</b></th>
								<th><b>ESTADO</b></td>
								
								
							</tr>";
					
						
						$sql="SELECT
								  listado_reflejo_espinal.nom_list_reflejo_espinal,
								  reflejo_espinal.id_list_reflejo_espinal,
								  reflejo_espinal.estado_reflejo_espinal,
								   historial.id_hist
								FROM
								  listado_reflejo_espinal
								  INNER JOIN reflejo_espinal ON listado_reflejo_espinal.id_list_reflejo_espinal =
									reflejo_espinal.id_list_reflejo_espinal
								  INNER JOIN historial ON historial.id_hist = reflejo_espinal.id_hist WHERE  historial.id_hist='$var_histo' AND listado_reflejo_espinal.id_list_reflejo_espinal='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_reflejo_espinal];
									 $lista_linfo1=$row[nom_list_reflejo_espinal];
									 $estado1=$row[estado_reflejo_espinal];
									
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<tr>";
						
						$sql="SELECT
								  listado_reflejo_espinal.nom_list_reflejo_espinal,
								  reflejo_espinal.id_list_reflejo_espinal,
								  reflejo_espinal.estado_reflejo_espinal,
								   historial.id_hist
								FROM
								  listado_reflejo_espinal
								  INNER JOIN reflejo_espinal ON listado_reflejo_espinal.id_list_reflejo_espinal =
									reflejo_espinal.id_list_reflejo_espinal
								  INNER JOIN historial ON historial.id_hist = reflejo_espinal.id_hist WHERE  historial.id_hist='$var_histo' AND listado_reflejo_espinal.id_list_reflejo_espinal='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_reflejo_espinal];
									 $lista_linfo1=$row[nom_list_reflejo_espinal];
									 $estado1=$row[estado_reflejo_espinal];
									
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<tr>";
						
						$sql="SELECT
								  listado_reflejo_espinal.nom_list_reflejo_espinal,
								  reflejo_espinal.id_list_reflejo_espinal,
								  reflejo_espinal.estado_reflejo_espinal,
								   historial.id_hist
								FROM
								  listado_reflejo_espinal
								  INNER JOIN reflejo_espinal ON listado_reflejo_espinal.id_list_reflejo_espinal =
									reflejo_espinal.id_list_reflejo_espinal
								  INNER JOIN historial ON historial.id_hist = reflejo_espinal.id_hist WHERE  historial.id_hist='$var_histo' AND listado_reflejo_espinal.id_list_reflejo_espinal='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_reflejo_espinal];
									 $lista_linfo1=$row[nom_list_reflejo_espinal];
									 $estado1=$row[estado_reflejo_espinal];
									
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<tr>";
						
						$sql="SELECT
								  listado_reflejo_espinal.nom_list_reflejo_espinal,
								  reflejo_espinal.id_list_reflejo_espinal,
								  reflejo_espinal.estado_reflejo_espinal,
								   historial.id_hist
								FROM
								  listado_reflejo_espinal
								  INNER JOIN reflejo_espinal ON listado_reflejo_espinal.id_list_reflejo_espinal =
									reflejo_espinal.id_list_reflejo_espinal
								  INNER JOIN historial ON historial.id_hist = reflejo_espinal.id_hist WHERE  historial.id_hist='$var_histo' AND listado_reflejo_espinal.id_list_reflejo_espinal='4'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_reflejo_espinal];
									 $lista_linfo1=$row[nom_list_reflejo_espinal];
									 $estado1=$row[estado_reflejo_espinal];
									
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<tr>";
						
						$sql="SELECT
								  listado_reflejo_espinal.nom_list_reflejo_espinal,
								  reflejo_espinal.id_list_reflejo_espinal,
								  reflejo_espinal.estado_reflejo_espinal,
								   historial.id_hist
								FROM
								  listado_reflejo_espinal
								  INNER JOIN reflejo_espinal ON listado_reflejo_espinal.id_list_reflejo_espinal =
									reflejo_espinal.id_list_reflejo_espinal
								  INNER JOIN historial ON historial.id_hist = reflejo_espinal.id_hist WHERE  historial.id_hist='$var_histo' AND listado_reflejo_espinal.id_list_reflejo_espinal='5'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_reflejo_espinal];
									 $lista_linfo1=$row[nom_list_reflejo_espinal];
									 $estado1=$row[estado_reflejo_espinal];
									
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<tr>";
						
						$sql="SELECT
								  listado_reflejo_espinal.nom_list_reflejo_espinal,
								  reflejo_espinal.id_list_reflejo_espinal,
								  reflejo_espinal.estado_reflejo_espinal,
								   historial.id_hist
								FROM
								  listado_reflejo_espinal
								  INNER JOIN reflejo_espinal ON listado_reflejo_espinal.id_list_reflejo_espinal =
									reflejo_espinal.id_list_reflejo_espinal
								  INNER JOIN historial ON historial.id_hist = reflejo_espinal.id_hist WHERE  historial.id_hist='$var_histo' AND listado_reflejo_espinal.id_list_reflejo_espinal='6'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_reflejo_espinal];
									 $lista_linfo1=$row[nom_list_reflejo_espinal];
									 $estado1=$row[estado_reflejo_espinal];
									
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<tr>";
								echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/r_e_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
						
						echo "</table>";	
				}
			}
			break;
	/****************************************OTROS SISTEMA NERVIOSO***************************************************************************************/
			case '14':
			if( $busqueda==14)
			{
				if($var_estado_bus==14){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  otro_sist_ner.id_otro,
						  otro_sist_ner.id_list_otro,
						  otro_sist_ner.estado_otro,
						  otro_sist_ner.comentario_otro,
						  listado_otro.id_list_otro AS id_list_otro,
						  listado_otro.nom_list_otro
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN otro_sist_ner ON historial.id_hist = otro_sist_ner.id_hist
						  INNER JOIN listado_otro ON listado_otro.id_list_otro =
							otro_sist_ner.id_list_otro $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_otro];
									 $lista_linfo=$row[nom_list_otro];
									 $estado=$row[estado_otro];
									 $comentario=$row[comentario_otro];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>OTROS EXAMENES SISTEMA NERVIOSO</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th colspan='1' bgcolor='#F5F5F5'><b>EXAMENES</b></th>
								<th style='width:15px;'><b>ESTADO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
					
						
						$sql="SELECT
								  listado_otro.nom_list_otro,
								  otro_sist_ner.id_list_otro,
								  otro_sist_ner.estado_otro,
								  otro_sist_ner.comentario_otro,
								  historial.id_hist
								FROM
								  listado_otro
								  INNER JOIN otro_sist_ner ON listado_otro.id_list_otro =
									otro_sist_ner.id_list_otro
								  INNER JOIN historial ON historial.id_hist = otro_sist_ner.id_hist WHERE  historial.id_hist='$var_histo' AND listado_otro.id_list_otro='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_otro];
									 $lista_linfo1=$row[nom_list_otro];
									 $estado1=$row[estado_otro];
									 $comentario1=$row[comentario_otro];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_otro.nom_list_otro,
								  otro_sist_ner.id_list_otro,
								  otro_sist_ner.estado_otro,
								  otro_sist_ner.comentario_otro,
								  historial.id_hist
								FROM
								  listado_otro
								  INNER JOIN otro_sist_ner ON listado_otro.id_list_otro =
									otro_sist_ner.id_list_otro
								  INNER JOIN historial ON historial.id_hist = otro_sist_ner.id_hist WHERE  historial.id_hist='$var_histo' AND listado_otro.id_list_otro='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_otro];
									 $lista_linfo1=$row[nom_list_otro];
									 $estado1=$row[estado_otro];
									 $comentario1=$row[comentario_otro];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_otro.nom_list_otro,
								  otro_sist_ner.id_list_otro,
								  otro_sist_ner.estado_otro,
								  otro_sist_ner.comentario_otro,
								  historial.id_hist
								FROM
								  listado_otro
								  INNER JOIN otro_sist_ner ON listado_otro.id_list_otro =
									otro_sist_ner.id_list_otro
								  INNER JOIN historial ON historial.id_hist = otro_sist_ner.id_hist WHERE  historial.id_hist='$var_histo' AND listado_otro.id_list_otro='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_otro];
									 $lista_linfo1=$row[nom_list_otro];
									 $estado1=$row[estado_otro];
									 $comentario1=$row[comentario_otro];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_otro.nom_list_otro,
								  otro_sist_ner.id_list_otro,
								  otro_sist_ner.estado_otro,
								  otro_sist_ner.comentario_otro,
								  historial.id_hist
								FROM
								  listado_otro
								  INNER JOIN otro_sist_ner ON listado_otro.id_list_otro =
									otro_sist_ner.id_list_otro
								  INNER JOIN historial ON historial.id_hist = otro_sist_ner.id_hist WHERE  historial.id_hist='$var_histo' AND listado_otro.id_list_otro='4'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_otro];
									 $lista_linfo1=$row[nom_list_otro];
									 $estado1=$row[estado_otro];
									 $comentario1=$row[comentario_otro];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_otro.nom_list_otro,
								  otro_sist_ner.id_list_otro,
								  otro_sist_ner.estado_otro,
								  otro_sist_ner.comentario_otro,
								  historial.id_hist
								FROM
								  listado_otro
								  INNER JOIN otro_sist_ner ON listado_otro.id_list_otro =
									otro_sist_ner.id_list_otro
								  INNER JOIN historial ON historial.id_hist = otro_sist_ner.id_hist WHERE  historial.id_hist='$var_histo' AND listado_otro.id_list_otro='5'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_otro];
									 $lista_linfo1=$row[nom_list_otro];
									 $estado1=$row[estado_otro];
									 $comentario1=$row[comentario_otro];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_otro.nom_list_otro,
								  otro_sist_ner.id_list_otro,
								  otro_sist_ner.estado_otro,
								  otro_sist_ner.comentario_otro,
								  historial.id_hist
								FROM
								  listado_otro
								  INNER JOIN otro_sist_ner ON listado_otro.id_list_otro =
									otro_sist_ner.id_list_otro
								  INNER JOIN historial ON historial.id_hist = otro_sist_ner.id_hist WHERE  historial.id_hist='$var_histo' AND listado_otro.id_list_otro='6'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_otro];
									 $lista_linfo1=$row[nom_list_otro];
									 $estado1=$row[estado_otro];
									 $comentario1=$row[comentario_otro];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_otro.nom_list_otro,
								  otro_sist_ner.id_list_otro,
								  otro_sist_ner.estado_otro,
								  otro_sist_ner.comentario_otro,
								  historial.id_hist
								FROM
								  listado_otro
								  INNER JOIN otro_sist_ner ON listado_otro.id_list_otro =
									otro_sist_ner.id_list_otro
								  INNER JOIN historial ON historial.id_hist = otro_sist_ner.id_hist WHERE  historial.id_hist='$var_histo' AND listado_otro.id_list_otro='7'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_otro];
									 $lista_linfo1=$row[nom_list_otro];
									 $estado1=$row[estado_otro];
									 $comentario1=$row[comentario_otro];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_otro.nom_list_otro,
								  otro_sist_ner.id_list_otro,
								  otro_sist_ner.estado_otro,
								  otro_sist_ner.comentario_otro,
								  historial.id_hist
								FROM
								  listado_otro
								  INNER JOIN otro_sist_ner ON listado_otro.id_list_otro =
									otro_sist_ner.id_list_otro
								  INNER JOIN historial ON historial.id_hist = otro_sist_ner.id_hist WHERE  historial.id_hist='$var_histo' AND listado_otro.id_list_otro='8'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_otro];
									 $lista_linfo1=$row[nom_list_otro];
									 $estado1=$row[estado_otro];
									 $comentario1=$row[comentario_otro];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/o_s_n_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
							
						echo "</table>";	
				}
			}
			break;
/****************************************SISTEMA GENITAL***************************************************************************************/
			case '15':
			if( $busqueda==15)
			{
				if($var_estado_bus==15){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  animal.genero,
						  historial.id_pac,
						  historial.id_hist,
						  sistema_genital.id_sistema_genital,
						  sistema_genital.id_list_sistema_genital_hembra,
						  sistema_genital.id_list_sistema_genital_macho,
						  sistema_genital.estado_sistema_genital,
						  sistema_genital.comentario_sistema_genital,
						  listado_sistema_genital_hembra.id_list_sistema_genital_hembra AS id_list_sistema_genital_hembra,
						  listado_sistema_genital_macho.id_list_sistema_genital_macho AS id_list_sistema_genital_macho,
						  listado_sistema_genital_hembra.nom_list_sistema_genital_hembra,
						  listado_sistema_genital_macho.nom_list_sistema_genital_macho
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN sistema_genital ON historial.id_hist = sistema_genital.id_hist
						  INNER JOIN listado_sistema_genital_hembra ON listado_sistema_genital_hembra.id_list_sistema_genital_hembra
						  INNER JOIN listado_sistema_genital_macho ON listado_sistema_genital_macho.id_list_sistema_genital_macho =
							sistema_genital.id_list_sistema_genital_macho $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_gen=$row[genero];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_sistema_genital_hembra];
									 $id_lista2=$row[id_list_sistema_genital_macho];
									 $lista_linfo=$row[nom_list_sistema_genital_macho];
									 $lista_linfo2=$row[nom_list_sistema_genital_hembra];
									 $estado=$row[estado_sistema_genital];
									 $comentario=$row[comentario_sistema_genital];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>SISTEMA GENITAL</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th colspan='1' bgcolor='#F5F5F5'><b>EXAMENES</b></th>
								<th style='width:15px;'><b>ESTADO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
					if ($var_gen=='M'){
						
						$sql="SELECT
								  listado_sistema_genital_macho.nom_list_sistema_genital_macho,
								  sistema_genital.id_list_sistema_genital_macho,
								  sistema_genital.estado_sistema_genital,
								  sistema_genital.comentario_sistema_genital,
								  historial.id_hist
								FROM
								  listado_sistema_genital_macho
								  INNER JOIN sistema_genital ON listado_sistema_genital_macho.id_list_sistema_genital_macho =
									sistema_genital.id_list_sistema_genital_macho
								  INNER JOIN historial ON historial.id_hist = sistema_genital.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_genital_macho.id_list_sistema_genital_macho='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sistema_genital_macho];
									 $lista_linfo1=$row[nom_list_sistema_genital_macho];
									 $estado1=$row[estado_sistema_genital];
									 $comentario1=$row[comentario_sistema_genital];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_sistema_genital_macho.nom_list_sistema_genital_macho,
								  sistema_genital.id_list_sistema_genital_macho,
								  sistema_genital.estado_sistema_genital,
								  sistema_genital.comentario_sistema_genital,
								  historial.id_hist
								FROM
								  listado_sistema_genital_macho
								  INNER JOIN sistema_genital ON listado_sistema_genital_macho.id_list_sistema_genital_macho =
									sistema_genital.id_list_sistema_genital_macho
								  INNER JOIN historial ON historial.id_hist = sistema_genital.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_genital_macho.id_list_sistema_genital_macho='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sistema_genital_macho];
									 $lista_linfo1=$row[nom_list_sistema_genital_macho];
									 $estado1=$row[estado_sistema_genital];
									 $comentario1=$row[comentario_sistema_genital];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_sistema_genital_macho.nom_list_sistema_genital_macho,
								  sistema_genital.id_list_sistema_genital_macho,
								  sistema_genital.estado_sistema_genital,
								  sistema_genital.comentario_sistema_genital,
								  historial.id_hist
								FROM
								  listado_sistema_genital_macho
								  INNER JOIN sistema_genital ON listado_sistema_genital_macho.id_list_sistema_genital_macho =
									sistema_genital.id_list_sistema_genital_macho
								  INNER JOIN historial ON historial.id_hist = sistema_genital.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_genital_macho.id_list_sistema_genital_macho='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sistema_genital_macho];
									 $lista_linfo1=$row[nom_list_sistema_genital_macho];
									 $estado1=$row[estado_sistema_genital];
									 $comentario1=$row[comentario_sistema_genital];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_sistema_genital_macho.nom_list_sistema_genital_macho,
								  sistema_genital.id_list_sistema_genital_macho,
								  sistema_genital.estado_sistema_genital,
								  sistema_genital.comentario_sistema_genital,
								  historial.id_hist
								FROM
								  listado_sistema_genital_macho
								  INNER JOIN sistema_genital ON listado_sistema_genital_macho.id_list_sistema_genital_macho =
									sistema_genital.id_list_sistema_genital_macho
								  INNER JOIN historial ON historial.id_hist = sistema_genital.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_genital_macho.id_list_sistema_genital_macho='4'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sistema_genital_macho];
									 $lista_linfo1=$row[nom_list_sistema_genital_macho];
									 $estado1=$row[estado_sistema_genital];
									 $comentario1=$row[comentario_sistema_genital];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_sistema_genital_macho.nom_list_sistema_genital_macho,
								  sistema_genital.id_list_sistema_genital_macho,
								  sistema_genital.estado_sistema_genital,
								  sistema_genital.comentario_sistema_genital,
								  historial.id_hist
								FROM
								  listado_sistema_genital_macho
								  INNER JOIN sistema_genital ON listado_sistema_genital_macho.id_list_sistema_genital_macho =
									sistema_genital.id_list_sistema_genital_macho
								  INNER JOIN historial ON historial.id_hist = sistema_genital.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_genital_macho.id_list_sistema_genital_macho='5'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sistema_genital_macho];
									 $lista_linfo1=$row[nom_list_sistema_genital_macho];
									 $estado1=$row[estado_sistema_genital];
									 $comentario1=$row[comentario_sistema_genital];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
							
						}
						else{
							$sql="SELECT
									  listado_sistema_genital_hembra.nom_list_sistema_genital_hembra,
									  sistema_genital.id_list_sistema_genital_hembra,
									  sistema_genital.estado_sistema_genital,
									  sistema_genital.comentario_sistema_genital,
									  historial.id_hist
									FROM
									  listado_sistema_genital_hembra
									  INNER JOIN sistema_genital ON listado_sistema_genital_hembra.id_list_sistema_genital_hembra =
										sistema_genital.id_list_sistema_genital_hembra
									  INNER JOIN historial ON historial.id_hist = sistema_genital.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_genital_hembra.id_list_sistema_genital_hembra='1'";							
							
							$res=mysql_query($sql);
							while($row=mysql_fetch_array($res))
									{
										 $id_lista=$row[id_list_sistema_genital_hembra];
										 $lista_linfo1=$row[nom_list_sistema_genital_hembra];
										 $estado1=$row[estado_sistema_genital];
										 $comentario1=$row[comentario_sistema_genital];
									}
							echo"<tr>	 
									<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
									<td bgcolor='#F5F5F5'>$estado1</td>
									<td bgcolor='#F5F5F5'>$comentario1</td>
								</tr>";
							$sql="SELECT
									  listado_sistema_genital_hembra.nom_list_sistema_genital_hembra,
									  sistema_genital.id_list_sistema_genital_hembra,
									  sistema_genital.estado_sistema_genital,
									  sistema_genital.comentario_sistema_genital,
									  historial.id_hist
									FROM
									  listado_sistema_genital_hembra
									  INNER JOIN sistema_genital ON listado_sistema_genital_hembra.id_list_sistema_genital_hembra =
										sistema_genital.id_list_sistema_genital_hembra
									  INNER JOIN historial ON historial.id_hist = sistema_genital.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_genital_hembra.id_list_sistema_genital_hembra='2'";							
							
							$res=mysql_query($sql);
							while($row=mysql_fetch_array($res))
									{
										 $id_lista=$row[id_list_sistema_genital_hembra];
										 $lista_linfo1=$row[nom_list_sistema_genital_hembra];
										 $estado1=$row[estado_sistema_genital];
										 $comentario1=$row[comentario_sistema_genital];
									}
							echo"<tr>	 
									<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
									<td bgcolor='#F5F5F5'>$estado1</td>
									<td bgcolor='#F5F5F5'>$comentario1</td>
								</tr>";
							$sql="SELECT
									  listado_sistema_genital_hembra.nom_list_sistema_genital_hembra,
									  sistema_genital.id_list_sistema_genital_hembra,
									  sistema_genital.estado_sistema_genital,
									  sistema_genital.comentario_sistema_genital,
									  historial.id_hist
									FROM
									  listado_sistema_genital_hembra
									  INNER JOIN sistema_genital ON listado_sistema_genital_hembra.id_list_sistema_genital_hembra =
										sistema_genital.id_list_sistema_genital_hembra
									  INNER JOIN historial ON historial.id_hist = sistema_genital.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_genital_hembra.id_list_sistema_genital_hembra='3'";							
							
							$res=mysql_query($sql);
							while($row=mysql_fetch_array($res))
									{
										 $id_lista=$row[id_list_sistema_genital_hembra];
										 $lista_linfo1=$row[nom_list_sistema_genital_hembra];
										 $estado1=$row[estado_sistema_genital];
										 $comentario1=$row[comentario_sistema_genital];
									}
							echo"<tr>	 
									<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
									<td bgcolor='#F5F5F5'>$estado1</td>
									<td bgcolor='#F5F5F5'>$comentario1</td>
								</tr>";
							$sql="SELECT
									  listado_sistema_genital_hembra.nom_list_sistema_genital_hembra,
									  sistema_genital.id_list_sistema_genital_hembra,
									  sistema_genital.estado_sistema_genital,
									  sistema_genital.comentario_sistema_genital,
									  historial.id_hist
									FROM
									  listado_sistema_genital_hembra
									  INNER JOIN sistema_genital ON listado_sistema_genital_hembra.id_list_sistema_genital_hembra =
										sistema_genital.id_list_sistema_genital_hembra
									  INNER JOIN historial ON historial.id_hist = sistema_genital.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_genital_hembra.id_list_sistema_genital_hembra='4'";							
							
							$res=mysql_query($sql);
							while($row=mysql_fetch_array($res))
									{
										 $id_lista=$row[id_list_sistema_genital_hembra];
										 $lista_linfo1=$row[nom_list_sistema_genital_hembra];
										 $estado1=$row[estado_sistema_genital];
										 $comentario1=$row[comentario_sistema_genital];
									}
							echo"<tr>	 
									<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
									<td bgcolor='#F5F5F5'>$estado1</td>
									<td bgcolor='#F5F5F5'>$comentario1</td>
								</tr>";
								
						}
							
							echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/s_g_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
						echo "</table>";	
				}
			}
			break;				
/****************************************SISTEMA URINARIO***************************************************************************************/
			case '16':
			if( $busqueda==16)
			{
				if($var_estado_bus==16){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  sistema_urinario.id_sistema_urinario,
						  sistema_urinario.id_list_sistema_urinario,
						  sistema_urinario.estado_sistema_urinario,
						  sistema_urinario.comentario_sistema_urinario,
						  listado_sistema_urinario.id_list_sistema_urinario AS id_list_sistema_urinario,
						  listado_sistema_urinario.nom_list_sistema_urinario
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN sistema_urinario ON historial.id_hist = sistema_urinario.id_hist
						  INNER JOIN listado_sistema_urinario ON listado_sistema_urinario.id_list_sistema_urinario =
							sistema_urinario.id_list_sistema_urinario $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_sistema_urinario];
									 $lista_linfo=$row[nom_list_sistema_urinario];
									 $estado=$row[estado_sistema_urinario];
									 $comentario=$row[comentario_sistema_urinario];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>SISTEMA URINARIO</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th colspan='1' bgcolor='#F5F5F5'><b>EXAMEN</b></th>
								<th style='width:15px;'><b>ESTADO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
					
						
						$sql="SELECT
								  listado_sistema_urinario.nom_list_sistema_urinario,
								  sistema_urinario.id_list_sistema_urinario,
								  sistema_urinario.estado_sistema_urinario,
								  sistema_urinario.comentario_sistema_urinario,
								  historial.id_hist
								FROM
								  listado_sistema_urinario
								  INNER JOIN sistema_urinario ON listado_sistema_urinario.id_list_sistema_urinario =
									sistema_urinario.id_list_sistema_urinario
								  INNER JOIN historial ON historial.id_hist = sistema_urinario.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_urinario.id_list_sistema_urinario='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sistema_urinario];
									 $lista_linfo1=$row[nom_list_sistema_urinario];
									 $estado1=$row[estado_sistema_urinario];
									 $comentario1=$row[comentario_sistema_urinario];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
					
						$sql="SELECT
								  listado_sistema_urinario.nom_list_sistema_urinario,
								  sistema_urinario.id_list_sistema_urinario,
								  sistema_urinario.estado_sistema_urinario,
								  sistema_urinario.comentario_sistema_urinario,
								  historial.id_hist
								FROM
								  listado_sistema_urinario
								  INNER JOIN sistema_urinario ON listado_sistema_urinario.id_list_sistema_urinario =
									sistema_urinario.id_list_sistema_urinario
								  INNER JOIN historial ON historial.id_hist = sistema_urinario.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_urinario.id_list_sistema_urinario='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sistema_urinario];
									 $lista_linfo1=$row[nom_list_sistema_urinario];
									 $estado1=$row[estado_sistema_urinario];
									 $comentario1=$row[comentario_sistema_urinario];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							
						$sql="SELECT
								  listado_sistema_urinario.nom_list_sistema_urinario,
								  sistema_urinario.id_list_sistema_urinario,
								  sistema_urinario.estado_sistema_urinario,
								  sistema_urinario.comentario_sistema_urinario,
								  historial.id_hist
								FROM
								  listado_sistema_urinario
								  INNER JOIN sistema_urinario ON listado_sistema_urinario.id_list_sistema_urinario =
									sistema_urinario.id_list_sistema_urinario
								  INNER JOIN historial ON historial.id_hist = sistema_urinario.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_urinario.id_list_sistema_urinario='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sistema_urinario];
									 $lista_linfo1=$row[nom_list_sistema_urinario];
									 $estado1=$row[estado_sistema_urinario];
									 $comentario1=$row[comentario_sistema_urinario];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
					
					echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/s_u_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
					echo"</table>";
				}	
			}
			break;
/****************************************VIAS AEREAS***************************************************************************************/
			case '17':
			if( $busqueda==17)
			{
				if($var_estado_bus==17){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  via_aerea.id_via_aerea,
						  via_aerea.id_list_via_aerea,
						  via_aerea.estado_via_aerea,
						  via_aerea.comentario_via_aerea,
						  listado_via_aerea.id_list_via_aerea AS id_list_via_aerea,
						  listado_via_aerea.nom_list_via_aerea
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN via_aerea ON historial.id_hist = via_aerea.id_hist
						  INNER JOIN listado_via_aerea ON listado_via_aerea.id_list_via_aerea =
							via_aerea.id_list_via_aerea $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_via_aerea];
									 $lista_linfo=$row[nom_list_via_aerea];
									 $estado=$row[estado_via_aerea];
									 $comentario=$row[comentario_via_aerea];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>SISTEMA URINARIO</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th style='width:15px;' colspan='1' bgcolor='#F5F5F5'><b>EXAMEN</b></th>
								<th style='width:15px;'><b>ESTADO</b></td>
								<th style='width:15px;'><b>LADO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
					
						
						$sql="SELECT
								  listado_via_aerea.nom_list_via_aerea,
								  via_aerea.id_list_via_aerea,
								  via_aerea.lado_via_aerea,
								  via_aerea.estado_via_aerea,
								  via_aerea.comentario_via_aerea,
								  historial.id_hist
								FROM
								  listado_via_aerea
								  INNER JOIN via_aerea ON listado_via_aerea.id_list_via_aerea =
									via_aerea.id_list_via_aerea
								  INNER JOIN historial ON historial.id_hist = via_aerea.id_hist WHERE  historial.id_hist='$var_histo' AND listado_via_aerea.id_list_via_aerea='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_via_aerea];
									 $lista_linfo1=$row[nom_list_via_aerea];
									 $estado1=$row[estado_via_aerea];
									 $lado=$row[lado_via_aerea];
									 $comentario1=$row[comentario_via_aerea];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
					
						$sql="SELECT
								  listado_via_aerea.nom_list_via_aerea,
								  via_aerea.id_list_via_aerea,
								  via_aerea.lado_via_aerea,
								  via_aerea.estado_via_aerea,
								  via_aerea.comentario_via_aerea,
								  historial.id_hist
								FROM
								  listado_via_aerea
								  INNER JOIN via_aerea ON listado_via_aerea.id_list_via_aerea =
									via_aerea.id_list_via_aerea
								  INNER JOIN historial ON historial.id_hist = via_aerea.id_hist WHERE  historial.id_hist='$var_histo' AND listado_via_aerea.id_list_via_aerea='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_via_aerea];
									 $lista_linfo1=$row[nom_list_via_aerea];
									 $estado1=$row[estado_via_aerea];
									 $lado=$row[lado_via_aerea];
									 $comentario1=$row[comentario_via_aerea];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
					
						$sql="SELECT
								  listado_via_aerea.nom_list_via_aerea,
								  via_aerea.id_list_via_aerea,
								  via_aerea.lado_via_aerea,
								  via_aerea.estado_via_aerea,
								  via_aerea.comentario_via_aerea,
								  historial.id_hist
								FROM
								  listado_via_aerea
								  INNER JOIN via_aerea ON listado_via_aerea.id_list_via_aerea =
									via_aerea.id_list_via_aerea
								  INNER JOIN historial ON historial.id_hist = via_aerea.id_hist WHERE  historial.id_hist='$var_histo' AND listado_via_aerea.id_list_via_aerea='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_via_aerea];
									 $lista_linfo1=$row[nom_list_via_aerea];
									 $estado1=$row[estado_via_aerea];
									 $lado=$row[lado_via_aerea];
									 $comentario1=$row[comentario_via_aerea];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
					
						$sql="SELECT
								  listado_via_aerea.nom_list_via_aerea,
								  via_aerea.id_list_via_aerea,
								  via_aerea.lado_via_aerea,
								  via_aerea.estado_via_aerea,
								  via_aerea.comentario_via_aerea,
								  historial.id_hist
								FROM
								  listado_via_aerea
								  INNER JOIN via_aerea ON listado_via_aerea.id_list_via_aerea =
									via_aerea.id_list_via_aerea
								  INNER JOIN historial ON historial.id_hist = via_aerea.id_hist WHERE  historial.id_hist='$var_histo' AND listado_via_aerea.id_list_via_aerea='4'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_via_aerea];
									 $lista_linfo1=$row[nom_list_via_aerea];
									 $estado1=$row[estado_via_aerea];
									 $lado=$row[lado_via_aerea];
									 $comentario1=$row[comentario_via_aerea];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
					
						$sql="SELECT
								  listado_via_aerea.nom_list_via_aerea,
								  via_aerea.id_list_via_aerea,
								  via_aerea.lado_via_aerea,
								  via_aerea.estado_via_aerea,
								  via_aerea.comentario_via_aerea,
								  historial.id_hist
								FROM
								  listado_via_aerea
								  INNER JOIN via_aerea ON listado_via_aerea.id_list_via_aerea =
									via_aerea.id_list_via_aerea
								  INNER JOIN historial ON historial.id_hist = via_aerea.id_hist WHERE  historial.id_hist='$var_histo' AND listado_via_aerea.id_list_via_aerea='5'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_via_aerea];
									 $lista_linfo1=$row[nom_list_via_aerea];
									 $estado1=$row[estado_via_aerea];
									 $lado=$row[lado_via_aerea];
									 $comentario1=$row[comentario_via_aerea];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/v_a_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
					
					echo"</table>";
				
				}	
			}
			break;
/****************************************SONIDOS RESPIRATORIOS***************************************************************************************/
			case '18':
			if( $busqueda==18)
			{
				if($var_estado_bus==18){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  sonido_respiratorio.id_via_respiratoria,
						  sonido_respiratorio.id_list_sonido_respiratorio,
						  sonido_respiratorio.estado_sonido_respiratorio,
						  sonido_respiratorio.comentario_sonido_respiratorio,
						  listado_sonido_respiratorio.id_list_sonido_respiratorio AS id_list_sonido_respiratorio,
						  listado_sonido_respiratorio.nom_list_sonido_respiratorio
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN sonido_respiratorio ON historial.id_hist = sonido_respiratorio.id_hist
						  INNER JOIN listado_sonido_respiratorio ON listado_sonido_respiratorio.id_list_sonido_respiratorio =
							sonido_respiratorio.id_list_sonido_respiratorio $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_sonido_respiratorio];
									 $lista_linfo=$row[nom_list_sonido_respiratorio];
									 $estado=$row[estado_sonido_respiratorio];
									 $comentario=$row[comentario_sonido_respiratorio];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>SONIDOS RESPIRATORIOS</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th style='width:15px;' colspan='1' bgcolor='#F5F5F5'><b>EXAMENES</b></th>
								<th style='width:15px;'><b>SI/NO</b></td>
								<th style='width:15px;'><b>LADO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
					
						
						$sql="SELECT
								  listado_sonido_respiratorio.nom_list_sonido_respiratorio,
								  sonido_respiratorio.id_list_sonido_respiratorio,
								  sonido_respiratorio.lado_sonido_respiratorio,
								  sonido_respiratorio.estado_sonido_respiratorio,
								  sonido_respiratorio.comentario_sonido_respiratorio,
								  historial.id_hist
								FROM
								  listado_sonido_respiratorio
								  INNER JOIN sonido_respiratorio ON listado_sonido_respiratorio.id_list_sonido_respiratorio =
									sonido_respiratorio.id_list_sonido_respiratorio
								  INNER JOIN historial ON historial.id_hist = sonido_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sonido_respiratorio.id_list_sonido_respiratorio='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sonido_respiratorio];
									 $lista_linfo1=$row[nom_list_sonido_respiratorio];
									 $estado1=$row[estado_sonido_respiratorio];
									 $lado=$row[lado_sonido_respiratorio];
									 $comentario1=$row[comentario_sonido_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
					
					
						$sql="SELECT
								  listado_sonido_respiratorio.nom_list_sonido_respiratorio,
								  sonido_respiratorio.id_list_sonido_respiratorio,
								  sonido_respiratorio.lado_sonido_respiratorio,
								  sonido_respiratorio.estado_sonido_respiratorio,
								  sonido_respiratorio.comentario_sonido_respiratorio,
								  historial.id_hist
								FROM
								  listado_sonido_respiratorio
								  INNER JOIN sonido_respiratorio ON listado_sonido_respiratorio.id_list_sonido_respiratorio =
									sonido_respiratorio.id_list_sonido_respiratorio
								  INNER JOIN historial ON historial.id_hist = sonido_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sonido_respiratorio.id_list_sonido_respiratorio='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sonido_respiratorio];
									 $lista_linfo1=$row[nom_list_sonido_respiratorio];
									 $estado1=$row[estado_sonido_respiratorio];
									 $lado=$row[lado_sonido_respiratorio];
									 $comentario1=$row[comentario_sonido_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
					
					
						$sql="SELECT
								  listado_sonido_respiratorio.nom_list_sonido_respiratorio,
								  sonido_respiratorio.id_list_sonido_respiratorio,
								  sonido_respiratorio.lado_sonido_respiratorio,
								  sonido_respiratorio.estado_sonido_respiratorio,
								  sonido_respiratorio.comentario_sonido_respiratorio,
								  historial.id_hist
								FROM
								  listado_sonido_respiratorio
								  INNER JOIN sonido_respiratorio ON listado_sonido_respiratorio.id_list_sonido_respiratorio =
									sonido_respiratorio.id_list_sonido_respiratorio
								  INNER JOIN historial ON historial.id_hist = sonido_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sonido_respiratorio.id_list_sonido_respiratorio='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sonido_respiratorio];
									 $lista_linfo1=$row[nom_list_sonido_respiratorio];
									 $estado1=$row[estado_sonido_respiratorio];
									 $lado=$row[lado_sonido_respiratorio];
									 $comentario1=$row[comentario_sonido_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
					
					
						$sql="SELECT
								  listado_sonido_respiratorio.nom_list_sonido_respiratorio,
								  sonido_respiratorio.id_list_sonido_respiratorio,
								  sonido_respiratorio.lado_sonido_respiratorio,
								  sonido_respiratorio.estado_sonido_respiratorio,
								  sonido_respiratorio.comentario_sonido_respiratorio,
								  historial.id_hist
								FROM
								  listado_sonido_respiratorio
								  INNER JOIN sonido_respiratorio ON listado_sonido_respiratorio.id_list_sonido_respiratorio =
									sonido_respiratorio.id_list_sonido_respiratorio
								  INNER JOIN historial ON historial.id_hist = sonido_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sonido_respiratorio.id_list_sonido_respiratorio='4'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sonido_respiratorio];
									 $lista_linfo1=$row[nom_list_sonido_respiratorio];
									 $estado1=$row[estado_sonido_respiratorio];
									 $lado=$row[lado_sonido_respiratorio];
									 $comentario1=$row[comentario_sonido_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
					
					
						$sql="SELECT
								  listado_sonido_respiratorio.nom_list_sonido_respiratorio,
								  sonido_respiratorio.id_list_sonido_respiratorio,
								  sonido_respiratorio.lado_sonido_respiratorio,
								  sonido_respiratorio.estado_sonido_respiratorio,
								  sonido_respiratorio.comentario_sonido_respiratorio,
								  historial.id_hist
								FROM
								  listado_sonido_respiratorio
								  INNER JOIN sonido_respiratorio ON listado_sonido_respiratorio.id_list_sonido_respiratorio =
									sonido_respiratorio.id_list_sonido_respiratorio
								  INNER JOIN historial ON historial.id_hist = sonido_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sonido_respiratorio.id_list_sonido_respiratorio='5'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sonido_respiratorio];
									 $lista_linfo1=$row[nom_list_sonido_respiratorio];
									 $estado1=$row[estado_sonido_respiratorio];
									 $lado=$row[lado_sonido_respiratorio];
									 $comentario1=$row[comentario_sonido_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
					
					
						$sql="SELECT
								  listado_sonido_respiratorio.nom_list_sonido_respiratorio,
								  sonido_respiratorio.id_list_sonido_respiratorio,
								  sonido_respiratorio.lado_sonido_respiratorio,
								  sonido_respiratorio.estado_sonido_respiratorio,
								  sonido_respiratorio.comentario_sonido_respiratorio,
								  historial.id_hist
								FROM
								  listado_sonido_respiratorio
								  INNER JOIN sonido_respiratorio ON listado_sonido_respiratorio.id_list_sonido_respiratorio =
									sonido_respiratorio.id_list_sonido_respiratorio
								  INNER JOIN historial ON historial.id_hist = sonido_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sonido_respiratorio.id_list_sonido_respiratorio='6'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sonido_respiratorio];
									 $lista_linfo1=$row[nom_list_sonido_respiratorio];
									 $estado1=$row[estado_sonido_respiratorio];
									 $lado=$row[lado_sonido_respiratorio];
									 $comentario1=$row[comentario_sonido_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
					
					
						$sql="SELECT
								  listado_sonido_respiratorio.nom_list_sonido_respiratorio,
								  sonido_respiratorio.id_list_sonido_respiratorio,
								  sonido_respiratorio.lado_sonido_respiratorio,
								  sonido_respiratorio.estado_sonido_respiratorio,
								  sonido_respiratorio.comentario_sonido_respiratorio,
								  historial.id_hist
								FROM
								  listado_sonido_respiratorio
								  INNER JOIN sonido_respiratorio ON listado_sonido_respiratorio.id_list_sonido_respiratorio =
									sonido_respiratorio.id_list_sonido_respiratorio
								  INNER JOIN historial ON historial.id_hist = sonido_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sonido_respiratorio.id_list_sonido_respiratorio='7'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sonido_respiratorio];
									 $lista_linfo1=$row[nom_list_sonido_respiratorio];
									 $estado1=$row[estado_sonido_respiratorio];
									 $lado=$row[lado_sonido_respiratorio];
									 $comentario1=$row[comentario_sonido_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
					
					
						$sql="SELECT
								  listado_sonido_respiratorio.nom_list_sonido_respiratorio,
								  sonido_respiratorio.id_list_sonido_respiratorio,
								  sonido_respiratorio.lado_sonido_respiratorio,
								  sonido_respiratorio.estado_sonido_respiratorio,
								  sonido_respiratorio.comentario_sonido_respiratorio,
								  historial.id_hist
								FROM
								  listado_sonido_respiratorio
								  INNER JOIN sonido_respiratorio ON listado_sonido_respiratorio.id_list_sonido_respiratorio =
									sonido_respiratorio.id_list_sonido_respiratorio
								  INNER JOIN historial ON historial.id_hist = sonido_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sonido_respiratorio.id_list_sonido_respiratorio='8'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sonido_respiratorio];
									 $lista_linfo1=$row[nom_list_sonido_respiratorio];
									 $estado1=$row[estado_sonido_respiratorio];
									 $lado=$row[lado_sonido_respiratorio];
									 $comentario1=$row[comentario_sonido_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
					
					
						$sql="SELECT
								  listado_sonido_respiratorio.nom_list_sonido_respiratorio,
								  sonido_respiratorio.id_list_sonido_respiratorio,
								  sonido_respiratorio.lado_sonido_respiratorio,
								  sonido_respiratorio.estado_sonido_respiratorio,
								  sonido_respiratorio.comentario_sonido_respiratorio,
								  historial.id_hist
								FROM
								  listado_sonido_respiratorio
								  INNER JOIN sonido_respiratorio ON listado_sonido_respiratorio.id_list_sonido_respiratorio =
									sonido_respiratorio.id_list_sonido_respiratorio
								  INNER JOIN historial ON historial.id_hist = sonido_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sonido_respiratorio.id_list_sonido_respiratorio='9'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sonido_respiratorio];
									 $lista_linfo1=$row[nom_list_sonido_respiratorio];
									 $estado1=$row[estado_sonido_respiratorio];
									 $lado=$row[lado_sonido_respiratorio];
									 $comentario1=$row[comentario_sonido_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$lado</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
					
					echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/soni_r_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
					
					echo"</table>";
				}	
			}
			break;
/****************************************PATRONES RESPIRATORIOS***************************************************************************************/
			case '19':
			if( $busqueda==19)
			{
				if($var_estado_bus==19){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  patron_respiratorio.id_patron_respiratorio,
						  patron_respiratorio.id_list_patron_respiratorio,
						  patron_respiratorio.estado_patron_respiratorio,
						  patron_respiratorio.comentario_patron_respiratorio,
						  listado_patron_respiratorio.id_list_patron_respiratorio AS id_list_patron_respiratorio,
						  listado_patron_respiratorio.nom_list_patron_respiratorio
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN patron_respiratorio ON historial.id_hist = patron_respiratorio.id_hist
						  INNER JOIN listado_patron_respiratorio ON listado_patron_respiratorio.id_list_patron_respiratorio =
							patron_respiratorio.id_list_patron_respiratorio $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_patron_respiratorio];
									 $lista_linfo=$row[nom_list_patron_respiratorio];
									 $estado=$row[estado_patron_respiratorio];
									 $comentario=$row[comentario_patron_respiratorio];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>PATRONES RESPIRATORIOS</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th colspan='1' bgcolor='#F5F5F5'><b>EXAMENES</b></th>
								<th style='width:15px;'><b>SI/NO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
					
						
						$sql="SELECT
								  listado_patron_respiratorio.nom_list_patron_respiratorio,
								  patron_respiratorio.id_list_patron_respiratorio,
								  patron_respiratorio.estado_patron_respiratorio,
								  patron_respiratorio.comentario_patron_respiratorio,
								  historial.id_hist
								FROM
								  listado_patron_respiratorio
								  INNER JOIN patron_respiratorio ON listado_patron_respiratorio.id_list_patron_respiratorio =
									patron_respiratorio.id_list_patron_respiratorio
								  INNER JOIN historial ON historial.id_hist = patron_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_patron_respiratorio.id_list_patron_respiratorio='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_patron_respiratorio];
									 $lista_linfo1=$row[nom_list_patron_respiratorio];
									 $estado1=$row[estado_patron_respiratorio];
									 $comentario1=$row[comentario_patron_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";

						
						$sql="SELECT
								  listado_patron_respiratorio.nom_list_patron_respiratorio,
								  patron_respiratorio.id_list_patron_respiratorio,
								  patron_respiratorio.estado_patron_respiratorio,
								  patron_respiratorio.comentario_patron_respiratorio,
								  historial.id_hist
								FROM
								  listado_patron_respiratorio
								  INNER JOIN patron_respiratorio ON listado_patron_respiratorio.id_list_patron_respiratorio =
									patron_respiratorio.id_list_patron_respiratorio
								  INNER JOIN historial ON historial.id_hist = patron_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_patron_respiratorio.id_list_patron_respiratorio='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_patron_respiratorio];
									 $lista_linfo1=$row[nom_list_patron_respiratorio];
									 $estado1=$row[estado_patron_respiratorio];
									 $comentario1=$row[comentario_patron_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";

						
						$sql="SELECT
								  listado_patron_respiratorio.nom_list_patron_respiratorio,
								  patron_respiratorio.id_list_patron_respiratorio,
								  patron_respiratorio.estado_patron_respiratorio,
								  patron_respiratorio.comentario_patron_respiratorio,
								  historial.id_hist
								FROM
								  listado_patron_respiratorio
								  INNER JOIN patron_respiratorio ON listado_patron_respiratorio.id_list_patron_respiratorio =
									patron_respiratorio.id_list_patron_respiratorio
								  INNER JOIN historial ON historial.id_hist = patron_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_patron_respiratorio.id_list_patron_respiratorio='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_patron_respiratorio];
									 $lista_linfo1=$row[nom_list_patron_respiratorio];
									 $estado1=$row[estado_patron_respiratorio];
									 $comentario1=$row[comentario_patron_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";

						
						$sql="SELECT
								  listado_patron_respiratorio.nom_list_patron_respiratorio,
								  patron_respiratorio.id_list_patron_respiratorio,
								  patron_respiratorio.estado_patron_respiratorio,
								  patron_respiratorio.comentario_patron_respiratorio,
								  historial.id_hist
								FROM
								  listado_patron_respiratorio
								  INNER JOIN patron_respiratorio ON listado_patron_respiratorio.id_list_patron_respiratorio =
									patron_respiratorio.id_list_patron_respiratorio
								  INNER JOIN historial ON historial.id_hist = patron_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_patron_respiratorio.id_list_patron_respiratorio='4'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_patron_respiratorio];
									 $lista_linfo1=$row[nom_list_patron_respiratorio];
									 $estado1=$row[estado_patron_respiratorio];
									 $comentario1=$row[comentario_patron_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";

						
						$sql="SELECT
								  listado_patron_respiratorio.nom_list_patron_respiratorio,
								  patron_respiratorio.id_list_patron_respiratorio,
								  patron_respiratorio.estado_patron_respiratorio,
								  patron_respiratorio.comentario_patron_respiratorio,
								  historial.id_hist
								FROM
								  listado_patron_respiratorio
								  INNER JOIN patron_respiratorio ON listado_patron_respiratorio.id_list_patron_respiratorio =
									patron_respiratorio.id_list_patron_respiratorio
								  INNER JOIN historial ON historial.id_hist = patron_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_patron_respiratorio.id_list_patron_respiratorio='5'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_patron_respiratorio];
									 $lista_linfo1=$row[nom_list_patron_respiratorio];
									 $estado1=$row[estado_patron_respiratorio];
									 $comentario1=$row[comentario_patron_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";

						
						$sql="SELECT
								  listado_patron_respiratorio.nom_list_patron_respiratorio,
								  patron_respiratorio.id_list_patron_respiratorio,
								  patron_respiratorio.estado_patron_respiratorio,
								  patron_respiratorio.comentario_patron_respiratorio,
								  historial.id_hist
								FROM
								  listado_patron_respiratorio
								  INNER JOIN patron_respiratorio ON listado_patron_respiratorio.id_list_patron_respiratorio =
									patron_respiratorio.id_list_patron_respiratorio
								  INNER JOIN historial ON historial.id_hist = patron_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_patron_respiratorio.id_list_patron_respiratorio='6'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_patron_respiratorio];
									 $lista_linfo1=$row[nom_list_patron_respiratorio];
									 $estado1=$row[estado_patron_respiratorio];
									 $comentario1=$row[comentario_patron_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";

						
						$sql="SELECT
								  listado_patron_respiratorio.nom_list_patron_respiratorio,
								  patron_respiratorio.id_list_patron_respiratorio,
								  patron_respiratorio.estado_patron_respiratorio,
								  patron_respiratorio.comentario_patron_respiratorio,
								  historial.id_hist
								FROM
								  listado_patron_respiratorio
								  INNER JOIN patron_respiratorio ON listado_patron_respiratorio.id_list_patron_respiratorio =
									patron_respiratorio.id_list_patron_respiratorio
								  INNER JOIN historial ON historial.id_hist = patron_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_patron_respiratorio.id_list_patron_respiratorio='7'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_patron_respiratorio];
									 $lista_linfo1=$row[nom_list_patron_respiratorio];
									 $estado1=$row[estado_patron_respiratorio];
									 $comentario1=$row[comentario_patron_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";

						
						$sql="SELECT
								  listado_patron_respiratorio.nom_list_patron_respiratorio,
								  patron_respiratorio.id_list_patron_respiratorio,
								  patron_respiratorio.estado_patron_respiratorio,
								  patron_respiratorio.comentario_patron_respiratorio,
								  historial.id_hist
								FROM
								  listado_patron_respiratorio
								  INNER JOIN patron_respiratorio ON listado_patron_respiratorio.id_list_patron_respiratorio =
									patron_respiratorio.id_list_patron_respiratorio
								  INNER JOIN historial ON historial.id_hist = patron_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_patron_respiratorio.id_list_patron_respiratorio='8'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_patron_respiratorio];
									 $lista_linfo1=$row[nom_list_patron_respiratorio];
									 $estado1=$row[estado_patron_respiratorio];
									 $comentario1=$row[comentario_patron_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
					echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/p_r_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
			echo"</table>";
				}	
			}
			break;
/****************************************SINTOMAS RESPIRATORIOS***************************************************************************************/
			case '20':
			if( $busqueda==20)
			{
				if($var_estado_bus==20){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  sintoma_respiratorio.id_sintoma_respiratorio,
						  sintoma_respiratorio.id_list_sintoma_respiratorio,
						  sintoma_respiratorio.estado_sintoma_respiratorio,
						  sintoma_respiratorio.comentario_sintoma_respiratorio,
						  listado_sintoma_respiratorio.id_list_sintoma_respiratorio AS id_list_sintoma_respiratorio,
						  listado_sintoma_respiratorio.nom_list_sintoma_respiratorio
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN sintoma_respiratorio ON historial.id_hist = sintoma_respiratorio.id_hist
						  INNER JOIN listado_sintoma_respiratorio ON listado_sintoma_respiratorio.id_list_sintoma_respiratorio =
							sintoma_respiratorio.id_list_sintoma_respiratorio $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_sintoma_respiratorio];
									 $lista_linfo=$row[nom_list_sintoma_respiratorio];
									 $estado=$row[estado_sintoma_respiratorio];
									 $comentario=$row[comentario_sintoma_respiratorio];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>SINTOMAS RESPIRATORIOS</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th style='width:20px;' colspan='1' bgcolor='#F5F5F5'><b>EXAMENES</b></th>
								<th style='width:5px;'><b>SI/NO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
					
						
						$sql="SELECT
								  listado_sintoma_respiratorio.nom_list_sintoma_respiratorio,
								  sintoma_respiratorio.id_list_sintoma_respiratorio,
								  sintoma_respiratorio.estado_sintoma_respiratorio,
								  sintoma_respiratorio.comentario_sintoma_respiratorio,
								  historial.id_hist
								FROM
								  listado_sintoma_respiratorio
								  INNER JOIN sintoma_respiratorio ON listado_sintoma_respiratorio.id_list_sintoma_respiratorio =
									sintoma_respiratorio.id_list_sintoma_respiratorio
								  INNER JOIN historial ON historial.id_hist = sintoma_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sintoma_respiratorio.id_list_sintoma_respiratorio='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sintoma_respiratorio];
									 $lista_linfo1=$row[nom_list_sintoma_respiratorio];
									 $estado1=$row[estado_sintoma_respiratorio];
									 $comentario1=$row[comentario_sintoma_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";

						$sql="SELECT
								  listado_sintoma_respiratorio.nom_list_sintoma_respiratorio,
								  sintoma_respiratorio.id_list_sintoma_respiratorio,
								  sintoma_respiratorio.estado_sintoma_respiratorio,
								  sintoma_respiratorio.comentario_sintoma_respiratorio,
								  historial.id_hist
								FROM
								  listado_sintoma_respiratorio
								  INNER JOIN sintoma_respiratorio ON listado_sintoma_respiratorio.id_list_sintoma_respiratorio =
									sintoma_respiratorio.id_list_sintoma_respiratorio
								  INNER JOIN historial ON historial.id_hist = sintoma_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sintoma_respiratorio.id_list_sintoma_respiratorio='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sintoma_respiratorio];
									 $lista_linfo1=$row[nom_list_sintoma_respiratorio];
									 $estado1=$row[estado_sintoma_respiratorio];
									 $comentario1=$row[comentario_sintoma_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";

						$sql="SELECT
								  listado_sintoma_respiratorio.nom_list_sintoma_respiratorio,
								  sintoma_respiratorio.id_list_sintoma_respiratorio,
								  sintoma_respiratorio.estado_sintoma_respiratorio,
								  sintoma_respiratorio.comentario_sintoma_respiratorio,
								  historial.id_hist
								FROM
								  listado_sintoma_respiratorio
								  INNER JOIN sintoma_respiratorio ON listado_sintoma_respiratorio.id_list_sintoma_respiratorio =
									sintoma_respiratorio.id_list_sintoma_respiratorio
								  INNER JOIN historial ON historial.id_hist = sintoma_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sintoma_respiratorio.id_list_sintoma_respiratorio='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sintoma_respiratorio];
									 $lista_linfo1=$row[nom_list_sintoma_respiratorio];
									 $estado1=$row[estado_sintoma_respiratorio];
									 $comentario1=$row[comentario_sintoma_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";

						$sql="SELECT
								  listado_sintoma_respiratorio.nom_list_sintoma_respiratorio,
								  sintoma_respiratorio.id_list_sintoma_respiratorio,
								  sintoma_respiratorio.estado_sintoma_respiratorio,
								  sintoma_respiratorio.comentario_sintoma_respiratorio,
								  historial.id_hist
								FROM
								  listado_sintoma_respiratorio
								  INNER JOIN sintoma_respiratorio ON listado_sintoma_respiratorio.id_list_sintoma_respiratorio =
									sintoma_respiratorio.id_list_sintoma_respiratorio
								  INNER JOIN historial ON historial.id_hist = sintoma_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sintoma_respiratorio.id_list_sintoma_respiratorio='4'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sintoma_respiratorio];
									 $lista_linfo1=$row[nom_list_sintoma_respiratorio];
									 $estado1=$row[estado_sintoma_respiratorio];
									 $comentario1=$row[comentario_sintoma_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";

						$sql="SELECT
								  listado_sintoma_respiratorio.nom_list_sintoma_respiratorio,
								  sintoma_respiratorio.id_list_sintoma_respiratorio,
								  sintoma_respiratorio.estado_sintoma_respiratorio,
								  sintoma_respiratorio.comentario_sintoma_respiratorio,
								  historial.id_hist
								FROM
								  listado_sintoma_respiratorio
								  INNER JOIN sintoma_respiratorio ON listado_sintoma_respiratorio.id_list_sintoma_respiratorio =
									sintoma_respiratorio.id_list_sintoma_respiratorio
								  INNER JOIN historial ON historial.id_hist = sintoma_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sintoma_respiratorio.id_list_sintoma_respiratorio='5'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sintoma_respiratorio];
									 $lista_linfo1=$row[nom_list_sintoma_respiratorio];
									 $estado1=$row[estado_sintoma_respiratorio];
									 $comentario1=$row[comentario_sintoma_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";

						$sql="SELECT
								  listado_sintoma_respiratorio.nom_list_sintoma_respiratorio,
								  sintoma_respiratorio.id_list_sintoma_respiratorio,
								  sintoma_respiratorio.estado_sintoma_respiratorio,
								  sintoma_respiratorio.comentario_sintoma_respiratorio,
								  historial.id_hist
								FROM
								  listado_sintoma_respiratorio
								  INNER JOIN sintoma_respiratorio ON listado_sintoma_respiratorio.id_list_sintoma_respiratorio =
									sintoma_respiratorio.id_list_sintoma_respiratorio
								  INNER JOIN historial ON historial.id_hist = sintoma_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sintoma_respiratorio.id_list_sintoma_respiratorio='6'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sintoma_respiratorio];
									 $lista_linfo1=$row[nom_list_sintoma_respiratorio];
									 $estado1=$row[estado_sintoma_respiratorio];
									 $comentario1=$row[comentario_sintoma_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";

						$sql="SELECT
								  listado_sintoma_respiratorio.nom_list_sintoma_respiratorio,
								  sintoma_respiratorio.id_list_sintoma_respiratorio,
								  sintoma_respiratorio.estado_sintoma_respiratorio,
								  sintoma_respiratorio.comentario_sintoma_respiratorio,
								  historial.id_hist
								FROM
								  listado_sintoma_respiratorio
								  INNER JOIN sintoma_respiratorio ON listado_sintoma_respiratorio.id_list_sintoma_respiratorio =
									sintoma_respiratorio.id_list_sintoma_respiratorio
								  INNER JOIN historial ON historial.id_hist = sintoma_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sintoma_respiratorio.id_list_sintoma_respiratorio='7'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sintoma_respiratorio];
									 $lista_linfo1=$row[nom_list_sintoma_respiratorio];
									 $estado1=$row[estado_sintoma_respiratorio];
									 $comentario1=$row[comentario_sintoma_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";

						$sql="SELECT
								  listado_sintoma_respiratorio.nom_list_sintoma_respiratorio,
								  sintoma_respiratorio.id_list_sintoma_respiratorio,
								  sintoma_respiratorio.estado_sintoma_respiratorio,
								  sintoma_respiratorio.comentario_sintoma_respiratorio,
								  historial.id_hist
								FROM
								  listado_sintoma_respiratorio
								  INNER JOIN sintoma_respiratorio ON listado_sintoma_respiratorio.id_list_sintoma_respiratorio =
									sintoma_respiratorio.id_list_sintoma_respiratorio
								  INNER JOIN historial ON historial.id_hist = sintoma_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sintoma_respiratorio.id_list_sintoma_respiratorio='8'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sintoma_respiratorio];
									 $lista_linfo1=$row[nom_list_sintoma_respiratorio];
									 $estado1=$row[estado_sintoma_respiratorio];
									 $comentario1=$row[comentario_sintoma_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";

						$sql="SELECT
								  listado_sintoma_respiratorio.nom_list_sintoma_respiratorio,
								  sintoma_respiratorio.id_list_sintoma_respiratorio,
								  sintoma_respiratorio.estado_sintoma_respiratorio,
								  sintoma_respiratorio.comentario_sintoma_respiratorio,
								  historial.id_hist
								FROM
								  listado_sintoma_respiratorio
								  INNER JOIN sintoma_respiratorio ON listado_sintoma_respiratorio.id_list_sintoma_respiratorio =
									sintoma_respiratorio.id_list_sintoma_respiratorio
								  INNER JOIN historial ON historial.id_hist = sintoma_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sintoma_respiratorio.id_list_sintoma_respiratorio='9'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sintoma_respiratorio];
									 $lista_linfo1=$row[nom_list_sintoma_respiratorio];
									 $estado1=$row[estado_sintoma_respiratorio];
									 $comentario1=$row[comentario_sintoma_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";

						$sql="SELECT
								  listado_sintoma_respiratorio.nom_list_sintoma_respiratorio,
								  sintoma_respiratorio.id_list_sintoma_respiratorio,
								  sintoma_respiratorio.estado_sintoma_respiratorio,
								  sintoma_respiratorio.comentario_sintoma_respiratorio,
								  historial.id_hist
								FROM
								  listado_sintoma_respiratorio
								  INNER JOIN sintoma_respiratorio ON listado_sintoma_respiratorio.id_list_sintoma_respiratorio =
									sintoma_respiratorio.id_list_sintoma_respiratorio
								  INNER JOIN historial ON historial.id_hist = sintoma_respiratorio.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sintoma_respiratorio.id_list_sintoma_respiratorio='10'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sintoma_respiratorio];
									 $lista_linfo1=$row[nom_list_sintoma_respiratorio];
									 $estado1=$row[estado_sintoma_respiratorio];
									 $comentario1=$row[comentario_sintoma_respiratorio];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/sim_r_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
					

			echo"</table>";
				}	
			}
	break;
/****************************************MEMBRANA MUCOSA***************************************************************************************/
			case '21':
			if( $busqueda==21)
			{
				if($var_estado_bus==21){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  membrana_mucosa.id_membrana_mucosa,
						  membrana_mucosa.id_list_membrana_mucosa,
						  membrana_mucosa.estado_membrana_mucosa,
						  membrana_mucosa.comentario_membrana_mucosa,
						  listado_membrana_mucosa.id_list_membrana_mucosa AS id_list_membrana_mucosa,
						  listado_membrana_mucosa.nom_list_membrana_mucosa
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN membrana_mucosa ON historial.id_hist = membrana_mucosa.id_hist
						  INNER JOIN listado_membrana_mucosa ON listado_membrana_mucosa.id_list_membrana_mucosa =
							membrana_mucosa.id_list_membrana_mucosa $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_membrana_mucosa];
									 $lista_linfo=$row[nom_list_membrana_mucosa];
									 $estado=$row[estado_membrana_mucosa];
									 $comentario=$row[comentario_membrana_mucosa];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>MEMBRANA MUCOSA</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th style='width:20px;' colspan='1' bgcolor='#F5F5F5'><b>EXAMENES</b></th>
								<th style='width:5px;'><b>ESTADO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
					
						
						$sql="SELECT
								  listado_membrana_mucosa.nom_list_membrana_mucosa,
								  membrana_mucosa.id_list_membrana_mucosa,
								  membrana_mucosa.estado_membrana_mucosa,
								  membrana_mucosa.comentario_membrana_mucosa,
								  historial.id_hist
								FROM
								  listado_membrana_mucosa
								  INNER JOIN membrana_mucosa ON listado_membrana_mucosa.id_list_membrana_mucosa =
									membrana_mucosa.id_list_membrana_mucosa
								  INNER JOIN historial ON historial.id_hist = membrana_mucosa.id_hist WHERE  historial.id_hist='$var_histo' AND listado_membrana_mucosa.id_list_membrana_mucosa='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_membrana_mucosa];
									 $lista_linfo1=$row[nom_list_membrana_mucosa];
									 $estado1=$row[estado_membrana_mucosa];
									 $comentario1=$row[comentario_membrana_mucosa];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
			
			
						$sql="SELECT
								  listado_membrana_mucosa.nom_list_membrana_mucosa,
								  membrana_mucosa.id_list_membrana_mucosa,
								  membrana_mucosa.estado_membrana_mucosa,
								  membrana_mucosa.comentario_membrana_mucosa,
								  historial.id_hist
								FROM
								  listado_membrana_mucosa
								  INNER JOIN membrana_mucosa ON listado_membrana_mucosa.id_list_membrana_mucosa =
									membrana_mucosa.id_list_membrana_mucosa
								  INNER JOIN historial ON historial.id_hist = membrana_mucosa.id_hist WHERE  historial.id_hist='$var_histo' AND listado_membrana_mucosa.id_list_membrana_mucosa='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_membrana_mucosa];
									 $lista_linfo1=$row[nom_list_membrana_mucosa];
									 $estado1=$row[estado_membrana_mucosa];
									 $comentario1=$row[comentario_membrana_mucosa];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
			
			
						$sql="SELECT
								  listado_membrana_mucosa.nom_list_membrana_mucosa,
								  membrana_mucosa.id_list_membrana_mucosa,
								  membrana_mucosa.estado_membrana_mucosa,
								  membrana_mucosa.comentario_membrana_mucosa,
								  historial.id_hist
								FROM
								  listado_membrana_mucosa
								  INNER JOIN membrana_mucosa ON listado_membrana_mucosa.id_list_membrana_mucosa =
									membrana_mucosa.id_list_membrana_mucosa
								  INNER JOIN historial ON historial.id_hist = membrana_mucosa.id_hist WHERE  historial.id_hist='$var_histo' AND listado_membrana_mucosa.id_list_membrana_mucosa='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_membrana_mucosa];
									 $lista_linfo1=$row[nom_list_membrana_mucosa];
									 $estado1=$row[estado_membrana_mucosa];
									 $comentario1=$row[comentario_membrana_mucosa];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
					echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/meb_m_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
			
			
			echo"</table>";
				}	
			}
			break;
/****************************************CARACTERISCTICAS DEL PULSO***************************************************************************************/
			case '22':
			if( $busqueda==22)
			{
				if($var_estado_bus==22){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  caracteristica_pulso.id_caracteristica_pulso,
						  caracteristica_pulso.id_list_caracteristica_pulso,
						  caracteristica_pulso.estado_caracteristica_pulso,
						  caracteristica_pulso.comentario_caracteristica_pulso,
						  listado_caracteristica_pulso.id_list_caracteristica_pulso AS id_list_caracteristica_pulso,
						  listado_caracteristica_pulso.nom_list_caracteristica_pulso
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN caracteristica_pulso ON historial.id_hist = caracteristica_pulso.id_hist
						  INNER JOIN listado_caracteristica_pulso ON listado_caracteristica_pulso.id_list_caracteristica_pulso =
							caracteristica_pulso.id_list_caracteristica_pulso $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_caracteristica_pulso];
									 $lista_linfo=$row[nom_list_caracteristica_pulso];
									 $estado=$row[estado_caracteristica_pulso];
									 $comentario=$row[comentario_caracteristica_pulso];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>CARACTERISTICAS DEL PULSO</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th style='width:20px;' colspan='1' bgcolor='#F5F5F5'><b>EXAMENES</b></th>
								<th style='width:5px;'><b>ESTADO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
					
						
						$sql="SELECT
								  listado_caracteristica_pulso.nom_list_caracteristica_pulso,
								  caracteristica_pulso.id_list_caracteristica_pulso,
								  caracteristica_pulso.estado_caracteristica_pulso,
								  caracteristica_pulso.comentario_caracteristica_pulso,
								  historial.id_hist
								FROM
								  listado_caracteristica_pulso
								  INNER JOIN caracteristica_pulso ON listado_caracteristica_pulso.id_list_caracteristica_pulso =
									caracteristica_pulso.id_list_caracteristica_pulso
								  INNER JOIN historial ON historial.id_hist = caracteristica_pulso.id_hist WHERE  historial.id_hist='$var_histo' AND listado_caracteristica_pulso.id_list_caracteristica_pulso='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_caracteristica_pulso];
									 $lista_linfo1=$row[nom_list_caracteristica_pulso];
									 $estado1=$row[estado_caracteristica_pulso];
									 $comentario1=$row[comentario_caracteristica_pulso];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
			
			
						$sql="SELECT
								  listado_caracteristica_pulso.nom_list_caracteristica_pulso,
								  caracteristica_pulso.id_list_caracteristica_pulso,
								  caracteristica_pulso.estado_caracteristica_pulso,
								  caracteristica_pulso.comentario_caracteristica_pulso,
								  historial.id_hist
								FROM
								  listado_caracteristica_pulso
								  INNER JOIN caracteristica_pulso ON listado_caracteristica_pulso.id_list_caracteristica_pulso =
									caracteristica_pulso.id_list_caracteristica_pulso
								  INNER JOIN historial ON historial.id_hist = caracteristica_pulso.id_hist WHERE  historial.id_hist='$var_histo' AND listado_caracteristica_pulso.id_list_caracteristica_pulso='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_caracteristica_pulso];
									 $lista_linfo1=$row[nom_list_caracteristica_pulso];
									 $estado1=$row[estado_caracteristica_pulso];
									 $comentario1=$row[comentario_caracteristica_pulso];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
			
			
						$sql="SELECT
								  listado_caracteristica_pulso.nom_list_caracteristica_pulso,
								  caracteristica_pulso.id_list_caracteristica_pulso,
								  caracteristica_pulso.estado_caracteristica_pulso,
								  caracteristica_pulso.comentario_caracteristica_pulso,
								  historial.id_hist
								FROM
								  listado_caracteristica_pulso
								  INNER JOIN caracteristica_pulso ON listado_caracteristica_pulso.id_list_caracteristica_pulso =
									caracteristica_pulso.id_list_caracteristica_pulso
								  INNER JOIN historial ON historial.id_hist = caracteristica_pulso.id_hist WHERE  historial.id_hist='$var_histo' AND listado_caracteristica_pulso.id_list_caracteristica_pulso='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_caracteristica_pulso];
									 $lista_linfo1=$row[nom_list_caracteristica_pulso];
									 $estado1=$row[estado_caracteristica_pulso];
									 $comentario1=$row[comentario_caracteristica_pulso];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
			
			
						$sql="SELECT
								  listado_caracteristica_pulso.nom_list_caracteristica_pulso,
								  caracteristica_pulso.id_list_caracteristica_pulso,
								  caracteristica_pulso.estado_caracteristica_pulso,
								  caracteristica_pulso.comentario_caracteristica_pulso,
								  historial.id_hist
								FROM
								  listado_caracteristica_pulso
								  INNER JOIN caracteristica_pulso ON listado_caracteristica_pulso.id_list_caracteristica_pulso =
									caracteristica_pulso.id_list_caracteristica_pulso
								  INNER JOIN historial ON historial.id_hist = caracteristica_pulso.id_hist WHERE  historial.id_hist='$var_histo' AND listado_caracteristica_pulso.id_list_caracteristica_pulso='4'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_caracteristica_pulso];
									 $lista_linfo1=$row[nom_list_caracteristica_pulso];
									 $estado1=$row[estado_caracteristica_pulso];
									 $comentario1=$row[comentario_caracteristica_pulso];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
			
			
						$sql="SELECT
								  listado_caracteristica_pulso.nom_list_caracteristica_pulso,
								  caracteristica_pulso.id_list_caracteristica_pulso,
								  caracteristica_pulso.estado_caracteristica_pulso,
								  caracteristica_pulso.comentario_caracteristica_pulso,
								  historial.id_hist
								FROM
								  listado_caracteristica_pulso
								  INNER JOIN caracteristica_pulso ON listado_caracteristica_pulso.id_list_caracteristica_pulso =
									caracteristica_pulso.id_list_caracteristica_pulso
								  INNER JOIN historial ON historial.id_hist = caracteristica_pulso.id_hist WHERE  historial.id_hist='$var_histo' AND listado_caracteristica_pulso.id_list_caracteristica_pulso='5'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_caracteristica_pulso];
									 $lista_linfo1=$row[nom_list_caracteristica_pulso];
									 $estado1=$row[estado_caracteristica_pulso];
									 $comentario1=$row[comentario_caracteristica_pulso];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
			
				echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/c_p_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
			
			
			echo"</table>";
				}	
			}
			break;
/****************************************REGION PRECORDIAL***************************************************************************************/
			case '23':
			if( $busqueda==23)
			{
				if($var_estado_bus==23){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  region_precordial.id_region_precordial,
						  region_precordial.id_list_region_precordial,
						  region_precordial.estado_region_precordial,
						  region_precordial.comentario_region_precordial,
						  listado_region_precordial.id_list_region_precordial AS id_list_region_precordial,
						  listado_region_precordial.nom_list_region_precordial
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN region_precordial ON historial.id_hist = region_precordial.id_hist
						  INNER JOIN listado_region_precordial ON listado_region_precordial.id_list_region_precordial =
							region_precordial.id_list_region_precordial $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_region_precordial];
									 $lista_linfo=$row[nom_list_region_precordial];
									 $estado=$row[estado_region_precordial];
									 $comentario=$row[comentario_region_precordial];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>REGION PRECORDIAL</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th style='width:20px;' colspan='1' bgcolor='#F5F5F5'><b>EXAMENES</b></th>
								<th style='width:5px;'><b>ESTADO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
					
						
						$sql="SELECT
								  listado_region_precordial.nom_list_region_precordial,
								  region_precordial.id_list_region_precordial,
								  region_precordial.estado_region_precordial,
								  region_precordial.comentario_region_precordial,
								  historial.id_hist
								FROM
								  listado_region_precordial
								  INNER JOIN region_precordial ON listado_region_precordial.id_list_region_precordial =
									region_precordial.id_list_region_precordial
								  INNER JOIN historial ON historial.id_hist = region_precordial.id_hist WHERE  historial.id_hist='$var_histo' AND listado_region_precordial.id_list_region_precordial='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_region_precordial];
									 $lista_linfo1=$row[nom_list_region_precordial];
									 $estado1=$row[estado_region_precordial];
									 $comentario1=$row[comentario_region_precordial];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/reg_p_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
			echo"</table>";
				}	
			}
			break;
/****************************************AUSCULTACION***************************************************************************************/
			case '24':
			if( $busqueda==24)
			{
				if($var_estado_bus==24){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  auscultacion.id_auscultacion,
						  auscultacion.id_list_auscultacion,
						  auscultacion.estado_auscultacion,
						  auscultacion.comentario_auscultacion,
						  listado_auscultacion.id_list_auscultacion AS id_list_auscultacion,
						  listado_auscultacion.nom_lauscultacion
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN auscultacion ON historial.id_hist = auscultacion.id_hist
						  INNER JOIN listado_auscultacion ON listado_auscultacion.id_list_auscultacion =
							auscultacion.id_list_auscultacion $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_auscultacion];
									 $lista_linfo=$row[nom_lauscultacion];
									 $estado=$row[estado_auscultacion];
									 $comentario=$row[comentario_auscultacion];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>AUSCULTACION</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th style='width:20px;' colspan='1' bgcolor='#F5F5F5'><b>EXAMENES</b></th>
								<th style='width:5px;'><b>ESTADO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
					
						
						$sql="SELECT
								  listado_auscultacion.nom_lauscultacion,
								  auscultacion.id_list_auscultacion,
								  auscultacion.estado_auscultacion,
								  auscultacion.comentario_auscultacion,
								  historial.id_hist
								FROM
								  listado_auscultacion
								  INNER JOIN auscultacion ON listado_auscultacion.id_list_auscultacion =
									auscultacion.id_list_auscultacion
								  INNER JOIN historial ON historial.id_hist = auscultacion.id_hist WHERE  historial.id_hist='$var_histo' AND listado_auscultacion.id_list_auscultacion='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_auscultacion];
									 $lista_linfo1=$row[nom_lauscultacion];
									 $estado1=$row[estado_auscultacion];
									 $comentario1=$row[comentario_auscultacion];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						$sql="SELECT
								  listado_auscultacion.nom_lauscultacion,
								  auscultacion.id_list_auscultacion,
								  auscultacion.estado_auscultacion,
								  auscultacion.comentario_auscultacion,
								  historial.id_hist
								FROM
								  listado_auscultacion
								  INNER JOIN auscultacion ON listado_auscultacion.id_list_auscultacion =
									auscultacion.id_list_auscultacion
								  INNER JOIN historial ON historial.id_hist = auscultacion.id_hist WHERE  historial.id_hist='$var_histo' AND listado_auscultacion.id_list_auscultacion='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_auscultacion];
									 $lista_linfo1=$row[nom_lauscultacion];
									 $estado1=$row[estado_auscultacion];
									 $comentario1=$row[comentario_auscultacion];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						$sql="SELECT
								  listado_auscultacion.nom_lauscultacion,
								  auscultacion.id_list_auscultacion,
								  auscultacion.estado_auscultacion,
								  auscultacion.comentario_auscultacion,
								  historial.id_hist
								FROM
								  listado_auscultacion
								  INNER JOIN auscultacion ON listado_auscultacion.id_list_auscultacion =
									auscultacion.id_list_auscultacion
								  INNER JOIN historial ON historial.id_hist = auscultacion.id_hist WHERE  historial.id_hist='$var_histo' AND listado_auscultacion.id_list_auscultacion='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_auscultacion];
									 $lista_linfo1=$row[nom_lauscultacion];
									 $estado1=$row[estado_auscultacion];
									 $comentario1=$row[comentario_auscultacion];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						$sql="SELECT
								  listado_auscultacion.nom_lauscultacion,
								  auscultacion.id_list_auscultacion,
								  auscultacion.estado_auscultacion,
								  auscultacion.comentario_auscultacion,
								  historial.id_hist
								FROM
								  listado_auscultacion
								  INNER JOIN auscultacion ON listado_auscultacion.id_list_auscultacion =
									auscultacion.id_list_auscultacion
								  INNER JOIN historial ON historial.id_hist = auscultacion.id_hist WHERE  historial.id_hist='$var_histo' AND listado_auscultacion.id_list_auscultacion='4'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_auscultacion];
									 $lista_linfo1=$row[nom_lauscultacion];
									 $estado1=$row[estado_auscultacion];
									 $comentario1=$row[comentario_auscultacion];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						$sql="SELECT
								  listado_auscultacion.nom_lauscultacion,
								  auscultacion.id_list_auscultacion,
								  auscultacion.estado_auscultacion,
								  auscultacion.comentario_auscultacion,
								  historial.id_hist
								FROM
								  listado_auscultacion
								  INNER JOIN auscultacion ON listado_auscultacion.id_list_auscultacion =
									auscultacion.id_list_auscultacion
								  INNER JOIN historial ON historial.id_hist = auscultacion.id_hist WHERE  historial.id_hist='$var_histo' AND listado_auscultacion.id_list_auscultacion='5'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_auscultacion];
									 $lista_linfo1=$row[nom_lauscultacion];
									 $estado1=$row[estado_auscultacion];
									 $comentario1=$row[comentario_auscultacion];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						$sql="SELECT
								  listado_auscultacion.nom_lauscultacion,
								  auscultacion.id_list_auscultacion,
								  auscultacion.estado_auscultacion,
								  auscultacion.comentario_auscultacion,
								  historial.id_hist
								FROM
								  listado_auscultacion
								  INNER JOIN auscultacion ON listado_auscultacion.id_list_auscultacion =
									auscultacion.id_list_auscultacion
								  INNER JOIN historial ON historial.id_hist = auscultacion.id_hist WHERE  historial.id_hist='$var_histo' AND listado_auscultacion.id_list_auscultacion='6'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_auscultacion];
									 $lista_linfo1=$row[nom_lauscultacion];
									 $estado1=$row[estado_auscultacion];
									 $comentario1=$row[comentario_auscultacion];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
							echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/auscult_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
						
			echo"</table>";
				}	
			}
			break;
/****************************************OTROS EXAMENES SISTEMA RESPIRATORIO***************************************************************************************/
			case '25':
			if( $busqueda==25)
			{
				if($var_estado_bus==25){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  otro_sistema_resp.id_otro_sistema_resp,
						  otro_sistema_resp.id_list_otro_sistema_resp,
						  otro_sistema_resp.estado_otro_sistema_resp,
						  otro_sistema_resp.comentario_otro_sistema_resp,
						  listado_otro_sistema_resp.id_list_otro_sistema_resp AS id_list_otro_sistema_resp,
						  listado_otro_sistema_resp.nom_otro_sistema_resp
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN otro_sistema_resp ON historial.id_hist = otro_sistema_resp.id_hist
						  INNER JOIN listado_otro_sistema_resp ON listado_otro_sistema_resp.id_list_otro_sistema_resp =
							otro_sistema_resp.id_list_otro_sistema_resp $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_otro_sistema_resp];
									 $lista_linfo=$row[nom_otro_sistema_resp];
									 $estado=$row[estado_otro_sistema_resp];
									 $comentario=$row[comentario_otro_sistema_resp];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>OTROS SISTEMAS RESPIRATORIOS</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th style='width:20px;' colspan='1' bgcolor='#F5F5F5'><b>EXAMENES</b></th>
								<th style='width:5px;'><b>ESTADO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
					
						
						$sql="SELECT
								  listado_otro_sistema_resp.nom_otro_sistema_resp,
								  otro_sistema_resp.id_list_otro_sistema_resp,
								  otro_sistema_resp.estado_otro_sistema_resp,
								  otro_sistema_resp.comentario_otro_sistema_resp,
								  historial.id_hist
								FROM
								  listado_otro_sistema_resp
								  INNER JOIN otro_sistema_resp ON listado_otro_sistema_resp.id_list_otro_sistema_resp =
									otro_sistema_resp.id_list_otro_sistema_resp
								  INNER JOIN historial ON historial.id_hist = otro_sistema_resp.id_hist WHERE  historial.id_hist='$var_histo' AND listado_otro_sistema_resp.id_list_otro_sistema_resp='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_otro_sistema_resp];
									 $lista_linfo1=$row[nom_otro_sistema_resp];
									 $estado1=$row[estado_otro_sistema_resp];
									 $comentario1=$row[comentario_otro_sistema_resp];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_otro_sistema_resp.nom_otro_sistema_resp,
								  otro_sistema_resp.id_list_otro_sistema_resp,
								  otro_sistema_resp.estado_otro_sistema_resp,
								  otro_sistema_resp.comentario_otro_sistema_resp,
								  historial.id_hist
								FROM
								  listado_otro_sistema_resp
								  INNER JOIN otro_sistema_resp ON listado_otro_sistema_resp.id_list_otro_sistema_resp =
									otro_sistema_resp.id_list_otro_sistema_resp
								  INNER JOIN historial ON historial.id_hist = otro_sistema_resp.id_hist WHERE  historial.id_hist='$var_histo' AND listado_otro_sistema_resp.id_list_otro_sistema_resp='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_otro_sistema_resp];
									 $lista_linfo1=$row[nom_otro_sistema_resp];
									 $estado1=$row[estado_otro_sistema_resp];
									 $comentario1=$row[comentario_otro_sistema_resp];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_otro_sistema_resp.nom_otro_sistema_resp,
								  otro_sistema_resp.id_list_otro_sistema_resp,
								  otro_sistema_resp.estado_otro_sistema_resp,
								  otro_sistema_resp.comentario_otro_sistema_resp,
								  historial.id_hist
								FROM
								  listado_otro_sistema_resp
								  INNER JOIN otro_sistema_resp ON listado_otro_sistema_resp.id_list_otro_sistema_resp =
									otro_sistema_resp.id_list_otro_sistema_resp
								  INNER JOIN historial ON historial.id_hist = otro_sistema_resp.id_hist WHERE  historial.id_hist='$var_histo' AND listado_otro_sistema_resp.id_list_otro_sistema_resp='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_otro_sistema_resp];
									 $lista_linfo1=$row[nom_otro_sistema_resp];
									 $estado1=$row[estado_otro_sistema_resp];
									 $comentario1=$row[comentario_otro_sistema_resp];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_otro_sistema_resp.nom_otro_sistema_resp,
								  otro_sistema_resp.id_list_otro_sistema_resp,
								  otro_sistema_resp.estado_otro_sistema_resp,
								  otro_sistema_resp.comentario_otro_sistema_resp,
								  historial.id_hist
								FROM
								  listado_otro_sistema_resp
								  INNER JOIN otro_sistema_resp ON listado_otro_sistema_resp.id_list_otro_sistema_resp =
									otro_sistema_resp.id_list_otro_sistema_resp
								  INNER JOIN historial ON historial.id_hist = otro_sistema_resp.id_hist WHERE  historial.id_hist='$var_histo' AND listado_otro_sistema_resp.id_list_otro_sistema_resp='4'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_otro_sistema_resp];
									 $lista_linfo1=$row[nom_otro_sistema_resp];
									 $estado1=$row[estado_otro_sistema_resp];
									 $comentario1=$row[comentario_otro_sistema_resp];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/auscult_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
			echo"</table>";
				}	
			}
			break;
/****************************************SISTEMA DIGESTIVO***************************************************************************************/
			case '26':
			if( $busqueda==26)
			{
				if($var_estado_bus==26){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  sistema_digestivo.id_sistema_digestivo,
						  sistema_digestivo.id_list_sistema_digestivo,
						  sistema_digestivo.estado_sistema_digestivo,
						  sistema_digestivo.comentario_sistema_digestivo,
						  listado_sistema_digestivo.id_list_sistema_digestivo AS id_list_sistema_digestivo,
						  listado_sistema_digestivo.nom_list_sistema_digestivo
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN sistema_digestivo ON historial.id_hist = sistema_digestivo.id_hist
						  INNER JOIN listado_sistema_digestivo ON listado_sistema_digestivo.id_list_sistema_digestivo =
							sistema_digestivo.id_list_sistema_digestivo $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_sistema_digestivo];
									 $lista_linfo=$row[nom_list_sistema_digestivo];
									 $estado=$row[estado_sistema_digestivo];
									 $comentario=$row[comentario_sistema_digestivo];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>SISTEMA DIGESTIVO</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th style='width:20px;' colspan='1' bgcolor='#F5F5F5'><b>EXAMENES</b></th>
								<th style='width:5px;'><b>ESTADO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
					
						
						$sql="SELECT
								  listado_sistema_digestivo.nom_list_sistema_digestivo,
								  sistema_digestivo.id_list_sistema_digestivo,
								  sistema_digestivo.estado_sistema_digestivo,
								  sistema_digestivo.comentario_sistema_digestivo,
								  historial.id_hist
								FROM
								  listado_sistema_digestivo
								  INNER JOIN sistema_digestivo ON listado_sistema_digestivo.id_list_sistema_digestivo =
									sistema_digestivo.id_list_sistema_digestivo
								  INNER JOIN historial ON historial.id_hist = sistema_digestivo.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_digestivo.id_list_sistema_digestivo='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sistema_digestivo];
									 $lista_linfo1=$row[nom_list_sistema_digestivo];
									 $estado1=$row[estado_sistema_digestivo];
									 $comentario1=$row[comentario_sistema_digestivo];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_sistema_digestivo.nom_list_sistema_digestivo,
								  sistema_digestivo.id_list_sistema_digestivo,
								  sistema_digestivo.estado_sistema_digestivo,
								  sistema_digestivo.comentario_sistema_digestivo,
								  historial.id_hist
								FROM
								  listado_sistema_digestivo
								  INNER JOIN sistema_digestivo ON listado_sistema_digestivo.id_list_sistema_digestivo =
									sistema_digestivo.id_list_sistema_digestivo
								  INNER JOIN historial ON historial.id_hist = sistema_digestivo.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_digestivo.id_list_sistema_digestivo='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sistema_digestivo];
									 $lista_linfo1=$row[nom_list_sistema_digestivo];
									 $estado1=$row[estado_sistema_digestivo];
									 $comentario1=$row[comentario_sistema_digestivo];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_sistema_digestivo.nom_list_sistema_digestivo,
								  sistema_digestivo.id_list_sistema_digestivo,
								  sistema_digestivo.estado_sistema_digestivo,
								  sistema_digestivo.comentario_sistema_digestivo,
								  historial.id_hist
								FROM
								  listado_sistema_digestivo
								  INNER JOIN sistema_digestivo ON listado_sistema_digestivo.id_list_sistema_digestivo =
									sistema_digestivo.id_list_sistema_digestivo
								  INNER JOIN historial ON historial.id_hist = sistema_digestivo.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_digestivo.id_list_sistema_digestivo='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sistema_digestivo];
									 $lista_linfo1=$row[nom_list_sistema_digestivo];
									 $estado1=$row[estado_sistema_digestivo];
									 $comentario1=$row[comentario_sistema_digestivo];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_sistema_digestivo.nom_list_sistema_digestivo,
								  sistema_digestivo.id_list_sistema_digestivo,
								  sistema_digestivo.estado_sistema_digestivo,
								  sistema_digestivo.comentario_sistema_digestivo,
								  historial.id_hist
								FROM
								  listado_sistema_digestivo
								  INNER JOIN sistema_digestivo ON listado_sistema_digestivo.id_list_sistema_digestivo =
									sistema_digestivo.id_list_sistema_digestivo
								  INNER JOIN historial ON historial.id_hist = sistema_digestivo.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_digestivo.id_list_sistema_digestivo='4'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sistema_digestivo];
									 $lista_linfo1=$row[nom_list_sistema_digestivo];
									 $estado1=$row[estado_sistema_digestivo];
									 $comentario1=$row[comentario_sistema_digestivo];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_sistema_digestivo.nom_list_sistema_digestivo,
								  sistema_digestivo.id_list_sistema_digestivo,
								  sistema_digestivo.estado_sistema_digestivo,
								  sistema_digestivo.comentario_sistema_digestivo,
								  historial.id_hist
								FROM
								  listado_sistema_digestivo
								  INNER JOIN sistema_digestivo ON listado_sistema_digestivo.id_list_sistema_digestivo =
									sistema_digestivo.id_list_sistema_digestivo
								  INNER JOIN historial ON historial.id_hist = sistema_digestivo.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_digestivo.id_list_sistema_digestivo='5'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sistema_digestivo];
									 $lista_linfo1=$row[nom_list_sistema_digestivo];
									 $estado1=$row[estado_sistema_digestivo];
									 $comentario1=$row[comentario_sistema_digestivo];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_sistema_digestivo.nom_list_sistema_digestivo,
								  sistema_digestivo.id_list_sistema_digestivo,
								  sistema_digestivo.estado_sistema_digestivo,
								  sistema_digestivo.comentario_sistema_digestivo,
								  historial.id_hist
								FROM
								  listado_sistema_digestivo
								  INNER JOIN sistema_digestivo ON listado_sistema_digestivo.id_list_sistema_digestivo =
									sistema_digestivo.id_list_sistema_digestivo
								  INNER JOIN historial ON historial.id_hist = sistema_digestivo.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_digestivo.id_list_sistema_digestivo='6'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sistema_digestivo];
									 $lista_linfo1=$row[nom_list_sistema_digestivo];
									 $estado1=$row[estado_sistema_digestivo];
									 $comentario1=$row[comentario_sistema_digestivo];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_sistema_digestivo.nom_list_sistema_digestivo,
								  sistema_digestivo.id_list_sistema_digestivo,
								  sistema_digestivo.estado_sistema_digestivo,
								  sistema_digestivo.comentario_sistema_digestivo,
								  historial.id_hist
								FROM
								  listado_sistema_digestivo
								  INNER JOIN sistema_digestivo ON listado_sistema_digestivo.id_list_sistema_digestivo =
									sistema_digestivo.id_list_sistema_digestivo
								  INNER JOIN historial ON historial.id_hist = sistema_digestivo.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_digestivo.id_list_sistema_digestivo='7'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sistema_digestivo];
									 $lista_linfo1=$row[nom_list_sistema_digestivo];
									 $estado1=$row[estado_sistema_digestivo];
									 $comentario1=$row[comentario_sistema_digestivo];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_sistema_digestivo.nom_list_sistema_digestivo,
								  sistema_digestivo.id_list_sistema_digestivo,
								  sistema_digestivo.estado_sistema_digestivo,
								  sistema_digestivo.comentario_sistema_digestivo,
								  historial.id_hist
								FROM
								  listado_sistema_digestivo
								  INNER JOIN sistema_digestivo ON listado_sistema_digestivo.id_list_sistema_digestivo =
									sistema_digestivo.id_list_sistema_digestivo
								  INNER JOIN historial ON historial.id_hist = sistema_digestivo.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_digestivo.id_list_sistema_digestivo='8'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sistema_digestivo];
									 $lista_linfo1=$row[nom_list_sistema_digestivo];
									 $estado1=$row[estado_sistema_digestivo];
									 $comentario1=$row[comentario_sistema_digestivo];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_sistema_digestivo.nom_list_sistema_digestivo,
								  sistema_digestivo.id_list_sistema_digestivo,
								  sistema_digestivo.estado_sistema_digestivo,
								  sistema_digestivo.comentario_sistema_digestivo,
								  historial.id_hist
								FROM
								  listado_sistema_digestivo
								  INNER JOIN sistema_digestivo ON listado_sistema_digestivo.id_list_sistema_digestivo =
									sistema_digestivo.id_list_sistema_digestivo
								  INNER JOIN historial ON historial.id_hist = sistema_digestivo.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_digestivo.id_list_sistema_digestivo='9'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sistema_digestivo];
									 $lista_linfo1=$row[nom_list_sistema_digestivo];
									 $estado1=$row[estado_sistema_digestivo];
									 $comentario1=$row[comentario_sistema_digestivo];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_sistema_digestivo.nom_list_sistema_digestivo,
								  sistema_digestivo.id_list_sistema_digestivo,
								  sistema_digestivo.estado_sistema_digestivo,
								  sistema_digestivo.comentario_sistema_digestivo,
								  historial.id_hist
								FROM
								  listado_sistema_digestivo
								  INNER JOIN sistema_digestivo ON listado_sistema_digestivo.id_list_sistema_digestivo =
									sistema_digestivo.id_list_sistema_digestivo
								  INNER JOIN historial ON historial.id_hist = sistema_digestivo.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_digestivo.id_list_sistema_digestivo='10'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sistema_digestivo];
									 $lista_linfo1=$row[nom_list_sistema_digestivo];
									 $estado1=$row[estado_sistema_digestivo];
									 $comentario1=$row[comentario_sistema_digestivo];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_sistema_digestivo.nom_list_sistema_digestivo,
								  sistema_digestivo.id_list_sistema_digestivo,
								  sistema_digestivo.estado_sistema_digestivo,
								  sistema_digestivo.comentario_sistema_digestivo,
								  historial.id_hist
								FROM
								  listado_sistema_digestivo
								  INNER JOIN sistema_digestivo ON listado_sistema_digestivo.id_list_sistema_digestivo =
									sistema_digestivo.id_list_sistema_digestivo
								  INNER JOIN historial ON historial.id_hist = sistema_digestivo.id_hist WHERE  historial.id_hist='$var_histo' AND listado_sistema_digestivo.id_list_sistema_digestivo='11'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_sistema_digestivo];
									 $lista_linfo1=$row[nom_list_sistema_digestivo];
									 $estado1=$row[estado_sistema_digestivo];
									 $comentario1=$row[comentario_sistema_digestivo];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/s_d_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
						
			echo"</table>";
				}	
			}
			break;
/****************************************SIGNOS DIGESTIVOS***************************************************************************************/
			case '27':
			if( $busqueda==27)
			{
				if($var_estado_bus==27){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  signo_digestivo.id_signo_digestivo,
						  signo_digestivo.id_list_signo_digestivo,
						  signo_digestivo.estado_signo_digestivo,
						  signo_digestivo.comentario_signo_digestivo,
						  listado_signo_digestivo.id_list_signo_digestivo AS id_list_signo_digestivo,
						  listado_signo_digestivo.nom_list_signo_digestivo
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN signo_digestivo ON historial.id_hist = signo_digestivo.id_hist
						  INNER JOIN listado_signo_digestivo ON listado_signo_digestivo.id_list_signo_digestivo =
							signo_digestivo.id_list_signo_digestivo $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_signo_digestivo];
									 $lista_linfo=$row[nom_list_signo_digestivo];
									 $estado=$row[estado_signo_digestivo];
									 $comentario=$row[comentario_signo_digestivo];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>SIGNOS DIGESTIVOS</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th style='width:20px;' colspan='1' bgcolor='#F5F5F5'><b>EXAMENES</b></th>
								<th style='width:5px;'><b>SI/NO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
					
						
						$sql="SELECT
								  listado_signo_digestivo.nom_list_signo_digestivo,
								  signo_digestivo.id_list_signo_digestivo,
								  signo_digestivo.estado_signo_digestivo,
								  signo_digestivo.comentario_signo_digestivo,
								  historial.id_hist
								FROM
								  listado_signo_digestivo
								  INNER JOIN signo_digestivo ON listado_signo_digestivo.id_list_signo_digestivo =
									signo_digestivo.id_list_signo_digestivo
								  INNER JOIN historial ON historial.id_hist = signo_digestivo.id_hist WHERE  historial.id_hist='$var_histo' AND listado_signo_digestivo.id_list_signo_digestivo='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_signo_digestivo];
									 $lista_linfo1=$row[nom_list_signo_digestivo];
									 $estado1=$row[estado_signo_digestivo];
									 $comentario1=$row[comentario_signo_digestivo];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						
						$sql="SELECT
								  listado_signo_digestivo.nom_list_signo_digestivo,
								  signo_digestivo.id_list_signo_digestivo,
								  signo_digestivo.estado_signo_digestivo,
								  signo_digestivo.comentario_signo_digestivo,
								  historial.id_hist
								FROM
								  listado_signo_digestivo
								  INNER JOIN signo_digestivo ON listado_signo_digestivo.id_list_signo_digestivo =
									signo_digestivo.id_list_signo_digestivo
								  INNER JOIN historial ON historial.id_hist = signo_digestivo.id_hist WHERE  historial.id_hist='$var_histo' AND listado_signo_digestivo.id_list_signo_digestivo='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_signo_digestivo];
									 $lista_linfo1=$row[nom_list_signo_digestivo];
									 $estado1=$row[estado_signo_digestivo];
									 $comentario1=$row[comentario_signo_digestivo];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						
						$sql="SELECT
								  listado_signo_digestivo.nom_list_signo_digestivo,
								  signo_digestivo.id_list_signo_digestivo,
								  signo_digestivo.estado_signo_digestivo,
								  signo_digestivo.comentario_signo_digestivo,
								  historial.id_hist
								FROM
								  listado_signo_digestivo
								  INNER JOIN signo_digestivo ON listado_signo_digestivo.id_list_signo_digestivo =
									signo_digestivo.id_list_signo_digestivo
								  INNER JOIN historial ON historial.id_hist = signo_digestivo.id_hist WHERE  historial.id_hist='$var_histo' AND listado_signo_digestivo.id_list_signo_digestivo='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_signo_digestivo];
									 $lista_linfo1=$row[nom_list_signo_digestivo];
									 $estado1=$row[estado_signo_digestivo];
									 $comentario1=$row[comentario_signo_digestivo];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						
						$sql="SELECT
								  listado_signo_digestivo.nom_list_signo_digestivo,
								  signo_digestivo.id_list_signo_digestivo,
								  signo_digestivo.estado_signo_digestivo,
								  signo_digestivo.comentario_signo_digestivo,
								  historial.id_hist
								FROM
								  listado_signo_digestivo
								  INNER JOIN signo_digestivo ON listado_signo_digestivo.id_list_signo_digestivo =
									signo_digestivo.id_list_signo_digestivo
								  INNER JOIN historial ON historial.id_hist = signo_digestivo.id_hist WHERE  historial.id_hist='$var_histo' AND listado_signo_digestivo.id_list_signo_digestivo='4'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_signo_digestivo];
									 $lista_linfo1=$row[nom_list_signo_digestivo];
									 $estado1=$row[estado_signo_digestivo];
									 $comentario1=$row[comentario_signo_digestivo];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						
						$sql="SELECT
								  listado_signo_digestivo.nom_list_signo_digestivo,
								  signo_digestivo.id_list_signo_digestivo,
								  signo_digestivo.estado_signo_digestivo,
								  signo_digestivo.comentario_signo_digestivo,
								  historial.id_hist
								FROM
								  listado_signo_digestivo
								  INNER JOIN signo_digestivo ON listado_signo_digestivo.id_list_signo_digestivo =
									signo_digestivo.id_list_signo_digestivo
								  INNER JOIN historial ON historial.id_hist = signo_digestivo.id_hist WHERE  historial.id_hist='$var_histo' AND listado_signo_digestivo.id_list_signo_digestivo='5'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_signo_digestivo];
									 $lista_linfo1=$row[nom_list_signo_digestivo];
									 $estado1=$row[estado_signo_digestivo];
									 $comentario1=$row[comentario_signo_digestivo];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						
						$sql="SELECT
								  listado_signo_digestivo.nom_list_signo_digestivo,
								  signo_digestivo.id_list_signo_digestivo,
								  signo_digestivo.estado_signo_digestivo,
								  signo_digestivo.comentario_signo_digestivo,
								  historial.id_hist
								FROM
								  listado_signo_digestivo
								  INNER JOIN signo_digestivo ON listado_signo_digestivo.id_list_signo_digestivo =
									signo_digestivo.id_list_signo_digestivo
								  INNER JOIN historial ON historial.id_hist = signo_digestivo.id_hist WHERE  historial.id_hist='$var_histo' AND listado_signo_digestivo.id_list_signo_digestivo='6'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_signo_digestivo];
									 $lista_linfo1=$row[nom_list_signo_digestivo];
									 $estado1=$row[estado_signo_digestivo];
									 $comentario1=$row[comentario_signo_digestivo];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/sig_d_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
						
			echo"</table>";
				}	
			}
			break;
/****************************************ORGANOS SENTIDOS***************************************************************************************/
			case '28':
			if( $busqueda==28)
			{
				if($var_estado_bus==28){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  organo_sentido.id_otro_organo_sentido,
						  organo_sentido.id_list_organo_sentido,
						  organo_sentido.estado_otro_organo_sentido,
						  organo_sentido.comentario_organo_sentido,
						  listado_organo_sentido.id_list_organo_sentido AS id_list_organo_sentido,
						  listado_organo_sentido.nom_organo_sentido
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN organo_sentido ON historial.id_hist = organo_sentido.id_hist
						  INNER JOIN listado_organo_sentido ON listado_organo_sentido.id_list_organo_sentido =
							organo_sentido.id_list_organo_sentido $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_organo_sentido];
									 $lista_linfo=$row[nom_organo_sentido];
									 $estado=$row[estado_otro_organo_sentido];
									 $comentario=$row[comentario_organo_sentido];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>ORGANOS SENTIDOS</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th style='width:20px;' colspan='1' bgcolor='#F5F5F5'><b>EXAMENES</b></th>
								<th style='width:5px;'><b>SI/NO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>COMENTARIO</b></th>
								
							</tr>";
					
						
						$sql="SELECT
								  listado_organo_sentido.nom_organo_sentido,
								  organo_sentido.id_list_organo_sentido,
								  organo_sentido.estado_otro_organo_sentido,
								  organo_sentido.comentario_organo_sentido,
								  historial.id_hist
								FROM
								  listado_organo_sentido
								  INNER JOIN organo_sentido ON listado_organo_sentido.id_list_organo_sentido =
									organo_sentido.id_list_organo_sentido
								  INNER JOIN historial ON historial.id_hist = organo_sentido.id_hist WHERE  historial.id_hist='$var_histo' AND listado_organo_sentido.id_list_organo_sentido='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_organo_sentido];
									 $lista_linfo1=$row[nom_organo_sentido];
									 $estado1=$row[estado_otro_organo_sentido];
									 $comentario1=$row[comentario_organo_sentido];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_organo_sentido.nom_organo_sentido,
								  organo_sentido.id_list_organo_sentido,
								  organo_sentido.estado_otro_organo_sentido,
								  organo_sentido.comentario_organo_sentido,
								  historial.id_hist
								FROM
								  listado_organo_sentido
								  INNER JOIN organo_sentido ON listado_organo_sentido.id_list_organo_sentido =
									organo_sentido.id_list_organo_sentido
								  INNER JOIN historial ON historial.id_hist = organo_sentido.id_hist WHERE  historial.id_hist='$var_histo' AND listado_organo_sentido.id_list_organo_sentido='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_organo_sentido];
									 $lista_linfo1=$row[nom_organo_sentido];
									 $estado1=$row[estado_otro_organo_sentido];
									 $comentario1=$row[comentario_organo_sentido];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_organo_sentido.nom_organo_sentido,
								  organo_sentido.id_list_organo_sentido,
								  organo_sentido.estado_otro_organo_sentido,
								  organo_sentido.comentario_organo_sentido,
								  historial.id_hist
								FROM
								  listado_organo_sentido
								  INNER JOIN organo_sentido ON listado_organo_sentido.id_list_organo_sentido =
									organo_sentido.id_list_organo_sentido
								  INNER JOIN historial ON historial.id_hist = organo_sentido.id_hist WHERE  historial.id_hist='$var_histo' AND listado_organo_sentido.id_list_organo_sentido='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_organo_sentido];
									 $lista_linfo1=$row[nom_organo_sentido];
									 $estado1=$row[estado_otro_organo_sentido];
									 $comentario1=$row[comentario_organo_sentido];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_organo_sentido.nom_organo_sentido,
								  organo_sentido.id_list_organo_sentido,
								  organo_sentido.estado_otro_organo_sentido,
								  organo_sentido.comentario_organo_sentido,
								  historial.id_hist
								FROM
								  listado_organo_sentido
								  INNER JOIN organo_sentido ON listado_organo_sentido.id_list_organo_sentido =
									organo_sentido.id_list_organo_sentido
								  INNER JOIN historial ON historial.id_hist = organo_sentido.id_hist WHERE  historial.id_hist='$var_histo' AND listado_organo_sentido.id_list_organo_sentido='4'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_organo_sentido];
									 $lista_linfo1=$row[nom_organo_sentido];
									 $estado1=$row[estado_otro_organo_sentido];
									 $comentario1=$row[comentario_organo_sentido];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_organo_sentido.nom_organo_sentido,
								  organo_sentido.id_list_organo_sentido,
								  organo_sentido.estado_otro_organo_sentido,
								  organo_sentido.comentario_organo_sentido,
								  historial.id_hist
								FROM
								  listado_organo_sentido
								  INNER JOIN organo_sentido ON listado_organo_sentido.id_list_organo_sentido =
									organo_sentido.id_list_organo_sentido
								  INNER JOIN historial ON historial.id_hist = organo_sentido.id_hist WHERE  historial.id_hist='$var_histo' AND listado_organo_sentido.id_list_organo_sentido='5'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_organo_sentido];
									 $lista_linfo1=$row[nom_organo_sentido];
									 $estado1=$row[estado_otro_organo_sentido];
									 $comentario1=$row[comentario_organo_sentido];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_organo_sentido.nom_organo_sentido,
								  organo_sentido.id_list_organo_sentido,
								  organo_sentido.estado_otro_organo_sentido,
								  organo_sentido.comentario_organo_sentido,
								  historial.id_hist
								FROM
								  listado_organo_sentido
								  INNER JOIN organo_sentido ON listado_organo_sentido.id_list_organo_sentido =
									organo_sentido.id_list_organo_sentido
								  INNER JOIN historial ON historial.id_hist = organo_sentido.id_hist WHERE  historial.id_hist='$var_histo' AND listado_organo_sentido.id_list_organo_sentido='6'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_organo_sentido];
									 $lista_linfo1=$row[nom_organo_sentido];
									 $estado1=$row[estado_otro_organo_sentido];
									 $comentario1=$row[comentario_organo_sentido];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_organo_sentido.nom_organo_sentido,
								  organo_sentido.id_list_organo_sentido,
								  organo_sentido.estado_otro_organo_sentido,
								  organo_sentido.comentario_organo_sentido,
								  historial.id_hist
								FROM
								  listado_organo_sentido
								  INNER JOIN organo_sentido ON listado_organo_sentido.id_list_organo_sentido =
									organo_sentido.id_list_organo_sentido
								  INNER JOIN historial ON historial.id_hist = organo_sentido.id_hist WHERE  historial.id_hist='$var_histo' AND listado_organo_sentido.id_list_organo_sentido='7'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_organo_sentido];
									 $lista_linfo1=$row[nom_organo_sentido];
									 $estado1=$row[estado_otro_organo_sentido];
									 $comentario1=$row[comentario_organo_sentido];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_organo_sentido.nom_organo_sentido,
								  organo_sentido.id_list_organo_sentido,
								  organo_sentido.estado_otro_organo_sentido,
								  organo_sentido.comentario_organo_sentido,
								  historial.id_hist
								FROM
								  listado_organo_sentido
								  INNER JOIN organo_sentido ON listado_organo_sentido.id_list_organo_sentido =
									organo_sentido.id_list_organo_sentido
								  INNER JOIN historial ON historial.id_hist = organo_sentido.id_hist WHERE  historial.id_hist='$var_histo' AND listado_organo_sentido.id_list_organo_sentido='8'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_organo_sentido];
									 $lista_linfo1=$row[nom_organo_sentido];
									 $estado1=$row[estado_otro_organo_sentido];
									 $comentario1=$row[comentario_organo_sentido];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_organo_sentido.nom_organo_sentido,
								  organo_sentido.id_list_organo_sentido,
								  organo_sentido.estado_otro_organo_sentido,
								  organo_sentido.comentario_organo_sentido,
								  historial.id_hist
								FROM
								  listado_organo_sentido
								  INNER JOIN organo_sentido ON listado_organo_sentido.id_list_organo_sentido =
									organo_sentido.id_list_organo_sentido
								  INNER JOIN historial ON historial.id_hist = organo_sentido.id_hist WHERE  historial.id_hist='$var_histo' AND listado_organo_sentido.id_list_organo_sentido='9'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_organo_sentido];
									 $lista_linfo1=$row[nom_organo_sentido];
									 $estado1=$row[estado_otro_organo_sentido];
									 $comentario1=$row[comentario_organo_sentido];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_organo_sentido.nom_organo_sentido,
								  organo_sentido.id_list_organo_sentido,
								  organo_sentido.estado_otro_organo_sentido,
								  organo_sentido.comentario_organo_sentido,
								  historial.id_hist
								FROM
								  listado_organo_sentido
								  INNER JOIN organo_sentido ON listado_organo_sentido.id_list_organo_sentido =
									organo_sentido.id_list_organo_sentido
								  INNER JOIN historial ON historial.id_hist = organo_sentido.id_hist WHERE  historial.id_hist='$var_histo' AND listado_organo_sentido.id_list_organo_sentido='10'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_organo_sentido];
									 $lista_linfo1=$row[nom_organo_sentido];
									 $estado1=$row[estado_otro_organo_sentido];
									 $comentario1=$row[comentario_organo_sentido];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_organo_sentido.nom_organo_sentido,
								  organo_sentido.id_list_organo_sentido,
								  organo_sentido.estado_otro_organo_sentido,
								  organo_sentido.comentario_organo_sentido,
								  historial.id_hist
								FROM
								  listado_organo_sentido
								  INNER JOIN organo_sentido ON listado_organo_sentido.id_list_organo_sentido =
									organo_sentido.id_list_organo_sentido
								  INNER JOIN historial ON historial.id_hist = organo_sentido.id_hist WHERE  historial.id_hist='$var_histo' AND listado_organo_sentido.id_list_organo_sentido='11'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_organo_sentido];
									 $lista_linfo1=$row[nom_organo_sentido];
									 $estado1=$row[estado_otro_organo_sentido];
									 $comentario1=$row[comentario_organo_sentido];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_organo_sentido.nom_organo_sentido,
								  organo_sentido.id_list_organo_sentido,
								  organo_sentido.estado_otro_organo_sentido,
								  organo_sentido.comentario_organo_sentido,
								  historial.id_hist
								FROM
								  listado_organo_sentido
								  INNER JOIN organo_sentido ON listado_organo_sentido.id_list_organo_sentido =
									organo_sentido.id_list_organo_sentido
								  INNER JOIN historial ON historial.id_hist = organo_sentido.id_hist WHERE  historial.id_hist='$var_histo' AND listado_organo_sentido.id_list_organo_sentido='12'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_organo_sentido];
									 $lista_linfo1=$row[nom_organo_sentido];
									 $estado1=$row[estado_otro_organo_sentido];
									 $comentario1=$row[comentario_organo_sentido];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_organo_sentido.nom_organo_sentido,
								  organo_sentido.id_list_organo_sentido,
								  organo_sentido.estado_otro_organo_sentido,
								  organo_sentido.comentario_organo_sentido,
								  historial.id_hist
								FROM
								  listado_organo_sentido
								  INNER JOIN organo_sentido ON listado_organo_sentido.id_list_organo_sentido =
									organo_sentido.id_list_organo_sentido
								  INNER JOIN historial ON historial.id_hist = organo_sentido.id_hist WHERE  historial.id_hist='$var_histo' AND listado_organo_sentido.id_list_organo_sentido='13'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_organo_sentido];
									 $lista_linfo1=$row[nom_organo_sentido];
									 $estado1=$row[estado_otro_organo_sentido];
									 $comentario1=$row[comentario_organo_sentido];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_organo_sentido.nom_organo_sentido,
								  organo_sentido.id_list_organo_sentido,
								  organo_sentido.estado_otro_organo_sentido,
								  organo_sentido.comentario_organo_sentido,
								  historial.id_hist
								FROM
								  listado_organo_sentido
								  INNER JOIN organo_sentido ON listado_organo_sentido.id_list_organo_sentido =
									organo_sentido.id_list_organo_sentido
								  INNER JOIN historial ON historial.id_hist = organo_sentido.id_hist WHERE  historial.id_hist='$var_histo' AND listado_organo_sentido.id_list_organo_sentido='14'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_organo_sentido];
									 $lista_linfo1=$row[nom_organo_sentido];
									 $estado1=$row[estado_otro_organo_sentido];
									 $comentario1=$row[comentario_organo_sentido];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_organo_sentido.nom_organo_sentido,
								  organo_sentido.id_list_organo_sentido,
								  organo_sentido.estado_otro_organo_sentido,
								  organo_sentido.comentario_organo_sentido,
								  historial.id_hist
								FROM
								  listado_organo_sentido
								  INNER JOIN organo_sentido ON listado_organo_sentido.id_list_organo_sentido =
									organo_sentido.id_list_organo_sentido
								  INNER JOIN historial ON historial.id_hist = organo_sentido.id_hist WHERE  historial.id_hist='$var_histo' AND listado_organo_sentido.id_list_organo_sentido='15'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_organo_sentido];
									 $lista_linfo1=$row[nom_organo_sentido];
									 $estado1=$row[estado_otro_organo_sentido];
									 $comentario1=$row[comentario_organo_sentido];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_organo_sentido.nom_organo_sentido,
								  organo_sentido.id_list_organo_sentido,
								  organo_sentido.estado_otro_organo_sentido,
								  organo_sentido.comentario_organo_sentido,
								  historial.id_hist
								FROM
								  listado_organo_sentido
								  INNER JOIN organo_sentido ON listado_organo_sentido.id_list_organo_sentido =
									organo_sentido.id_list_organo_sentido
								  INNER JOIN historial ON historial.id_hist = organo_sentido.id_hist WHERE  historial.id_hist='$var_histo' AND listado_organo_sentido.id_list_organo_sentido='16'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_organo_sentido];
									 $lista_linfo1=$row[nom_organo_sentido];
									 $estado1=$row[estado_otro_organo_sentido];
									 $comentario1=$row[comentario_organo_sentido];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_organo_sentido.nom_organo_sentido,
								  organo_sentido.id_list_organo_sentido,
								  organo_sentido.estado_otro_organo_sentido,
								  organo_sentido.comentario_organo_sentido,
								  historial.id_hist
								FROM
								  listado_organo_sentido
								  INNER JOIN organo_sentido ON listado_organo_sentido.id_list_organo_sentido =
									organo_sentido.id_list_organo_sentido
								  INNER JOIN historial ON historial.id_hist = organo_sentido.id_hist WHERE  historial.id_hist='$var_histo' AND listado_organo_sentido.id_list_organo_sentido='17'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_organo_sentido];
									 $lista_linfo1=$row[nom_organo_sentido];
									 $estado1=$row[estado_otro_organo_sentido];
									 $comentario1=$row[comentario_organo_sentido];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						$sql="SELECT
								  listado_organo_sentido.nom_organo_sentido,
								  organo_sentido.id_list_organo_sentido,
								  organo_sentido.estado_otro_organo_sentido,
								  organo_sentido.comentario_organo_sentido,
								  historial.id_hist
								FROM
								  listado_organo_sentido
								  INNER JOIN organo_sentido ON listado_organo_sentido.id_list_organo_sentido =
									organo_sentido.id_list_organo_sentido
								  INNER JOIN historial ON historial.id_hist = organo_sentido.id_hist WHERE  historial.id_hist='$var_histo' AND listado_organo_sentido.id_list_organo_sentido='18'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_organo_sentido];
									 $lista_linfo1=$row[nom_organo_sentido];
									 $estado1=$row[estado_otro_organo_sentido];
									 $comentario1=$row[comentario_organo_sentido];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/or_sent_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
			echo"</table>";
				}	
			}
			break;
/****************************************AYUDAS DIAGNOSTICAS***************************************************************************************/
			case '29':
			if( $busqueda==29)
			{
				if($var_estado_bus==29){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  ayuda_diagnostica.id_ayuda_diagnostica,
						  ayuda_diagnostica.id_list_ayuda_diagnostica,
						  ayuda_diagnostica.estado_ayuda_diagnostica,
						  ayuda_diagnostica.interpretacion_ayuda_diagnostica,
						  listado_ayuda_diagnostica.id_list_ayuda_diagnostica AS id_list_ayuda_diagnostica,
						  listado_ayuda_diagnostica.nom_list_ayuda_diagnostica
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac
						  INNER JOIN ayuda_diagnostica ON historial.id_hist = ayuda_diagnostica.id_hist
						  INNER JOIN listado_ayuda_diagnostica ON listado_ayuda_diagnostica.id_list_ayuda_diagnostica =
							ayuda_diagnostica.id_list_ayuda_diagnostica $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[id_list_ayuda_diagnostica];
									 $lista_linfo=$row[nom_list_ayuda_diagnostica];
									 $estado=$row[estado_ayuda_diagnostica];
									 $comentario=$row[interpretacion_ayuda_diagnostica];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th colspan='6'  bgcolor='#F5F5F5'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>ANIMAL:</b></td>
								<td  colspan='5' >$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5'><b>PROPIETARIO:</b></td>
								<td colspan='5' bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							<tr>
								<th colspan='6'  bgcolor='#336666'>AYUDAS DIAGNOSTICAS</th>
							</tr>
								</table>
							<table align='center' class='tabla'>
							<tr>	 
								<th style='width:20px;' colspan='1' bgcolor='#F5F5F5'><b>EXAMENES</b></th>
								<th style='width:5px;'><b>SI/NO</b></td>
								<th colspan='3' bgcolor='#F5F5F5'><b>INTERPRETACION</b></th>
								
							</tr>";
					
						
						$sql="SELECT
								  listado_ayuda_diagnostica.nom_list_ayuda_diagnostica,
								  ayuda_diagnostica.id_list_ayuda_diagnostica,
								  ayuda_diagnostica.estado_ayuda_diagnostica,
								  ayuda_diagnostica.interpretacion_ayuda_diagnostica,
								  historial.id_hist
								FROM
								  listado_ayuda_diagnostica
								  INNER JOIN ayuda_diagnostica ON listado_ayuda_diagnostica.id_list_ayuda_diagnostica =
									ayuda_diagnostica.id_list_ayuda_diagnostica
								  INNER JOIN historial ON historial.id_hist = ayuda_diagnostica.id_hist WHERE  historial.id_hist='$var_histo' AND listado_ayuda_diagnostica.id_list_ayuda_diagnostica='1'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_ayuda_diagnostica];
									 $lista_linfo1=$row[nom_list_ayuda_diagnostica];
									 $estado1=$row[estado_ayuda_diagnostica];
									 $comentario1=$row[interpretacion_ayuda_diagnostica];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						
						$sql="SELECT
								  listado_ayuda_diagnostica.nom_list_ayuda_diagnostica,
								  ayuda_diagnostica.id_list_ayuda_diagnostica,
								  ayuda_diagnostica.estado_ayuda_diagnostica,
								  ayuda_diagnostica.interpretacion_ayuda_diagnostica,
								  historial.id_hist
								FROM
								  listado_ayuda_diagnostica
								  INNER JOIN ayuda_diagnostica ON listado_ayuda_diagnostica.id_list_ayuda_diagnostica =
									ayuda_diagnostica.id_list_ayuda_diagnostica
								  INNER JOIN historial ON historial.id_hist = ayuda_diagnostica.id_hist WHERE  historial.id_hist='$var_histo' AND listado_ayuda_diagnostica.id_list_ayuda_diagnostica='2'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_ayuda_diagnostica];
									 $lista_linfo1=$row[nom_list_ayuda_diagnostica];
									 $estado1=$row[estado_ayuda_diagnostica];
									 $comentario1=$row[interpretacion_ayuda_diagnostica];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						
						$sql="SELECT
								  listado_ayuda_diagnostica.nom_list_ayuda_diagnostica,
								  ayuda_diagnostica.id_list_ayuda_diagnostica,
								  ayuda_diagnostica.estado_ayuda_diagnostica,
								  ayuda_diagnostica.interpretacion_ayuda_diagnostica,
								  historial.id_hist
								FROM
								  listado_ayuda_diagnostica
								  INNER JOIN ayuda_diagnostica ON listado_ayuda_diagnostica.id_list_ayuda_diagnostica =
									ayuda_diagnostica.id_list_ayuda_diagnostica
								  INNER JOIN historial ON historial.id_hist = ayuda_diagnostica.id_hist WHERE  historial.id_hist='$var_histo' AND listado_ayuda_diagnostica.id_list_ayuda_diagnostica='3'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_ayuda_diagnostica];
									 $lista_linfo1=$row[nom_list_ayuda_diagnostica];
									 $estado1=$row[estado_ayuda_diagnostica];
									 $comentario1=$row[interpretacion_ayuda_diagnostica];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						
						$sql="SELECT
								  listado_ayuda_diagnostica.nom_list_ayuda_diagnostica,
								  ayuda_diagnostica.id_list_ayuda_diagnostica,
								  ayuda_diagnostica.estado_ayuda_diagnostica,
								  ayuda_diagnostica.interpretacion_ayuda_diagnostica,
								  historial.id_hist
								FROM
								  listado_ayuda_diagnostica
								  INNER JOIN ayuda_diagnostica ON listado_ayuda_diagnostica.id_list_ayuda_diagnostica =
									ayuda_diagnostica.id_list_ayuda_diagnostica
								  INNER JOIN historial ON historial.id_hist = ayuda_diagnostica.id_hist WHERE  historial.id_hist='$var_histo' AND listado_ayuda_diagnostica.id_list_ayuda_diagnostica='4'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_ayuda_diagnostica];
									 $lista_linfo1=$row[nom_list_ayuda_diagnostica];
									 $estado1=$row[estado_ayuda_diagnostica];
									 $comentario1=$row[interpretacion_ayuda_diagnostica];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						
						$sql="SELECT
								  listado_ayuda_diagnostica.nom_list_ayuda_diagnostica,
								  ayuda_diagnostica.id_list_ayuda_diagnostica,
								  ayuda_diagnostica.estado_ayuda_diagnostica,
								  ayuda_diagnostica.interpretacion_ayuda_diagnostica,
								  historial.id_hist
								FROM
								  listado_ayuda_diagnostica
								  INNER JOIN ayuda_diagnostica ON listado_ayuda_diagnostica.id_list_ayuda_diagnostica =
									ayuda_diagnostica.id_list_ayuda_diagnostica
								  INNER JOIN historial ON historial.id_hist = ayuda_diagnostica.id_hist WHERE  historial.id_hist='$var_histo' AND listado_ayuda_diagnostica.id_list_ayuda_diagnostica='5'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_ayuda_diagnostica];
									 $lista_linfo1=$row[nom_list_ayuda_diagnostica];
									 $estado1=$row[estado_ayuda_diagnostica];
									 $comentario1=$row[interpretacion_ayuda_diagnostica];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						
						$sql="SELECT
								  listado_ayuda_diagnostica.nom_list_ayuda_diagnostica,
								  ayuda_diagnostica.id_list_ayuda_diagnostica,
								  ayuda_diagnostica.estado_ayuda_diagnostica,
								  ayuda_diagnostica.interpretacion_ayuda_diagnostica,
								  historial.id_hist
								FROM
								  listado_ayuda_diagnostica
								  INNER JOIN ayuda_diagnostica ON listado_ayuda_diagnostica.id_list_ayuda_diagnostica =
									ayuda_diagnostica.id_list_ayuda_diagnostica
								  INNER JOIN historial ON historial.id_hist = ayuda_diagnostica.id_hist WHERE  historial.id_hist='$var_histo' AND listado_ayuda_diagnostica.id_list_ayuda_diagnostica='6'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_ayuda_diagnostica];
									 $lista_linfo1=$row[nom_list_ayuda_diagnostica];
									 $estado1=$row[estado_ayuda_diagnostica];
									 $comentario1=$row[interpretacion_ayuda_diagnostica];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						
						$sql="SELECT
								  listado_ayuda_diagnostica.nom_list_ayuda_diagnostica,
								  ayuda_diagnostica.id_list_ayuda_diagnostica,
								  ayuda_diagnostica.estado_ayuda_diagnostica,
								  ayuda_diagnostica.interpretacion_ayuda_diagnostica,
								  historial.id_hist
								FROM
								  listado_ayuda_diagnostica
								  INNER JOIN ayuda_diagnostica ON listado_ayuda_diagnostica.id_list_ayuda_diagnostica =
									ayuda_diagnostica.id_list_ayuda_diagnostica
								  INNER JOIN historial ON historial.id_hist = ayuda_diagnostica.id_hist WHERE  historial.id_hist='$var_histo' AND listado_ayuda_diagnostica.id_list_ayuda_diagnostica='7'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_ayuda_diagnostica];
									 $lista_linfo1=$row[nom_list_ayuda_diagnostica];
									 $estado1=$row[estado_ayuda_diagnostica];
									 $comentario1=$row[interpretacion_ayuda_diagnostica];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						
						$sql="SELECT
								  listado_ayuda_diagnostica.nom_list_ayuda_diagnostica,
								  ayuda_diagnostica.id_list_ayuda_diagnostica,
								  ayuda_diagnostica.estado_ayuda_diagnostica,
								  ayuda_diagnostica.interpretacion_ayuda_diagnostica,
								  historial.id_hist
								FROM
								  listado_ayuda_diagnostica
								  INNER JOIN ayuda_diagnostica ON listado_ayuda_diagnostica.id_list_ayuda_diagnostica =
									ayuda_diagnostica.id_list_ayuda_diagnostica
								  INNER JOIN historial ON historial.id_hist = ayuda_diagnostica.id_hist WHERE  historial.id_hist='$var_histo' AND listado_ayuda_diagnostica.id_list_ayuda_diagnostica='8'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_ayuda_diagnostica];
									 $lista_linfo1=$row[nom_list_ayuda_diagnostica];
									 $estado1=$row[estado_ayuda_diagnostica];
									 $comentario1=$row[interpretacion_ayuda_diagnostica];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						
						$sql="SELECT
								  listado_ayuda_diagnostica.nom_list_ayuda_diagnostica,
								  ayuda_diagnostica.id_list_ayuda_diagnostica,
								  ayuda_diagnostica.estado_ayuda_diagnostica,
								  ayuda_diagnostica.interpretacion_ayuda_diagnostica,
								  historial.id_hist
								FROM
								  listado_ayuda_diagnostica
								  INNER JOIN ayuda_diagnostica ON listado_ayuda_diagnostica.id_list_ayuda_diagnostica =
									ayuda_diagnostica.id_list_ayuda_diagnostica
								  INNER JOIN historial ON historial.id_hist = ayuda_diagnostica.id_hist WHERE  historial.id_hist='$var_histo' AND listado_ayuda_diagnostica.id_list_ayuda_diagnostica='9'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_ayuda_diagnostica];
									 $lista_linfo1=$row[nom_list_ayuda_diagnostica];
									 $estado1=$row[estado_ayuda_diagnostica];
									 $comentario1=$row[interpretacion_ayuda_diagnostica];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						
						$sql="SELECT
								  listado_ayuda_diagnostica.nom_list_ayuda_diagnostica,
								  ayuda_diagnostica.id_list_ayuda_diagnostica,
								  ayuda_diagnostica.estado_ayuda_diagnostica,
								  ayuda_diagnostica.interpretacion_ayuda_diagnostica,
								  historial.id_hist
								FROM
								  listado_ayuda_diagnostica
								  INNER JOIN ayuda_diagnostica ON listado_ayuda_diagnostica.id_list_ayuda_diagnostica =
									ayuda_diagnostica.id_list_ayuda_diagnostica
								  INNER JOIN historial ON historial.id_hist = ayuda_diagnostica.id_hist WHERE  historial.id_hist='$var_histo' AND listado_ayuda_diagnostica.id_list_ayuda_diagnostica='10'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_ayuda_diagnostica];
									 $lista_linfo1=$row[nom_list_ayuda_diagnostica];
									 $estado1=$row[estado_ayuda_diagnostica];
									 $comentario1=$row[interpretacion_ayuda_diagnostica];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						
						$sql="SELECT
								  listado_ayuda_diagnostica.nom_list_ayuda_diagnostica,
								  ayuda_diagnostica.id_list_ayuda_diagnostica,
								  ayuda_diagnostica.estado_ayuda_diagnostica,
								  ayuda_diagnostica.interpretacion_ayuda_diagnostica,
								  historial.id_hist
								FROM
								  listado_ayuda_diagnostica
								  INNER JOIN ayuda_diagnostica ON listado_ayuda_diagnostica.id_list_ayuda_diagnostica =
									ayuda_diagnostica.id_list_ayuda_diagnostica
								  INNER JOIN historial ON historial.id_hist = ayuda_diagnostica.id_hist WHERE  historial.id_hist='$var_histo' AND listado_ayuda_diagnostica.id_list_ayuda_diagnostica='11'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_ayuda_diagnostica];
									 $lista_linfo1=$row[nom_list_ayuda_diagnostica];
									 $estado1=$row[estado_ayuda_diagnostica];
									 $comentario1=$row[interpretacion_ayuda_diagnostica];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						
						$sql="SELECT
								  listado_ayuda_diagnostica.nom_list_ayuda_diagnostica,
								  ayuda_diagnostica.id_list_ayuda_diagnostica,
								  ayuda_diagnostica.estado_ayuda_diagnostica,
								  ayuda_diagnostica.interpretacion_ayuda_diagnostica,
								  historial.id_hist
								FROM
								  listado_ayuda_diagnostica
								  INNER JOIN ayuda_diagnostica ON listado_ayuda_diagnostica.id_list_ayuda_diagnostica =
									ayuda_diagnostica.id_list_ayuda_diagnostica
								  INNER JOIN historial ON historial.id_hist = ayuda_diagnostica.id_hist WHERE  historial.id_hist='$var_histo' AND listado_ayuda_diagnostica.id_list_ayuda_diagnostica='12'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_ayuda_diagnostica];
									 $lista_linfo1=$row[nom_list_ayuda_diagnostica];
									 $estado1=$row[estado_ayuda_diagnostica];
									 $comentario1=$row[interpretacion_ayuda_diagnostica];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						
						
						$sql="SELECT
								  listado_ayuda_diagnostica.nom_list_ayuda_diagnostica,
								  ayuda_diagnostica.id_list_ayuda_diagnostica,
								  ayuda_diagnostica.estado_ayuda_diagnostica,
								  ayuda_diagnostica.interpretacion_ayuda_diagnostica,
								  historial.id_hist
								FROM
								  listado_ayuda_diagnostica
								  INNER JOIN ayuda_diagnostica ON listado_ayuda_diagnostica.id_list_ayuda_diagnostica =
									ayuda_diagnostica.id_list_ayuda_diagnostica
								  INNER JOIN historial ON historial.id_hist = ayuda_diagnostica.id_hist WHERE  historial.id_hist='$var_histo' AND listado_ayuda_diagnostica.id_list_ayuda_diagnostica='13'";							
						
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res))
								{
									 $id_lista=$row[id_list_ayuda_diagnostica];
									 $lista_linfo1=$row[nom_list_ayuda_diagnostica];
									 $estado1=$row[estado_ayuda_diagnostica];
									 $comentario1=$row[interpretacion_ayuda_diagnostica];
								}
						echo"<tr>	 
								<td colspan='1' bgcolor='#F5F5F5'><b>$lista_linfo1</b></td>
								<td bgcolor='#F5F5F5'>$estado1</td>
								<td bgcolor='#F5F5F5'>$comentario1</td>
							</tr>";
						echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/a_d_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";	
						
						
			echo"</table>";
				}	
			}
			break;
/****************************************DIAGNOSTICOS***************************************************************************************/
			case '30':
			if( $busqueda==30)
			{
				if($var_estado_bus==30){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  historial.pronostico,
						  historial.diagnostico_instaurado,
						  historial.diagnostico_diferencial,
						  historial.diagnostico_presuntivo
						  
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac  $var_sql_01";
										
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[pronostico];
									 $lista_linfo=$row[diagnostico_instaurado];
									 $estado=$row[diagnostico_diferencial];
									 $comentario=$row[diagnostico_presuntivo];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th  bgcolor='#F5F5F5' colspan='2'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5' style='width:5px;'  ><b>ANIMAL:</b></td>
								<td style='width:50px;'>$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5' style='width:10px;' ><b>PROPIETARIO:</b></td>
								<td  bgcolor='#F5F5F5'>$var_nom_propie $var_ape_propie</td>
							</tr>	
							
							
							<tr>	 
								<th  bgcolor='#F5F5F5' style='width:10px;'><b>PRONOSTICO</b></th>
								<td   bgcolor='#F5F5F5'>$id_lista</td>
							</tr>
							<tr>
								<th  bgcolor='#336666' colspan='2'>DIAGNOSTICOS</th>
							</tr>
							<tr>
								
								<th  bgcolor='#F5F5F5' style='width:10px;'><b>INSTAURADO</b></th>
								<td  bgcolor='#F5F5F5'>$lista_linfo</td>
								
							</tr>
							<tr>	 
								<th bgcolor='#F5F5F5' style='width:10px;'><b>DIFERENCIAL</b></th>
								<td  bgcolor='#F5F5F5'>$estado</td>
							</tr>
							<tr>
								
								<th bgcolor='#F5F5F5' style='width:10px;'><b>PRESUNTIVO</b></th>
								<td bgcolor='#F5F5F5'>$comentario</td>
								
							</tr>";
					echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/diagno_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";				
						
			echo"</table>";
				}	
			}
			break;
/**********************************************HOJA DE SEGUIMIENTO**************************************************************/
case '31':
			if( $busqueda==31)
			{
				if($var_estado_bus==31){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,
						  historial.id_pac,
						  historial.id_hist,
						  hoja_seguimiento.id_notas_progreso,
						  hoja_seguimiento.fecha_nota_progreso,
						  hoja_seguimiento.subjetivo_nota_progreso,
						  hoja_seguimiento.objetivo_nota_progreso,
						  hoja_seguimiento.plan_diagnostico_nota_progreso
						  
						FROM
						  animal
						  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
						  INNER JOIN historial ON animal.id_pac = historial.id_pac 
						  INNER JOIN hoja_seguimiento ON historial.id_hist = hoja_seguimiento.id_hist  $var_sql_01";
									
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_nom_propie=$row[nom_usu];
									 $var_ape_propie=$row[apellido1_usu];
									 $id_lista=$row[fecha_nota_progreso];
									 $lista_linfo=$row[subjetivo_nota_progreso];
									 $estado=$row[objetivo_nota_progreso];
									 $comentario=$row[plan_diagnostico_nota_progreso];
								}
				if($var_animal=='')
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO ESTA REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >
							<tr>
								<th  bgcolor='#F5F5F5' colspan='4'>HISTORIAL # $var_histo</th>
							</tr>
							<tr>
								<td bgcolor='#F5F5F5' style='width:5px;'  ><b>ANIMAL:</b></td>
								<td colspan='3'>$var_animal</td>
														
							</tr>
							<tr>
								<td bgcolor='#F5F5F5' style='width:10px;' ><b>PROPIETARIO:</b></td>
								<td  bgcolor='#F5F5F5' colspan='3'>$var_nom_propie $var_ape_propie</td>
						</tr>	
						<tr>	
							<th   rowspan='2' bgcolor='#F5F5F5' style='width:10px;'><b>FECHA DE Y HORA DE REGISTRO</b></th>
									<th bgcolor='#336666' colspan='3'>NOTAS DE PROGRESO</th>							
							</tr>	
						
							<tr>	 
						
								<th  bgcolor='#F5F5F5' style='width:10px;'><b>SUBJETIVO</b></th>
								<th bgcolor='#F5F5F5' style='width:10px;'><b>OBJETIVO</b></th>
								<th bgcolor='#F5F5F5' style='width:10px;'><b>PLAN DE DIAGNOSTICO</b></th>
							</tr>
							
							<tr>
								
								<td   bgcolor='#F5F5F5'>$id_lista</td>
								<td  bgcolor='#F5F5F5'>$lista_linfo</td>
								<td  bgcolor='#F5F5F5'>$estado</td>
								<td bgcolor='#F5F5F5'>$comentario</td>
								
							</tr>";
								
						echo "	<tr>
								<td colspan='6'> 
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/hoja_de_segui_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";		
			echo"</table>";
				}	
			}
			break;
/**********************************************HISTORIAL COMPLETO**************************************************************/
case '32':
			if( $busqueda==32)
			{
				if($var_estado_bus==32){  $var_sql_01=" WHERE animal.id_pac ='$var_dato_bus' AND animal.id_usu='$var_dato_id'"  ; }
				
				$sql="SELECT
						  usuario.nom_usu,
						  usuario.apellido1_usu,
						  animal.nomb_pac,						  
						  animal.fech_regist_anim,						  
						  animal.id_pac,
						  historial.id_hist
						FROM
						  animal 
						   INNER JOIN historial ON animal.id_pac = historial.id_pac 
						INNER JOIN usuario ON usuario.id_usu = animal.id_usu $var_sql_01";
									
					$res=mysql_query($sql);
		
					while($row=mysql_fetch_array($res))
								{
									 $var_histo=$row[id_hist];
									 $var_animal=$row[nomb_pac];
									 $var_id_animal=$row[id_pac];
									 $var_fech=$row[fech_regist_anim];
									
								}
				if(($var_animal=='')&&($var_histo==''))
				{
				echo"<table width='100%' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<th bgcolor='#336666'>
									RESULTADO DE LA BUSQUEDA
								</th>
							</tr>	
							<tr>
								<th colspan='4' bgcolor='#F5F5F5'>
									El ANIMAL QUE DESEA BUSCAR NO EXISTE O NO TIENE UN HISTORIAL REGISTRADO
								</th>
							</tr>";		
					echo "</table>";
				}						
				else 
				{
					echo '<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css" >';
					echo"<table class='tabla' align='center' >";
														
						echo "	<tr>
								<td> <b>Generar PDF para $var_animal con fecha de registro $var_fech </b>
									<form name='form_bus1' id='form_bus1' method='post' action='../PDF/hist_complete/hist_complet_pdf.php'  target=”_blank”>
										<input type='hidden' name='id_pdf' id='id_pdf' SIZE='5%' value='$var_id_animal' >	
										<input type='image' src='../../imagenes/pdf.png' id='btn_pdf' title='Generar PDF de todo el historial' name='btn_pdf' value='Generar pdf'>
									</form>
								</td>
							</tr>";		
			echo"</table>";
				}	
			}
			break;
	}
	
			
	mysql_close($db);
?>