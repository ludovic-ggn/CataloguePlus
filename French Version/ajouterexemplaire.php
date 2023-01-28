<?php
include 'config.php';
  session_start();
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
  $id= mysqli_real_escape_string($conn, $_GET['exemplaireid']);
  $sql="Select * from books where id=$id";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $support=$row['support'];
  $langue=$row['langue'];
  $titre=$row['titre'];
  $auteur=$row['auteur'];
  $parution=$row['parution'];
  $cb=$row['cb'];
  $isbn=$row['isbn'];
  $cout=$row['cout'];
  $editeurs=$row['editeurs'];
  $collection=$row['collection'];
  $collation=$row['collation'];
  $cote=$row['cote'];
  $type=$row['type'];
  $nature=$row['nature'];
  $genres=$row['genres'];
  $public=$row['public'];
  $resume=$row['resume'];

      $sql= "INSERT INTO books (support,langue,titre,auteur,parution,cb,isbn,cout,editeurs,collection,collation,cote,type,nature,genres,public,resume,status,retour,nom,demprunt,reserve,reservecard,finreservation,reservele) values('$support','$langue', '$titre', '$auteur', '$parution','$cb', '$isbn', '$cout', '$editeurs', '$collection', '$collation', '$cote', '$type', '$nature', '$genres', '$public', '$resume', 'Oui', '','','','','','','')";
    $result=mysqli_query($conn,$sql);
    if ($result) {
      header('location:inventaire.php');
    }
?>