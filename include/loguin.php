<html>
	<?php
		include('herramientas/configuracion/vars.php');
		include('herramientas/configuracion/connect.php');
		include('modelos/etiquetas/etq_login.php');
		session_name($session_name);
		session_start();
		$db = conectar();
	?>
	<head>
		<title><?php echo "$etq_titulo_pag" ?></title>
			<link rel='stylesheet' href='herramientas/jquery/themes/south-street/jquery.ui.all.css' type='text/css' media='all' />
			<link rel='stylesheet' href='css/estilo.css' type='text/css' media='all' />
			<script src='herramientas/jquery/js/jquery-1.8.2.js' type='text/javascript'></script>
			<script src='herramientas/jquery/js/ui/jquery-ui.custom.js' type='text/javascript'></script>		
		
		<script>
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
			function Enviar(form_login, aux)
				{
					form_login.action.value=aux;
					var lista_errores="<?php echo $msg_error; ?>\n\n";
					var er_numeros = /^([0-9])+$/
					var seguir=true;
					if(document.form_login.clv.value =='')
						{
							lista_errores = lista_errores+"<?php echo $msg_error_usu; ?>\n";
							seguir=false;
						}
					if(document.form_login.contra.value =='')
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
	<BODY >
		<div id="ventana1"></div>
	
		<form name='form_login' method='post' target='operaciones' action="modelos/controlador/admin_session.php">
			<input type="hidden" id="action">
			<table border="0" align="center" width="50%" height='10%'>
				<tr>
					<td colspan="2" ><img src="imagenes/ogo_sena.png" /></td>
				</tr>
			</table>
			<br><br>
			<br><br>
			<br><br>
			<table border="0" align="center" width="50%">
				<tr>
					<td width="50%" align="right">
						
							
								<img src="imagenes/inicio_sesion.jpg" />
							
						
					</td>
					<td width="10%"></td>
	
					<td width="70%" align="center">
							<legend align="center">
								<?php echo "$title_Iniciar_sesion" ?>
								<br> 
							</legend>
				<div class="inicio">	
							<label for="login"> <?php echo"$etq_usr_name"	?>
									<input type="text" name="clv"  id="clv"  title="Ingrese su numero de identificacion"/>
							<label for="login"><?php echo"$etq_contrasena"	?>
									<input type="password" name="contra" name="contra" title="Ingrese su contraseña"/>
									<button class="boton"  name="contrasena" id="contrasena" OnClick="Enviar(this.form, 'login')"> Ingresar</button>
					<!--		</div><br><div class="regi">
								
							<a name='boton' style='cursor:pointer' class="olvido_contra"  title="<?php echo $title_recuperar; ?>"  onClick="ventana1('include/nueva_clave.php', 400, 200, 'HOLA');return false;"><?php echo "$etq_recuperar_contra"?></a>
				</div>-->
					</td>
				</tr>
				
			</table>
			</form>
			
		
	</p>
		</BODY>
		<?php 
			include('frame.php');
			mysql_close($db);	
		?>
</html>