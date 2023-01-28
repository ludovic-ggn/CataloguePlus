<?php
  session_start();
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
  
  include 'config.php';
  $id= mysqli_real_escape_string($conn, $_GET['annulation']);
  $sql="update books set id=$id,reserve='',reservecard='',finreservation='',reservele='' where id=$id";
    $result=mysqli_query($conn,$sql);
    if ($result) {
       // echo "Données modifiés";
      header('location:reservation.php');
    } else {
      die(mysqli_error($sql));
    }
?> 