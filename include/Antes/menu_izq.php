<link rel="stylesheet" type="text/css" media="all" href="<?php echo $UrlApp; ?>/estilo/estilo.css">
<?php
if ($_SESSION['IdPerfilActivo']==1)
{
?>

<table border="0" cellspacing="0" cellpadding="1" width="117">
	<tbody>
		<tr><td  valign="top" width="1" height="5"/></td></tr>
		<tr>
			<th align="center" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_titulo_arriba.png" height="18"/><?php echo $lbl_manager; ?></th>
		</tr>
		<tr>
			<td class="tipo_5" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_abajo_titulo.jpg" height="19"/>
			    <B><span style='cursor:pointer' onclick="ventana1('<?php echo $UrlApp; ?>/modelo/vista/ing_benef.php',580,490,'<?php echo $lbl_benef; ?>');">&nbsp;<?php echo $lbl_benef; ?></span></B>
			</td>
		</tr>
		<tr>
			<td class="tipo_5" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_abajo_titulo.jpg" height="19"/>
				<B><span style='cursor:pointer' onclick="ventana1('<?php echo $UrlApp; ?>/modelo/vista/ing_admin.php',700,580,'<?php echo $lbl_admin; ?>');">&nbsp;<?php echo $lbl_admin; ?></span></B>
			</td>
		</tr>
		<tr>
			<td class="tipo_5" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_abajo_titulo.jpg" height="19"/>
			    <B><span style='cursor:pointer' onclick="ventana1('<?php echo $UrlApp; ?>/modelo/vista/ing_aportantes.php',700,370,'<?php echo $lbl_apor; ?>');">&nbsp;<?php echo $lbl_apor; ?></span></B>
			</td>
		</tr>
		<tr>
			<td class="tipo_5" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_abajo_titulo.jpg" height="19"/>
			    <B><span style='cursor:pointer' onclick="ventana1('<?php echo $UrlApp; ?>/modelo/vista/ing_roles.php',600,360,'<?php echo $lbl_rol; ?>');">&nbsp;<?php echo $lbl_rol; ?></span></B>
			</td>
		</tr>
		<tr>
			<td class="tipo_5" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_abajo_titulo.jpg" height="19"/>
				<B><span style='cursor:pointer' onclick="ventana1('<?php echo $UrlApp; ?>/modelo/vista/ing_usuarios.php',740,545,'<?php echo $lbl_ing_usuarios; ?>');">&nbsp;<?php echo $lbl_ing_usuarios; ?></span></B>
			</td>
		</tr>
		<tr>
			<td class="tipo_5" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_abajo_titulo.jpg" height="19"/>
			    <B><span style='cursor:pointer' onclick="ventana1('<?php echo $UrlApp; ?>/modelo/vista/ing_val_apor.php',750,485,'<?php echo $lbl_val_aportantes; ?>');">&nbsp;<?php echo $lbl_val_aportantes; ?></span></B>
			</td>
		</tr>
		<tr>
			<td class="tipo_5" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_abajo_titulo.jpg" height="19"/>
			    <B><span style='cursor:pointer' onclick="ventana1('<?php echo $UrlApp; ?>/modelo/vista/ing_seguimi.php',700,550,'<?php echo $lbl_segui; ?>');">&nbsp;<?php echo $lbl_segui; ?></span></B>
			</td>
		</tr>
		<tr>
			<td class="tipo_5" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_abajo_titulo.jpg" height="19"/>
			    <B><span style='cursor:pointer' onclick="ventana1('<?php echo $UrlApp; ?>/modelo/vista/ing_cabildo.php',620,330,'<?php echo $lbl_cabildo; ?>');">&nbsp;<?php echo $lbl_cabildo; ?></span></B>
			</td>
		</tr>
		<tr>
			<td class="tipo_5" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_abajo_titulo.jpg" height="19"/>
			    <B><span style='cursor:pointer' onclick="ventana1('<?php echo $UrlApp; ?>/modelo/vista/ing_sector.php',620,340,'<?php echo $lbl_tit_sector; ?>');">&nbsp;<?php echo $lbl_sec; ?></span></B>
			</td>
		</tr>
		<tr>
			<td class="tipo_5" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_abajo_titulo.jpg" height="19"/>
				<B><span style='cursor:pointer' onclick="ventana1('<?php echo $UrlApp; ?>/modelo/vista/ing_profesiones.php',600,370,'<?php echo $lbl_profesiones; ?>');">&nbsp;Profesiones</span></B>
			</td>
		</tr>
		<tr>
			<td class="tipo_5" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_abajo_titulo.jpg" height="19"/>
			    <B><span style='cursor:pointer' onclick="ventana1('<?php echo $UrlApp; ?>/modelo/vista/cargar_proyecto.php',900,610,'<?php echo $lbl_carg_proy; ?>');">&nbsp;<?php echo $lbl_carg_proy; ?></span></B>
			</td>
		</tr>		
		<tr>
			<td class="tipo_5" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_abajo_titulo.png" width="1" height="19"/>
				<B><span style='cursor:pointer' onclick="Ifrinicio.location.href='<?php echo $UrlApp; ?>/modelo/vista/ejecucion_gastos.php';">&nbsp;Reportes</span></B>
			</td>
		</tr>
		<tr><td  valign="top" width="1" height="5"/></td></tr>
	</tbody>
</table>
<?php
}
else if ($_SESSION['IdPerfilActivo']==2)
{//secretario
?>

<table border="0" cellspacing="0" cellpadding="1" width="117">
	<tbody>
		<tr><td  valign="top" width="1" height="5"/></td></tr>
		<tr>
			<th align="center" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_titulo_arriba.jpg" height="18"/>Secretaria</th>
		</tr>
		<tr>
			<td  class="tipo_5" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_abajo_titulo.jpg"  height="18" >
				<B><span style='cursor:pointer' onclick="ventana1('<?php echo $UrlApp; ?>/modelo/vista/ing_usuarios.php',740,545,'<?php echo $lbl_ing_usuarios; ?>');">&nbsp;<?php echo $lbl_ing_usuarios; ?></span></B>
			</td>
		</tr>
	</tbody>
</table>

<?php
}
else if ($_SESSION['IdPerfilActivo']==3)
{//interventor
?>
<table border="0" cellspacing="0" cellpadding="1" width="117">
	<tbody>
		<tr><td  valign="top" width="1" height="5"/></td></tr>
		<tr>
			<th align="center" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_titulo_arriba.jpg" height="18"/>Interventor</th>
		</tr>
		<tr>
			<td  class="tipo_5" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_abajo_titulo.jpg"  height="18" >
			    <B><span style='cursor:pointer' onclick="ventana1('<?php echo $UrlApp; ?>/modelo/vista/ing_seguimi.php',630,550,'<?php echo $lbl_segui; ?>');">&nbsp;<?php echo $lbl_segui; ?></span></B>
			</td>
		</tr>
	</tbody>
</table>
<?php } ?>


<table border="0" cellspacing="0" cellpadding="1" width="117">
	<tbody>
		<tr><td  valign="top" width="1" height="5"/></td></tr>
		<tr>
			<th align="center" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_titulo_arriba.png" width="10%" height="18"/>Nuestro Territorio</th>
		</tr>
		<tr>
			<td  valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_fondo_titulo_1.jpg">
				<B><span style='cursor:pointer' onclick="Ifrinicio.location.href='<?php echo $UrlApp; ?>/modelo/vista/acerca_historia.php';">&nbsp;Historia</span></B>
			</td>
		</tr>
		<tr>
			<td  valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_fondo_titulo_1.jpg">
				<B><span style='cursor:pointer' onclick="Ifrinicio.location.href='<?php echo $UrlApp; ?>/modelo/controlador/publicar.php?opcion=publicar_proyectos';">&nbsp;Ver proyectos</span></B>
			</td>
		</tr>
		<tr>
			<td  valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_fondo_titulo_1.jpg">
				<B><span style='cursor:pointer' onclick="Ifrinicio.location.href='<?php echo $UrlApp; ?>/modelo/vista/acerca_localizacion.php';">&nbsp;Localizacion</span></B>
			</td>
		</tr>
		<tr>
			<td  valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_fondo_titulo_1.jpg">
				<B><span style='cursor:pointer' onclick="Ifrinicio.location.href='<?php echo $UrlApp; ?>/modelo/vista/Acerca_poblacion.php';">&nbsp;Poblacion</span></B>
			</td>
		</tr>
		<tr>
			<td  valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_fondo_titulo_1.jpg">
				<B><span style='cursor:pointer' onclick="Ifrinicio.location.href='<?php echo $UrlApp; ?>/modelo/vista/acerca_sitios.php';">&nbsp;Sitios Turisticos</span></B>
			</td>
		</tr>
		<tr>
			<td  height="18" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_abajo_titulo_b.jpg">
				<B><span style='cursor:pointer' onclick="Ifrinicio.location.href='<?php echo $UrlApp; ?>/modelo/vista/acerca_hidrografia.php';">&nbsp;Hidrografia</span></B>
			</td>
		</tr>

		<tr>
			<td  valign="top" width="1" height="5"/></td>
		</tr>

		<tr>
			<th align="center" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_titulo_arriba.png" width="10%" height="18"/>Programas</th>
		</tr>
		<tr>
			<td  valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_fondo_titulo_1.jpg">
				<B><span style='cursor:pointer' onclick="Ifrinicio.location.href='<?php echo $UrlApp; ?>/modelo/vista/acerca_salud.php';">&nbsp;Salud</span></B>
			</td>
		</tr>
		<tr>
			<td  valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_fondo_titulo_1.jpg">
				<B><span style='cursor:pointer' onclick="Ifrinicio.location.href='<?php echo $UrlApp; ?>/modelo/vista/acerca_educacion.php';">&nbsp;Educacion</span></B>
			</td>
		</tr>
		<tr>
			<td  valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_fondo_titulo_1.jpg">
				<B><span style='cursor:pointer' onclick="Ifrinicio.location.href='<?php echo $UrlApp; ?>/modelo/vista/Acerca_medio.php';">&nbsp;Medio Ambiente</span></B>
			</td>
		</tr>
		<tr>
			<td  valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_fondo_titulo_1.jpg">
				<B><span style='cursor:pointer' onclick="Ifrinicio.location.href='<?php echo $UrlApp; ?>/modelo/vista/acerca_produccion.php';">&nbsp;Produccion</span></B>
			</td>
		</tr>
		<tr>
			<td  valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_fondo_titulo_1.jpg">
				<B><span style='cursor:pointer' onclick="Ifrinicio.location.href='<?php echo $UrlApp; ?>/modelo/vista/acerca_cultura.php';">&nbsp;Cultura</span></B>
			</td>
		</tr>
		<tr>
			<td height="18" valign="top" background="<?php echo $UrlApp; ?>/imagenes/it_abajo_titulo_b.jpg">
				<B><span style='cursor:pointer' onclick="Ifrinicio.location.href='<?php echo $UrlApp; ?>/modelo/vista/acerca_deporte.php';">&nbsp;Deporte</span></B>
			</td>
		</tr>
	</tbody>
</table>
