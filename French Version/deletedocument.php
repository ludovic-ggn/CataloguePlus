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

	$sql="delete from books where id=$id";
	$result=mysqli_query($conn,$sql);
	if ($result){
		header('location:inventaire.php');
	}else{
		die(mysqli_error($conn));
	}
}
?>