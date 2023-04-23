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
	$sql="UPDATE constante_fisiologica  SET
		
		macula_les='".$_POST[temperatura]."',
		papula_les='".$_POST[f_cardiaca]."',
		pustula_les='".$_POST[pulso]."',
		habon_les='".$_POST[pulso]."',
		vesicula_les='".$_POST[pulso]."',
		placa_les='".$_POST[pulso]."',
		nodulo_les='".$_POST[pulso]."',
		tumor_les='".$_POST[pulso]."',
		quiste_les='".$_POST[pulso]."',
		comedon_les='".$_POST[pulso]."',
		collarete_epidemico='".$_POST[pulso]."',
		escama='".$_POST[pulso]."',
		costra='".$_POST[pulso]."',
		excoriacion='".$_POST[pulso]."',
		erosion='".$_POST[pulso]."',
		liquenificacion='".$_POST[pulso]."',
		ulcera='".$_POST[pulso]."',
		hiperpigmentacion='".$_POST[pulso]."',
		hipopigmentacion='".$_POST[f_respiratoria]."'	
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