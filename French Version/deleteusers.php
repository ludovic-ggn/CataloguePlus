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
	if ($id == 1) {
		echo "Vous ne pouvez pas supprimer l'utilisateur n°1";
		echo '<a href="users.php">Retour</a>';
	}else{
	$sql="delete from users where id=$id";
	$result=mysqli_query($conn,$sql);
	if ($result){
		header('location:users.php');
	}
}
}
?>