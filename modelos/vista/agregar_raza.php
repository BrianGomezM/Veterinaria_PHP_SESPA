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
		<script src="jquery-1.6.2.min.js" type="text/javascript"></script>
			<script src="form.js" type="text/javascript"></script>
			<link href="../../css/styles.css" rel="stylesheet" type="text/css">
			<link href="../../css/estilos_tablas.css" rel="stylesheet" type="text/css" > 
			<link rel="stylesheet" type="text/css" href="../../menu/pro_dropdown_2/pro_dropdown_2.css" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<!--Inicio consulta-->
		<link rel='stylesheet' href='../../herramientas/jquery/themes/south-street/jquery.ui.all.css' type='text/css' media='all' />
		
		<script src='../../herramientas/jquery/js/jquery-1.8.2.js' type='text/javascript'></script>
		<script src='../../herramientas/jquery/js/ui/jquery-ui.custom.js' type='text/javascript'></script>
	<!--Cierre consulta-->
	
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
								if(document.register_form.raza.value=='')
									{
										alert("Falta digitar la RAZA");
									}
							
									// if(document.register_form.pass.value!=document.register_form.pass2.value)
									// {
										// alert("Los PASSWORDS NO SON IGUALES");
									// }

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
	<body>	<div id="ventana1">

	</div>		
				<p align='center'> <img src='../../imagenes/logo_sespa.png'  width='1000'  /></p>
					<div id="register-div">
					<form  name="register_form" method="post" target="operaciones" action="../controlador/ctrl_ing_raza.php">
					<input type="hidden" id="action" name="action" >
					
							<fieldset id="fiel"><legend id="regis" align="center">RAZA</legend> 
								<input type="hidden" id="id" name="id" >
					<label>
								Nombre:<br>
							<input type="text" name="raza" id="raza" title="Digite el nombre de la raza"/>  
						<span></span>
					</label>
					<label>
								Especie:<br>
							 <?php
									$consulta=mysql_query("select id_esp,nom_esp from especie");
									echo "<select style='cursor:pointer;' name='especie' id='especie' title='Seleccione especie'>";
									echo "<option value='0'>Seleccione..</option>";
									while ($fila=mysql_fetch_array($consulta)){
										echo "<option value='".$fila[id_esp]."'>".utf8_encode($fila[nom_esp])."</option>";
									}
									echo "</select>";
									?>	
					</label>
						
			<!--<input type="button" onclick="validar(this.form)" value="Grabar usuario" class="boton">-->
			
				<input type="button" style="cursor:pointer;" id="btn_regis" name="btn_regis" value="Guardar"  Onclick="Registrar(this.form,'reg')" >
				<input type="button" style="cursor:pointer;" id="btn_update" name="btn_update" value="Actualizar"  Onclick="Registrar(this.form,'updt')">
				<input type="button" style="cursor:pointer;" id="btn_dell" name="btn_dell" value="Eliminar"  Onclick="Registrar(this.form,'dell')">
				<input type="button" style="cursor:pointer;" id="btn_query" name="btn_query" value="Consultar"  Onclick="ventana1('consulta_raza.php', 800, 400, 'CONSULTAR DATOS DE RAZA');return false;" >
  </fieldset>  
  <iframe name='operaciones' style="display:<?php echo $debug_app; ?>" width='100%' height='200'></iframe>
  </form>
</div>
 <?php
	echo "<script>Botones_act();</script>";
	mysql_close($db); 	?>
</body>
</html>