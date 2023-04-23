<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<?php
if($_SESSION['id_roll']=='1')
	{
		echo"
<div id='cssmenu'>
<ul>
   <li class='has-sub'><a href='../vista/registro.php'><span>Registros</span></a>
   
	<ul>	
		<li class='has-sub'><a href='../vista/registro.php'><span>Usuario</span></a></li>
		<li class='has-sub'><a href='../vista/animal.php'><span>Animal</span></a>  </li>
		<li class='has-sub'><a href='../vista/raza.php'><span>Razas</span></a></li>
		<li class='has-sub'><a href='../vista/especie.php'><span>Especies</span></a></li>
		<li class='has-sub'><a href='../vista/profesion.php'><span>Profesion</span></a></li>
	</li>
	</ul>
		<li class='has-sub'><a href='#'><span>Consultas</span></a>
	<ul>
		<li class='has-sub'><a href='../vista/buscar_usuario.php'><span>Iniciar consulta</span></a></li>
		<li class='has-sub'><a href='../vista/via_de_administracion.php'><span>Consultas</span></a></li>
	</ul>
	</ul>	
</div>";
	}else if($_SESSION['id_roll']=='2')
	{
		echo"
<div id='cssmenu'>
<ul>
   <li class='has-sub'><a href='#'><span>Registros</span></a>
   
	<ul>	
		<li class='has-sub'><a href='../vista/animal.php'><span>Animal</span></a>  </li>
		<li class='has-sub'><a href='../vista/raza.php'><span>Razas</span></a></li>
		<li class='has-sub'><a href='../vista/especie.php'><span>Especies</span></a></li>
		<li class='has-sub'><a href='../vista/profesion.php'><span>Profesion</span></a></li>
	</li>
	</ul>
		<li class='has-sub'><a href='#'><span>Consultas</span></a>
	<ul>
		<li class='has-sub'><a href='../vista/buscar_usuario.php'><span>Iniciar consulta</span></a></li>
		<li class='has-sub'><a href='../vista/via_de_administracion.php'><span>Consultas</span></a></li>
	</ul>
	</ul>	
</div>";
	}else{
	
	echo"No es valido";
	
	}
?>

