<?php

	require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
	require_once('../../herramientas/configuracion/connect.php'); // ruta relativa a include/config.php
	$db=conectar();
	session_name($session_name);
	session_start();

	// echo "PASCIENTE: ".$_GET['id_animal']."<br>";

	// echo "$sql";
	// exit;
	$max_id_animal=$_POST['id_animal'];

	$var_fch_registro=date("y:m:d:h:i:s");
	$fch_hist=date("y:m:d");
	
					// $var_nom_pac=$_POST[id_animal];
					// echo "Id animal: $var_nom_pac<br>";
					// $var_color=$_POST[id_usurio animal];
					// echo "Id historial: $var_color<br>";		
					
					
	$sql="INSERT INTO historial(id_pac,fecha_hist,fch_ing_hist) 
				 VALUES($max_id_animal,'$fch_hist','$var_fch_registro')";
	$est=mysql_query($sql);	
	$sql= mysql_query("SELECT * FROM historial ORDER BY id_hist DESC LIMIT 1");
			$max_id=mysql_result($sql,0);
				
		
		
			$var_seleccione=1;
			$est=mysql_query($sql2);
			$sql="INSERT INTO dato_medio_ambien(id_estilo_v, id_hist)
										VALUES($var_seleccione,$max_id)";
				
	$est=mysql_query($sql);	
	
	
	$sql="INSERT INTO constante_fisiologica(id_hist)
										VALUES($max_id)";
			
	$est=mysql_query($sql);
	
	$sql="INSERT INTO patron_distribu(id_hist)
										VALUES($max_id)";
			
	$est=mysql_query($sql);	
				// -------linfonodo----------
	$sql="INSERT INTO linfonodo(id_hist,id_lista_linfonodo)
										VALUES($max_id,'1')";
	$est=mysql_query($sql);
	$sql="INSERT INTO linfonodo(id_hist,id_lista_linfonodo)
										VALUES($max_id,'2')";
	$est=mysql_query($sql);
	$sql="INSERT INTO linfonodo(id_hist,id_lista_linfonodo)
										VALUES($max_id,'3')";
	$est=mysql_query($sql);										
	$sql="INSERT INTO linfonodo(id_hist,id_lista_linfonodo)
										VALUES($max_id,'4')";
	$est=mysql_query($sql);
	
				// ----------inspeccion------------
						
	$sql="INSERT INTO inspeccion(id_hist,id_list_inspecc)
							VALUES($max_id,1)";			
	$est=mysql_query($sql);	
	
	$sql="INSERT INTO inspeccion(id_hist,id_list_inspecc)
							VALUES($max_id,2)";			
	$est=mysql_query($sql);	
	$sql="INSERT INTO inspeccion(id_hist,id_list_inspecc)
							VALUES($max_id,3)";			
	$est=mysql_query($sql);	
	
				// ----------palpacion--------
	$sql="INSERT INTO palpacion(id_hist,id_list_palpac)
									VALUES($max_id,1)";
	$est=mysql_query($sql);															
	
	$sql="INSERT INTO palpacion(id_hist,id_list_palpac)
									VALUES($max_id,2)";
	$est=mysql_query($sql);															
	
	$sql="INSERT INTO palpacion(id_hist,id_list_palpac)
									VALUES($max_id,3)";
	$est=mysql_query($sql);															
	
	$sql="INSERT INTO palpacion(id_hist,id_list_palpac)
									VALUES($max_id,4)";
	$est=mysql_query($sql);															
	
	$sql="INSERT INTO palpacion(id_hist,id_list_palpac)
									VALUES($max_id,5)";
	$est=mysql_query($sql);															
	
	$sql="INSERT INTO palpacion(id_hist,id_list_palpac)
									VALUES($max_id,6)";
	$est=mysql_query($sql);															
	
	$sql="INSERT INTO palpacion(id_hist,id_list_palpac)
									VALUES($max_id,7)";
	$est=mysql_query($sql);		
	
						// -------prueba especifica---------
						
	$sql="INSERT INTO prueba_especifica(id_hist,id_list_prueb_especif)
										VALUES($max_id,1)";
	$est=mysql_query($sql);	
	$sql="INSERT INTO prueba_especifica(id_hist,id_list_prueb_especif)
										VALUES($max_id,2)";
	$est=mysql_query($sql);		
	$sql="INSERT INTO prueba_especifica(id_hist,id_list_prueb_especif)
										VALUES($max_id,3)";
	$est=mysql_query($sql);		

						// -------reaccion postular---------
	$sql="INSERT INTO reaccion_postular(id_hist,id_list_reaccion_pos)
										VALUES($max_id,1)";
	$est=mysql_query($sql);		
	$sql="INSERT INTO reaccion_postular(id_hist,id_list_reaccion_pos)
										VALUES($max_id,2)";
	$est=mysql_query($sql);																	
						// --------par craneal----------

	$sql="INSERT INTO par_craneal(id_hist,id_list_par_craneal)
										VALUES($max_id,1)";
	$est=mysql_query($sql);	
	
	$sql="INSERT INTO par_craneal(id_hist,id_list_par_craneal)
										VALUES($max_id,2)";
	$est=mysql_query($sql);	
	
	$sql="INSERT INTO par_craneal(id_hist,id_list_par_craneal)
										VALUES($max_id,3)";
	$est=mysql_query($sql);	
	
	$sql="INSERT INTO par_craneal(id_hist,id_list_par_craneal)
										VALUES($max_id,4)";
	$est=mysql_query($sql);	
	
	$sql="INSERT INTO par_craneal(id_hist,id_list_par_craneal)
										VALUES($max_id,5)";
	$est=mysql_query($sql);	
	
	$sql="INSERT INTO par_craneal(id_hist,id_list_par_craneal)
										VALUES($max_id,6)";
	$est=mysql_query($sql);	
	
	$sql="INSERT INTO par_craneal(id_hist,id_list_par_craneal)
										VALUES($max_id,7)";
	$est=mysql_query($sql);	
	
	$sql="INSERT INTO par_craneal(id_hist,id_list_par_craneal)
										VALUES($max_id,8)";
	$est=mysql_query($sql);	
	
	$sql="INSERT INTO par_craneal(id_hist,id_list_par_craneal)
										VALUES($max_id,9)";
	$est=mysql_query($sql);	
	
	$sql="INSERT INTO par_craneal(id_hist,id_list_par_craneal)
										VALUES($max_id,10)";
	$est=mysql_query($sql);	
	
	$sql="INSERT INTO par_craneal(id_hist,id_list_par_craneal)
										VALUES($max_id,11)";
	$est=mysql_query($sql);	
	
	$sql="INSERT INTO par_craneal(id_hist,id_list_par_craneal)
										VALUES($max_id,12)";
	$est=mysql_query($sql);	
	
	// -------------reflejo postural--------------
	
	$sql="INSERT INTO reflejo_postural(id_hist,id_list_ref_postural)
										VALUES($max_id,1)";
	$est=mysql_query($sql);	
	$sql="INSERT INTO reflejo_postural(id_hist,id_list_ref_postural)
										VALUES($max_id,2)";
	$est=mysql_query($sql);	
	$sql="INSERT INTO reflejo_postural(id_hist,id_list_ref_postural)
										VALUES($max_id,3)";
	$est=mysql_query($sql);	
	$sql="INSERT INTO reflejo_postural(id_hist,id_list_ref_postural)
										VALUES($max_id,4)";
	$est=mysql_query($sql);	
	$sql="INSERT INTO reflejo_postural(id_hist,id_list_ref_postural)
										VALUES($max_id,5)";
	$est=mysql_query($sql);	
	$sql="INSERT INTO reflejo_postural(id_hist,id_list_ref_postural)
										VALUES($max_id,6)";
	$est=mysql_query($sql);	
	// ---------------------- sistema genital-----------------------
	
	$sql="INSERT INTO sistema_genital(id_hist,id_list_sistema_genital_macho,id_list_sistema_genital_hembra)
										VALUES($max_id,1,1)";
	$est=mysql_query($sql);
	$sql="INSERT INTO sistema_genital(id_hist,id_list_sistema_genital_macho,id_list_sistema_genital_hembra)
										VALUES($max_id,2,2)";
	$est=mysql_query($sql);
	$sql="INSERT INTO sistema_genital(id_hist,id_list_sistema_genital_macho,id_list_sistema_genital_hembra)
										VALUES($max_id,3,3)";
	$est=mysql_query($sql);
	$sql="INSERT INTO sistema_genital(id_hist,id_list_sistema_genital_macho,id_list_sistema_genital_hembra)
										VALUES($max_id,4,4)";
	$est=mysql_query($sql);
	$sql="INSERT INTO sistema_genital(id_hist,id_list_sistema_genital_macho)
										VALUES($max_id,5)";
	$est=mysql_query($sql);
	// ------------------------sistema urinario---------------------
	$sql="INSERT INTO sistema_urinario(id_hist,id_list_sistema_urinario)
								VALUES($max_id,1)";
	$est=mysql_query($sql);
	$sql="INSERT INTO sistema_urinario(id_hist,id_list_sistema_urinario)
								VALUES($max_id,2)";
	$est=mysql_query($sql);							
	$sql="INSERT INTO sistema_urinario(id_hist,id_list_sistema_urinario)
								VALUES($max_id,3)";
	$est=mysql_query($sql);							
	// ------------------------sonido respiratorio-------------------			
	$sql="INSERT INTO sonido_respiratorio(id_hist,id_list_sonido_respiratorio)
										VALUES($max_id,1)";
	$est=mysql_query($sql);										
				
	$sql="INSERT INTO sonido_respiratorio(id_hist,id_list_sonido_respiratorio)
										VALUES($max_id,2)";
	$est=mysql_query($sql);										
				
	$sql="INSERT INTO sonido_respiratorio(id_hist,id_list_sonido_respiratorio)
										VALUES($max_id,3)";
	$est=mysql_query($sql);										
				
	$sql="INSERT INTO sonido_respiratorio(id_hist,id_list_sonido_respiratorio)
										VALUES($max_id,4)";
	$est=mysql_query($sql);										
				
	$sql="INSERT INTO sonido_respiratorio(id_hist,id_list_sonido_respiratorio)
										VALUES($max_id,5)";
	$est=mysql_query($sql);										
				
	$sql="INSERT INTO sonido_respiratorio(id_hist,id_list_sonido_respiratorio)
										VALUES($max_id,6)";
	$est=mysql_query($sql);										
				
	$sql="INSERT INTO sonido_respiratorio(id_hist,id_list_sonido_respiratorio)
										VALUES($max_id,7)";
	$est=mysql_query($sql);										
				
	$sql="INSERT INTO sonido_respiratorio(id_hist,id_list_sonido_respiratorio)
										VALUES($max_id,8)";
	$est=mysql_query($sql);										
				
	$sql="INSERT INTO sonido_respiratorio(id_hist,id_list_sonido_respiratorio)
										VALUES($max_id,9)";
	$est=mysql_query($sql);										
	// ------------------------ caracteristicas de pulso-------------
	$sql="INSERT INTO caracteristica_pulso(id_hist,id_list_caracteristica_pulso)
										VALUES($max_id,1)";
	$est=mysql_query($sql);
	$sql="INSERT INTO caracteristica_pulso(id_hist,id_list_caracteristica_pulso)
										VALUES($max_id,2)";
	$est=mysql_query($sql);
	$sql="INSERT INTO caracteristica_pulso(id_hist,id_list_caracteristica_pulso)
										VALUES($max_id,3)";
	$est=mysql_query($sql);
	$sql="INSERT INTO caracteristica_pulso(id_hist,id_list_caracteristica_pulso)
										VALUES($max_id,4)";
	$est=mysql_query($sql);
	$sql="INSERT INTO caracteristica_pulso(id_hist,id_list_caracteristica_pulso)
										VALUES($max_id,5)";
	$est=mysql_query($sql);
	
	// -----------------------auscultacion---------------------------------
	$sql="INSERT INTO auscultacion(id_hist,id_list_auscultacion)
										VALUES($max_id,1)";
	$est=mysql_query($sql);
	$sql="INSERT INTO auscultacion(id_hist,id_list_auscultacion)
										VALUES($max_id,2)";
	$est=mysql_query($sql);
	$sql="INSERT INTO auscultacion(id_hist,id_list_auscultacion)
										VALUES($max_id,3)";
	$est=mysql_query($sql);
	$sql="INSERT INTO auscultacion(id_hist,id_list_auscultacion)
										VALUES($max_id,4)";
	$est=mysql_query($sql);
	$sql="INSERT INTO auscultacion(id_hist,id_list_auscultacion)
										VALUES($max_id,5)";
	$est=mysql_query($sql);
	$sql="INSERT INTO auscultacion(id_hist,id_list_auscultacion)
										VALUES($max_id,6)";
	$est=mysql_query($sql);									
	// -----------------otro sistema respiratorio----------------------
	$sql="INSERT INTO otro_sistema_resp(id_hist,id_list_otro_sistema_resp)
										VALUES($max_id,1)";
	$est=mysql_query($sql);									
	$sql="INSERT INTO otro_sistema_resp(id_hist,id_list_otro_sistema_resp)
										VALUES($max_id,2)";
	$est=mysql_query($sql);
	$sql="INSERT INTO otro_sistema_resp(id_hist,id_list_otro_sistema_resp)
										VALUES($max_id,3)";
	$est=mysql_query($sql);
	$sql="INSERT INTO otro_sistema_resp(id_hist,id_list_otro_sistema_resp)
										VALUES($max_id,4)";
	$est=mysql_query($sql);
	// -----------------otro sistema nervioso---------------------------			
				
	$sql="INSERT INTO otro_sist_ner(id_hist,id_list_otro)
										VALUES($max_id,1)";
	$est=mysql_query($sql);			
	$sql="INSERT INTO otro_sist_ner(id_hist,id_list_otro)
										VALUES($max_id,2)";
	$est=mysql_query($sql);			
	$sql="INSERT INTO otro_sist_ner(id_hist,id_list_otro)
										VALUES($max_id,3)";
	$est=mysql_query($sql);			
	$sql="INSERT INTO otro_sist_ner(id_hist,id_list_otro)
										VALUES($max_id,4)";
	$est=mysql_query($sql);			
	$sql="INSERT INTO otro_sist_ner(id_hist,id_list_otro)
										VALUES($max_id,5)";
	$est=mysql_query($sql);			
	$sql="INSERT INTO otro_sist_ner(id_hist,id_list_otro)
										VALUES($max_id,6)";
	$est=mysql_query($sql);			
	$sql="INSERT INTO otro_sist_ner(id_hist,id_list_otro)
										VALUES($max_id,7)";
	$est=mysql_query($sql);			
	$sql="INSERT INTO otro_sist_ner(id_hist,id_list_otro)
										VALUES($max_id,8)";
	$est=mysql_query($sql);			
	// -----------------organo sentido----------------------------------
	$sql="INSERT INTO organo_sentido(id_hist,id_list_organo_sentido)
									VALUES($max_id,1)";
	$est=mysql_query($sql);
	$sql="INSERT INTO organo_sentido(id_hist,id_list_organo_sentido)
									VALUES($max_id,2)";
	$est=mysql_query($sql);
	$sql="INSERT INTO organo_sentido(id_hist,id_list_organo_sentido)
									VALUES($max_id,3)";
	$est=mysql_query($sql);
	$sql="INSERT INTO organo_sentido(id_hist,id_list_organo_sentido)
									VALUES($max_id,4)";
	$est=mysql_query($sql);
	$sql="INSERT INTO organo_sentido(id_hist,id_list_organo_sentido)
									VALUES($max_id,5)";
	$est=mysql_query($sql);
	$sql="INSERT INTO organo_sentido(id_hist,id_list_organo_sentido)
									VALUES($max_id,6)";
	$est=mysql_query($sql);
	$sql="INSERT INTO organo_sentido(id_hist,id_list_organo_sentido)
									VALUES($max_id,7)";
	$est=mysql_query($sql);
	$sql="INSERT INTO organo_sentido(id_hist,id_list_organo_sentido)
									VALUES($max_id,8)";
	$est=mysql_query($sql);
	$sql="INSERT INTO organo_sentido(id_hist,id_list_organo_sentido)
									VALUES($max_id,9)";
	$est=mysql_query($sql);
	$sql="INSERT INTO organo_sentido(id_hist,id_list_organo_sentido)
									VALUES($max_id,10)";
	$est=mysql_query($sql);
	$sql="INSERT INTO organo_sentido(id_hist,id_list_organo_sentido)
									VALUES($max_id,11)";
	$est=mysql_query($sql);
	$sql="INSERT INTO organo_sentido(id_hist,id_list_organo_sentido)
									VALUES($max_id,12)";
	$est=mysql_query($sql);
	$sql="INSERT INTO organo_sentido(id_hist,id_list_organo_sentido)
									VALUES($max_id,13)";
	$est=mysql_query($sql);
	$sql="INSERT INTO organo_sentido(id_hist,id_list_organo_sentido)
									VALUES($max_id,14)";
	$est=mysql_query($sql);
	$sql="INSERT INTO organo_sentido(id_hist,id_list_organo_sentido)
									VALUES($max_id,15)";
	$est=mysql_query($sql);
	$sql="INSERT INTO organo_sentido(id_hist,id_list_organo_sentido)
									VALUES($max_id,16)";
	$est=mysql_query($sql);
	$sql="INSERT INTO organo_sentido(id_hist,id_list_organo_sentido)
									VALUES($max_id,17)";
	$est=mysql_query($sql);
	$sql="INSERT INTO organo_sentido(id_hist,id_list_organo_sentido)
									VALUES($max_id,18)";
	$est=mysql_query($sql);
	// -------------------ayuda diagnostica-------------------------------					
	$sql="INSERT INTO ayuda_diagnostica(id_hist,id_list_ayuda_diagnostica)
										VALUES($max_id,1)";
	$est=mysql_query($sql);
	$sql="INSERT INTO ayuda_diagnostica(id_hist,id_list_ayuda_diagnostica)
										VALUES($max_id,2)";
	$est=mysql_query($sql);
	$sql="INSERT INTO ayuda_diagnostica(id_hist,id_list_ayuda_diagnostica)
										VALUES($max_id,3)";
	$est=mysql_query($sql);
	$sql="INSERT INTO ayuda_diagnostica(id_hist,id_list_ayuda_diagnostica)
										VALUES($max_id,4)";
	$est=mysql_query($sql);
	$sql="INSERT INTO ayuda_diagnostica(id_hist,id_list_ayuda_diagnostica)
										VALUES($max_id,5)";
	$est=mysql_query($sql);
	$sql="INSERT INTO ayuda_diagnostica(id_hist,id_list_ayuda_diagnostica)
										VALUES($max_id,6)";
	$est=mysql_query($sql);
	$sql="INSERT INTO ayuda_diagnostica(id_hist,id_list_ayuda_diagnostica)
										VALUES($max_id,7)";
	$est=mysql_query($sql);
	$sql="INSERT INTO ayuda_diagnostica(id_hist,id_list_ayuda_diagnostica)
										VALUES($max_id,8)";
	$est=mysql_query($sql);
	$sql="INSERT INTO ayuda_diagnostica(id_hist,id_list_ayuda_diagnostica)
										VALUES($max_id,9)";
	$est=mysql_query($sql);
	$sql="INSERT INTO ayuda_diagnostica(id_hist,id_list_ayuda_diagnostica)
										VALUES($max_id,10)";
	$est=mysql_query($sql);
	$sql="INSERT INTO ayuda_diagnostica(id_hist,id_list_ayuda_diagnostica)
										VALUES($max_id,11)";
	$est=mysql_query($sql);
	$sql="INSERT INTO ayuda_diagnostica(id_hist,id_list_ayuda_diagnostica)
										VALUES($max_id,12)";
	$est=mysql_query($sql);
	$sql="INSERT INTO ayuda_diagnostica(id_hist,id_list_ayuda_diagnostica)
										VALUES($max_id,13)";
	$est=mysql_query($sql);
	// -------------------signo digestivo----------------------------------
	$sql="INSERT INTO signo_digestivo(id_hist,id_list_signo_digestivo)
										VALUES($max_id,1)";
	$est=mysql_query($sql);
	$sql="INSERT INTO signo_digestivo(id_hist,id_list_signo_digestivo)
										VALUES($max_id,2)";
	$est=mysql_query($sql);
	$sql="INSERT INTO signo_digestivo(id_hist,id_list_signo_digestivo)
										VALUES($max_id,3)";
	$est=mysql_query($sql);
	$sql="INSERT INTO signo_digestivo(id_hist,id_list_signo_digestivo)
										VALUES($max_id,4)";
	$est=mysql_query($sql);
	$sql="INSERT INTO signo_digestivo(id_hist,id_list_signo_digestivo)
										VALUES($max_id,5)";
	$est=mysql_query($sql);
	$sql="INSERT INTO signo_digestivo(id_hist,id_list_signo_digestivo)
										VALUES($max_id,6)";
	$est=mysql_query($sql);
	
	// ------------------sistema digestivo---------------------------------									
	$sql="INSERT INTO sistema_digestivo(id_hist,id_list_sistema_digestivo)
										VALUES($max_id,1)";
	$est=mysql_query($sql);
	$sql="INSERT INTO sistema_digestivo(id_hist,id_list_sistema_digestivo)
										VALUES($max_id,2)";
	$est=mysql_query($sql);
	$sql="INSERT INTO sistema_digestivo(id_hist,id_list_sistema_digestivo)
										VALUES($max_id,3)";
	$est=mysql_query($sql);
	$sql="INSERT INTO sistema_digestivo(id_hist,id_list_sistema_digestivo)
										VALUES($max_id,4)";
	$est=mysql_query($sql);
	$sql="INSERT INTO sistema_digestivo(id_hist,id_list_sistema_digestivo)
										VALUES($max_id,5)";
	$est=mysql_query($sql);
	$sql="INSERT INTO sistema_digestivo(id_hist,id_list_sistema_digestivo)
										VALUES($max_id,6)";
	$est=mysql_query($sql);
	$sql="INSERT INTO sistema_digestivo(id_hist,id_list_sistema_digestivo)
										VALUES($max_id,7)";
	$est=mysql_query($sql);
	$sql="INSERT INTO sistema_digestivo(id_hist,id_list_sistema_digestivo)
										VALUES($max_id,8)";
	$est=mysql_query($sql);
	$sql="INSERT INTO sistema_digestivo(id_hist,id_list_sistema_digestivo)
										VALUES($max_id,9)";
	$est=mysql_query($sql);
	$sql="INSERT INTO sistema_digestivo(id_hist,id_list_sistema_digestivo)
										VALUES($max_id,10)";
	$est=mysql_query($sql);
	$sql="INSERT INTO sistema_digestivo(id_hist,id_list_sistema_digestivo)
										VALUES($max_id,11)";
	$est=mysql_query($sql);
	
	// ------------------region precordial---------------------------------	
	$sql="INSERT INTO region_precordial(id_hist,id_list_region_precordial)
										VALUES($max_id,1)";
	$est=mysql_query($sql);									
	// ------------------membrana mucosa-----------------------------------
	$sql="INSERT INTO membrana_mucosa(id_hist,id_list_membrana_mucosa)
										VALUES($max_id,1)";
	$est=mysql_query($sql);
	$sql="INSERT INTO membrana_mucosa(id_hist,id_list_membrana_mucosa)
										VALUES($max_id,2)";
	$est=mysql_query($sql);
	$sql="INSERT INTO membrana_mucosa(id_hist,id_list_membrana_mucosa)
										VALUES($max_id,3)";
	$est=mysql_query($sql);
	// -------------------sintoma respiratorio ----------------------------
	
	$sql="INSERT INTO sintoma_respiratorio(id_hist,id_list_sintoma_respiratorio)
										VALUES($max_id,1)";
	$est=mysql_query($sql);
	
	$sql="INSERT INTO sintoma_respiratorio(id_hist,id_list_sintoma_respiratorio)
										VALUES($max_id,2)";
	$est=mysql_query($sql);
	
	$sql="INSERT INTO sintoma_respiratorio(id_hist,id_list_sintoma_respiratorio)
										VALUES($max_id,3)";
	$est=mysql_query($sql);
	
	$sql="INSERT INTO sintoma_respiratorio(id_hist,id_list_sintoma_respiratorio)
										VALUES($max_id,4)";
	$est=mysql_query($sql);
	
	$sql="INSERT INTO sintoma_respiratorio(id_hist,id_list_sintoma_respiratorio)
										VALUES($max_id,5)";
	$est=mysql_query($sql);
	
	$sql="INSERT INTO sintoma_respiratorio(id_hist,id_list_sintoma_respiratorio)
										VALUES($max_id,6)";
	$est=mysql_query($sql);
	
	$sql="INSERT INTO sintoma_respiratorio(id_hist,id_list_sintoma_respiratorio)
										VALUES($max_id,7)";
	$est=mysql_query($sql);
	
	$sql="INSERT INTO sintoma_respiratorio(id_hist,id_list_sintoma_respiratorio)
										VALUES($max_id,8)";
	$est=mysql_query($sql);
	
	$sql="INSERT INTO sintoma_respiratorio(id_hist,id_list_sintoma_respiratorio)
										VALUES($max_id,9)";
	$est=mysql_query($sql);
	
	$sql="INSERT INTO sintoma_respiratorio(id_hist,id_list_sintoma_respiratorio)
										VALUES($max_id,10)";
	$est=mysql_query($sql);
	
	// -------------------patron respiratorio ------------------------------
	$sql="INSERT INTO patron_respiratorio(id_hist,id_list_patron_respiratorio)
										VALUES($max_id,1)";
	$est=mysql_query($sql);
		
	$sql="INSERT INTO patron_respiratorio(id_hist,id_list_patron_respiratorio)
										VALUES($max_id,2)";
	$est=mysql_query($sql);
		
	$sql="INSERT INTO patron_respiratorio(id_hist,id_list_patron_respiratorio)
										VALUES($max_id,3)";
	$est=mysql_query($sql);
		
	$sql="INSERT INTO patron_respiratorio(id_hist,id_list_patron_respiratorio)
										VALUES($max_id,4)";
	$est=mysql_query($sql);
		
	$sql="INSERT INTO patron_respiratorio(id_hist,id_list_patron_respiratorio)
										VALUES($max_id,5)";
	$est=mysql_query($sql);
		
	$sql="INSERT INTO patron_respiratorio(id_hist,id_list_patron_respiratorio)
										VALUES($max_id,6)";
	$est=mysql_query($sql);
		
	$sql="INSERT INTO patron_respiratorio(id_hist,id_list_patron_respiratorio)
										VALUES($max_id,7)";
	$est=mysql_query($sql);
		
	$sql="INSERT INTO patron_respiratorio(id_hist,id_list_patron_respiratorio)
										VALUES($max_id,8)";
	$est=mysql_query($sql);
	// --------------------via aerea-----------------------------------------
	
	$sql="INSERT INTO via_aerea(id_hist,id_list_via_aerea)
										VALUES($max_id,1)";
	$est=mysql_query($sql);
	$sql="INSERT INTO via_aerea(id_hist,id_list_via_aerea)
										VALUES($max_id,2)";
	$est=mysql_query($sql);
	$sql="INSERT INTO via_aerea(id_hist,id_list_via_aerea)
										VALUES($max_id,3)";
	$est=mysql_query($sql);
	$sql="INSERT INTO via_aerea(id_hist,id_list_via_aerea)
										VALUES($max_id,4)";
	$est=mysql_query($sql);
	$sql="INSERT INTO via_aerea(id_hist,id_list_via_aerea)
										VALUES($max_id,5)";
	$est=mysql_query($sql);
	
	// --------------------reflejo espinal---------------------------------
	$sql="INSERT INTO reflejo_espinal(id_hist,id_list_reflejo_espinal)
										VALUES($max_id,1)";
	$est=mysql_query($sql);
	$sql="INSERT INTO reflejo_espinal(id_hist,id_list_reflejo_espinal)
										VALUES($max_id,2)";
	$est=mysql_query($sql);
	$sql="INSERT INTO reflejo_espinal(id_hist,id_list_reflejo_espinal)
										VALUES($max_id,3)";
	$est=mysql_query($sql);
	$sql="INSERT INTO reflejo_espinal(id_hist,id_list_reflejo_espinal)
										VALUES($max_id,4)";
	$est=mysql_query($sql);
	$sql="INSERT INTO reflejo_espinal(id_hist,id_list_reflejo_espinal)
										VALUES($max_id,5)";
	$est=mysql_query($sql);
	$sql="INSERT INTO reflejo_espinal(id_hist,id_list_reflejo_espinal)
										VALUES($max_id,6)";
	$est=mysql_query($sql);
	// --------------------estado mental---------------------------------
	$sql="INSERT INTO estado_mental(id_hist,id_list_estado_mental)
										VALUES($max_id,1)";
	$est=mysql_query($sql);	
	$sql="INSERT INTO estado_mental(id_hist,id_list_estado_mental)
										VALUES($max_id,2)";
	$est=mysql_query($sql);	
	$sql="INSERT INTO estado_mental(id_hist,id_list_estado_mental)
										VALUES($max_id,3)";
	$est=mysql_query($sql);	
	// -------------------lesion----------------------------------------
	$sql="INSERT INTO lesion(id_hist)
								VALUES($max_id)";
	$est=mysql_query($sql);
	// --------------------hoja de seguimiento--------------------------				
	$sql="INSERT INTO hoja_seguimiento(id_hist)
								VALUES($max_id)";		
	$est=mysql_query($sql);
	
	echo "EL HISTORIAL FUE CREADO SATISFACTORIA MENTE<BR>
	POR FAVOR CIERRE ESTA PESTAÑA Y VUELVA A CONSULTAR";
?>
