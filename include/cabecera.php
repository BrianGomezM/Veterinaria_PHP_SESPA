<?php
header("Content-Type: text/html; charset=iso-8859-1");
set_include_path(get_include_path() . PATH_SEPARATOR  . $PathApp);
include('include/vars.php');	//ruta relativa al directorio include
include('modelo/etiquetas/lbl_general.php');
set_include_path(get_include_path() . PATH_SEPARATOR  . $PathApp);
chdir($PathApp);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $titulositio; ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $UrlApp; ?>/estilo/estilo.css">

<script type="text/javascript" src="<?php echo $UrlApp; ?>/herramientas/popup/prototype.js"> </script>
<script type="text/javascript" src="<?php echo $UrlApp; ?>/herramientas/popup/window.js"> </script>

<link type="text/css" href="<?php echo $UrlApp; ?>/herramientas/popup/default.css" rel="stylesheet">
<link type="text/css" href="<?php echo $UrlApp; ?>/herramientas/popup/mac_os_x.css" rel="stylesheet">

</head>

<body oncontextmenu='return false' onselectstart='return false' ondragstart='return false'>
<script type="text/javascript">
	popup1 = new Window('popup1', {className:"mac_os_x", showEffectOptions:{duration:0}, overlayHideEffectOptions:{duration:0}, wiredDrag:true});
	function ventana1(url, ancho, alto, titulo){
		popup1.setSize(ancho, alto);
		popup1.setTitle(titulo);
		popup1.setURL(url);
		popup1.toFront();
		popup1.showCenter("modal");
		popup1.show;
	}
	function ver_proyecto(aux){
		$dato=aux;		
		if($dato==''){
		alert('SE DEBE SELECCIONAR UN PROYECTO');
		}else{				
		Ifrinicio.location.href='../controlador/publicar.php?opcion=ver_proyecto&cp='+aux;
		}
	} 	
	function ver_beneficiarios(aux){
		$dato=aux;		
		if($dato==''){
		alert('SE DEBE SELECCIONAR UN PROYECTO');
		}else{				
		Ifrinicio.location.href='../controlador/publicar.php?opcion=ver_beneficiaros&cp='+aux;
		}
	}	
	function atras(){
		Ifrinicio.location.href='../controlador/publicar.php?opcion=publicar_proyectos';
	}

</script>
	<table align="center" width="70%" valign="top" border="0" cellpadding="0" cellspacing="0">
		<TBODY>
			<tr>
				<td><img src="<?php echo $UrlApp; ?>/imagenes/logo.png" width="867" height="120"/></td>
			</tr>	  
			<tr>				
				<td><?php	require_once('info_cuenta.php'); ?> </td>
			</tr>
			<tr>
				<td>
					<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td width="15%" height='480' align='left' cellpadding="0" cellspacing="0" valign="top" >
								<?php  require_once('menu_izq.php'); ?>
							</td>
							<td width="70%" class='cuadro' valign='top' align='left'>
								<center>					
									<iframe name='Ifrinicio' width='745' height='739' align='center' frameborder='0' src='<?php echo $UrlApp; ?>/modelo/controlador/publicar.php?opcion=publicar_proyectos'></iframe>
								</center>
							</td>
						</tr>
					</table>
				</td>
			</tr>