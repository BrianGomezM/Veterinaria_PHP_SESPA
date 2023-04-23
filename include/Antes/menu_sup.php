<?php
header("Content-Type: text/html; charset=iso-8859-1");
require_once('vars.php');	//ruta relativa al directorio include
set_include_path(get_include_path() . PATH_SEPARATOR  . $arrayGlobalsParameters[PathApp]);
chdir($PathApp);
session_name($session_name);
session_start();
include('modelo/etiquetas/lbl_general.php');
include ('herramientas/adodb5/adodb.inc.php');

//******************** Inicio Conexion a la DB ********************
$conex = NewADOConnection($driver_db);
$conex->Connect($host_db, $user_db, $pass_db, $db);
$conex->debug=false;
if (!$conex) {
	echo "<br>Error<br>";
	die($err_conn_db);
	exit;
}
//******************** Fin Conexion a la DB ********************

echo "<script type='text/javascript'>\n";
	echo "<!--\n";
	$query="select id_modulo, modulo from modulo where (tipo_modulo=0) order by orden";
	$result = $conex->Execute($query);

	echo "stm_bm([\"menu61b2\",830,\"\",\"$UrlApp/herramientas/menu/blank.gif\",0,\"\",\"\",0,0,250,0,1000,1,0,0,\"\",\"\",0,0,1,2,\"default\",\"hand\",\"\"],this);\n";
	echo "stm_bp(\"p0\",[0,4,0,0,0,0,9,0,100,\"\",-2,\"\",-2,50,0,0,\"#799BD8\",\"transparent\",\"\",3,0,0,\"#000000\",\"\",-1,-1,0,\"transparent\",\"\",0,\"\",-1,-1,0,\"transparent\",\"\",0,\"\",-1,-1,0,\"transparent\",\"\",0,\"\",-1,-1,0,\"transparent\",\"\",0,\"\",\"\",\"\",\"\",0,0,0,0,0,0,0,0]);\n";

	$padre=0;
	while (!$result->EOF) {
		echo "stm_ai(\"p0i$padre\",[0,\"".$result->fields[modulo]."\",\"\",\"\",-1,-1,0,\"#\",\"_self\",\"\",\"\",\"$UrlApp/herramientas/menu/greytwo-r.gif\",\"$UrlApp/herramientas/menu/blacktwo-r.gif\",9,7,0,\"\",\"\",-1,-1,0,0,1,\"#FFFFFF\",1,\"#FFFFFF\",1,\"\",\"\",3,3,0,0,\"#FFFFFF\",\"#333333\",\"#000000\",\"#FFFFFF\",\"bold 9pt 'Trebuchet MS','Arial','Helvetica','Sans-serif'\",\"bold 9pt 'Trebuchet MS','Arial','Helvetica','Sans-serif'\",0,1],120,0);\n";
		$z=$padre+1;
		echo "stm_bp(\"p$z\",[1,4,0,1,1,1,5,0,100,\"\",-2,\"\",-2,10,0,0,\"#2F8DDC\",\"#FFFFFF\",\"\",3,1,1,\"#FF9900\"]);\n";

		$query2="select m.id_modulo, m.modulo, m.url_modulo from modulo as m, moduloxperfil as mp 
				where (m.id_modulo=mp.id_modulo) and (mp.id_perfil=$_SESSION[IdPerfilActivo]) and (m.tipo_modulo=".$result->fields[id_modulo].") order by m.orden";
		$result2=$conex->Execute($query2);
		$hijo=0;
		while (!$result2->EOF) {
			echo "stm_aix(\"p".$z."i".$hijo."\",\"p0i0\",[0,\"".$result2->fields[modulo]."\",\"\",\"\",-1,-1,0,\"".$UrlApp."/".$result2->fields[url_modulo]."\",\"_self\",\"\",\"\",\"$UrlApp/herramientas/menu/icon_01c.gif\",\"$UrlApp/herramientas/menu/icon_01c.gif\",5,18,0,\"\",\"\",0,0,0,0,1,\"#FFFFF7\",1,\"#FF9900\",0,\"\",\"\",3,3,0,0,\"#FF9900\",\"#FF9900\",\"#FF9900\",\"#333333\"],0,18);\n";
			$hijo++;
			$result2->MoveNext();
		}
		$padre++;
		$result->MoveNext();
		echo "stm_ep();\n";
	}

	echo "stm_ep();\n";
	echo "stm_sc(1,[\"transparent\",\"transparent\",\"\",\"\",3,3,0,0,\"#FF9900\",\"#000000\",\"$UrlApp/herramientas/menu/up_disabled.gif\",\"$UrlApp/herramientas/menu/up_enabled.gif\",7,9,0,\"herramientas/menu/down_disabled.gif\",\"$UrlApp/herramientas/menu/down_enabled.gif\",7,9,0,0,200]);\n";
	echo "stm_em();\n";


	echo "//-->\n";
echo "</script>\n";
$conex->Close();
?>