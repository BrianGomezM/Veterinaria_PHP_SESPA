<?php
header("Content-Type: text/html; charset=iso-8859-1");
set_include_path(get_include_path() . PATH_SEPARATOR  . $arrayGlobalsParameters[PathApp]);
require_once('vars.php'); // ruta relativa a include/config.php
//require_once('../../include/vars.php');	//ruta relativa al directorio include
chdir($PathApp);
session_name($session_name);
session_start();
include('modelo/etiquetas/lbl_general.php');
include ('herramientas/adodb5/adodb.inc.php');

//******************** Inicio Conexion a la DB ********************
$conex = NewADOConnection($driver_db);
$conex->Connect($host_db, $user_db, $pass_db, $db);
$conex->debug=$debug_db;
if (!$conex) {
	echo "<br>Error<br>";
	die($err_conn_db);
	exit;
}
//******************** Fin Conexion a la DB ********************

switch ($_REQUEST['opcion'])
{
	case 'login':
			$query="select * from $db.admin where (usuario='".trim($_POST[usuario])."') and loguin=md5('".trim($_POST[loguin])."')";
			echo "<hr>1º".$query."<hr>";
			$result = $conex->Execute($query);
			if ($result->fields[id_admin] > 0)
			{
				//Login exitoso
				$query="select * from $db.admin where (usuario='".trim($_POST[usuario])."') and loguin=md5('".trim($_POST[loguin])."')";
				$result = $conex->Execute($query);
				if ($result->fields[estado]==1)
					{
						session_register('IdUsuarioActivo');
						session_register('idyearseleccionado');
						session_register('numyearseleccionado');
						session_register('UsernameUsuarioActivo');
						session_register('NombreUsuarioActivo');
						session_register('IdPerfilActivo');
						session_register('identificacion');
						session_register('paso_usu_activo');
						$_SESSION['identificacion']=trim($result->fields[cc]);
						$_SESSION['IdUsuarioActivo']=trim($result->fields[id_admin]);
						$_SESSION['UsernameUsuarioActivo']=$lbl_bienvenido.trim($result->fields[pa]." ".$result->fields[sa]." ".$result->fields[pn]." ".$result->fields[sn]);
						$usu=$_SESSION['UsernameUsuarioActivo'];
						$_SESSION['NombreUsuarioActivo']= trim($result->fields[pn]);
						$_SESSION['IdPerfilActivo']= trim($result->fields[id_perfil]);
						$num_dane=$_SESSION['IdUsuarioActivo'];
						$_SESSION['paso_usu_activo']=$usu;
						echo"<script>parent.location.href='$UrlApp'</script>";
					}
					else
					{
						echo "<script>alert('$err_login_inactivo');</script>";
						echo "<script>parent.document.form.reset();</script>";
					}

			}
			elseif ($result->fields[estado]== 0){
				
				echo "<script>alert('$err_login_nook');</script>";
				echo "<script>parent.document.form.reset();</script>";
			}
	break;

	case 'salir':
		session_destroy();
		echo"<script>parent.location.href='$UrlApp'</script>";		
	break;
}
$conex->Close();
?>
