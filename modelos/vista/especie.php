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
				require_once('../etiquetas/etq_pie_pagina.php');
				$db = conectar();			
			}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<script src='../../herramientas/jquery/js/jquery-1.8.2.js' type='text/javascript'></script>
		
		<title>Registro de especies</title>		
		<script src="jquery-1.6.2.min.js" type="text/javascript"></script>
		<script src="form.js" type="text/javascript"></script>
		<link href="../../css/estilo_menu.css" rel="stylesheet" type="text/css">
		<link href="../../css/estilos_tablas.css" rel="stylesheet" type="text/css" > 
		<link href="../../css/estilo_busc.css" rel="stylesheet" type="text/css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />			
		<link rel='stylesheet' href='../../herramientas/jquery/themes/south-street/jquery.ui.all.css' type='text/css' media='all' />
		<script src='../../herramientas/jquery/js/jquery-1.8.2.js' type='text/javascript'></script>
		<script src='../../herramientas/jquery/js/ui/jquery-ui.custom.js' type='text/javascript'></script>
	
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
								if(document.register_form.espe.value=='')
									{
										alert("Falta digitar la ENFERMEDAD");
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
<div id="ventana1"></div>	
			<table border="0" align="center" width='90%' cellpadding="0" cellspacing="0">
				<tr>
					<td valign="middle" align="left" class="td_titulo" style="text-transform: uppercase;">
							<B><?php
							echo $_SESSION['usu_activo'];
							echo "<br>".$_SESSION[nombre_roll];
							
						?></B>
					</td>
					<td width='10%' class="td_titulo">
						<!--<button title="Salir" ><IMG  SRC="../../IMAGENES/salir1.png"></IMG></button>-->
						<input	type='button' name='btn_cerrar' class='boton1' 
								title="Cerrar Sesion" 
								value ="<?php echo $etq_cerrar_sesion ?>"
								onclick="operaciones.location.href='../controlador/admin_salir.php';">
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2"><img src="../../imagenes/logo_sespa.png"   width='100%' /></td>					
				</tr>
					<tr>
					<td align="center" colspan="2" height='3' ><?php
										include('../../menu/menu2.php');			?>						
					</td>
				</tr>
			</table>	
					<div id="register-div">
					<form  name="register_form" method="post" target="operaciones" action="../controlador/ctrl_ing_especie.php">
					<input type="hidden" id="action" name="action" >
					
							<fieldset id="fiel"><legend id="regis" align="center">ESPECIE</legend> 
								<input type="hidden" id="id" name="id" >
								<label>
								Nombre:<br>
							<input type="text" name="espe" id="espe" title="Digite el nombre de la especie"/>  
						<span></span>
					</label>	
					
				<input type="button" style="cursor:pointer" id="btn_regis" name="btn_regis" value="Guardar"  Onclick="Registrar(this.form,'reg')" >
				<input type="button" style="cursor:pointer" id="btn_update" name="btn_update" value="Actualizar"  Onclick="Registrar(this.form,'updt')">
				<input type="button" style="cursor:pointer" id="btn_dell" name="btn_dell" value="Eliminar"  Onclick="Registrar(this.form,'dell')">
				<input type="button" style="cursor:pointer" id="btn_query" name="btn_query" value="Consultar"  Onclick="ventana1('consulta_especie.php', 800, 400, 'CONSULTAR DATOS DE ESPECIE');return false;" >
  </fieldset>  
  <iframe name='operaciones' style="display:<?php echo $debug_app; ?>" width='100%' height='200'></iframe>
  </form>
</div>
 <?php
	echo "<script>Botones_act();</script>";
	include('../../include/pie_de_pagina.php');
	mysql_close($db); 	?>
</body>
</html>