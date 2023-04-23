<?php
	require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
	require_once('../../herramientas/configuracion/connect.php'); // ruta relativa a include/config.php
	$db=conectar();
	session_name($session_name);
	session_start();

	 $var_usu=$_POST[action];
	 echo "$var_usu <br>";
	 
	switch ($var_usu)
	{
		case 't1':
			$max_id=$_POST[var_hist];
			echo "PASCIENTE: ".$max_id."<br>"; 
			
			$sql="UPDATE historial SET
			motiv_consult_h='".$_POST[motivo]."',
			antecedente_h='".$_POST[antecedente]."'
			WHERE id_hist='$max_id'";
			echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		
			break;	
		case 't2':
				$max_id=$_POST[var_hist];
				echo "PASCIENTE: ".$max_id."<br>"; 
			
			$sql="UPDATE dato_medio_ambien SET
				entorno_datos_medio_amb='".$_POST[entorno]."',
				nutricion_datos_medio_amb='".$_POST[nutricion]."',
				id_estilo_v='".$_POST[estilo_v]."'	
				WHERE id_hist='$max_id'";
				echo "$sql";			
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		
			break;	
		case 't3':
				
			$max_id=$_POST[var_hist];
			echo "PASCIENTE: ".$max_id."<br>"; 	
			
		$sql="UPDATE constante_fisiologica  SET
		
		temperatura_medic='".$_POST[temperatura]."',
		frecuencia_cardiaca='".$_POST[f_cardiaca]."',
		frecuenci_respira='".$_POST[pulso]."',
		pulso='".$_POST[f_respiratoria]."'	
		WHERE id_hist='$max_id'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't4':
			$max_id=$_POST[var_hist];
			echo "PASCIENTE: ".$max_id."<br>"; 
			
			$sql="UPDATE lesion SET
			macula_les='".$_POST[estado1]."',
			papula_les='".$_POST[estado2]."',
			pustula_les='".$_POST[estado3]."',
			habon_les='".$_POST[estado4]."',
			vesicula_les='".$_POST[estado5]."',
			placa_les='".$_POST[estado6]."',
			nodulo_les='".$_POST[estado7]."',
			tumor_les='".$_POST[estado8]."',
			quiste_les='".$_POST[estado9]."',
			comedon_les='".$_POST[estado10]."',
			collarete_epidemico='".$_POST[estado11]."',
			escama='".$_POST[estado12]."',
			costra='".$_POST[estado13]."',
			excoriacion='".$_POST[estado14]."',
			erosion='".$_POST[estado15]."',
			liquenificacion='".$_POST[estado16]."',
			ulcera='".$_POST[estado17]."',
			hiperpigmentacion='".$_POST[estado18]."',
			hipopigmentacion='".$_POST[estado19]."',
			cicatriz='".$_POST[estado20]."'
			WHERE id_hist=$max_id";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;	
		case 't5':
			$max_id=$_POST[var_hist];
			echo "PASCIENTE: ".$max_id."<br>"; 
			
		$sql="UPDATE linfonodo SET
			estado_lin='".$_POST[estado1]."',
			comentario='".$_POST[comentario1]."'
			WHERE id_hist='$max_id' and id_lista_linfonodo='1'";
		$res=mysql_query($sql);
		$sql="UPDATE linfonodo SET
			estado_lin='".$_POST[estado2]."',
			comentario='".$_POST[comentario2]."'
			WHERE id_hist='$max_id' and id_lista_linfonodo='2'";
		$res=mysql_query($sql);
		$sql="UPDATE linfonodo SET
			estado_lin='".$_POST[estado3]."',
			comentario='".$_POST[comentario3]."'
			WHERE id_hist='$max_id' and id_lista_linfonodo='3'";
		$res=mysql_query($sql);
		$sql="UPDATE linfonodo SET
			estado_lin='".$_POST[estado4]."',
			comentario='".$_POST[comentario4]."'
			WHERE id_hist='$max_id' and id_lista_linfonodo='4'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;	
		case 't6':
			$max_id=$_POST[var_hist];
			echo "PASCIENTE: ".$max_id."<br>"; 
			
		$sql="UPDATE inspeccion SET
			estado_inspeccion='".$_POST[estado1]."',
			comentario_inspeccion='".$_POST[comentario1]."'
			WHERE id_hist='$max_id' and id_list_inspecc='1'";
		$res=mysql_query($sql);
		$sql="UPDATE inspeccion SET
			estado_inspeccion='".$_POST[estado2]."',
			comentario_inspeccion='".$_POST[comentario2]."'
			WHERE id_hist='$max_id' and id_list_inspecc='2'";
		$res=mysql_query($sql);
		$sql="UPDATE inspeccion SET
			estado_inspeccion='".$_POST[estado3]."',
			comentario_inspeccion='".$_POST[comentario3]."'
			WHERE id_hist='$max_id' and id_list_inspecc='3'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;	
		case 't7':
			
			$max_id=$_POST[var_hist];
			echo "PASCIENTE: ".$max_id."<br>"; 
			
		$sql="UPDATE palpacion SET
			estado_palpacion='".$_POST[estado1]."',
			comentario_palpa='".$_POST[comentario1]."',
			lado_palpac='".$_POST[lado1]."'
			WHERE id_hist='$max_id' and id_list_palpac='1'";
		$res=mysql_query($sql);
		$sql="UPDATE palpacion SET
			estado_palpacion='".$_POST[estado2]."',
			comentario_palpa='".$_POST[comentario2]."',
			lado_palpac='".$_POST[lado2]."'
			WHERE id_hist='$max_id' and id_list_palpac='2'";
		$res=mysql_query($sql);
		$sql="UPDATE palpacion SET
			estado_palpacion='".$_POST[estado3]."',
			comentario_palpa='".$_POST[comentario3]."',
			lado_palpac='".$_POST[lado3]."'
			WHERE id_hist='$max_id' and id_list_palpac='3'";
		$res=mysql_query($sql);	
		$sql="UPDATE palpacion SET
			estado_palpacion='".$_POST[estado4]."',
			comentario_palpa='".$_POST[comentario4]."',
			lado_palpac='".$_POST[lado4]."'
			WHERE id_hist='$max_id' and id_list_palpac='4'";
		$res=mysql_query($sql);	
		$sql="UPDATE palpacion SET
			estado_palpacion='".$_POST[estado5]."',
			comentario_palpa='".$_POST[comentario5]."',
			lado_palpac='".$_POST[lado5]."'
			WHERE id_hist='$max_id' and id_list_palpac='5'";
		$res=mysql_query($sql);	
		$sql="UPDATE palpacion SET
			estado_palpacion='".$_POST[estado6]."',
			comentario_palpa='".$_POST[comentario6]."',
			lado_palpac='".$_POST[lado6]."'
			WHERE id_hist='$max_id' and id_list_palpac='6'";
		$res=mysql_query($sql);	
		$sql="UPDATE palpacion SET
			estado_palpacion='".$_POST[estado7]."',
			comentario_palpa='".$_POST[comentario7]."',
			lado_palpac='".$_POST[lado7]."'
			WHERE id_hist='$max_id' and id_list_palpac='7'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;	
		case 't8':
			
			$max_id=$_POST[var_hist];
			echo "PASCIENTE: ".$max_id."<br>"; 
			
		$sql="UPDATE prueba_especifica SET
			estado_prueb_especif='".$_POST[estado1]."',
			comentario_prueb_especif='".$_POST[comentario1]."',
			lado_prueb_especif='".$_POST[lado1]."'
			WHERE id_hist='$max_id' and id_list_prueb_especif='1'";
		$res=mysql_query($sql);
		$sql="UPDATE prueba_especifica SET
			estado_prueb_especif='".$_POST[estado2]."',
			comentario_prueb_especif='".$_POST[comentario2]."',
			lado_prueb_especif='".$_POST[lado2]."'
			WHERE id_hist='$max_id' and id_list_prueb_especif='2'";
		$res=mysql_query($sql);
		$sql="UPDATE prueba_especifica SET
			estado_prueb_especif='".$_POST[estado3]."',
			comentario_prueb_especif='".$_POST[comentario3]."',
			lado_prueb_especif='".$_POST[lado3]."'
			WHERE id_hist='$max_id' and id_list_prueb_especif='3'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;	
		case 't9':
			
			$max_id=$_POST[var_hist];
			echo "PASCIENTE: ".$max_id."<br>"; 	
			
		$sql="UPDATE par_craneal  SET
		estado_par_craneal='".$_POST[estado1]."',
		comentario_par_craneal='".$_POST[comentario1]."',
		lado_par_craneal='".$_POST[lado1]."'	
		WHERE id_hist='$max_id' and id_list_par_craneal='1'";
		$res=mysql_query($sql);
		$sql="UPDATE par_craneal  SET
		estado_par_craneal='".$_POST[estado2]."',
		comentario_par_craneal='".$_POST[comentario2]."',
		lado_par_craneal='".$_POST[lado2]."'	
		WHERE id_hist='$max_id' and id_list_par_craneal='2'";
		$res=mysql_query($sql);
		$sql="UPDATE par_craneal  SET
		estado_par_craneal='".$_POST[estado3]."',
		comentario_par_craneal='".$_POST[comentario3]."',
		lado_par_craneal='".$_POST[lado3]."'	
		WHERE id_hist='$max_id' and id_list_par_craneal='3'";
		$res=mysql_query($sql);
		$sql="UPDATE par_craneal  SET
		estado_par_craneal='".$_POST[estado4]."',
		comentario_par_craneal='".$_POST[comentario4]."',
		lado_par_craneal='".$_POST[lado4]."'	
		WHERE id_hist='$max_id' and id_list_par_craneal='4'";
		$res=mysql_query($sql);
		$sql="UPDATE par_craneal  SET
		estado_par_craneal='".$_POST[estado5]."',
		comentario_par_craneal='".$_POST[comentario5]."',
		lado_par_craneal='".$_POST[lado5]."'	
		WHERE id_hist='$max_id' and id_list_par_craneal='5'";
		$res=mysql_query($sql);
		$sql="UPDATE par_craneal  SET
		estado_par_craneal='".$_POST[estado6]."',
		comentario_par_craneal='".$_POST[comentario6]."',
		lado_par_craneal='".$_POST[lado6]."'	
		WHERE id_hist='$max_id' and id_list_par_craneal='6'";
		$res=mysql_query($sql);
		$sql="UPDATE par_craneal  SET
		estado_par_craneal='".$_POST[estado7]."',
		comentario_par_craneal='".$_POST[comentario7]."',
		lado_par_craneal='".$_POST[lado7]."'	
		WHERE id_hist='$max_id' and id_list_par_craneal='7'";
		$res=mysql_query($sql);
		$sql="UPDATE par_craneal  SET
		estado_par_craneal='".$_POST[estado8]."',
		comentario_par_craneal='".$_POST[comentario8]."',
		lado_par_craneal='".$_POST[lado8]."'	
		WHERE id_hist='$max_id' and id_list_par_craneal='8'";
		$res=mysql_query($sql);
		$sql="UPDATE par_craneal  SET
		estado_par_craneal='".$_POST[estado9]."',
		comentario_par_craneal='".$_POST[comentario9]."',
		lado_par_craneal='".$_POST[lado9]."'	
		WHERE id_hist='$max_id' and id_list_par_craneal='9'";
		$res=mysql_query($sql);
		$sql="UPDATE par_craneal  SET
		estado_par_craneal='".$_POST[estado10]."',
		comentario_par_craneal='".$_POST[comentario10]."',
		lado_par_craneal='".$_POST[lado10]."'	
		WHERE id_hist='$max_id' and id_list_par_craneal='10'";
		$res=mysql_query($sql);
		$sql="UPDATE par_craneal  SET
		estado_par_craneal='".$_POST[estado11]."',
		comentario_par_craneal='".$_POST[comentario11]."',
		lado_par_craneal='".$_POST[lado11]."'	
		WHERE id_hist='$max_id' and id_list_par_craneal='11'";
		$res=mysql_query($sql);
		$sql="UPDATE par_craneal  SET
		estado_par_craneal='".$_POST[estado12]."',
		comentario_par_craneal='".$_POST[comentario12]."',
		lado_par_craneal='".$_POST[lado12]."'	
		WHERE id_hist='$max_id' and id_list_par_craneal='12'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't10':
		//----------------reflejo postural---------------------------
				
		$max_id=$_POST[var_hist];
		echo "PASCIENTE: ".$max_id."<br>"; 			
		$sql="UPDATE reflejo_postural  SET
		estado_reflejo_postural='".$_POST[estado1]."',
		comentario_reflejo_postural='".$_POST[comentario1]."',
		lado_reflejo_postural='".$_POST[lado1]."'	
		WHERE id_hist='$max_id' and id_list_ref_postural='1'";
		$res=mysql_query($sql);
		$sql="UPDATE reflejo_postural  SET
		estado_reflejo_postural='".$_POST[estado2]."',
		comentario_reflejo_postural='".$_POST[comentario2]."',
		lado_reflejo_postural='".$_POST[lado2]."'	
		WHERE id_hist='$max_id' and id_list_ref_postural='2'";
		$res=mysql_query($sql);
		$sql="UPDATE reflejo_postural  SET
		estado_reflejo_postural='".$_POST[estado3]."',
		comentario_reflejo_postural='".$_POST[comentario3]."',
		lado_reflejo_postural='".$_POST[lado3]."'	
		WHERE id_hist='$max_id' and id_list_ref_postural='3'";
		$res=mysql_query($sql);
		$sql="UPDATE reflejo_postural  SET
		estado_reflejo_postural='".$_POST[estado4]."',
		comentario_reflejo_postural='".$_POST[comentario4]."',
		lado_reflejo_postural='".$_POST[lado4]."'	
		WHERE id_hist='$max_id' and id_list_ref_postural='4'";
		$res=mysql_query($sql);
		$sql="UPDATE reflejo_postural  SET
		estado_reflejo_postural='".$_POST[estado5]."',
		comentario_reflejo_postural='".$_POST[comentario5]."',
		lado_reflejo_postural='".$_POST[lado5]."'	
		WHERE id_hist='$max_id' and id_list_ref_postural='5'";
		$res=mysql_query($sql);
		$sql="UPDATE reflejo_postural  SET
		estado_reflejo_postural='".$_POST[estado6]."',
		comentario_reflejo_postural='".$_POST[comentario6]."',
		lado_reflejo_postural='".$_POST[lado6]."'	
		WHERE id_hist='$max_id' and id_list_ref_postural='6'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't11':
		//----------------estado mental---------------------------
					
		$max_id=$_POST[var_hist];
		echo "PASCIENTE: ".$max_id."<br>"; 			
		$sql="UPDATE estado_mental  SET
		estado_estado_mental='".$_POST[estado1]."',
		comentario_estado_mental='".$_POST[comentario1]."',
		lado_estado_mental='".$_POST[lado1]."'	
		WHERE id_hist='$max_id' and id_list_estado_mental='1'";
		$res=mysql_query($sql);
		$sql="UPDATE estado_mental  SET
		estado_estado_mental='".$_POST[estado2]."',
		comentario_estado_mental='".$_POST[comentario2]."',
		lado_estado_mental='".$_POST[lado2]."'	
		WHERE id_hist='$max_id' and id_list_estado_mental='2'";
		$res=mysql_query($sql);
		$sql="UPDATE estado_mental  SET
		estado_estado_mental='".$_POST[estado3]."',
		comentario_estado_mental='".$_POST[comentario3]."',
		lado_estado_mental='".$_POST[lado3]."'	
		WHERE id_hist='$max_id' and id_list_estado_mental='3'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't12':
		//----------------REACCION POSTULAR---------------------------	
		$max_id=$_POST[var_hist];
		echo "PASCIENTE: ".$max_id."<br>"; 			
		$sql="UPDATE reaccion_postular  SET
		estado_reac_pos='".$_POST[estado1]."',
		comentario_reac_pos='".$_POST[comentario1]."'
		WHERE id_hist='$max_id' and id_list_reaccion_pos='1'";
		$res=mysql_query($sql);
		$sql="UPDATE reaccion_postular  SET
		estado_reac_pos='".$_POST[estado2]."',
		comentario_reac_pos='".$_POST[comentario2]."'
		WHERE id_hist='$max_id' and id_list_reaccion_pos='2'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't13':
		//----------------REFLEJO ESPINAL---------------------------			
		$max_id=$_POST[var_hist];
		echo "PASCIENTE: ".$max_id."<br>"; 			
		$sql="UPDATE reflejo_espinal  SET
		estado_reflejo_espinal='".$_POST[estado1]."'
		WHERE id_hist='$max_id' and id_list_reflejo_espinal='1'";
		$res=mysql_query($sql);
		$sql="UPDATE reflejo_espinal  SET
		estado_reflejo_espinal='".$_POST[estado2]."'
		WHERE id_hist='$max_id' and id_list_reflejo_espinal='2'";
		$res=mysql_query($sql);
		$sql="UPDATE reflejo_espinal  SET
		estado_reflejo_espinal='".$_POST[estado3]."'
		WHERE id_hist='$max_id' and id_list_reflejo_espinal='3'";
		$res=mysql_query($sql);
		$sql="UPDATE reflejo_espinal  SET
		estado_reflejo_espinal='".$_POST[estado4]."'
		WHERE id_hist='$max_id' and id_list_reflejo_espinal='4'";
		$res=mysql_query($sql);
		$sql="UPDATE reflejo_espinal  SET
		estado_reflejo_espinal='".$_POST[estado5]."'
		WHERE id_hist='$max_id' and id_list_reflejo_espinal='5'";
		$res=mysql_query($sql);
		$sql="UPDATE reflejo_espinal  SET
		estado_reflejo_espinal='".$_POST[estado6]."'
		WHERE id_hist='$max_id' and id_list_reflejo_espinal='6'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't14':
		//----------------OTROS---------------------------
		$max_id=$_POST[var_hist];
		echo "PASCIENTE: ".$max_id."<br>"; 			
		$sql="UPDATE otro_sist_ner  SET
		estado_otro='".$_POST[estado1]."',
		comentario_otro='".$_POST[comentario1]."'
		WHERE id_hist='$max_id' and id_list_otro='1'";
		$res=mysql_query($sql);
		$sql="UPDATE otro_sist_ner  SET
		estado_otro='".$_POST[estado2]."',
		comentario_otro='".$_POST[comentario2]."'
		WHERE id_hist='$max_id' and id_list_otro='2'";
		$res=mysql_query($sql);
		$sql="UPDATE otro_sist_ner  SET
		estado_otro='".$_POST[estado3]."',
		comentario_otro='".$_POST[comentario3]."'
		WHERE id_hist='$max_id' and id_list_otro='3'";
		$res=mysql_query($sql);
		$sql="UPDATE otro_sist_ner  SET
		estado_otro='".$_POST[estado4]."',
		comentario_otro='".$_POST[comentario4]."'
		WHERE id_hist='$max_id' and id_list_otro='4'";
		$res=mysql_query($sql);
		$sql="UPDATE otro_sist_ner  SET
		estado_otro='".$_POST[estado5]."',
		comentario_otro='".$_POST[comentario5]."'
		WHERE id_hist='$max_id' and id_list_otro='5'";
		$res=mysql_query($sql);
		$sql="UPDATE otro_sist_ner  SET
		estado_otro='".$_POST[estado6]."',
		comentario_otro='".$_POST[comentario6]."'
		WHERE id_hist='$max_id' and id_list_otro='6'";
		$res=mysql_query($sql);
		$sql="UPDATE otro_sist_ner  SET
		estado_otro='".$_POST[estado7]."',
		comentario_otro='".$_POST[comentario7]."'
		WHERE id_hist='$max_id' and id_list_otro='7'";
		$res=mysql_query($sql);
		$sql="UPDATE otro_sist_ner  SET
		estado_otro='".$_POST[estado8]."',
		comentario_otro='".$_POST[comentario8]."'
		WHERE id_hist='$max_id' and id_list_otro='8'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't15':
		//----------------sistema genital---------------------------
			$var_genero=$_POST[genero];
			$max_id=$_POST[var_hist];
		echo "PASCIENTE: ".$max_id."<br>";
			if ($var_genero=='M')
			{		
				$sql="UPDATE sistema_genital  SET
				estado_sistema_genital='".$_POST[estado1]."',
				comentario_sistema_genital='".$_POST[comentario1]."'
				WHERE id_hist='$max_id' and id_list_sistema_genital_macho='1'";
				$res=mysql_query($sql);
				$sql="UPDATE sistema_genital  SET
				estado_sistema_genital='".$_POST[estado2]."',
				comentario_sistema_genital='".$_POST[comentario2]."'
				WHERE id_hist='$max_id' and id_list_sistema_genital_macho='2'";
				$res=mysql_query($sql);
				$sql="UPDATE sistema_genital  SET
				estado_sistema_genital='".$_POST[estado3]."',
				comentario_sistema_genital='".$_POST[comentario3]."'
				WHERE id_hist='$max_id' and id_list_sistema_genital_macho='3'";
				$res=mysql_query($sql);
				$sql="UPDATE sistema_genital  SET
				estado_sistema_genital='".$_POST[estado4]."',
				comentario_sistema_genital='".$_POST[comentario4]."'
				WHERE id_hist='$max_id' and id_list_sistema_genital_macho='4'";
				$res=mysql_query($sql);
				$sql="UPDATE sistema_genital  SET
				estado_sistema_genital='".$_POST[estado5]."',
				comentario_sistema_genital='".$_POST[comentario5]."'
				WHERE id_hist='$max_id' and id_list_sistema_genital_macho='5'";
				echo "$sql";
				if($res=mysql_query($sql))
					{
						echo "<script>alert('Se guardo correctamente');</script>";
						echo "<script>parent.parent.limpiar();</script>";
						echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
					}
				else
					{
						echo "<script>alert('Error al guardar');</script>";
					}
			}
		else
			{
				$sql="UPDATE sistema_genital  SET
				estado_sistema_genital='".$_POST[estado1]."',
				comentario_sistema_genital='".$_POST[comentario1]."'
				WHERE id_hist='$max_id' and id_list_sistema_genital_hembra='1'";
				$res=mysql_query($sql);
				$sql="UPDATE sistema_genital  SET
				estado_sistema_genital='".$_POST[estado2]."',
				comentario_sistema_genital='".$_POST[comentario2]."'
				WHERE id_hist='$max_id' and id_list_sistema_genital_hembra='2'";
				$res=mysql_query($sql);
				$sql="UPDATE sistema_genital  SET
				estado_sistema_genital='".$_POST[estado3]."',
				comentario_sistema_genital='".$_POST[comentario3]."'
				WHERE id_hist='$max_id' and id_list_sistema_genital_hembra='3'";
				$res=mysql_query($sql);
				$sql="UPDATE sistema_genital  SET
				estado_sistema_genital='".$_POST[estado4]."',
				comentario_sistema_genital='".$_POST[comentario4]."'
				WHERE id_hist='$max_id' and id_list_sistema_genital_hembra='4'";	
				$res=mysql_query($sql);
				$sql="UPDATE sistema_genital  SET
				estado_sistema_genital='NADA',
				comentario_sistema_genital='NADA'
				WHERE id_hist='$max_id' and id_list_sistema_genital_hembra='5'";
				echo "$sql";
				if($res=mysql_query($sql))
					{
						echo "<script>alert('Se guardo correctamente');</script>";
						echo "<script>parent.parent.limpiar();</script>";
						echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
					}
				else
					{
						echo "<script>alert('Error al guardar');</script>";
					}
					
			}
		break;
		case 't16':
		//----------------SISTEMA URINARIO---------------------------
		$max_id=$_POST[var_hist];
		echo "PASCIENTE: ".$max_id."<br>"; 			
		$sql="UPDATE sistema_urinario  SET
		estado_sistema_urinario='".$_POST[estado1]."',
		comentario_sistema_urinario='".$_POST[comentario1]."'
		WHERE id_hist='$max_id' and id_list_sistema_urinario='1'";
		$res=mysql_query($sql);
		$sql="UPDATE sistema_urinario  SET
		estado_sistema_urinario='".$_POST[estado2]."',
		comentario_sistema_urinario='".$_POST[comentario2]."'
		WHERE id_hist='$max_id' and id_list_sistema_urinario='2'";
		$res=mysql_query($sql);
		$sql="UPDATE sistema_urinario  SET
		estado_sistema_urinario='".$_POST[estado3]."',
		comentario_sistema_urinario='".$_POST[comentario3]."'
		WHERE id_hist='$max_id' and id_list_sistema_urinario='3'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't17':
		//----------------vias aereas---------------------------
		$max_id=$_POST[var_hist];
		echo "PASCIENTE: ".$max_id."<br>"; 			
		$sql="UPDATE via_aerea  SET
		estado_via_aerea='".$_POST[estado1]."',
		lado_via_aerea='".$_POST[lado1]."',
		comentario_via_aerea='".$_POST[comentario1]."'
		WHERE id_hist='$max_id' and id_list_via_aerea='1'";
		$res=mysql_query($sql);
		$sql="UPDATE via_aerea  SET
		estado_via_aerea='".$_POST[estado2]."',
		lado_via_aerea='".$_POST[lado2]."',
		comentario_via_aerea='".$_POST[comentario2]."'
		WHERE id_hist='$max_id' and id_list_via_aerea='2'";
		$res=mysql_query($sql);
		$sql="UPDATE via_aerea  SET
		estado_via_aerea='".$_POST[estado3]."',
		lado_via_aerea='".$_POST[lado3]."',
		comentario_via_aerea='".$_POST[comentario3]."'
		WHERE id_hist='$max_id' and id_list_via_aerea='3'";
		$res=mysql_query($sql);
		$sql="UPDATE via_aerea  SET
		estado_via_aerea='".$_POST[estado4]."',
		lado_via_aerea='".$_POST[lado4]."',
		comentario_via_aerea='".$_POST[comentario4]."'
		WHERE id_hist='$max_id' and id_list_via_aerea='4'";
		$res=mysql_query($sql);
		$sql="UPDATE via_aerea  SET
		estado_via_aerea='".$_POST[estado5]."',
		lado_via_aerea='".$_POST[lado5]."',
		comentario_via_aerea='".$_POST[comentario5]."'
		WHERE id_hist='$max_id' and id_list_via_aerea='5'";
		$res=mysql_query($sql);
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't18':
		//----------------SONIDOS RESPIRATORIOS---------------------------
		$max_id=$_POST[var_hist];
		echo "PASCIENTE: ".$max_id."<br>"; 			
		$sql="UPDATE sonido_respiratorio  SET
		estado_sonido_respiratorio='".$_POST[estado1]."',
		comentario_sonido_respiratorio='".$_POST[comentario1]."',
		lado_sonido_respiratorio='".$_POST[lado1]."'	
		WHERE id_hist='$max_id' and id_list_sonido_respiratorio='1'";
		$res=mysql_query($sql);
		$sql="UPDATE sonido_respiratorio  SET
		estado_sonido_respiratorio='".$_POST[estado2]."',
		comentario_sonido_respiratorio='".$_POST[comentario2]."',
		lado_sonido_respiratorio='".$_POST[lado2]."'	
		WHERE id_hist='$max_id' and id_list_sonido_respiratorio='2'";
		$res=mysql_query($sql);
		$sql="UPDATE sonido_respiratorio  SET
		estado_sonido_respiratorio='".$_POST[estado3]."',
		comentario_sonido_respiratorio='".$_POST[comentario3]."',
		lado_sonido_respiratorio='".$_POST[lado3]."'	
		WHERE id_hist='$max_id' and id_list_sonido_respiratorio='3'";
		$res=mysql_query($sql);
		$sql="UPDATE sonido_respiratorio  SET
		estado_sonido_respiratorio='".$_POST[estado4]."',
		comentario_sonido_respiratorio='".$_POST[comentario4]."',
		lado_sonido_respiratorio='".$_POST[lado4]."'	
		WHERE id_hist='$max_id' and id_list_sonido_respiratorio='4'";
		$res=mysql_query($sql);
		$sql="UPDATE sonido_respiratorio  SET
		estado_sonido_respiratorio='".$_POST[estado5]."',
		comentario_sonido_respiratorio='".$_POST[comentario5]."',
		lado_sonido_respiratorio='".$_POST[lado5]."'	
		WHERE id_hist='$max_id' and id_list_sonido_respiratorio='5'";
		$res=mysql_query($sql);
		$sql="UPDATE sonido_respiratorio  SET
		estado_sonido_respiratorio='".$_POST[estado6]."',
		comentario_sonido_respiratorio='".$_POST[comentario6]."',
		lado_sonido_respiratorio='".$_POST[lado6]."'	
		WHERE id_hist='$max_id' and id_list_sonido_respiratorio='6'";
		$res=mysql_query($sql);
		$sql="UPDATE sonido_respiratorio  SET
		estado_sonido_respiratorio='".$_POST[estado7]."',
		comentario_sonido_respiratorio='".$_POST[comentario7]."',
		lado_sonido_respiratorio='".$_POST[lado7]."'	
		WHERE id_hist='$max_id' and id_list_sonido_respiratorio='7'";
		$res=mysql_query($sql);
		$sql="UPDATE sonido_respiratorio  SET
		estado_sonido_respiratorio='".$_POST[estado8]."',
		comentario_sonido_respiratorio='".$_POST[comentario8]."',
		lado_sonido_respiratorio='".$_POST[lado8]."'	
		WHERE id_hist='$max_id' and id_list_sonido_respiratorio='8'";
		$res=mysql_query($sql);
		$sql="UPDATE sonido_respiratorio  SET
		estado_sonido_respiratorio='".$_POST[estado9]."',
		comentario_sonido_respiratorio='".$_POST[comentario9]."',
		lado_sonido_respiratorio='".$_POST[lado9]."'	
		WHERE id_hist='$max_id' and id_list_sonido_respiratorio='9'";
		$res=mysql_query($sql);
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't19':
		//----------------PATRONES RESPIRATORIOS ---------------------------				
		$max_id=$_POST[var_hist];
		echo "PASCIENTE: ".$max_id."<br>"; 			
		$sql="UPDATE patron_respiratorio  SET
		estado_patron_respiratorio='".$_POST[estado1]."',
		comentario_patron_respiratorio='".$_POST[comentario1]."'	
		WHERE id_hist='$max_id' and id_list_patron_respiratorio='1'";
		$res=mysql_query($sql);
		$sql="UPDATE patron_respiratorio  SET
		estado_patron_respiratorio='".$_POST[estado2]."',
		comentario_patron_respiratorio='".$_POST[comentario2]."'	
		WHERE id_hist='$max_id' and id_list_patron_respiratorio='2'";
		$res=mysql_query($sql);
		$sql="UPDATE patron_respiratorio  SET
		estado_patron_respiratorio='".$_POST[estado3]."',
		comentario_patron_respiratorio='".$_POST[comentario3]."'
		WHERE id_hist='$max_id' and id_list_patron_respiratorio='3'";
		$res=mysql_query($sql);
		$sql="UPDATE patron_respiratorio  SET
		estado_patron_respiratorio='".$_POST[estado4]."',
		comentario_patron_respiratorio='".$_POST[comentario4]."'	
		WHERE id_hist='$max_id' and id_list_patron_respiratorio='4'";
		$res=mysql_query($sql);
		$sql="UPDATE patron_respiratorio  SET
		estado_patron_respiratorio='".$_POST[estado5]."',
		comentario_patron_respiratorio='".$_POST[comentario5]."'	
		WHERE id_hist='$max_id' and id_list_patron_respiratorio='5'";
		$res=mysql_query($sql);
		$sql="UPDATE patron_respiratorio  SET
		estado_patron_respiratorio='".$_POST[estado6]."',
		comentario_patron_respiratorio='".$_POST[comentario6]."'	
		WHERE id_hist='$max_id' and id_list_patron_respiratorio='6'";
		$res=mysql_query($sql);
		$sql="UPDATE patron_respiratorio  SET
		estado_patron_respiratorio='".$_POST[estado7]."',
		comentario_patron_respiratorio='".$_POST[comentario7]."'
		WHERE id_hist='$max_id' and id_list_patron_respiratorio='7'";
		$res=mysql_query($sql);
		$sql="UPDATE patron_respiratorio  SET
		estado_patron_respiratorio='".$_POST[estado8]."',
		comentario_patron_respiratorio='".$_POST[comentario8]."'	
		WHERE id_hist='$max_id' and id_list_patron_respiratorio='8'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't20':
		//----------------PATRONES RESPIRATORIOS ---------------------------				
		$max_id=$_POST[var_hist];
		echo "PASCIENTE: ".$max_id."<br>"; 			
		$sql="UPDATE sintoma_respiratorio  SET
		estado_sintoma_respiratorio='".$_POST[estado1]."',
		comentario_sintoma_respiratorio='".$_POST[comentario1]."'	
		WHERE id_hist='$max_id' and id_list_sintoma_respiratorio='1'";
		$res=mysql_query($sql);
		$sql="UPDATE sintoma_respiratorio  SET
		estado_sintoma_respiratorio='".$_POST[estado2]."',
		comentario_sintoma_respiratorio='".$_POST[comentario2]."'	
		WHERE id_hist='$max_id' and id_list_sintoma_respiratorio='2'";
		$res=mysql_query($sql);
		$sql="UPDATE sintoma_respiratorio  SET
		estado_sintoma_respiratorio='".$_POST[estado3]."',
		comentario_sintoma_respiratorio='".$_POST[comentario3]."'
		WHERE id_hist='$max_id' and id_list_sintoma_respiratorio='3'";
		$res=mysql_query($sql);
		$sql="UPDATE sintoma_respiratorio  SET
		estado_sintoma_respiratorio='".$_POST[estado4]."',
		comentario_sintoma_respiratorio='".$_POST[comentario4]."'	
		WHERE id_hist='$max_id' and id_list_sintoma_respiratorio='4'";
		$res=mysql_query($sql);
		$sql="UPDATE sintoma_respiratorio  SET
		estado_sintoma_respiratorio='".$_POST[estado5]."',
		comentario_sintoma_respiratorio='".$_POST[comentario5]."'	
		WHERE id_hist='$max_id' and id_list_sintoma_respiratorio='5'";
		$res=mysql_query($sql);
		$sql="UPDATE sintoma_respiratorio  SET
		estado_sintoma_respiratorio='".$_POST[estado6]."',
		comentario_sintoma_respiratorio='".$_POST[comentario6]."'	
		WHERE id_hist='$max_id' and id_list_sintoma_respiratorio='6'";
		$res=mysql_query($sql);
		$sql="UPDATE sintoma_respiratorio  SET
		estado_sintoma_respiratorio='".$_POST[estado7]."',
		comentario_sintoma_respiratorio='".$_POST[comentario7]."'
		WHERE id_hist='$max_id' and id_list_sintoma_respiratorio='7'";
		$res=mysql_query($sql);
		$sql="UPDATE sintoma_respiratorio  SET
		estado_sintoma_respiratorio='".$_POST[estado8]."',
		comentario_sintoma_respiratorio='".$_POST[comentario8]."'	
		WHERE id_hist='$max_id' and id_list_sintoma_respiratorio='8'";
		$res=mysql_query($sql);
		$sql="UPDATE sintoma_respiratorio  SET
		estado_sintoma_respiratorio='".$_POST[estado9]."',
		comentario_sintoma_respiratorio='".$_POST[comentario9]."'	
		WHERE id_hist='$max_id' and id_list_sintoma_respiratorio='9'";
		$res=mysql_query($sql);
		$sql="UPDATE sintoma_respiratorio  SET
		estado_sintoma_respiratorio='".$_POST[estado10]."',
		comentario_sintoma_respiratorio='".$_POST[comentario10]."'	
		WHERE id_hist='$max_id' and id_list_sintoma_respiratorio='10'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't21':
		//----------------MENBRANAS MUCOSAS ---------------------------				
		$max_id=$_POST[var_hist];
		echo "PASCIENTE: ".$max_id."<br>"; 			
		$sql="UPDATE membrana_mucosa  SET
		estado_membrana_mucosa='".$_POST[estado1]."',
		comentario_membrana_mucosa='".$_POST[comentario1]."'	
		WHERE id_hist='$max_id' and id_list_membrana_mucosa='1'";
		$res=mysql_query($sql);
		$sql="UPDATE membrana_mucosa  SET
		estado_membrana_mucosa='".$_POST[estado2]."',
		comentario_membrana_mucosa='".$_POST[comentario2]."'	
		WHERE id_hist='$max_id' and id_list_membrana_mucosa='2'";
		$res=mysql_query($sql);
		$sql="UPDATE membrana_mucosa  SET
		estado_membrana_mucosa='".$_POST[estado3]."',
		comentario_membrana_mucosa='".$_POST[comentario3]."'
		WHERE id_hist='$max_id' and id_list_membrana_mucosa='3'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't22':
		//----------------CARACTERISTICAS DE PULSO ---------------------------				
		$max_id=$_POST[var_hist];
		echo "PASCIENTE: ".$max_id."<br>"; 			
		$sql="UPDATE caracteristica_pulso  SET
		estado_caracteristica_pulso='".$_POST[estado1]."',
		comentario_caracteristica_pulso='".$_POST[comentario1]."'	
		WHERE id_hist='$max_id' and id_list_caracteristica_pulso='1'";
		$res=mysql_query($sql);
		$sql="UPDATE caracteristica_pulso  SET
		estado_caracteristica_pulso='".$_POST[estado2]."',
		comentario_caracteristica_pulso='".$_POST[comentario2]."'	
		WHERE id_hist='$max_id' and id_list_caracteristica_pulso='2'";
		$res=mysql_query($sql);
		$sql="UPDATE caracteristica_pulso  SET
		estado_caracteristica_pulso='".$_POST[estado3]."',
		comentario_caracteristica_pulso='".$_POST[comentario3]."'
		WHERE id_hist='$max_id' and id_list_caracteristica_pulso='3'";
		$res=mysql_query($sql);
		$sql="UPDATE caracteristica_pulso  SET
		estado_caracteristica_pulso='".$_POST[estado4]."',
		comentario_caracteristica_pulso='".$_POST[comentario4]."'
		WHERE id_hist='$max_id' and id_list_caracteristica_pulso='4'";
		$res=mysql_query($sql);
		$sql="UPDATE caracteristica_pulso  SET
		estado_caracteristica_pulso='".$_POST[estado5]."',
		comentario_caracteristica_pulso='".$_POST[comentario5]."'
		WHERE id_hist='$max_id' and id_list_caracteristica_pulso='5'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't23':
		//----------------region precordial--------------------------				
		$max_id=$_POST[var_hist];
		echo "PASCIENTE: ".$max_id."<br>"; 			
		$sql="UPDATE region_precordial  SET
		estado_region_precordial='".$_POST[estado1]."',
		comentario_region_precordial='".$_POST[comentario1]."'	
		WHERE id_hist='$max_id' and id_list_region_precordial='1'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't24':
		//----------------AUSCULTACION--------------------------				
		$max_id=$_POST[var_hist];
		echo "PASCIENTE: ".$max_id."<br>"; 			
		$sql="UPDATE auscultacion  SET
		estado_auscultacion='".$_POST[estado1]."',
		comentario_auscultacion='".$_POST[comentario1]."'	
		WHERE id_hist='$max_id' and id_list_auscultacion='1'";
		$res=mysql_query($sql); 			
		$sql="UPDATE auscultacion  SET
		estado_auscultacion='".$_POST[estado2]."',
		comentario_auscultacion='".$_POST[comentario2]."'	
		WHERE id_hist='$max_id' and id_list_auscultacion='2'";
		$res=mysql_query($sql); 			
		$sql="UPDATE auscultacion  SET
		estado_auscultacion='".$_POST[estado3]."',
		comentario_auscultacion='".$_POST[comentario3]."'	
		WHERE id_hist='$max_id' and id_list_auscultacion='3'";
		$res=mysql_query($sql); 			
		$sql="UPDATE auscultacion  SET
		estado_auscultacion='".$_POST[estado4]."',
		comentario_auscultacion='".$_POST[comentario4]."'	
		WHERE id_hist='$max_id' and id_list_auscultacion='4'";
		$res=mysql_query($sql); 			
		$sql="UPDATE auscultacion  SET
		estado_auscultacion='".$_POST[estado5]."',
		comentario_auscultacion='".$_POST[comentario5]."'	
		WHERE id_hist='$max_id' and id_list_auscultacion='5'";
		$res=mysql_query($sql); 			
		$sql="UPDATE auscultacion  SET
		estado_auscultacion='".$_POST[estado6]."',
		comentario_auscultacion='".$_POST[comentario6]."'	
		WHERE id_hist='$max_id' and id_list_auscultacion='6'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't25':
		//----------------OTRO SISTEMA RESPIRATORIO--------------------------				
		$max_id=$_POST[var_hist];
		echo "PASCIENTE: ".$max_id."<br>"; 			
		$sql="UPDATE otro_sistema_resp  SET
		estado_otro_sistema_resp='".$_POST[estado1]."',
		comentario_otro_sistema_resp='".$_POST[comentario1]."'	
		WHERE id_hist='$max_id' and id_list_otro_sistema_resp='1'";
		$res=mysql_query($sql); 			
		$sql="UPDATE otro_sistema_resp  SET
		estado_otro_sistema_resp='".$_POST[estado2]."',
		comentario_otro_sistema_resp='".$_POST[comentario2]."'	
		WHERE id_hist='$max_id' and id_list_otro_sistema_resp='2'";
		$res=mysql_query($sql); 			
		$sql="UPDATE otro_sistema_resp  SET
		estado_otro_sistema_resp='".$_POST[estado3]."',
		comentario_otro_sistema_resp='".$_POST[comentario3]."'	
		WHERE id_hist='$max_id' and id_list_otro_sistema_resp='3'";
		$res=mysql_query($sql); 			
		$sql="UPDATE otro_sistema_resp  SET
		estado_otro_sistema_resp='".$_POST[estado4]."',
		comentario_otro_sistema_resp='".$_POST[comentario4]."'	
		WHERE id_hist='$max_id' and id_list_otro_sistema_resp='4'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't26':
		//----------------SISTEMA DIGESTIVO--------------------------				
		$max_id=$_POST[var_hist];
		echo "PASCIENTE: ".$max_id."<br>"; 			
		$sql="UPDATE sistema_digestivo  SET
		estado_sistema_digestivo='".$_POST[estado1]."',
		comentario_sistema_digestivo='".$_POST[comentario1]."'	
		WHERE id_hist='$max_id' and id_list_sistema_digestivo='1'";
		$res=mysql_query($sql); 			
		$sql="UPDATE sistema_digestivo  SET
		estado_sistema_digestivo='".$_POST[estado2]."',
		comentario_sistema_digestivo='".$_POST[comentario2]."'	
		WHERE id_hist='$max_id' and id_list_sistema_digestivo='2'";
		$res=mysql_query($sql); 			
		$sql="UPDATE sistema_digestivo  SET
		estado_sistema_digestivo='".$_POST[estado3]."',
		comentario_sistema_digestivo='".$_POST[comentario3]."'	
		WHERE id_hist='$max_id' and id_list_sistema_digestivo='3'";
		$res=mysql_query($sql); 			
		$sql="UPDATE sistema_digestivo  SET
		estado_sistema_digestivo='".$_POST[estado4]."',
		comentario_sistema_digestivo='".$_POST[comentario4]."'	
		WHERE id_hist='$max_id' and id_list_sistema_digestivo='4'";
		$res=mysql_query($sql);  			
		$sql="UPDATE sistema_digestivo  SET
		estado_sistema_digestivo='".$_POST[estado5]."',
		comentario_sistema_digestivo='".$_POST[comentario5]."'	
		WHERE id_hist='$max_id' and id_list_sistema_digestivo='5'";
		$res=mysql_query($sql);  			
		$sql="UPDATE sistema_digestivo  SET
		estado_sistema_digestivo='".$_POST[estado6]."',
		comentario_sistema_digestivo='".$_POST[comentario6]."'	
		WHERE id_hist='$max_id' and id_list_sistema_digestivo='6'";
		$res=mysql_query($sql);  			
		$sql="UPDATE sistema_digestivo  SET
		estado_sistema_digestivo='".$_POST[estado7]."',
		comentario_sistema_digestivo='".$_POST[comentario7]."'	
		WHERE id_hist='$max_id' and id_list_sistema_digestivo='7'";
		$res=mysql_query($sql);  			
		$sql="UPDATE sistema_digestivo  SET
		estado_sistema_digestivo='".$_POST[estado8]."',
		comentario_sistema_digestivo='".$_POST[comentario8]."'	
		WHERE id_hist='$max_id' and id_list_sistema_digestivo='8'";
		$res=mysql_query($sql);  			
		$sql="UPDATE sistema_digestivo  SET
		estado_sistema_digestivo='".$_POST[estado9]."',
		comentario_sistema_digestivo='".$_POST[comentario9]."'	
		WHERE id_hist='$max_id' and id_list_sistema_digestivo='9'";
		$res=mysql_query($sql);  			
		$sql="UPDATE sistema_digestivo  SET
		estado_sistema_digestivo='".$_POST[estado10]."',
		comentario_sistema_digestivo='".$_POST[comentario10]."'	
		WHERE id_hist='$max_id' and id_list_sistema_digestivo='10'";
		$res=mysql_query($sql);  			
		$sql="UPDATE sistema_digestivo  SET
		estado_sistema_digestivo='".$_POST[estado11]."',
		comentario_sistema_digestivo='".$_POST[comentario11]."'	
		WHERE id_hist='$max_id' and id_list_sistema_digestivo='11'";	
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't27':
		//----------------SIGNO DIGESTIVO--------------------------				
		$max_id=$_POST[var_hist];
		echo "PASCIENTE: ".$max_id."<br>"; 			
		$sql="UPDATE signo_digestivo  SET
		estado_signo_digestivo='".$_POST[estado1]."',
		comentario_signo_digestivo='".$_POST[comentario1]."'	
		WHERE id_hist='$max_id' and id_list_signo_digestivo='1'";
		$res=mysql_query($sql); 			
		$sql="UPDATE signo_digestivo  SET
		estado_signo_digestivo='".$_POST[estado2]."',
		comentario_signo_digestivo='".$_POST[comentario2]."'	
		WHERE id_hist='$max_id' and id_list_signo_digestivo='2'";
		$res=mysql_query($sql); 			
		$sql="UPDATE signo_digestivo  SET
		estado_signo_digestivo='".$_POST[estado3]."',
		comentario_signo_digestivo='".$_POST[comentario3]."'	
		WHERE id_hist='$max_id' and id_list_signo_digestivo='3'";
		$res=mysql_query($sql); 			
		$sql="UPDATE signo_digestivo  SET
		estado_signo_digestivo='".$_POST[estado4]."',
		comentario_signo_digestivo='".$_POST[comentario4]."'	
		WHERE id_hist='$max_id' and id_list_signo_digestivo='4'";
		$res=mysql_query($sql);  			
		$sql="UPDATE signo_digestivo  SET
		estado_signo_digestivo='".$_POST[estado5]."',
		comentario_signo_digestivo='".$_POST[comentario5]."'	
		WHERE id_hist='$max_id' and id_list_signo_digestivo='5'";
		$res=mysql_query($sql);  			
		$sql="UPDATE signo_digestivo  SET
		estado_signo_digestivo='".$_POST[estado6]."',
		comentario_signo_digestivo='".$_POST[comentario6]."'	
		WHERE id_hist='$max_id' and id_list_signo_digestivo='6'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't28':
		//----------------ORGANOS SENTIDOS--------------------------				
		$max_id=$_POST[var_hist];
		echo "PASCIENTE: ".$max_id."<br>"; 			
		$sql="UPDATE organo_sentido  SET
		estado_otro_organo_sentido='".$_POST[estado1]."',
		comentario_organo_sentido='".$_POST[comentario1]."'	
		WHERE id_hist='$max_id' and id_list_organo_sentido='1'";
		$res=mysql_query($sql); 			
		$sql="UPDATE organo_sentido  SET
		estado_otro_organo_sentido='".$_POST[estado2]."',
		comentario_organo_sentido='".$_POST[comentario2]."'	
		WHERE id_hist='$max_id' and id_list_organo_sentido='2'";
		$res=mysql_query($sql); 			
		$sql="UPDATE organo_sentido  SET
		estado_otro_organo_sentido='".$_POST[estado3]."',
		comentario_organo_sentido='".$_POST[comentario3]."'	
		WHERE id_hist='$max_id' and id_list_organo_sentido='3'";
		$res=mysql_query($sql); 			
		$sql="UPDATE organo_sentido  SET
		estado_otro_organo_sentido='".$_POST[estado4]."',
		comentario_organo_sentido='".$_POST[comentario4]."'	
		WHERE id_hist='$max_id' and id_list_organo_sentido='4'";
		$res=mysql_query($sql);  			
		$sql="UPDATE organo_sentido  SET
		estado_otro_organo_sentido='".$_POST[estado5]."',
		comentario_organo_sentido='".$_POST[comentario5]."'	
		WHERE id_hist='$max_id' and id_list_organo_sentido='5'";
		$res=mysql_query($sql);  			
		$sql="UPDATE organo_sentido  SET
		estado_otro_organo_sentido='".$_POST[estado6]."',
		comentario_organo_sentido='".$_POST[comentario6]."'	
		WHERE id_hist='$max_id' and id_list_organo_sentido='6'";
		$res=mysql_query($sql);    			
		$sql="UPDATE organo_sentido  SET
		estado_otro_organo_sentido='".$_POST[estado7]."',
		comentario_organo_sentido='".$_POST[comentario7]."'	
		WHERE id_hist='$max_id' and id_list_organo_sentido='7'";
		$res=mysql_query($sql);    			
		$sql="UPDATE organo_sentido  SET
		estado_otro_organo_sentido='".$_POST[estado8]."',
		comentario_organo_sentido='".$_POST[comentario8]."'	
		WHERE id_hist='$max_id' and id_list_organo_sentido='8'";
		$res=mysql_query($sql);    			
		$sql="UPDATE organo_sentido  SET
		estado_otro_organo_sentido='".$_POST[estado9]."',
		comentario_organo_sentido='".$_POST[comentario9]."'	
		WHERE id_hist='$max_id' and id_list_organo_sentido='9'";
		$res=mysql_query($sql);    			
		$sql="UPDATE organo_sentido  SET
		estado_otro_organo_sentido='".$_POST[estado10]."',
		comentario_organo_sentido='".$_POST[comentario10]."'	
		WHERE id_hist='$max_id' and id_list_organo_sentido='10'";
		$res=mysql_query($sql);    			
		$sql="UPDATE organo_sentido  SET
		estado_otro_organo_sentido='".$_POST[estado11]."',
		comentario_organo_sentido='".$_POST[comentario11]."'	
		WHERE id_hist='$max_id' and id_list_organo_sentido='11'";
		$res=mysql_query($sql);    			
		$sql="UPDATE organo_sentido  SET
		estado_otro_organo_sentido='".$_POST[estado12]."',
		comentario_organo_sentido='".$_POST[comentario12]."'	
		WHERE id_hist='$max_id' and id_list_organo_sentido='12'";
		$res=mysql_query($sql);    			
		$sql="UPDATE organo_sentido  SET
		estado_otro_organo_sentido='".$_POST[estado13]."',
		comentario_organo_sentido='".$_POST[comentario13]."'	
		WHERE id_hist='$max_id' and id_list_organo_sentido='13'";
		$res=mysql_query($sql);    			
		$sql="UPDATE organo_sentido  SET
		estado_otro_organo_sentido='".$_POST[estado14]."',
		comentario_organo_sentido='".$_POST[comentario14]."'	
		WHERE id_hist='$max_id' and id_list_organo_sentido='14'";
		$res=mysql_query($sql);    			
		$sql="UPDATE organo_sentido  SET
		estado_otro_organo_sentido='".$_POST[estado15]."',
		comentario_organo_sentido='".$_POST[comentario15]."'	
		WHERE id_hist='$max_id' and id_list_organo_sentido='15'";
		$res=mysql_query($sql);    			
		$sql="UPDATE organo_sentido  SET
		estado_otro_organo_sentido='".$_POST[estado16]."',
		comentario_organo_sentido='".$_POST[comentario16]."'	
		WHERE id_hist='$max_id' and id_list_organo_sentido='16'";
		$res=mysql_query($sql);    			
		$sql="UPDATE organo_sentido  SET
		estado_otro_organo_sentido='".$_POST[estado17]."',
		comentario_organo_sentido='".$_POST[comentario17]."'	
		WHERE id_hist='$max_id' and id_list_organo_sentido='17'";
		$res=mysql_query($sql);    			
		$sql="UPDATE organo_sentido  SET
		estado_otro_organo_sentido='".$_POST[estado18]."',
		comentario_organo_sentido='".$_POST[comentario18]."'	
		WHERE id_hist='$max_id' and id_list_organo_sentido='18'"; 
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't29':
		//----------------AYUDAS DIAGNOSTICAS--------------------------				
		$max_id=$_POST[var_hist];
		echo "PASCIENTE: ".$max_id."<br>"; 			
		$sql="UPDATE ayuda_diagnostica  SET
		estado_ayuda_diagnostica='".$_POST[estado1]."',
		interpretacion_ayuda_diagnostica='".$_POST[comentario1]."'	
		WHERE id_hist='$max_id' and id_list_ayuda_diagnostica='1'";
		$res=mysql_query($sql); 			
		$sql="UPDATE ayuda_diagnostica  SET
		estado_ayuda_diagnostica='".$_POST[estado2]."',
		interpretacion_ayuda_diagnostica='".$_POST[comentario2]."'	
		WHERE id_hist='$max_id' and id_list_ayuda_diagnostica='2'";
		$res=mysql_query($sql); 			
		$sql="UPDATE ayuda_diagnostica  SET
		estado_ayuda_diagnostica='".$_POST[estado3]."',
		interpretacion_ayuda_diagnostica='".$_POST[comentario3]."'	
		WHERE id_hist='$max_id' and id_list_ayuda_diagnostica='3'";
		$res=mysql_query($sql); 			
		$sql="UPDATE ayuda_diagnostica  SET
		estado_ayuda_diagnostica='".$_POST[estado4]."',
		interpretacion_ayuda_diagnostica='".$_POST[comentario4]."'	
		WHERE id_hist='$max_id' and id_list_ayuda_diagnostica='4'";
		$res=mysql_query($sql);  			
		$sql="UPDATE ayuda_diagnostica  SET
		estado_ayuda_diagnostica='".$_POST[estado5]."',
		interpretacion_ayuda_diagnostica='".$_POST[comentario5]."'	
		WHERE id_hist='$max_id' and id_list_ayuda_diagnostica='5'";
		$res=mysql_query($sql);  			
		$sql="UPDATE ayuda_diagnostica  SET
		estado_ayuda_diagnostica='".$_POST[estado6]."',
		interpretacion_ayuda_diagnostica='".$_POST[comentario6]."'	
		WHERE id_hist='$max_id' and id_list_ayuda_diagnostica='6'";
		$res=mysql_query($sql);    			
		$sql="UPDATE ayuda_diagnostica  SET
		estado_ayuda_diagnostica='".$_POST[estado7]."',
		interpretacion_ayuda_diagnostica='".$_POST[comentario7]."'	
		WHERE id_hist='$max_id' and id_list_ayuda_diagnostica='7'";
		$res=mysql_query($sql);    			
		$sql="UPDATE ayuda_diagnostica  SET
		estado_ayuda_diagnostica='".$_POST[estado8]."',
		interpretacion_ayuda_diagnostica='".$_POST[comentario8]."'	
		WHERE id_hist='$max_id' and id_list_ayuda_diagnostica='8'";
		$res=mysql_query($sql);    			
		$sql="UPDATE ayuda_diagnostica  SET
		estado_ayuda_diagnostica='".$_POST[estado9]."',
		interpretacion_ayuda_diagnostica='".$_POST[comentario9]."'	
		WHERE id_hist='$max_id' and id_list_ayuda_diagnostica='9'";
		$res=mysql_query($sql);    			
		$sql="UPDATE ayuda_diagnostica  SET
		estado_ayuda_diagnostica='".$_POST[estado10]."',
		interpretacion_ayuda_diagnostica='".$_POST[comentario10]."'	
		WHERE id_hist='$max_id' and id_list_ayuda_diagnostica='10'";
		$res=mysql_query($sql);    			
		$sql="UPDATE ayuda_diagnostica  SET
		estado_ayuda_diagnostica='".$_POST[estado11]."',
		interpretacion_ayuda_diagnostica='".$_POST[comentario11]."'	
		WHERE id_hist='$max_id' and id_list_ayuda_diagnostica='11'";
		$res=mysql_query($sql);    			
		$sql="UPDATE ayuda_diagnostica  SET
		estado_ayuda_diagnostica='".$_POST[estado12]."',
		interpretacion_ayuda_diagnostica='".$_POST[comentario12]."'	
		WHERE id_hist='$max_id' and id_list_ayuda_diagnostica='12'";
		$res=mysql_query($sql);    			
		$sql="UPDATE ayuda_diagnostica  SET
		estado_ayuda_diagnostica='".$_POST[estado13]."',
		interpretacion_ayuda_diagnostica='".$_POST[comentario13]."'	
		WHERE id_hist='$max_id' and id_list_ayuda_diagnostica='13'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		break;
		case 't30':			
			$max_id=$_POST[var_hist];
			echo "PASCIENTE: ".$max_id."<br>"; 
			
			$sql="UPDATE historial SET
			diagnostico_presuntivo='".$_POST[diag_pre]."',
			diagnostico_diferencial='".$_POST[diag_d]."',
			diagnostico_instaurado='".$_POST[trata_inst]."',
			pronostico='".$_POST[Pronostico]."'		
			WHERE id_hist='$max_id'";
			echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		
			break;
		case 't31':
					
			$max_id=$_POST[var_hist];
			echo "PASCIENTE: ".$max_id."<br>"; 
			$var_fch_registro=date("y:m:d:h:i:s");
			
			$sql="UPDATE hoja_seguimiento SET
			fecha_nota_progreso='$var_fch_registro',
			subjetivo_nota_progreso='".$_POST[sub]."',
			objetivo_nota_progreso='".$_POST[obj]."',
			plan_diagnostico_nota_progreso='".$_POST[p_diag]."'
			WHERE id_hist='$max_id'";
			echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
		
			break;
	}
mysql_close($db);
?>