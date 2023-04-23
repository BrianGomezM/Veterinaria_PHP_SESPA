<?php
	header("Content-Type: text/html; charset=iso-8859-1");
	require_once('../../include/vars.php');	//ruta relativa al directorio include
	set_include_path(get_include_path() . PATH_SEPARATOR  . $PathApp);
	chdir($PathApp);
	session_name($session_name);
	session_start();
	include('modelo/etiquetas/lbl_usuarios.php');
	include ('herramientas/adodb5/adodb.inc.php');
	if (!$_SESSION['IdUsuarioActivo']){
		header("Location: ".$UrlApp."/index.php");
	}
	else if ($_SESSION['IdUsuarioActivo'])
	{
	//******************** Inicio Conexion a la DB ******************** 
	$conex = NewADOConnection($driver_db);
	$conex->Connect($host_db, $user_db, $pass_db, $db);
	$conex->debug=$debug_db;
	if (!$conex){
	echo "<br>Error<br>";
	die($err_conn_db);
	exit;}
	include('include/paginado.php');
	////////////////////////////////////////////////////////////////////////////////////////////
	$query = "select * from $db.usuario where email='wilpe88@gmail.com'";
	$result = $conex->Execute($query);	

	session_register('id');
	session_register('n');
	session_register('a');
	session_register('us');
	session_register('ps');		
	$_SESSION['id']=$result->fields['identificacion'];
	$_SESSION['n']=$result->fields['nombre'];
	$_SESSION['a']=$result->fields['apellidos'];
	$_SESSION['us']=$result->fields['username'];
	$_SESSION['ps']=$result->fields['pswd'];		
	
		function enviarCorreo()
		{
			require_once "swift_required.php";
			$contenido='					
				<html>
					<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">						
				<head>
					<linkrel="stylesheet" type="text/css"media="all" href="../../estilo/estilo.css">
				</head>
					<body>
					<table width="450" height="80" border="1" align="center" class="td_titulo" cellpadding="2" cellspacing="0">
					  <tr>  
						<td height="30" colspan="2" align="center" class="td_titulo">RECORDATORIO DE CLAVES</td>
					  </tr>
					  <tr>	  
						<td class="td_titulo" width="125" align="left" ><div >Identificacion</div></td>
						<td class="td_contenido_mini_1" width="250" align="left" ><div>'.$_SESSION['id'].'</div></td>		
					  </tr>
					  <tr>
						<td class="td_titulo"  width="125" align="left" ><div >Nombres</div></td>
						<td class="td_contenido_mini_1" width="250" align="left" ><div>'.$_SESSION['n'].'</div></td>		
					  </tr>
					  <tr>	  
						<td class="td_titulo" width="125" align="left" ><div >Apellidos</div></td>
						<td class="td_contenido_mini_1" width="250" align="left" ><div>'.$_SESSION['a'].'</div></td>		
					  </tr>
					  <tr>	  
						<td class="td_titulo" width="125" align="left" ><div >Nombre Usuario</div></td>
						<td class="td_contenido_mini_1" width="250" align="left" ><div>'.$_SESSION['us'].'</div></td>		
					  </tr>	            
					  <tr>	  
						<td class="td_titulo" width="125" align="left" ><div >Password</div></td>
						<td class="td_contenido_mini_1" width="250" align="left" ><div>'.$_SESSION['ps'].'</div></td>		
					  </tr>	            
				  </table> 
				</body>
				</html>						
			';
			$message = Swift_Message::newInstance();
			$message->setSubject("Recordatorio");
			$message->setFrom(array("wilpe88@gmail.com" => "SIGA"));
			$message->setTo(array("wilpe88@hotmail.com"=>"wilmer prueba", "daneve08@hotmail.com" => "SIGA"));
			$message->addPart($contenido, "text/html");
			$transport = Swift_SmtpTransport::newInstance("smtp.gmail.com", 465, "ssl");
			$transport->setUsername("wilpe88@gmail.com");
			$transport->setPassword("vmj7901234");
			$mailer = Swift_Mailer::newInstance($transport);
			$result = $mailer->send($message);
		}	
	enviarCorreo();
	echo "Enviado...";			
}
?>