<?php
	require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
	require_once('../../herramientas/configuracion/connect.php'); // ruta relativa a include/config.php
	$db=conectar();
	session_name($session_name);
	session_start();

	// echo "PASCIENTE: ".$_GET['id_animal']."<br>";

	$sql= mysql_query("SELECT * FROM historial ORDER BY fch_ing_hist DESC LIMIT 1");;
	$max_id=mysql_result($sql,0);
	echo "PASCIENTE: ".$max_id; 
	
	
	// $var_id_animal=$_GET['id_animal'];	
	// $sql="UPDATE constante_fisiologica  SET
		
		// temperatura_medic='".$_POST[temperatura]."',
		// frecuencia_cardiaca='".$_POST[f_cardiaca]."',
		// frecuenci_respira='".$_POST[pulso]."',
		// pulso='".$_POST[f_respiratoria]."'	
		// WHERE id_hist='$max_id'";
		// echo "$sql";
		// if($res=mysql_query($sql))
			// {
				// echo "<script>alert('Se guardo correctamente');</script>";
				// echo "<script>parent.parent.limpiar();</script>";
				// echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			// }
		// else
			// {
				// echo "<script>alert('Error al guardar');</script>";
			// }
mysql_close($db);
?>