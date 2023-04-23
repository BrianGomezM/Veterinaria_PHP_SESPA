<body  bgcolor="#ffffff">
	<div id="ventana1">
	</div>
			
		<div id="register-div">
					<form  id="register_form" name="register_form" method="post" target="operaciones" action="../controlador/ctrl_ing_usu.php">
					<input type="hidden" id="action" name="action" >
							<fieldset id="fiel"><legend id="regis" align="center">CONSTANTES FISIOLOGICAS</legend>
				
							
									<input type="hidden" name="id" id="id" />
							
						<table border="0" align="center" width="80%">
							<tr valign="middle">
								<td colspan="3">
								Temperatura:
					
								</td>
								<td colspan="3" >
								Frecuencia Cardiaca:<br>
					
								</td>
								<td colspan="3" >
								Pulso:<br>
					
								</td>
									
							</tr>
								
							<tr valign="middle">
								<td colspan="3">
								 
									<input type="text" name="temperatura" id="temperatura" title="Escriba la Temperatura del animal">
									
								</td>
								<td colspan="3">
								 
									<input type="text" name="f_cardiaca" id="f_cardiaca" title="Escriba la Frecuencia Cardiaca Del animal">
									
								</td>
								<td colspan="3">
								 
									<input type="text" name="pulso" id="pulso" title="Escriba El Pulso del Animal">
									
								</td>
								</tr>
							<tr valign="middle"> 
								<td colspan="3" >
								Frecuencia Respiratoria:<br>
					
								</td>
							
							</tr>
							<tr>
							<td colspan="3">
								 
									<input type="text" name="f_respiratoria" id="f_respiratoria" title="Escriba La Frecuencia Respiratoria Del Animal">
									
								</td>
							</tr>
						
						</table>
		
					
			<!--<input type="button" onclick="validar(this.form)" value="Grabar usuario" class="boton">

				<input type="button" id="btn_regis" name="btn_regis" value="<?php echo"$boton_guardar" ?>"  Onclick="Registrar(this.form,'reg')" >
				<input type="button" id="btn_update" name="btn_update" value="<?php echo"$boton_actualizar" ?>"  Onclick="Registrar(this.form,'updt')">
				<input type="button" id="btn_dell" name="btn_dell" value="<?php echo"$boton_eliminar" ?>"  Onclick="Registrar(this.form,'dell')">
				<input type="button" id="btn_query" name="btn_query" value="<?php echo"$boton_consultar" ?>"  Onclick="ventana1('consulta_usu.php', 1000, 400, 'CONSULTAR DATOS DE USUARIO');return false;" >-->
    <iframe name='operaciones' style="display:<?php echo $debug_app; ?>" width='100%' height='200'></iframe>
  </fieldset>
  </form>
	
</div>
</body>