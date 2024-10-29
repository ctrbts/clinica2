<?php
 session_start();
 require_once ("funciones.php"); 
 require('fpdf.php');
 $db = conectar_admin();
 $fechaInicio=$_POST['fechaInicio'];
 $fechaFin=$_POST['fechaFin'];
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    global $title;
 //Calculamos ancho y posición del título.
 $w=$this->GetStringWidth($title)+6;
 $this->SetX((210-$w)/2);
 //Colores de los bordes, fondo y texto
 $this->SetDrawColor(0,80,180);
 $this->SetFillColor(230,230,0);
 $this->SetTextColor(220,50,50);
 //Ancho del borde (1 mm)
 $this->SetLineWidth(1);
 //Título
 $this->Cell($w,9,$title,1,1,'C',1);
 //Salto de línea
 $this->Ln(10);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(60,15,'PAGINA DE PRUEBA',1,0,'D');
    // Salto de línea
    $this->Ln(15);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
function ChapterTitle($num,$label)
{
 //Arial 12
 $this->SetFont('Arial','',12);
 //Color de fondo
 $this->SetFillColor(200,220,255);
 //Título
 $this->Cell(0,6,"Capítulo $num : $label",0,1,'L',1);
 //Salto de línea
 $this->Ln(4);
}

}

if($fechaInicio > $fechaFin){
			      $url='consultar.php?valor=1';
			  redirigir($url); 
				   
              
 	}
else{
				
				
				$consulta="select * from historiaclinica";
				$resultado=mysql_query($consulta);
				$pdf = new FPDF();
				$pdf->AliasNbPages();
				$pdf->AddPage();
				$pdf->Image('imagenes/UNLP_Logo.jpg',20,20,-300);
				$title='ACTA Hospital Odontologico Universitario';
				$pdf->SetTitle($title);
				$pdf->SetFont('Arial','B',15);
				
				$fila=mysql_fetch_assoc($resultado);
				while ($fila=mysql_fetch_assoc($resultado)){
				    $cadenaFecha="'".$fila['anos']."' '-' '".$fila['mes']."' '-' '".$fila['dia']."' "; 
					if( ($cadenaFecha >= $fechaInicio) &&($cadenaFecha <= $fechaFin)){
								$pdf->Cell(40,10,$fila['plan'],0,1);
								//$pdf->Cell(40,10, $fila['materia'],0,1);
					
					
					}
				}
				$pdf->Output();

 }

  ?>