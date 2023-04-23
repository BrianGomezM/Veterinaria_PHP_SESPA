<?php
	include('../herramientas/configuracion/vars.php');
	include('../herramientas/configuracion/connect.php');
	include('../modelos/etiquetas/etq_login.php');
	session_name($session_name);
	session_start();
	$db = conectar();
?>
<html>
	<head>
		<meta   http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css"  media="all" href="../css/estilo_inicio.css">
		<link rel='stylesheet' href='../herramientas/jquery/themes/humanity/jquery.ui.all.css' type='text/css' media='all' />
		<link rel='stylesheet' href='../css/estilo.css' type='text/css' media='all' />		
		<script src='../herramientas/jquery/js/jquery-1.8.2.js' type='text/javascript'></script>
		<script src='../herramientas/jquery/js/ui/jquery-ui.custom.js' type='text/javascript'></script>		
	</head>

	<SCRIPT LANGUAGE="JavaScript">
	<!--
	function validaenvio(forma, action) 
	{
		forma.action.value=action;
		var er_caracteres = /^([a-z\s]|[A-Z]|á|é|í|ó|Ñ|ú|ñ|ü|.|-)+$/
		var er_numeros = /^([0-9])+$/

		var msgerror = "<?php echo $err_list_err; ?>\n\n";
		var std = true;

		if (forma.usu.value == '') 
			{
				msgerror = msgerror+"Digite la identificacion\n";
				std=false;
			}

		if(!er_caracteres.test(forma.email.value))
			{
			msgerror = msgerror+"Digite el correo electronico\n";
			std=false;
			}
		else
			{
			if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(forma.email.value)){ /*HOLA*/ }
				else
				{
				msgerror = msgerror+"Correo electronico no valido\n";
				std=false;
				}
			}

		if (std == false)
			{
			alert(msgerror);
			return false;
			}
		else if (std == true)
			{
			forma.submit();
			return true;
			}
	}
	-->
	</SCRIPT>
	<body>	
		<form name="form" target="operaciones"  action="../modelos/controlador/ctrl_nueva_clave.php" method="post">
			<table width="80%" border="0" align="center" cellpadding="0" cellspacing="1">
				<tr>
					<td width="35%" align="left" class="etiqueta4"  >
						Identificacion<input type='hidden' name='action'>
					</td >
					<td>
						<input name="usu" id="usu" title="Digite su identificacion"  type="text" size="35" maxlength="120" class="campo">
					</td>
				</tr>
				<tr>
					<td width="35%" align="left" class="etiqueta4" >
						Correo electronico
					</td>
					<td align="left" class='etiqueta1' style="width:110px">
						<input name='email' id='email' title="Digite el correo" type='text' size='35' maxlength='120' class='campo'>
					</td>
				</tr>
				<tr>
					<td colspan='2' align='center'  >
					<div class="regi">
						<input name='btn_reset' title="Generar"type='button' class='boton' value='Recuperar Clave' onClick="validaenvio(this.form, 'genera_password');return false;">
					</div>
					</td>
				</tr>
			</table>
			<?php 
				include('frame.php');
				mysql_close($db);	
			?>
		</form>		
	</body>	
</html>