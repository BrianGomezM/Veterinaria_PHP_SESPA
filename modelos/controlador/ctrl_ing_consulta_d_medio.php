<?php
	require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
	require_once('../../herramientas/configuracion/connect.php'); // ruta relativa a include/config.php
	$db=conectar();
	session_name($session_name);
	session_start();

	// echo "PASCIENTE: ".$_GET['id_animal']."<br>";

	$sql= mysql_query("SELECT MAX(id_hist) FROM historial");;
	$max_id=mysql_result($sql,0);
	echo "PASCIENTE: ".$max_id; 
	
	
	$var_id_animal=$_GET['id_animal'];	
	$sql="UPDATE dato_medio_ambien SET
		
		entorno_datos_medio_amb='".$_POST[entorno]."',
		nutricion_datos_medio_amb='".$_POST[nutricion]."',
		id_estilo_v='".$_POST[estilo_v]."'	
		WHERE id_hist='$max_id'";
		echo "$sql";
		if($res=mysql_query($sql))
			{
				echo "<script>alert('Se guardo correctamente');</script>";
				echo "<script>parent.parent.limpiar();</script>";
				echo "<script>parent.parent.document.register_form.num_docu.disabled=true;</script>";
			}
		else
			{
				echo "<script>alert('Error al guardar');</script>";
			}
mysql_close($db);
?>