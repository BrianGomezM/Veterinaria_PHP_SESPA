<head>
<script type="text/javascript">
			$(document).ready(function() {
			   $("#ventana1").dialog({
					   autoOpen: false,
					   modal: true,
					   closeOnEscape: true,
					   resizable: false
				   });
			});

			function ventana1(strURL, strWidth, strHeigth, strTitle){
			   $("#ventana1").html('<iframe id="popup1" width="100%" height="100%"  marginWidth="0" marginHeight="0" frameBorder="0" scrolling="auto" />').dialog("open");
			   $("#popup1").attr("src", strURL);
			   $( "#ventana1" ).dialog({ width: strWidth });
			   $( "#ventana1" ).dialog({ height: strHeigth });
			   $( "#ventana1" ).dialog({ title: strTitle });
			   $( "#ventana1" ).dialog( "option", "position", 'center' );
			   $( "#ventana1" ).dialog( "open" )
			}
		</script>				
		<script>

						function Registrar(register_form,aux)
							{
								register_form.action.value=aux;
								if(document.register_form.usu.value=='')
									{
										alert("Falta digitar el NOMBRE");
									}
								if(document.register_form.apel.value=='')
									{
										alert("Falta digitar el PRIMER APELLIDO");
									}
							
								else
									{
								
										register_form.submit();
										return true;
									}
							}
		</script>
	</head>
	<body  bgcolor="#ffffff">
	<div id="ventana1">
	</div>
			
		<div id="register-div">
					<form  id="register_form" name="register_form" method="post" target="operaciones" action="../controlador/ctrl_ing_usu.php">
					<input type="hidden" id="action" name="action" >
							<fieldset id="fiel"><legend id="regis" align="center">REGISTRO DE PROPIETARIO</legend>
				
							
									<input type="hidden" name="id" id="id" />
							
							<label>
								<?php echo"$etq_usuario" ?> <br>
									<input type="text" name="usu" id="usu" title="<?php echo"$title_usu" ?>"/>
									<span></span>
							</label>
							<label>
						<?php echo"$etq_p_apellido" ?><br>
						<input type="text" name="apel" id="apel" title="<?php echo"$title_p_apellido" ?>"/>
						<span></span>
					</label>
					
					<label>
					<?php echo"$etq_s_apellido" ?><br>
						<input type="text" name="apel2" id="apel2" title="<?php echo"$title_s_apellido" ?>"/>
						<span></span>
					</label>
					
					<label>
					<?php echo"$etq_direccion" ?><br>
							<select type="text" NAME="propie">
									<option value="0"><?php echo "$etq_seleccione" ?></option>
										<?php
											$query="SELECT id_profesion_propie, nom_profe_propie 
													FROM profesion_propie ";
												$res=mysql_query($query);
												while($row=mysql_fetch_array($res))
													{
													echo "<option value=".$row[id_profesion_propie]." > ".$row[nom_profe_propie]."</option>";
													}
										?>
							</select>	
					</label>
			    	<label>
					
						<?php echo"$etq_num_iden" ?><br>
							<input type="text" name="iden" id="iden" title="<?php echo"$title_n_doc" ?>"/>
						<span></span>
					</label>
		
						<br>
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