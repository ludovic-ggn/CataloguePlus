<?php
  session_start();
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>

<?php
include 'config.php';
if(isset($_GET['deleteid'])){
	$id= mysqli_real_escape_string($conn, $_GET['deleteid']);

	$sql="delete from periodiques where id=$id";
	$result=mysqli_query($conn,$sql);
	if ($result){
		header('location:gestiondesperiodiques.php');
	}
}
?>