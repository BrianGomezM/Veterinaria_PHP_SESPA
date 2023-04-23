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
		<title>Buscar Historial</title>
		<script src="jquery-1.6.2.min.js" type="text/javascript"></script>
		<script src="form.js" type="text/javascript"></script>
		<link href="../../css/estilo_menu.css" rel="stylesheet" type="text/css">
		<link href="../../css/estilo_busc.css" rel="stylesheet" type="text/css">
		<link href="../../css/estilo_hist2.css" rel="stylesheet" type="text/css">
		<link href="../../css/estilos_tablas.css" rel="stylesheet" type="text/css" >
		<link rel="stylesheet" type="text/css" href="../../menu/pro_dropdown_2/pro_dropdown_2.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel='stylesheet' href='../../herramientas/jquery/themes/south-street/jquery.ui.all.css' type='text/css' media='all' />
		<script src='../../herramientas/jquery/js/jquery-1.8.2.js' type='text/javascript'></script>
		<script src='../../herramientas/jquery/js/ui/jquery-ui.custom.js' type='text/javascript'></script>
		<script type="text/javascript" src="../../herramientas/jquery/js/jquery-1.6.4.min.js"></script>
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
			   $("#ventana1").html('<iframe id="popup1" width="100%" height="100%"  marginWidth="0" marginHeight="0" frameBorder="1" scrolling="auto" />').dialog("open");
			   $("#popup1").attr("src", strURL);
			   $( "#ventana1" ).dialog({ width: strWidth });
			   $( "#ventana1" ).dialog({ height: strHeigth });
			   $( "#ventana1" ).dialog({ title: strTitle });
			   $( "#ventana1" ).dialog( "option", "position", 'center' );
			   $( "#ventana1" ).dialog( "open" )
			}
		</script>
		<script type="text/javascript">
            $(document).ready(function(){
                $('#usuario').change(function(){
                    var id=$('#usuario').val();
					 $('#animal').load('../controlador/ajax.php?id='+id);
                     });
            });
		
			function inicia_registro(register_form)
				{

						location.href='nuev_propie.php';
							register_form.submit();
							return true;
				}
				
			function Listarhistoria(id_hist,register_form)
				{
					
					//ListarHistorial.location.href='alergia.php?id_hist='+id_hist+'&id_animal='+document.register_form.animal.value;
					ventana1('alergia.php?id_hist='+id_hist+'&id_animal='+document.register_form.animal.value, 1300, 750, 'Registros de Historial');
					//register_form.submit();
					return true;
				}

				function AbrirHistorial(id_usuario, id_animal,register_form)
				{			
					if(document.register_form.usuario.value=='0')
						{
							alert("Por favor seleccione el usuario");
						}
					if(document.register_form.animal.value=='0')
						{
							alert("Por favor seleccione el nombre de la mascota");
						}
					else
						{				
					ventana1('buscar_hist.php?id_usuario='+id_usuario+'&id_animal='+id_animal, 1200, 400, 'Historial');
					//ventana1('upd_tarifa.php?id_especial='+id_especial,550,200,'<?php echo $btn_upd_valores; ?>');
					}
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
					<td width='3%' class="td_titulo">
								<button name='btn_cerrar' class='boton1' title="Cerrar Sesion" value ="<?php echo $etq_cerrar_sesion ?>" onclick="operaciones.location.href='../controlador/admin_salir.php';">Cerrar sesion</button>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2"><img src="../../imagenes/logo_sespa.png"  width="100%"  /></td>
				</tr>
				<tr>
					<td align="center" colspan="2" height='8' >
					<?php include('../../menu/menu2.php');?>
					</td>
				</tr>
		</table>
					<div id="register-div2">
							<form  name="register_form" method="post" target="ListarHistorial" action="alergia.php">
							<input type="hidden" id="action" name="action" >
							<fieldset id="fiel"><legend id="regis" align="center">BUSCAR USUARIOS</legend>
							<table align="center" class="buscar">
							<tr>
								<td>
								<b>Seleccione propietario del animal:</b><br>
								 <?php
									$consulta=mysql_query("select id_usu,nom_usu,apellido1_usu,cedula_usu from usuario");
									echo "<select name='usuario' id='usuario' title='Seleccione Propietario' style='width:300px; cursor:pointer' >";
									echo "<option value='0'>Seleccione..</option>";
									while ($fila=mysql_fetch_array($consulta)){
										echo "<option value='".$fila[id_usu]."'>".utf8_encode($fila[cedula_usu])."   -   ".utf8_encode($fila[apellido1_usu])." ".utf8_encode($fila[nom_usu])."</option>";
									}
									echo "</select>";
									?>
							</td>
							<td rowspan="2">
								<!--<button	type="button" id="n_raza" width="2%" name="n_raza" value="nuevo raza"  Onclick="ventana1('buscar_hist.php', 800, 400, 'Historial', document.register_form.usuario.value);return false;" title="Buscar historial">-->
								<button	type="button" 
										id="n_raza" 
										width="2%" 
										name="n_raza" 
										value="nuevo raza"  
										Onclick="AbrirHistorial(document.register_form.usuario.value,document.register_form.animal.value )" 
										title="Buscar historial"style="cursor:pointer" class="boton2">									
									<img src="../../imagenes/unosearch.png">
								</button>
							</td>
							</tr>
							<tr>
							<td>
							<b>Mascota:</b>
							<div id="animal" name="animal">
									<select name="edo" title='Seleccione la Mascota del propietario' style='width:300px; cursor:pointer' >
										<option value="">Seleccione...</option>
									</select>
								</div>


						</td>
							<!--<td>
								<button	type="button" id="btn_regis" name="btn_regis" value="Iniciar registro"  Onclick="inicia_registro(this.form);" title="Nuevo Usuario" >
								<img src="../../imagenes/User_male.png">
									Nuevo usuario
								</button>
							</td>-->
							
							
						</tr>
						</table>
						
			 </fieldset>
</div>
<p align="center">
	<iframe  name='ListarHistorial' style="display:true" width='90%' height='600' frameborder="0"></iframe>
	<iframe name='operaciones' style="display:<?php echo $debug_app; ?>" width='90%' height='400'></iframe>
</p>
 <?php

	mysql_close($db);
 ?>
</form>
</body>
</html>