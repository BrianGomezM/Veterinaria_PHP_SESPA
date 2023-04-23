<?php
header("Content-Type: text/html; charset=iso-8859-1");
	include_once('../../herramientas/configuracion/vars.php');
	include_once('../../herramientas/configuracion/connect.php');
	
	session_name($session_name);
	session_start();
		if(!$_SESSION[id_roll])
			{
				echo"<script>parent.location.href='$UrlApp'</script>";
				exit;
			}
		else
			{
				$db = conectar();
			}
?>
<html>
   <head>
			<link rel="stylesheet" type="text/css" id="theme" href="herramientas/mc/css/style.css"></link>
			<link rel="stylesheet" type="text/css"  media="all" href="../../css/estilo-DB.css"></link>
			<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1' />
			<link rel='stylesheet' href='../../herramientas/jquery/themes/sunny/jquery.ui.all.css' type='text/css' media='all' />
			<link rel='stylesheet' href='../../css/estilo-DB.css' type='text/css' media='all' />
			<link rel='stylesheet' href='../../css/estilo_busc.css' type='text/css' media='all' />
			<script src='../../herramientas/jquery/js/jquery-1.8.2.js' type='text/javascript'></script>
			<script src='../../herramientas/jquery/js/ui/jquery-ui.custom.js' type='text/javascript'></script>
			<script src='../../herramientas/jquery/js/ui/i18n/jquery.ui.datepicker-es.js' type='text/javascript'></script>
			<title><?php echo $etq_titulo_nuevo_usu ?></title>
			<SCRIPT>
			function pasar_dato(var_id_tipo_busqueda)
				{
					// alert('valor variable: '+var_id_tipo_busqueda);
					document.form_bus.id_tipo_busqueda.value=var_id_tipo_busqueda;
					if (var_id_tipo_busqueda > 2)
						{
							document.form_bus.dato_bus.value=" ";
						}
					else
						{
							document.form_bus.dato_bus.value="";
						}
				}
		
				function buscar(form_bus,aux)
					{
						form_bus.action.value=aux;
						if(document.form_bus.estado_bus.value=='0')
							{
								alert("Seleccione el tipo de dato a buscar");
								exit;
							}
						if(document.form_bus.dato_bus.value=='')
							{
								alert("Por favor ingresar un dato a buscar");
								exit;
							}
						else
							{
								//IfrConsulta.location.href='../controlador/ctrl_buscar_p.php?estado_bus='+estado_bus+'&estado_bus='+dato_bus;
								//IfrConsulta.location.href='../controlador/ctrl_buscar_p.php?estado_bus='+estado_bus;
								//return true;
								form_bus.submit();
								return true;								
							}
					}
			</SCRIPT>
	</head>
	<body>
		<form name='form_bus' method='post' target='IfrConsulta' action="../controlador/ctrl_consulta_roll.php">
		<!--<form target="operaciones" method="post">-->
			<input type="hidden" name="action" id="action" >
			<input type="hidden" name="id_tipo_busqueda" id="id_tipo_busqueda" >
			<table width="70%" border="0" height='10' class="buscar" align="center" cellpadding="0" cellspacing="0" valign='top' >
				<tr>
					<td width="12%"  >Buscar por: </td>
					<td width="20%"  align='center'>
						<select type="text" name="estado_bus" id="estado_bus" onblur="pasar_dato(document.form_bus.estado_bus.value);">
							<option value="0">Seleccione:</option>
							<option value="1">Codigo</option>
							<option value="2">Nombre</option>
							<option value="3">Todo</option>
						</select>
					</td>
					<td width="14%"  >Dato a buscar</td>
					<td width="25%"  colspan="2">
						<INPUT TYPE="TEXT" ID="dato_bus" NAME="dato_bus" SIZE="25%"  TITLE="Dato a abuscar">
					</td>
					<td width="10%"  >
						<input type="button" class="boton1" id="btn_actu" name="btn_actu" value="Buscar" Onclick="buscar(this.form,'busc')">
					</td>
			</table>
			<table width="100%" height='190' border="0" align="center" cellpadding="0" cellspacing="2">
				<tr>
					<td>
						<iframe name='IfrConsulta' width='99%' height='600' align='center' frameborder='1' src='../../include/blanco.html'></iframe>
					</td>
				</tr>
			</table>
			</form>
		<iframe name='operaciones' style="display:<?php echo $debug_app; ?>" width='100%' height='200'></iframe>
	</body>
</html>