<?php
  session_start();
  if(!isset($_SESSION["carte"])){
    header("Location: identification.php");
    exit();
  }
$carte = $_SESSION['carte'];
include 'config.php';


if(isset($_GET['reservation'])){
$reservation= mysqli_real_escape_string($conn, $_GET['reservation']);

$date = date('Y-m-d');
$sql="update books set id=$reservation,reserve='Yes',reservecard='$carte',reservele='$date' where id=$reservation";
  $result=mysqli_query($conn,$sql);
  if ($result){
    header('location:moncompte.php');
  }else{
    die(mysqli_error($conn));
  }
}
?>