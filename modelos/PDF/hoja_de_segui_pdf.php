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
//Pie de p�gina
function Footer()
{
$this->SetY(-10);
$this->SetFont('Arial',8);
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
//Creaci�n del objeto de la clase heredada
$pdf=new FPDF;
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
//Aqu� escribimos lo que deseamos mostrar
$sql="SELECT
usuario.nom_usu,
usuario.apellido1_usu,
animal.nomb_pac,
historial.id_pac,
historial.id_hist,
hoja_seguimiento.id_notas_progreso,
hoja_seguimiento.fecha_nota_progreso,
hoja_seguimiento.subjetivo_nota_progreso,
hoja_seguimiento.objetivo_nota_progreso,
hoja_seguimiento.plan_diagnostico_nota_progreso

FROM
animal
INNER JOIN usuario ON usuario.id_usu = animal.id_usu
INNER JOIN historial ON animal.id_pac = historial.id_pac 
INNER JOIN hoja_seguimiento ON historial.id_hist = hoja_seguimiento.id_hist WHERE animal.id_pac = '$var_dato_id' ";

	$res=mysql_query($sql);
while($row=mysql_fetch_array($res))
{
$var_histo=$row[id_hist];
$var_animal=$row[nomb_pac];
$var_id_animal=$row[id_pac];
$var_nom_propie=$row[nom_usu];
$var_ape_propie=$row[apellido1_usu];
$id_lista=$row[fecha_nota_progreso];
$lista_linfo=$row[subjetivo_nota_progreso];
$estado=$row[objetivo_nota_progreso];
$comentario=$row[plan_diagnostico_nota_progreso];
}
$pdf->Cell(170);
$pdf -> Image("../../imagenes/logo_sespa2.png",10,10,50,20);
$pdf -> Ln(20);
$pdf -> SetFont('ARIAL','',20);
$pdf->SetTextColor(252,115,35);
$pdf ->Cell(200,10,"HOJA DE SEGUIMIENTO",0,0,'C');
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
$pdf->Cell(40,7,"NOTAS DE PROGRESO",0,0,'J');
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(50,7,'FECHA Y HORA :',0,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(25,7,$id_lista,0,0,'J');
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(50,7,'SUBJETIVO:',0,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(25,7,$lista_linfo,0,0,'J');
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(50,7,'OBJETIVO:',0,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(25,7,$estado,0,0,'J');
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(50,7,'PLAN DE DIAGNOSTICO:',0,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(25,7,$comentario,0,0,'J');
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->Ln();


$pdf->Output('');
mysql_close($db);
?>



