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
<html>	
	<head>
		<title><?php echo "$etq_titulo_pag" ?></title>
			<link href="../../css/styles.css" rel="stylesheet" type="text/css">
			<LINK rel="stylesheet" type="text/css"  media="all" href="../../css/estilo-DB.css"></LINK>
			<link rel="stylesheet" type="text/css" href="../../menu/pro_dropdown_2/pro_dropdown_2.css" />
			

		<script>
			function Enviar(form_login, aux)
				{
					form_login.action.value=aux;
					var lista_errores="<?php echo $msg_error; ?>\n\n";
					var er_numeros = /^([0-9])+$/
					var seguir=true;
					if(document.form_login.clv.value == '')
						{
							lista_errores = lista_errores+"<?php echo $msg_error_usu; ?>\n";
							seguir=false;
						}
					if(document.form_login.contra.value == '')
						{
							lista_errores = lista_errores+"<?php echo $msg_error_clave; ?>\n";
							seguir=false;
						}
					if(seguir==false)
						{
							alert(lista_errores);
						}
					else
						{
							form_login.submit();
							return true;
						}
				}
		</script>
	</head>
	<BODY>
		<form name='form_login' method='post' target='operaciones' > <!-- action="modelos/controlador/admin_session.php" -->
			<input type="hidden" id="action" >
			<table border="0" align="center" width='90%' cellpadding="0" cellspacing="0">
				<tr>
					<td valign="middle" align="left" class="td_titulo" >
						<?php
							echo $etq_bienvenido.$_SESSION['usu_activo'];
							
						?>
					</td>
					<td width='10%' class="td_titulo">
						<!--<button title="Salir" ><IMG  SRC="../../IMAGENES/salir1.png"></IMG></button>-->
						<input	type='button' name='btn_cerrar' class='boton' 
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
										include('../../../sespa/menu/menu2.php');			?>						
					</td>
				</tr>
			</table>
			<br><br><br><br><br><br><br><br><br><br><br><br>
			 <?php
			include('../../pie_de_pagina.php');
			?>
			<iframe name='operaciones' style="display:<?php echo $debug_app?> " width='100%' height='200'></iframe>
		</form>
	</BODY>
</html>