<?php
//Incluimos la libreria fpdf
require("../fpdf/fpdf.php");
//Incluimos el archivo de conexion a la base de datos
include("../php/master.php");

//creamos una clase para ocupar el encabezado y pie de pagina en el PDF
class PDF extends FPDF
{
//El metodo para crear el encabezado
function Header()
{
    $this->SetFont('Arial','B',12); //Tipo de letra, estilo y tamaño
    $this->Cell(0,10,'MENU COMEDOR AIMCO',0,1,'C'); //Titulo del reporte

//Encabezado de la tabla
    $this->Cell(30,10,'Dia Semana',1,0,'C'); //ancho,alto,dato,borde,salto,alineacion centrado**
    $this->Cell(60,10,'Usuario',1,0,'C'); //**
    $this->Cell(100,10,'Platillo',1,1,'C'); //**
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página

    $this->Cell(0,10,'Pag '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//ahora instanseamos un objeto de la clase fpdf para empezar a armar el PDF con orientacion vertical, margenes en milimetros y tamaño de papel carta
$pdf = new PDF('P','mm','Letter');

//Utilizamos el siguiente metodo para cargar una nueva pagina en el PDF
$pdf->AddPage();
$pdf->AliasNbPages();
//Asiganamos el tipo de fuente, el estilo y el tamaño de letra
$pdf->SetFont('Arial','',10);
//Definimos el color de la letra
$pdf->SetTextColor(0x00,0x00,0x00);

//generamos la consulta en la siguiente variable
//obtenemos todos los datos de la tabla alumnos segun el curso al que pertenecen
$listado = mysql_query("SELECT * FROM menu ORDER BY ID ASC");


//Ahora mediante un bucle construimos el reporte
//Pero primero validemos si existen alumnos en ese curso nos cargue los datos
if(mysql_num_rows($listado)>0){
while($fila = mysql_fetch_array($listado)){
 $pdf->Cell(30,5,$fila['DiaSemana'],1,0); //id
 $pdf->Cell(60,5,$fila['Usuario'],1,0); //Celda con ancho de 50, alto de 10, el dato, borde 1, sin salto de linea**
 $pdf->Cell(100,5,$fila['Platillo'],1,1); //**
}
}
else{
$pdf->Cell(0,10,"No existen registros",0,0,"C");
}
//Ejecutar el pdf en una nueva pestaña y al guardarlo sugiere el nombre de archivo
$pdf->Output('Menu semanal.pdf','I');
?>
