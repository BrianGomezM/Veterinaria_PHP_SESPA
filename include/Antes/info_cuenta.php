<?php
set_include_path(get_include_path() . PATH_SEPARATOR  . $PathApp);
require_once('vars.php');	//ruta relativa al directorio include
require_once('modelo/etiquetas/lbl_general.php');

set_include_path(get_include_path() . PATH_SEPARATOR  . $PathApp);
chdir($PathApp);
session_name($session_name);
session_start();

if ($_SESSION['IdUsuarioActivo']==''){
?>

<link rel="stylesheet" type="text/css" media="all" href="<?php echo $UrlApp; ?>/estilo/estilo.css">

	<script>
		function ValidaLogin(forma_login, opcion)
		{
			forma_login.opcion.value=opcion;
			var msgerror = "<?php echo $err_transac1; ?>\n<?php echo $err_transac2; ?>\n\n";
			var std = true;
			if (forma_login.usuario.value == '') {
				msgerror = msgerror+"<?php echo $err_username; ?>\n";
				std=false;
			}
			if (forma_login.loguin.value == '') {
				msgerror = msgerror+"<?php echo $err_pswd; ?>\n";
				std=false;
			}
			if (std == false){
				alert(msgerror);
				return false;
			}
			else if (std == true){
				forma_login.submit();
				return true;
			}
		}
</script>
<tr>
<form name='form_login' target='operaciones' method='post' action='<?php echo $UrlApp; ?>/include/admin_session.php'>
<td class="tipo_2" background="<?php echo $UrlApp; ?>/imagenes/fondo_menu.png" >
	<table width="362" align="right" border="0" valign="top" cellspacing="0" cellpadding="0">
			<tr >
				<td align="center"  >
					<img src="<?php echo $UrlApp; ?>/imagenes/separador.png" width="3"width="10" />
				</td>
				<td class="tipo_3" width="45" align="right" ><b>
					<?php echo $lbl_usuario; ?></b>
					<input type='hidden' name='opcion'>
				</td>
				<td width="69" align="center" >
					<input name='usuario' type='text' title="usuario" class='campo0'  size='10' maxlength='20'>
				</td>
				<td align="center" width="7" width="10" >
					<img src="<?php echo $UrlApp; ?>/imagenes/separador.png" width="3"width="10" />
				</td>
				<td width="67"  class="tipo_3" align="right"><b>
					<?php echo $lbl_password; ?></b>
				</td>
				<td width="50" class="tipo_3" align="center"   >
					<input name='loguin' title="contraseña" type='password' class='campo'  size='10' maxlength='20'>
				</td>
				<td align="center" width="10" >
					<img src="<?php echo $UrlApp; ?>/imagenes/separador.png" width="3"width="10" />
				</td>
				</td>
				<td width="50" align="center" class="tipo_2">
					<button name='btn_login' class='boton' onclick="ValidaLogin(this.form, 'login');return false;;"><?php echo $btn_login; ?></button>
				</td>
			</tr>
	</table>
</td>
</form>
</tr>
<?php
}
else if ($_SESSION['IdUsuarioActivo']>0)
{

?>
<tr>
	<td background="<?php echo $UrlApp; ?>/imagenes/fondo_menu.png" >
		<table width="865" align="center" valign="top" border="0" cellspacing="0" cellpadding="0">
			 <tr>
				<td width="800" height="30" align="right" class='tipo_3' background="<?php echo $UrlApp; ?>/imagenes/fondo_menu.png">
					<b><?php echo $_SESSION[paso_usu_activo];?></b>
				</td>
				<td align="center" width="2" width="1" >
					<img src="<?php echo $UrlApp; ?>/imagenes/separador.png" width="3"width="10" />
				</td>
				<td width="5%"  align="center" class="tipo_3">
					<span style='cursor:pointer' onclick="operaciones.location.href='<?php echo $UrlApp; ?>/include/admin_session.php?opcion=salir';"><b><?php echo $btn_salir; ?></b></span>
				</td>				
			 </tr>
		</table>
	</td>
</tr>
<?php
}
?>