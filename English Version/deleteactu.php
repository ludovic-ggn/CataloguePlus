<?php
  session_start();
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>

<?php
include 'config.php';
if(isset($_GET['actuid'])){
	$id= mysqli_real_escape_string($conn, $_GET['actuid']);

	$sql="delete from actu where id=$id";
	$result=mysqli_query($conn,$sql);
	if ($result){
		header('location:gesportail.php');
	}else{
		die(mysqli_error($conn));
	}
}
?>