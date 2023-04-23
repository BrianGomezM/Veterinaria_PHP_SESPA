<?php
require_once('../../herramientas/configuracion/vars.php'); // ruta relativa a include/config.php
require_once('../../herramientas/configuracion/connect.php'); // ruta relativa a include/config.php
require_once('../controlador/ctrl_consulta_via_de_administracion.php'); 
$db=conectar();
session_name($session_name);
session_start();

$var_dato_id=$_POST[id_pdf];
require_once("../../fpdf17/fpdf.php");
class PDF extends FPDF
{
function Header()
{
    global $title;
	$this -> Image("../../imagenes/logo_sespa2.png",10,8,33);
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Calculamos ancho y posición del título.
    $this->Ln(10);
}
//Pie de página
function Footer()
{
    //Posición a 1,5 cm del final
    $this->SetY(-15);
    //Arial itálica 8
    $this->SetFont('Arial','I',8);
    //Color del texto en gris
    $this->SetTextColor(128);
    //Número de página
    $this->Cell(0,10,' 2013 SESPA  '.$this->PageNo(),1,1,'C');
}
}
//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
//Aquí escribimos lo que deseamos mostrar
$sql="SELECT
		  animal.id_pac,
		  usuario.nom_usu,
		  usuario.apellido1_usu,
		  animal.nomb_pac,
		  lesion.macula_les,
		  lesion.papula_les,
		  lesion.pustula_les,
		  lesion.habon_les,
		  lesion.vesicula_les,
		  lesion.placa_les,
		  lesion.nodulo_les,
		  lesion.tumor_les,
		  lesion.quiste_les,
		  lesion.comedon_les,
		  lesion.collarete_epidemico,
		  lesion.escama,
		  lesion.costra,
		  lesion.excoriacion,
		  lesion.erosion,
		  lesion.liquenificacion,
		  lesion.ulcera,
		  lesion.hiperpigmentacion,
		  lesion.hipopigmentacion,
		  lesion.cicatriz,
		  historial.id_hist,
		  usuario.id_usu
		FROM
		  animal
		  INNER JOIN historial ON animal.id_pac = historial.id_pac
		  INNER JOIN lesion ON historial.id_hist =
			lesion.id_hist
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
	 $var_histo=$row[id_hist];
	 $var_animal=$row[nomb_pac];
	 $var_id_animal=$row[id_pac];
	 $var_nom_propie=$row[nom_usu];
	 $var_ape_propie=$row[apellido1_usu];
	 $var_raza=$row[nom_esp];
	 $var_especie=$row[nom_raza];
	 $macula=$row[macula_les];
	 $papula=$row[papula_les];
	 $pustula=$row[pustula_les];
	 $vesicula=$row[vesicula_les];
	 $placa=$row[placa_les];
	 $nodulo=$row[nodulo_les];
	 $tumor=$row[tumor_les];
	 $quiste=$row[quiste_les];
	 $comedon=$row[comedon_les];
	 $collarete=$row[collarete_epidemico];
	 $escama=$row[escama];
	 $costra=$row[costra];
	 $excoriacion=$row[excoriacion];
	 $erosion=$row[erosion];
	 $liquenificacion=$row[liquenificacion];
	 $ulcera=$row[ulcera];
	 $hiperpigmentacion=$row[hiperpigmentacion];
	 $hipopigmentacion=$row[hipopigmentacion];
	 $habon=$row[habon_les];
	 $cicatriz=$row[cicatriz];
	 $var_histo=$row[id_hist];	
}
$pdf->Cell(170);
// $pdf -> Image("../../imagenes/logo_sespa2.png",10,10,50,20);
$pdf -> Ln(20);
$pdf -> SetFont('ARIAL','',20);
$pdf->SetTextColor(252,115,35);
$pdf ->Cell(200,10,"LESIONES",0,0,'C');
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
$pdf->Cell(40,7,"LESIONES",0,0,'J');
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(89,181,72);
$pdf->Cell(55,7,'LESIONES PRIMARIAS',1,0,'J');
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(89,181,72);
$pdf->Cell(15,7,'SI - NO',1,0,'J');
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(89,181,72);
$pdf->Cell(55,7,'LESIONES SECUNDARIAS',1,0,'J');
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(89,181,72);
$pdf->Cell(15,7,'SI - NO',1,0,'J');
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,7,'MACULA',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,$macula,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(55,7,'COMEDON',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,$comedon,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,7,'PAPULA',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,$papula,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(55,7,'COLLARETE EPIDERMICO',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,$collarete,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,7,'PUSTULA',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,$pustula,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(55,7,'ESCAMA',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,$escama,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,7,'HABON',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,$habon,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(55,7,'COSTRA',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,$costra,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,7,'VESICULA',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,$vesicula,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(55,7,'EXCORIACION',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,$excoriacion,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,7,'PLACA',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,$placa,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(55,7,'EROSION',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,$erosion,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,7,'NODULO',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,$nodulo,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(55,7,'LIQUENIFICACION',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,$liquenificacion,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,7,'TUMOR',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,$tumor,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(55,7,'ULCERA',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,$ulcera,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,7,'QUISTE',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,$quiste,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(55,7,'HIPERPIGMENTACION',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,$hiperpigmentacion,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,7,'',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,'',1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(55,7,'HIPOPIGMENTACION',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,$hipopigmentacion,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->SetTextColor(35,130,118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,7,'',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,'',1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(35,130,118);
$pdf->Cell(55,7,'CICATRIZ',1,0,'J');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(15,7,$cicatriz,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->Ln();


$pdf->Output();
mysql_close($db);
?>



