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
				require_once('../etiquetas/etq_animal.php');
				require_once('../etiquetas/etq_pie_pagina.php');
				$db = conectar();			
			}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<script src='../../herramientas/jquery/js/jquery-1.8.2.js' type='text/javascript'></script>
		<script src='../../herramientas/jquery/js/ui/jquery-ui.custom.js' type='text/javascript'></script>
		
		<script src='../../herramientas/jquery/js/ui/i18n/jquery.ui.datepicker-es.js' type='text/javascript'></script>
	
	
	
		<title><?php echo"$title_reg_ani" ?></title>		
		<script src="../herramientas/jquery/js/jquery-1.6.2.min.js" type="text/javascript"></script>
			<script src="form.js" type="text/javascript"></script>
			<link href="../../css/estilo_menu.css" rel="stylesheet" type="text/css">
			<link href="../../css/estilos_tablas.css" rel="stylesheet" type="text/css" > 
			<link href="../../css/estilo_busc.css" rel="stylesheet" type="text/css" />
			<link rel="stylesheet" type="text/css" href="../../menu/pro_dropdown_2/pro_dropdown_2.css" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
			

			<!--Inicio consulta-->
		<link rel='stylesheet' href='../../herramientas/jquery/themes/south-street/jquery.ui.all.css' type='text/css' media='all' />
		<script src='../../herramientas/jquery/js/jquery-1.8.2.js' type='text/javascript'></script>
		<script src='../../herramientas/jquery/js/ui/jquery-ui.custom.js' type='text/javascript'></script>
	<!--Cierre consulta-->
	<script type="text/javascript">
            $(document).ready(function(){
                $('#especie').change(function(){					
                    var id=$('#especie').val();
					//alert('valor id: '+id);
                    $('#raza').load('../controlador/ajax3.php?id='+id);
                     });    
            });
        </script>
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
				
				function Eliminar(register_form,aux)
				{
					Eliminar=confirm('Desea Eliminar este registro');
					if (Eliminar)
					{
					
					register_form.action.value=aux;
					register_form.submit();
					return true;
					}
					
					else
					{
					
					return false;
					
					}
				}
		</script>
	</head>
	<body>	
			<div id="ventana1">
			</div>	
			<table border="0" align="center" width='90%' cellpadding="0" cellspacing="0">
				<tr>
					<td valign="middle" align="left" class="td_titulo" style="text-transform: uppercase;">
							<B><?php
							echo $_SESSION['usu_activo'];
							echo "<br>".$_SESSION[nombre_roll];
							
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
					<td align="center" colspan="2"><img src="../../imagenes/logo_sespa.png"  width='100%'  /></td>					
				</tr>
					<tr>
					<td align="center" colspan="2" height='8' ><?php
										include('../../menu/menu2.php');			?>						
					</td>
				</tr>
			</table>	
					<div id="register-div">
					<form  name="register_form" method="post" target="operaciones" action="../controlador/ctrl_ing_animal.php">
					<input type="hidden" id="action" name="action" >
							<fieldset id="fiel"><legend id="regis" align="center"><?php echo"$etq_regi_ani" ?></legend> 
							<input type="text" name="id" id="id" />  
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
						<!--<input type="text" name="tama" id="tama" title="<?php echo "$title_tama"?>"/>-->
						
						<select style="cursor:pointer;" type="text" NAME="tama" title="<?php echo "$title_tama" ?>">
									<option value="0"><?php echo "$etq_seleccione" ?></option>
									<option value="<?php echo "$etq_peque" ?>"><?php echo "$etq_peque" ?></option>
									<option value="<?php echo "$etq_med" ?>"><?php echo "$etq_med" ?></option>
									<option value="<?php echo "$etq_grand" ?>"><?php echo "$etq_grand" ?></option>
									
								</select>	
						<span></span>
					</label>
					</label>
						<label>
						<?php echo "$etq_peso" ?><br />
						<input type="text" name="peso" id="peso" title="<?php echo "$title_peso" ?>"/> Kg
						<span></span>
					</label>
					<label>
						<?php echo "$etq_fecha" ?><br />
						<input type="text" name="calendar" style="cursor:pointer;" id="calendar" size="9%" title="<?php echo "$title_fecha" ?>" readonly />
						<span></span>
					</label>
					<label>
							<?php echo "$etq_gen"?>
							<br>
								<select style="cursor:pointer;" type="text" NAME="genero" title="<?php echo "$title_genero" ?>">
									<option value="0"><?php echo "$etq_seleccione" ?></option>
									<option value="M"><?php echo "$etq_macho" ?></option>
									<option value="F"><?php echo "$etq_hembra" ?></option>
									
								</select>	
								</label>
								<label>
							<?php echo "$etq_espec" ?>
							<br>
								 <?php
									$consulta=mysql_query("select id_esp,nom_esp from especie");
									echo "<select name='especie' style='cursor:pointer;' id='especie' title='Seleccione especie'>";
									echo "<option value='0'>Seleccione..</option>";
									while ($fila=mysql_fetch_array($consulta)){
										echo "<option value='".$fila[id_esp]."'>".utf8_encode($fila[nom_esp])."</option>";
									}
									echo "</select>";
									?>		
								<button	type="button" style="cursor:pointer;" id="n_esp" width="2%" name="n_esp" value="nuevo espe"  Onclick="ventana1('agregar_esp.php', 1200, 600, 'AGREGAR ESPECIE');return false;" title="AGREGAR NUEVA ESPECIE" >	
									<img src="../../imagenes/dog.png">
								</button>
								</label>
								<label>
										Raza:
											<div id="raza" name="raza">
											<select name="edo" title='Seleccione la raza del animal'>
											<option value="">Seleccione...</option>
										</select>
								
								<button	type="button" id="n_raza" width="2%" style="cursor:pointer;" name="n_raza" value="nuevo raza"  Onclick="ventana1('agregar_raza.php',1200, 600, 'AGREGAR RAZA');return false;" title="AGREGAR NUEVA RAZA" >	
									<img src="../../imagenes/dog.png">
								</button></div>
								</label>
					<label>
							<?php echo "$etq_alzada" ?>
							<br>
								<input type="text" name="alzada" id="alzada" title="<?php echo "$title_alzada" ?>"/> Cm
								<span></span>
								</label>
								<label>
							<?php echo "$etq_propie" ?>
							<br>
								<select style="cursor:pointer;" type="text" NAME="propie">
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
								<button	type="button" id="n_esp" width="2%" name="n_esp" style="cursor:pointer;" value="nuevo espe"  Onclick="ventana1('agregar_propie.php', 1200, 600, 'AGREGAR PROPIETARIO');return false;" title="AGREGAR NUEVO PROPIETARIO" >	
									<img src="../../imagenes/User.png">
								</button>
						</label>
						
			<!--<input type="button" onclick="validar(this.form)" value="Grabar usuario" class="boton">-->
			
				<input type="button" id="btn_regis" name="btn_regis" value="Guardar"  style="cursor:pointer;" Onclick="Registrar(this.form,'reg')" >
				<input type="button" id="btn_update" name="btn_update" value="Actualizar"  style="cursor:pointer;" Onclick="Registrar(this.form,'updt')">
				<input type="button" id="btn_dell" name="btn_dell" value="Eliminar"  style="cursor:pointer;" Onclick="Eliminar(this.form,'dell')">
				<input type="button" id="btn_query" name="btn_query" value="Consultar"  style="cursor:pointer;" Onclick="ventana1('consulta_animal.php', 1200, 600, 'CONSULTAR DATOS DE LA MASCOTA');return false;" >
  </fieldset>  
  <footer><?php include('../../include/pie_de_pagina.php');?></footer>
  <iframe name='operaciones' style="display:<?php echo $debug_app; ?>" width='100%' height='50'></iframe>
  </form>
</div>
	
 <?php
		echo "<script>Botones_act();</script>";
		
		
		mysql_close($db); 	?>
	
</body>
</html>