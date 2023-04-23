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
		<script src='../../herramientas/jquery/js/jquery-1.8.2.js' type='text/javascript'></script>
		<script src="../../herramientas/jquery/js/form.js" type="text/javascript"></script>
		<script src='../../herramientas/jquery/js/ui/jquery-ui.custom.js' type='text/javascript'></script>
		<script src='../../herramientas/jquery/js/ui/i18n/jquery.ui.datepicker-es.js' type='text/javascript'></script>



		<title>registrar datos</title>

		
			<link href="../../css/styles.css" rel="stylesheet" type="text/css">
			<link href="../../css/estilos.css" rel="stylesheet" type="text/css" >
			<link href="../../css/estilos_tablas.css" rel="stylesheet" type="text/css" >
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			
			
		
			<script>
			$(function() {
			$( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
			$( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
			});
			</script>
			<style>
			.ui-tabs-vertical { width: 58em; }
			.ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 15em; }
			.ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
			.ui-tabs-vertical .ui-tabs-nav li a { display:block; }
			.ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; border-right-width: 1px; }
			.ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 40em;}
			</style>
	</head>
	<body  bgcolor="#ffffff">
	</div>
			<table border="0" align="center" width='90%' cellpadding="0" cellspacing="0">
				<tr>
					<td valign="middle" align="left" class="td_titulo" >
						<b><?php
							echo $_SESSION['usu_activo'];
							//echo $etq_roll.$_SESSION['nom_roll'];
						?></b>
					</td>
					<td width='10%' class="td_titulo">
						<!--<button title="Salir" ><IMG  SRC="../../IMAGENES/salir1.png"></IMG></button>-->
						<input	type='button' name='btn_cerrar' class='boton1'
								title="Cerrar Sesion" 
								value ="<?php echo $etq_cerrar_sesion ?>" 
								Onclick="operaciones.location.href='../controlador/admin_salir.php';">

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
				<tr>
				<td>
			<div id="tabs">
					<ul>
					<li><a href="#tabs-1">Datos del Animal</a></li>
					<li><a href="#tabs-2">Datos del propietario</a></li>
					<li><a href="#tabs-3">Motivo de consulta</a></li>
					<li><a href="#tabs-4">Datos medio ambientales</a></li>
					<li><a href="#tabs-5">Historia medica</a></li>
					<li><a href="#tabs-6">Analisis por sistema</a></li>
					<li><a href="#tabs-7">Patron de distribucion</a></li>	
					<li><a href="#tabs-7">Descripcion de las lesiones</a></li>
					</ul>
										<div id="tabs-1">
					<h2>Animal</h2>
					<p><?php include('../../include/tablas/tabla_animal.php'); ?></p>
					</div>
										<div id="tabs-2">
					<h2>Propietario</h2>
					<p><?php include('../../include/tablas/tabla_propie.php'); ?></p>
					</div>
					<div id="tabs-3">
					<h2>Diagnosticos y Tratamientos anteriores</h2>
					<p><?php include('../../include/tablas/tabla_motivo_consulta.php'); ?></p>
			
					</div>
					<div id="tabs-4">
					<h2>Datos medio ambientales</h2>
					<p><?php include('../../include/tablas/tabla_datos_medio_ambientales.php'); ?></p>
			
					</div>
					
					<div id="tabs-5">
					<h2>Constantes fisiologicas</h2>
					<p><?php include('../../include/tablas/tabla_motivo_consulta.php'); ?></p>
			
					</div>
					<div id="tabs-6">
					<h2>Piel y anexos</h2>
					<p><?php include('../../include/tablas/tabla_lesion.php'); ?></p>
					</div>
					<div id="tabs-7">
					<h2>Patron de distribucion</h2>
					<p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
					</div>
			</div>
				</td>
				</tr>
			</table>
		
			
		
  <iframe name='operaciones' style="display:<?php echo $debug_app; ?>" width='100%' height='200'></iframe>
  </form>
	</div>
	<?php  mysql_close($db); 	?>
</body>
