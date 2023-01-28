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
		echo "You cannot delete the first user";
		echo '<a href="users.php">Go Back</a>';
	}else{
	$sql="delete from users where id=$id";
	$result=mysqli_query($conn,$sql);
	if ($result){
		header('location:users.php');
	}
}
}
?>