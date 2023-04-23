<body  bgcolor="#ffffff">
	<div id="ventana1">
	</div>
			
		<div id="register-div">
					<form  id="register_form" name="register_form" method="post" target="operaciones" action="../controlador/ctrl_ing_usu.php">
					<input type="hidden" id="action" name="action" >
							<fieldset id="fiel"><legend id="regis" align="center">DATOS MEDIO AMBIENTALES</legend>
				
							
									<input type="hidden" name="id" id="id" />
							
						<table border="0" align="center" width="60%">
							</tr valign="middle">
							<tr >
								<td >
									Entorno:						
								</td >
								
								<td >
									Nutricion:			
								</td>
								
								<td >
									Estilo de vida:					
								</td>
							</tr>
							<tr >
								<td >
										<select type="text" NAME="propie">
									<option value="0"><?php echo "$etq_seleccione" ?></option>
									<option value="1">Ciudad</option>
									<option value="2">Campo</option>
									
								
							</select>					
								</td >
								
								<td >
									<input type="text" name="entorno" id="entorno" >		
								</td>
								
								<td >
										<select type="text" NAME="propie">
									<option value="0"><?php echo "$etq_seleccione" ?></option>
										<?php
											$query="SELECT estilo_v.id_estilo_v,
															estilo_v
													FROM estilo_v ";
												$res=mysql_query($query);
												while($row=mysql_fetch_array($res))
													{
													echo "<option value=".$row[id_estilo_v]." > ".$row[estilo_v]."</option>";
													}
										?>
							</select>				
								</td>
							</tr>
							
						
						</table>
		
					
			<!--<input type="button" onclick="validar(this.form)" value="Grabar usuario" class="boton">

				<input type="button" id="btn_regis" name="btn_regis" value="<?php echo"$boton_guardar" ?>"  Onclick="Registrar(this.form,'reg')" >
				<input type="button" id="btn_update" name="btn_update" value="<?php echo"$boton_actualizar" ?>"  Onclick="Registrar(this.form,'updt')">
				<input type="button" id="btn_dell" name="btn_dell" value="<?php echo"$boton_eliminar" ?>"  Onclick="Registrar(this.form,'dell')">
				<input type="button" id="btn_query" name="btn_query" value="<?php echo"$boton_consultar" ?>"  Onclick="ventana1('consulta_usu.php', 1000, 400, 'CONSULTAR DATOS DE USUARIO');return false;" >-->
  </fieldset>
  <iframe name='operaciones' style="display:<?php echo $debug_app; ?>" width='100%' height='200'></iframe>
  </form>
	
</div>
</body>