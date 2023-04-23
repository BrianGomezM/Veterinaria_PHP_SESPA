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
usuario.nom_usu,
usuario.apellido1_usu,
animal.nomb_pac,
historial.id_pac,
historial.id_hist,
otro_sist_ner.id_otro,
otro_sist_ner.id_list_otro,
otro_sist_ner.estado_otro,
otro_sist_ner.comentario_otro,
listado_otro.id_list_otro AS id_list_otro,
listado_otro.nom_list_otro
FROM
animal
INNER JOIN usuario ON usuario.id_usu = animal.id_usu
INNER JOIN historial ON animal.id_pac = historial.id_pac
INNER JOIN otro_sist_ner ON historial.id_hist = otro_sist_ner.id_hist
INNER JOIN listado_otro ON listado_otro.id_list_otro =
otro_sist_ner.id_list_otro WHERE animal.id_pac = '$var_dato_id' ";

	$res=mysql_query($sql);
while($row=mysql_fetch_array($res))
{
$var_histo=$row[id_hist];
 $var_animal=$row[nomb_pac];
 $var_id_animal=$row[id_pac];
 $var_nom_propie=$row[nom_usu];
 $var_ape_propie=$row[apellido1_usu];
 $id_lista=$row[id_list_otro];
 $lista_linfo=$row[nom_list_otro];
 $estado=$row[estado_otro];
 $comentario=$row[comentario_otro];
}
$pdf->Cell(170);
$pdf -> Image("../../imagenes/logo_sespa2.png",10,10,50,20);
$pdf -> Ln(20);
$pdf -> SetFont('ARIAL','',20);
$pdf->SetTextColor(252,115,35);
$pdf ->Cell(200,10,"OTROS SISTEMA NERVIOSO",0,0,'C');
$pdf -> Ln(10);
$pdf->Ln();
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(89,181,72);
$pdf->Cell(27,7,"HISTORIAL # ",0,0,'J');
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
$pdf->Cell(40,7,'PROPIETARIO:',0,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(20,7,$var_nom_propie,0,0,'J');
$pdf->Cell(20,7,$var_ape_propie,0,0,'J');
$pdf->Ln();
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(89,181,72);
$pdf->Cell(40,7,"OTROS SISTEMA NERVIOSO",0,0,'J');
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(89,181,72);
$pdf->Cell(55,7,'EXAMENES',1,0,'J');
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(89,181,72);
$pdf->Cell(20,7,'ESTADO',1,0,'J');

$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(89,181,72);
$pdf->Cell(100,7,'COMENTARIO',1,0,'J');

$sql="SELECT
	  listado_otro.nom_list_otro,
	  otro_sist_ner.id_list_otro,
	  otro_sist_ner.estado_otro,
	  otro_sist_ner.comentario_otro,
	  historial.id_hist
	FROM
	  listado_otro
	  INNER JOIN otro_sist_ner ON listado_otro.id_list_otro =
		otro_sist_ner.id_list_otro
	  INNER JOIN historial ON historial.id_hist = otro_sist_ner.id_hist WHERE  historial.id_hist='$var_histo' AND listado_otro.id_list_otro='1'";							

$res=mysql_query($sql);
while($row=mysql_fetch_array($res))
	{
		 $id_lista=$row[id_list_otro];
		 $lista_linfo1=$row[nom_list_otro];
		 $estado1=$row[estado_otro];
		 $comentario1=$row[comentario_otro];
	}
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,10,$lista_linfo1,1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(20,10,$estado1,1,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(100,10,$comentario1,1,0,'C');

$sql="SELECT
	  listado_otro.nom_list_otro,
	  otro_sist_ner.id_list_otro,
	  otro_sist_ner.estado_otro,
	  otro_sist_ner.comentario_otro,
	  historial.id_hist
	FROM
	  listado_otro
	  INNER JOIN otro_sist_ner ON listado_otro.id_list_otro =
		otro_sist_ner.id_list_otro
	  INNER JOIN historial ON historial.id_hist = otro_sist_ner.id_hist WHERE  historial.id_hist='$var_histo' AND listado_otro.id_list_otro='2'";							

$res=mysql_query($sql);
while($row=mysql_fetch_array($res))
	{
		 $id_lista=$row[id_list_otro];
		 $lista_linfo1=$row[nom_list_otro];
		 $estado1=$row[estado_otro];
		 $comentario1=$row[comentario_otro];
	}
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,10,$lista_linfo1,1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(20,10,$estado1,1,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(100,10,$comentario1,1,0,'C');

$sql="SELECT
	  listado_otro.nom_list_otro,
	  otro_sist_ner.id_list_otro,
	  otro_sist_ner.estado_otro,
	  otro_sist_ner.comentario_otro,
	  historial.id_hist
	FROM
	  listado_otro
	  INNER JOIN otro_sist_ner ON listado_otro.id_list_otro =
		otro_sist_ner.id_list_otro
	  INNER JOIN historial ON historial.id_hist = otro_sist_ner.id_hist WHERE  historial.id_hist='$var_histo' AND listado_otro.id_list_otro='3'";							

$res=mysql_query($sql);
while($row=mysql_fetch_array($res))
	{
		 $id_lista=$row[id_list_otro];
		 $lista_linfo1=$row[nom_list_otro];
		 $estado1=$row[estado_otro];
		 $comentario1=$row[comentario_otro];
	}
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,10,$lista_linfo1,1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(20,10,$estado1,1,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(100,10,$comentario1,1,0,'C');

$sql="SELECT
	  listado_otro.nom_list_otro,
	  otro_sist_ner.id_list_otro,
	  otro_sist_ner.estado_otro,
	  otro_sist_ner.comentario_otro,
	  historial.id_hist
	FROM
	  listado_otro
	  INNER JOIN otro_sist_ner ON listado_otro.id_list_otro =
		otro_sist_ner.id_list_otro
	  INNER JOIN historial ON historial.id_hist = otro_sist_ner.id_hist WHERE  historial.id_hist='$var_histo' AND listado_otro.id_list_otro='4'";							

$res=mysql_query($sql);
while($row=mysql_fetch_array($res))
	{
		 $id_lista=$row[id_list_otro];
		 $lista_linfo1=$row[nom_list_otro];
		 $estado1=$row[estado_otro];
		 $comentario1=$row[comentario_otro];
	}
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,10,$lista_linfo1,1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(20,10,$estado1,1,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(100,10,$comentario1,1,0,'C');

$sql="SELECT
	  listado_otro.nom_list_otro,
	  otro_sist_ner.id_list_otro,
	  otro_sist_ner.estado_otro,
	  otro_sist_ner.comentario_otro,
	  historial.id_hist
	FROM
	  listado_otro
	  INNER JOIN otro_sist_ner ON listado_otro.id_list_otro =
		otro_sist_ner.id_list_otro
	  INNER JOIN historial ON historial.id_hist = otro_sist_ner.id_hist WHERE  historial.id_hist='$var_histo' AND listado_otro.id_list_otro='5'";							

$res=mysql_query($sql);
while($row=mysql_fetch_array($res))
	{
		 $id_lista=$row[id_list_otro];
		 $lista_linfo1=$row[nom_list_otro];
		 $estado1=$row[estado_otro];
		 $comentario1=$row[comentario_otro];
	}
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,10,$lista_linfo1,1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(20,10,$estado1,1,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(100,10,$comentario1,1,0,'C');

$sql="SELECT
	  listado_otro.nom_list_otro,
	  otro_sist_ner.id_list_otro,
	  otro_sist_ner.estado_otro,
	  otro_sist_ner.comentario_otro,
	  historial.id_hist
	FROM
	  listado_otro
	  INNER JOIN otro_sist_ner ON listado_otro.id_list_otro =
		otro_sist_ner.id_list_otro
	  INNER JOIN historial ON historial.id_hist = otro_sist_ner.id_hist WHERE  historial.id_hist='$var_histo' AND listado_otro.id_list_otro='6'";							

$res=mysql_query($sql);
while($row=mysql_fetch_array($res))
	{
		 $id_lista=$row[id_list_otro];
		 $lista_linfo1=$row[nom_list_otro];
		 $estado1=$row[estado_otro];
		 $comentario1=$row[comentario_otro];
	}
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,10,$lista_linfo1,1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(20,10,$estado1,1,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(100,10,$comentario1,1,0,'C');

$sql="SELECT
	  listado_otro.nom_list_otro,
	  otro_sist_ner.id_list_otro,
	  otro_sist_ner.estado_otro,
	  otro_sist_ner.comentario_otro,
	  historial.id_hist
	FROM
	  listado_otro
	  INNER JOIN otro_sist_ner ON listado_otro.id_list_otro =
		otro_sist_ner.id_list_otro
	  INNER JOIN historial ON historial.id_hist = otro_sist_ner.id_hist WHERE  historial.id_hist='$var_histo' AND listado_otro.id_list_otro='7'";							

$res=mysql_query($sql);
while($row=mysql_fetch_array($res))
	{
		 $id_lista=$row[id_list_otro];
		 $lista_linfo1=$row[nom_list_otro];
		 $estado1=$row[estado_otro];
		 $comentario1=$row[comentario_otro];
	}
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,10,$lista_linfo1,1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(20,10,$estado1,1,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(100,10,$comentario1,1,0,'C');

$sql="SELECT
	  listado_otro.nom_list_otro,
	  otro_sist_ner.id_list_otro,
	  otro_sist_ner.estado_otro,
	  otro_sist_ner.comentario_otro,
	  historial.id_hist
	FROM
	  listado_otro
	  INNER JOIN otro_sist_ner ON listado_otro.id_list_otro =
		otro_sist_ner.id_list_otro
	  INNER JOIN historial ON historial.id_hist = otro_sist_ner.id_hist WHERE  historial.id_hist='$var_histo' AND listado_otro.id_list_otro='8'";							

$res=mysql_query($sql);
while($row=mysql_fetch_array($res))
	{
		 $id_lista=$row[id_list_otro];
		 $lista_linfo1=$row[nom_list_otro];
		 $estado1=$row[estado_otro];
		 $comentario1=$row[comentario_otro];
	}
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,10,$lista_linfo1,1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(20,10,$estado1,1,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(100,10,$comentario1,1,0,'C');


$pdf->Output();
mysql_close($db);
?>




