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
			<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1' />
			<link rel='stylesheet' href='../../herramientas/jquery/themes/south-street/jquery.ui.all.css' type='text/css' media='all' />
			<link rel='stylesheet' href='../../css/estilo-DB.css' type='text/css' media='all' />
			<link href="../../css/estilos_hist.css" rel="stylesheet" type="text/css" >
			<link href="../../css/estilo_busc.css" rel="stylesheet" type="text/css" >
			<script src='../../herramientas/jquery/js/jquery-1.8.2.js' type='text/javascript'></script>
			<script src='../../herramientas/jquery/js/ui/jquery-ui.custom.js' type='text/javascript'></script>
			<script src='../../herramientas/jquery/js/ui/i18n/jquery.ui.datepicker-es.js' type='text/javascript'></script>
			<title><?php echo $etq_titulo_nuevo_usu ?></title>
			<SCRIPT>
		
            $(document).ready(function(){
                $('#usuario').change(function(){
                    var id=$('#usuario').val();
					//alert('valor id: '+id);
                    $('#animal').load('../controlador/ajax4.php?id='+id);
                     });
            });
			
			function pasar_dato(var_id_tipo_busqueda)
				{
					// alert('valor variable: '+var_id_tipo_busqueda);
					document.form_bus.id_tipo_busqueda.value=var_id_tipo_busqueda;
					if (var_id_tipo_busqueda > 33)
						{
							document.form_bus.animal.value=" ";
						}
					else
						{
							document.form_bus.animal.value="";
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
						if(document.form_bus.usuario.value=='0')
							{
								alert("Por favor seleccione el propietario del animal");
								exit;
							}
						if(document.form_bus.animal.value=='0')
							{
								alert("Por favor seleccione el animal a buscar");
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
		<form name='form_bus' method='post' target='IfrConsulta' action="../controlador/ctrl_consulta_via_de_administracion.php">
		<!--<form target="operaciones" method="post">-->
			<input type="hidden" name="action" id="action" >
			<input type="hidden" name="id_tipo_busqueda" id="id_tipo_busqueda" >
			<table width="90%" border="0" height='10' align="center" cellpadding="0" cellspacing="0" valign='top' class="buscar" >
				<tr>
					<td>Buscar: </td>
					<td width="20%"  align='center'>
						<select type="text" title="Seleccione la consulta" name="estado_bus" id="estado_bus" onblur="pasar_dato(document.form_bus.estado_bus.value);">
							<option value="0">Seleccione:</option>
							<option value="1">Constantes Fisiologicas</option>
							<option value="2">Historia Medica</option>
							<option value="3">Antecedentes</option>
							<option value="4">Lesiones</option>
							<option value="5">Linfonodos</option>
							<option value="6">Inspeccion</option>
							<option value="7">Palpacion</option>
							<option value="8">Pruebas especificas</option>
							<option value="9">Pares craneales</option>
							<option value="10">Reflejos posturales</option>
							<option value="11">Estado mental</option>
							<option value="12">Reaciones postulares</option>
							<option value="13">Reflejo espinal</option>
							<option value="14">Otros examenes Sistema nervioso</option>
							<option value="15">Sistema genital</option>
							<option value="16">Sistema Urinario</option>
							<option value="17">Vias aereas</option>
							<option value="18">Sonidos respiratorios</option>
							<option value="19">Patrones respiratorios</option>
							<option value="20">Sintomas respiratorios</option>
							<option value="21">Menbranas mucosas</option>
							<option value="22">Caracteristicas del pulso</option>
							<option value="23">Region precordial</option>
							<option value="24">Auscultacion</option>
							<option value="25">Otros examenes Sistema respiratorio</option>
							<option value="26">Sistema digestivo</option>
							<option value="27">Signos digestivos</option>
							<option value="28">Organos sentidos</option>
							<option value="29">Ayudas diagnosticas</option>
							<option value="30">Diagnosticos</option>
							<option value="31">Hoja de seguimiento</option>
							<option value="32">Generar todo el historial en PDF</option>
						</select>
					</td>
					<td>Seleccione propietario del animal:</td>
					<td width="25%"  colspan="3">
							 <?php
									$consulta=mysql_query("select id_usu,nom_usu,apellido1_usu,cedula_usu from usuario");
									echo "<select name='usuario' id='usuario' title='Seleccione Propietario'>";
									echo "<option value='0'>Seleccione..</option>";
									while ($fila=mysql_fetch_array($consulta)){
										echo "<option value='".$fila[id_usu]."'>".utf8_encode($fila[apellido1_usu])." ".utf8_encode($fila[nom_usu])."</option>";
									}
									echo "</select>";
									?>
					</td>
					<td>
						Seleccione el animal: 
					</td>
					<td width="15%" >
					<div id="animal" name="animal">
						<select name="edo" title='Seleccione la Mascota del propietario'>
										<option value="">Seleccione...</option>
						</select>
								</div</td>
					<td width="5%"  colspan="3">
					</td>
					<td width="10%"  align="right">
						<input type="button" id="btn_actu" name="btn_actu" value="Buscar" class="boton1" title="Buscar historial" Onclick="buscar(this.form,'busc')">
					</td>
			</table>
			<table width="100%" height='190' border="0" align="center" cellpadding="0" cellspacing="2">
				<tr>
					<td>
						<iframe name='IfrConsulta' width='99%' height='450' align='center' frameborder='1' src='../../include/blanco.html'></iframe>
					</td>
				</tr>
			</table>
			</form>
		<iframe name='operaciones' style="display:<?php echo $debug_app; ?>" width='100%' height='200'></iframe>
	</body>
</html>