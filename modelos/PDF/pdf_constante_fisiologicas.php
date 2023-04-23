<?php
require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
require_once('../../herramientas/configuracion/connect.php'); // ruta relativa a include/config.php
require_once('../controlador/ctrl_consulta_via_de_administracion.php'); 
$db=conectar();
session_name($session_name);
session_start();
$var_dato_id=$_POST[id_pdf];
include("../../fpdf17/fpdf.php");
class PDF extends FPDF
{
//Pie de página
function Footer()
{
$this->SetY(-10);
$this->SetFont('Arial',8);
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
//Creación del objeto de la clase heredada
$pdf=new FPDF;
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
//Aquí escribimos lo que deseamos mostrar
$sql="SELECT
		  animal.id_pac,
		  usuario.nom_usu,
		  usuario.apellido1_usu,
		  animal.nomb_pac,
		  constante_fisiologica.frecuencia_cardiaca,
		  constante_fisiologica.pulso,
		  constante_fisiologica.frecuenci_respira,
		  constante_fisiologica.temperatura_medic,
		  historial.id_hist,
		  usuario.id_usu
		FROM
		  animal
		  INNER JOIN historial ON animal.id_pac = historial.id_pac
		  INNER JOIN constante_fisiologica ON historial.id_hist =
			constante_fisiologica.id_hist
		  INNER JOIN usuario ON usuario.id_usu = animal.id_usu
		  WHERE animal.id_pac = '$var_dato_id' ";

	$res=mysql_query($sql);
while($row=mysql_fetch_array($res))
{
	  $var_animal=$row[nomb_pac];
	 $var_nom_propie=$row[nom_usu];
	 $var_ape_propie=$row[apellido1_usu];
	 $var_raza=$row[nom_esp];
	 $var_especie=$row[nom_raza];
	 $var_temperatura=$row[temperatura_medic];
	 $var_frecuencia=$row[frecuencia_cardiaca];
	 $var_pulso=$row[pulso];
	 $var_frecuencia_resp=$row[frecuenci_respira];	
	 $var_histo=$row[id_hist];	
}
$pdf->Cell(170);
$pdf -> Image("../../imagenes/logo_sespa2.png",10,10,50,20);
$pdf -> Ln(20);
$pdf -> SetFont('ARIAL','',20);
$pdf->SetTextColor(252,115,35);
$pdf ->Cell(200,10,"CONSTANTES FISIOLOGICAS",0,0,'C');
$pdf -> Ln(10);
$pdf->Ln();
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(89,181,72);
$pdf->Cell(27,7,"HISTORIAL #",0,0,'J');
$pdf->Cell(40,7,$var_histo,0,0,'J');
$pdf->Ln();
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(40,7,'NOMBRE DEL ANIMAL:',0,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(25,7,$var_animal,0,0,'J');
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(20,7,'RAZA:',0,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(20,7,$var_raza,0,0,'J');
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(20,7,'ESPECIE:',0,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(20,7,$var_especie,0,0,'J');
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(40,7,'PROPIETARIO:',0,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(20,7,$var_nom_propie,0,0,'J');
$pdf->Cell(20,7,$var_ape_propie,0,0,'J');
$pdf->Ln();
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(89,181,72);
$pdf->Cell(40,7,"CONSTANTES FISIOLOGICAS",0,0,'J');
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(55,7,'TEMPERATURA:',0,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(25,7,$var_temperatura,0,0,'J');
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(55,7,'FRECUENCIA CARDIACA:',0,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(25,7,$var_frecuencia,0,0,'J');
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->Cell(55,7,'PULSO:',0,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(20,7,$var_pulso,0,0,'J');
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,7,'FRECUENCIA RESPIRATORIA:',0,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(20,7,$var_frecuencia_resp,0,0,'J');
$pdf->Ln();
$pdf->Ln();


$pdf->Output();
mysql_close($db);
?>



