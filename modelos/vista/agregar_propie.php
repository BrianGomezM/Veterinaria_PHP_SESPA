<?php 
	header("Content-Type: text/html; charset=iso-8859-1");
	require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php	
	session_name($session_name);
	session_start();
		if(!$_SESSION[id_roll])
			{
				echo"<script>parent.location.href='$UrlApp'</script>";
				exit;		
			}
		else
			{
				require_once('../../herramientas/configuracion/connect.php');
				require_once('../etiquetas/etq_login.php');
				require_once('../etiquetas/etq_usuario.php');
				$db = conectar();			
			}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		
			<head>
		<script src='../../herramientas/jquery/js/jquery-1.8.2.js' type='text/javascript'></script>
		<script src="../../herramientas/jquery/js/form.js" type="text/javascript"></script>
		<script src='../../herramientas/jquery/js/ui/jquery-ui.custom.js' type='text/javascript'></script>
		<script src='../../herramientas/jquery/js/ui/i18n/jquery.ui.datepicker-es.js' type='text/javascript'></script>



		<title><?php echo "$title_reg_usu"?></title>

			<script src="../../herramientas/jquery/js/jquery-1.6.2.min.js" type="text/javascript"></script>
			<script src="form.js" type="text/javascript"></script>
			<link href="../../css/styles.css" rel="stylesheet" type="text/css">
			<link href="../../css/estilos_tablas.css" rel="stylesheet" type="text/css" >
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link rel='stylesheet' href='../../herramientas/jquery/themes/south-street/jquery.ui.all.css' type='text/css' media='all' />
			<script src='../../herramientas/jquery/js/jquery-1.8.2.js' type='text/javascript'></script>
			<script src='../../herramientas/jquery/js/ui/jquery-ui.custom.js' type='text/javascript'></script>
	<script>
		$(function() {
			$( "#calendar" ).datepicker({
				closeText: 'Cerrar',
				prevText: '&#x3C;Ant',
				nextText: 'Sig&#x3E;',
				currentText: 'Hoy',
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
		<script>
				function Registrar(register_form,aux)
							{
								register_form.action.value=aux;
								if(document.register_form.usu.value=='')
									{
										alert("Falta digitar el NOMBRE");
									}
								if(document.register_form.apel.value=='')
									{
										alert("Falta digitar el PRIMER APELLIDO");
									}
							
								else
									{
								
										register_form.submit();
										return true;
									}
							}
							
														function Botones_act()
				{					
					document.register_form.btn_update.disabled=true;
					document.register_form.btn_dell.disabled=true;
					document.register_form.btn_regis.disabled=false;
				}
				
			function Botones_Des()
				{					
					document.register_form.btn_update.disabled=false;
					document.register_form.btn_dell.disabled=false;
					document.register_form.btn_regis.disabled=true;	
					document.register_form.btn_query.disabled=true;
				}	
		</script>
	</head>
	<body>
	<div id="ventana1">
	</div>
		<p align='center'> <img src='../../imagenes/logo_sespa.png'  width='1000'  /></p>
		<div id="register-div">
					<form  id="register_form" name="register_form" method="post" target="operaciones" action="../controlador/ctrl_ing_propie.php">
					<input type="hidden" id="action" name="action" >
							<fieldset id="fiel"><legend id="regis" align="center">REGISTRO DE PROPIETARIO</legend>
				
							
									<input type="hidden" name="id" id="id" />
							
							<label>
								<?php echo"$etq_usuario" ?> <br>
									<input type="text" name="usu" id="usu" title="<?php echo"$title_usu" ?>"/>
									<span></span>
							</label>
							<label>
						<?php echo"$etq_p_apellido" ?><br>
						<input type="text" name="apel" id="apel" title="<?php echo"$title_p_apellido" ?>"/>
						<span></span>
					</label>
					
					<label>
					<?php echo"$etq_s_apellido" ?><br>
						<input type="text" name="apel2" id="apel2" title="<?php echo"$title_s_apellido" ?>"/>
						<span></span>
					</label>
					<label>
					<?php echo"$etq_direccion" ?><br>
						<textarea class="estilotextarea1" id="dir"  name="dir" title="<?php echo"$title_direccion" ?>"></textarea>
						<span></span>
					</label>
					<label>
						<?php echo"$etq_correo" ?><br>
							<input type="text" name="corre" id="corre" size="50" maxlength="400" title="<?php echo"$title_correo" ?>"/>
						<span></span>
					</label>
					<label>
						<?php echo"$etq_tel" ?><br>
						<input type="text" name="tel" id="tel" title="<?php echo"$title_tel" ?>"/>
						<span></span>
					</label>
					<label>
					<?php echo"$etq_profesi" ?><br>
							<select type="text" NAME="propie" id="propie">
									<option value="0"><?php echo "$etq_seleccione" ?></option>
										<?php
											$query="SELECT id_profesion_propie, nom_profe_propie 
													FROM profesion_propie ";
												$res=mysql_query($query);
												while($row=mysql_fetch_array($res))
													{
													echo "<option value=".$row[id_profesion_propie]." > ".$row[nom_profe_propie]."</option>";
													}
										?>
							</select>	
					</label>
					<label>
							<?php echo"$etq_tipo_iden" ?>
							<br>
								<select type="text" NAME="tipodoc" title="<?php echo"$title_tipo_doc" ?>">
									<option value="0"><?php echo"$etq_seleccione" ?></option>
									<option value="C.C"><?php echo"$etq_cedula" ?></option>
									<option value="T.I"><?php echo"$etq_ti" ?></option>
									<option value="R.C"><?php echo"$etq_rc" ?></option>
										
								</select>
				</label>
				<label>
					
						<?php echo"$etq_num_iden" ?><br>
							<input type="text" name="iden" id="iden" title="<?php echo"$title_n_doc" ?>"/>
						<span></span>
					</label>
					<label>
						<?php echo "$etq_fecha" ?><br />
						<input type="text" name="calendar" id="calendar" size="9%" title="<?php echo "$title_fecha" ?>" readonly />
						<span></span>
					</label>
		
						<br>
				<input type="button" id="btn_regis" style="cursor:pointer;" name="btn_regis" value="<?php echo"$boton_guardar" ?>"  Onclick="Registrar(this.form,'reg')" >
				<input type="button" id="btn_update"  style="cursor:pointer;" name="btn_update" value="<?php echo"$boton_actualizar" ?>"  Onclick="Registrar(this.form,'updt')">
				<input type="button" id="btn_dell" style="cursor:pointer;" name="btn_dell" value="<?php echo"$boton_eliminar" ?>"  Onclick="Registrar(this.form,'dell')">
				<input type="button" id="btn_query" style="cursor:pointer;" name="btn_query" value="<?php echo"$boton_consultar" ?>"  Onclick="ventana1('consulta_propie.php', 800, 400, 'CONSULTAR DATOS DE PROPIETARIO');return false;" >
  </fieldset>
  <iframe name='operaciones' style="display:<?php echo $debug_app; ?>" width='100%' height='200'></iframe>
  </form>
	
</div>
 <?php
	echo "<script>Botones_act();</script>";
	mysql_close($db); 	?>
</body>
</html>