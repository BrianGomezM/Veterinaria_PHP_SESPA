<html>
	<?php 	
			include('herramientas/configuracion/vars.php');
			include('herramientas/configuracion/connect.php');
			include('modelos/etiquetas/etq_login.php'); 	
			$db = conectar();
	?>
	<head>	
		<title><?php echo "$etq_titulo_pag" ?></title>	
			<LINK rel="stylesheet" type="text/css"  media="all" href="css/estilo_inicio.css">		
			</LINK>
		<script>
			function Enviar(form_login, aux)
				{
					form_login.action.value=aux;
					var lista_errores="<?php echo $msg_error; ?>\n\n";
					var er_numeros = /^([0-9])+$/
					var seguir=true;
					if(document.form_login.login.value == '')
						{
							lista_errores = lista_errores+"<?php echo $msg_error_usu; ?>\n";
							seguir=false;
						}						
					if(document.form_login.contrasena.value == '')
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
			<div id="banner"><img src="imagenes/banner.jpg" /></div>
				<br /><br /><br /><br /><br /><br />

	<form name='form_login' method='post' target='operaciones' action="controlador/admin_session.php">
		<fieldset id="borde">
			<legend align="center">
				<?php echo"$title_Iniciar_sesion"
					?>
			</legend>

				<label for="login"> <?php echo"$etq_usr_name"
										?>
						<input type="text" name="login"  id="login"  title="Ingrese su login"/>
				<label for="login"><?php echo"$etq_contrasena"
										?>


					<input type="password" name="contrasena" title="Ingrese su contraseña"/>
					<input type="button" value="Ingresar" name="contrasena" id="contrasena" OnClick="Enviar(this.form, 2)"/>

						<br />
			<div class="regi">
			<a href="#" class="olvido_contra" ><?php echo"$title_recuperar"?></a>
			<a href="#" class="olvido_contra" ><?php echo"$title_registrarce"?></a></div>
		</fieldset>
		<iframe name='operaciones' style="display:<?php echo $debug_app; ?>" width='100%' height='200'></iframe>
		</form>	
			
		</BODY>	
	<?php 	include('herramientas/configuracion/desactivar.php'); ?>
</html>