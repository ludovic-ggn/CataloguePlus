<?php
  session_start();
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
$username=$_SESSION['username'];

  include 'config.php';

   $sql="Select * from site where id=1";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $infobiblio=$row['infobiblio'];
  $infoville=$row['infoville'];
  $infoadresse=$row['infoadresse'];
  $infonum=$row['infonum'];
  $infoemail=$row['infoemail'];
  $infolundimatin=$row['infolundimatin'];
  $infolundimidi=$row['infolundimidi'];
  $infomardimatin=$row['infomardimatin'];
  $infomardimidi=$row['infomardimidi'];
  $infomercredimatin=$row['infomercredimatin'];
  $infomercredimidi=$row['infomercredimidi'];
  $infojeudimatin=$row['infojeudimatin'];
  $infojeudimidi=$row['infojeudimidi'];
  $infovendredimatin=$row['infovendredimatin'];
  $infovendredimidi=$row['infovendredimidi'];
  $infosamedimatin=$row['infosamedimatin'];
  $infosamedimidi=$row['infosamedimidi'];
  $infodimanchematin=$row['infodimanchematin'];
  $infodimanchemidi=$row['infodimanchemidi'];

  
  $id= mysqli_real_escape_string($conn, $_GET['viewid']);
  $sql="Select * from books where id=$id";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $titre=$row['titre'];
  $retour=$row['retour'];
  $nom=$row['nom'];
  $demprunt=$row['demprunt'];

$j = date('d-m-Y');
require('fpdf.php');

$pdf = new FPDF();
$pdf->SetAuthor($infobiblio);
$pdf->SetCreator($infobiblio);
$pdf->SetSubject('Reminder');
$pdf->SetTitle('Reminder');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,'Reminder',0,0,'C');
$pdf -> Ln(10);
$pdf->SetFont('Arial','',10);
$pdf->Cell(10,10,'On :');
$pdf->Cell(10,10,$j);
$pdf -> Ln(10);
$pdf->SetFont('Arial','',10);
$pdf->Cell(35,5,'Subscriber Number :');
$pdf->Cell(0,5,$nom);
$pdf -> Ln(20);
$pdf->Cell(0,0,'Hello,');
$pdf -> Ln(5);
$pdf->Cell(0,0,'Unless we are mistaken, you have not returned the following document(s) :');
$pdf -> Ln(8);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(12,0,'- Title : ');
$pdf->SetFont('Arial','',10);
$pdf->Cell(40,0,$titre);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(30,0,'Borrowed on :');
$pdf->SetFont('Arial','',10);
$pdf->Cell(40,0,$demprunt);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(40,0,'Expected return date :');
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,0,$retour);
$pdf -> Ln(25);
$pdf->Cell(0,0,'However, if you have returned the above document(s), please contact us.');
$pdf -> Ln(5);
$pdf->Cell(0,0,"Please accept,Madam, Sir, the expression of our distinguished greetings");
$pdf->Output();
?>