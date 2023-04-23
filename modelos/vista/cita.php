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
				$db = conectar();			
			}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<script src='../../herramientas/jquery/js/jquery-1.8.2.js' type='text/javascript'></script>
		<script src='../../herramientas/jquery/js/ui/jquery-ui.custom.js' type='text/javascript'></script>
		<script src="../../herramientas/jquery/js/form.js" type="text/javascript"></script>
		<script src='../../herramientas/jquery/js/ui/i18n/jquery.ui.datepicker-es.js' type='text/javascript'></script>
	
	
	
		<title>registrar datos</title>		
		<script src="../herramientas/jquery/js/jquery-1.6.2.min.js" type="text/javascript"></script>
			<script src="form.js" type="text/javascript"></script>
			<link href="../../css/styles.css" rel="stylesheet" type="text/css">
			<link href="../../css/estilos_tablas.css" rel="stylesheet" type="text/css" > 
			<link rel="stylesheet" type="text/css" href="../../menu/pro_dropdown_2/pro_dropdown_2.css" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	

			<!--Inicio consulta-->
		<link rel='stylesheet' href='../../herramientas/jquery/themes/sunny/jquery.ui.all.css' type='text/css' media='all' />
		<script src='../../herramientas/jquery/js/jquery-1.8.2.js' type='text/javascript'></script>
		<script src='../../herramientas/jquery/js/ui/jquery-ui.custom.js' type='text/javascript'></script>
	<!--Cierre consulta-->
	<script>
		$(function() {
			$( "#calendar" ).datepicker({
				dateFormat: "yy-mm-dd",
				constrainInput: true,
				defaultDate: "+1w",
				showOn: "button",
				yearRange: "1950:2015",
				buttonImage: "../../imagenes/calendario.gif",
				regional: "es",
				buttonImageOnly: true,
				changeMonth: true,
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
								if(document.register_form.calendar.value=='')
									{
										alert("Falta digitar el NOMBRE DEL ANIMAL");
									}
								if(document.register_form.propie.value=='')
									{
										alert("Falta digitar el COLOR DEL ANIMAL");
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
			<table border="0" align="center" width='90%' cellpadding="0" cellspacing="0">
				<tr>
					<td valign="middle" align="left" class="td_titulo">
							<B><?php
							echo $_SESSION['usu_activo'];
							//echo $etq_roll.$_SESSION['nom_roll'];
						?></B>
					</td>
					<td width='4%' class="td_titulo">
						<!--<button title="Salir" ><IMG  SRC="../../IMAGENES/salir1.png"></IMG></button>-->
						<input	type='button' name='btn_cerrar' class='boton1' 
								title="Cerrar Sesion" value ="<?php echo $etq_cerrar_sesion ?>"
								onclick="operaciones.location.href='../controlador/admin_salir.php';"
								>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2"><img src="../../imagenes/logo_sespa.png"  width='100%' height='90%' /></td>					
				</tr>
					<tr>
					<td align="center" colspan="2" height='8' ><?php
										include('../../menu/menu2.php');			?>						
					</td>
				</tr>
			</table>	
					<div id="register-div">
					<form  name="register_form" method="post" target="operaciones" action="../controlador/ctrl_ing_cita.php">
					<input type="hidden" id="action" name="action" >
							<fieldset id="fiel"><legend id="regis" align="center">CITAS</legend> 
							<label>
								Fecha cita: <br />
							<input type="text" name="calendar" id="calendar" size="10%" title="Seleccione calendario" readonly />
						<span></span>
					</label> 
					
						<label>
						
								Usuario:
							<br>
								<select type="text" NAME="propie">
									<option value="0">Seleccione..</option>
										<?php
										$query=" select id_usu,nom_usu,p_apellido_usu,s_apellido_usu,direccion_usu,telefono_usu,
											correo_usu,pass_usu,cedula_usu,fecha_nac_usu,id_roll,id_tipo_doc from usuario";
												$res=mysql_query($query);
												while($row=mysql_fetch_array($res))
													{
									echo "<option value=".$row[id_usu]." >".$row[nom_usu]." ".$row[p_apellido_usu]."</option>";
													}
										?>
								</select>	
						</label>
						
			<!--<input type="button" onclick="validar(this.form)" value="Grabar usuario" class="boton">-->
			
				<input type="button" id="btn_regis" name="btn_regis" value="Grabar usuario"  Onclick="Registrar(this.form,'reg')" >
				<input type="button" id="btn_update" name="btn_update" value="Actualizar"  Onclick="Registrar(this.form,'updt')">
				<input type="button" id="btn_dell" name="btn_dell" value="Eliminar"  Onclick="Registrar(this.form,'dell')">
				<input type="button" id="btn_query" name="btn_query" value="Consultar"  Onclick="ventana1('consulta_animal.php', 1000, 400, 'CONSULTAR DATOS DE LA MASCOTA');return false;" >
  </fieldset>  
  <iframe name='operaciones' style="display:<?php echo $debug_app; ?>" width='100%' height='200'></iframe>
  </form>
</div>
 <?php
			include('../../pie_de_pagina.php');
			?>
<?php  mysql_close($db); 	?>
</body>
</html>