<html>
	<head>
		<title>
			Menu
		</title>
		<link rel="stylesheet" type="text/css" href="pro_dropdown_2/pro_dropdown_2.css" />
		<script src="pro_dropdown_2/stuHover.js" type="text/javascript"></script>
		<style type="text/css">
			
		</style>
	
		<script language="javascript">
			function validar()
			{
				if(document.f2.anomalias.value=="")
				{
					alert("Por favor seleccione una de las partes");
					document.f2.anomalias.focus();
					return false;
				}
			} //fin función
		</script>
	</head>
	<body>
		<ul id="nav">
			<li class="top"><a href="/../sespa/modelos/vista/inicio.php" class="top_link"><span>Inicio</span></a></li>
				<li class="top"><a href="#nogo2" id="products" class="top_link"><span class="down">Menu</span></a>
					<ul class="sub">
						<li><a href="#nogo3" class="fly">Registro</a>
							<ul>
								<li><a href="/../sespa/modelos/vista/registro.php">Registrar usuario</a></li>
							</ul>
						</li>
					
					</li>
					</ul>
				
				       
					 <li class="top"><a href="/../sespa/modelos/vista/animal.php" id="products" class="top_link"><span class="down">Mascota</span></a>
					 <ul class="sub">
					    <li><a href="/../sespa/modelos/vista/especie.php" class="fly">Especie</a></li>
						 <li><a href="/../sespa/modelos/vista/raza.php" class="fly">Raza</a></li>
						<li><a href="/../sespa/modelos/vista/sintoma.php" class="fly">Sintoma</a></li>
						<li><a href="/../sespa/modelos/vista/alergias.php" class="fly">Alergia</a></li>
						<li><a href="/../sespa/modelos/vista/enfermedad.php" class="fly">Enfermedad</a></li>
						
						</ul>
					</li>
				</li>
		</ul>
	</body>
</html>