<?php require_once('../etiquetas/etq_animal.php'); ?>
<script>
		$(function() {
			$( "#calendar" ).datepicker({
				dateFormat: "yy-mm-dd",
				constrainInput: true,
				defaultDate: "+1w",
				showOn: "button",
				yearRange: "1950:2015",
				buttonImage: "../../imagenes/calendario1.gif",
				regional: "es",
				buttonImageOnly: true,
				changeMonth: true,
				monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
				dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sabado'],
				dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sab'],
				dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
				weekHeader: 'Sm',
				showButtonPanel: true,
				changeYear: true,
				showOtherMonths: true,
				selectOtherMonths: true,
				autoSize: true,
				onSelect: function( selectedDate ) {
					$( "#fch_fin" ).datepicker( "option", "minDate", selectedDate );
				}
			});
		});
		</script>	
<script type="text/javascript">										
			

			$(document).ready(function() {
			   $("#ventana1").dialog({
					   autoOpen: false,
					   modal: true,
					   closeOnEscape: true,
					   resizable: false
				   });
			});

			function ventana1(strURL, strWidth, strHeigth, strTitle){
			   $("#ventana1").html('<iframe id="popup1" width="100%" height="100%"  marginWidth="0" marginHeight="0" frameBorder="0" scrolling="auto" />').dialog("open");
			   $("#popup1").attr("src", strURL);
			   $( "#ventana1" ).dialog({ width: strWidth });
			   $( "#ventana1" ).dialog({ height: strHeigth });
			   $( "#ventana1" ).dialog({ title: strTitle });
			   $( "#ventana1" ).dialog( "option", "position", 'center' );
			   $( "#ventana1" ).dialog( "open" )
			}
		</script>			
		<script language="javascript">
		
						function Registrar(register_form,aux)
							{
								register_form.action.value=aux;									
								if(document.register_form.nomb.value=='')
									{
										alert("Falta digitar el NOMBRE DEL ANIMAL");
									}
								if(document.register_form.color.value=='')
									{
										alert("Falta digitar el COLOR DEL ANIMAL");
									}
								if(document.register_form.tama.value=='')
									{
										alert("Falta digitar el TAMAÑO DEL ANIMAL");
									}
								if(document.register_form.especie.value=='')
									{
										alert("Falta seleccionar ESPECIE DEL ANIMAL");
									}
									
								else
									{								
										register_form.submit();
										return true;
									}							
							}
		</script>
	</head>
	<body>	
	<div id="ventana1">
			</div>	
					<div id="register-div">
					<form  name="register_form" method="post" target="operaciones" action="../controlador/ctrl_ing_animal.php">
					<input type="hidden" id="action" name="action" >
							<fieldset id="fiel"><legend id="regis" align="center"><?php echo"$etq_regi_ani" ?></legend> 
							<input type="hidden" name="id" id="id" />  
					<label>
								<?php echo "$etq_nom" ?><br />
							
							<input type="text" name="nomb" id="nomb" title="<?php echo "$title_ani" ?>"/>  
						<span></span>
					</label> 
					<label>
						<?php echo "$etq_color" ?><br />
						<input type="text" name="color" id="color" title="<?php echo "$title_color"?>"/>
						<span></span>
					</label>
						<label>
						<?php echo "$etq_tama" ?><br />
						<input type="text" name="tama" id="tama" title="<?php echo "$title_tama"?>"/>
						<span></span>
					</label>
					</label>
						<label>
						<?php echo "$etq_peso" ?><br />
						<input type="text" name="peso" id="peso" title="<?php echo "$title_peso" ?>"/>
						<span></span>
					</label>
					<label>
						<?php echo "$etq_fecha" ?><br />
						<input type="text" name="calendar" id="calendar" size="9%" title="<?php echo "$title_fecha" ?>" readonly />
						<span></span>
					</label>
					<label>
							<?php echo "$etq_gen"?>
							<br>
								<select type="text" NAME="genero" title="<?php echo "$title_genero" ?>">
									<option value="0"><?php echo "$etq_seleccione" ?></option>
									<option value="1">MACHO</option>
									<option value="2">HEMBRA</option>
									
								</select>	
								</label>
								<label>
							<?php echo "$etq_espec" ?>
							<br>
								<select type="text" NAME="especie" title="<?php echo "$title_espe" ?>">
									<option value="0"><?php echo "$etq_seleccione" ?></option>
										<?php
											$query=" select id_esp, nom_esp from especie ";
												$res=mysql_query($query);
												while($row=mysql_fetch_array($res))
													{
													echo "<option value=".$row[id_esp]." > ".$row[nom_esp]."</option>";
													}
										?>
								</select>	
								</label>
					<label>
							<?php echo "$etq_raza" ?>
							<br>
								<select type="text" NAME="raza">
									<option value="0"><?php echo "$etq_seleccione" ?></option>
										<?php
											$query=" select id_raza, nom_raza from raza ";
												$res=mysql_query($query);
												while($row=mysql_fetch_array($res))
													{
													echo "<option value=".$row[id_raza]." > ".$row[nom_raza]."</option>";
													}
										?>
								</select>	
								</label>
					<label>
							<?php echo "$etq_propie" ?>
							<br>
								<select type="text" NAME="propie">
									<option value="0"><?php echo "$etq_seleccione" ?></option>
										<?php
										$query=" SELECT 
													  usuario.
													  id_usu,
													  nom_usu,
													  apellido1_usu,
													  apellido2_usu,
													  edad_usu,
													  cedula_usu,
													  id_roll,
													  id_profesion_propie,
													  pass_usu ,
													  id_roll
												FROM usuario";
												$res=mysql_query($query);
												while($row=mysql_fetch_array($res))
													{
									echo "<option value=".$row[id_usu]." >".$row[nom_usu]." ".$row[apellido1_usu]."</option>";
													}
										?>
								</select>	
						</label>
						
			<!--<input type="button" onclick="validar(this.form)" value="Grabar usuario" class="boton">
			
				<input type="button" id="btn_regis" name="btn_regis" value="Guardar"  Onclick="Registrar(this.form,'reg')" >
				<input type="button" id="btn_update" name="btn_update" value="Actualizar"  Onclick="Registrar(this.form,'updt')">
				<input type="button" id="btn_dell" name="btn_dell" value="Eliminar"  Onclick="Registrar(this.form,'dell')">
				<input type="button" id="btn_query" name="btn_query" value="Consultar"  Onclick="ventana1('consulta_animal.php', 1000, 400, 'CONSULTAR DATOS DE LA MASCOTA');return false;" >-->
  </fieldset>  
  <iframe name='operaciones' style="display:<?php echo $debug_app; ?>" width='100%' height='200'></iframe>
  </form>
</div>
 <?php
			include('../../pie_de_pagina.php');
			?>

</body>