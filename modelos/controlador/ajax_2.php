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
$id=$_GET['id'];
	if( $id=='M')
	{
	echo "<table class='tabla' align='center'>
				<tr>
					<th>
						NOMBRE
						
					</th>
					<th>
						ESTADO
					
					</th>
	
					<th>
						COMENTARIO
						
					</th>
				</tr>";
		$query="SELECT
				  id_list_sistema_genital_macho,
				  nom_list_sistema_genital_macho
				FROM
				  listado_sistema_genital_macho";
				$res=mysql_query($query);
				while($row=mysql_fetch_array($res))
					{
						echo"<tr><td align='center'>";
						echo " ".$row[nom_list_sistema_genital_macho];
						echo"</td>
						<td>
							<select type='text' NAME='estado$row[id_list_sistema_genital_macho]' id='estado$row[id_list_sistema_genital_macho]'>
								<option value='0'>seleccione...</option>
								<option value='NORMAL'>NORMAL</option>
								<option value='ANORMAL'>ANORMAL</option>							
							</select>	
						</td>
							<td>
								<textarea class='estilotextarea2' id='comentario$row[id_list_sistema_genital_macho]'  name='comentario$row[id_list_sistema_genital_macho]' title='Escriba su comentario'></textarea>	
							</td>
						</tr>";	
					}
	}
	
	else
	{
	echo "<table class='tabla'  align='center'>
				<tr>
					<th>
						NOMBRE
						
					</th>
					<th>
						ESTADO
					
					</th>
	
					<th>
						COMENTARIO
						
					</th>
				</tr>";
	$query="SELECT	
			  id_list_sistema_genital_hembra,
			  nom_list_sistema_genital_hembra
			FROM
			  listado_sistema_genital_hembra";
		$res=mysql_query($query);
		while($row=mysql_fetch_array($res))
			{
				echo"<tr><td align='center'>";
				echo " ".$row[nom_list_sistema_genital_hembra];
				echo"</td>
				<td>
					<select type='text' NAME='estado$row[id_list_sistema_genital_hembra]' id='estado$row[id_list_sistema_genital_hembra]'>
						<option value='0'>seleccione...</option>
						<option value='NORMAL'>NORMAL</option>
						<option value='ANORMAL'>ANORMAL</option>							
					</select>	
				</td>
					<td>
						<textarea class='estilotextarea2' id='comentario$row[id_list_sistema_genital_hembra]'  name='comentario$row[id_list_sistema_genital_hembra]' title='Escriba su comentario'></textarea>	
					</td>
				</tr>";	
			}							
	}
			
			
			
	// $consulta = mysql_query("select id_pac, nomb_pac from animal where id_usu=".$_GET['id']."");
	// echo "<select name='animal' id='animal' title='Seleccione la Mascota del propietario'>";
			// echo "<option value='0'>Seleccione...</option>";
		// while ($fila = mysql_fetch_array($consulta)) 
			// {
			// echo "<option value='" . $fila[id_pac] . "'>" . utf8_encode($fila[nomb_pac]) . "</option>";
			// }
	// echo "</select>";
?>