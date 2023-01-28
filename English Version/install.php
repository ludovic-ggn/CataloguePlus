<?php
require 'config.php';
$sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA LIKE '$db1';";
if ($result = mysqli_query($conn, $sql)) {
$rowcount = mysqli_num_rows( $result );
}
if ($rowcount == 7) {
echo 'The database is already installed';
}else{
$sql= "CREATE TABLE abonné (
id INT(11) AUTO_INCREMENT PRIMARY KEY,
genre VARCHAR(255) NOT NULL,
nom VARCHAR(255) NOT NULL,
prenom VARCHAR(255) NOT NULL,
adresse VARCHAR(255) NOT NULL,
tel VARCHAR(255) NOT NULL,
naissance VARCHAR(255) NOT NULL
)";
    $result=mysqli_query($conn,$sql);
    if ($result) {
    // A rajouter si besoin
    }
$sql= "CREATE TABLE actu (
id INT(11) AUTO_INCREMENT PRIMARY KEY,
titre TEXT NOT NULL,
du VARCHAR(255) NOT NULL,
au VARCHAR(255) NOT NULL,
message TEXT NOT NULL
)";
    $result=mysqli_query($conn,$sql);
    if ($result) {
    // A rajouter si besoin
    }
$sql= "CREATE TABLE `books` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `support` varchar(255) NOT NULL,
  `langue` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `parution` varchar(255) NOT NULL,
  `cb` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `cout` varchar(255) NOT NULL,
  `editeurs` varchar(255) NOT NULL,
  `collection` varchar(255) NOT NULL,
  `collation` varchar(255) NOT NULL,
  `cote` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `nature` varchar(255) NOT NULL,
  `genres` varchar(255) NOT NULL,
  `public` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `retour` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `demprunt` varchar(255) NOT NULL,
  `reserve` varchar(255) NOT NULL,
  `reservecard` varchar(255) NOT NULL,
  `finreservation` varchar(255) NOT NULL,
  `reservele` varchar(255) NOT NULL)";

    $result=mysqli_query($conn,$sql);
    if ($result) {
    // A rajouter si besoin
    }
$sql="CREATE TABLE `site` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `infobiblio` varchar(255) NOT NULL COMMENT 'Nom de la biblio',
  `infoville` varchar(255) NOT NULL COMMENT 'Ville',
  `infoadresse` varchar(255) NOT NULL COMMENT 'Adresse de la biblio',
  `infonum` varchar(255) NOT NULL COMMENT 'Numero Tel de la biblio',
  `infoemail` varchar(255) NOT NULL COMMENT 'Adresse Mail de la biblio',
  `infolundimatin` varchar(255) NOT NULL,
  `infolundimidi` varchar(255) NOT NULL,
  `infomardimatin` varchar(255) NOT NULL,
  `infomardimidi` varchar(255) NOT NULL,
  `infomercredimatin` varchar(255) NOT NULL,
  `infomercredimidi` varchar(255) NOT NULL,
  `infojeudimatin` varchar(255) NOT NULL,
  `infojeudimidi` varchar(255) NOT NULL,
  `infovendredimatin` varchar(255) NOT NULL,
  `infovendredimidi` varchar(255) NOT NULL,
  `infosamedimatin` varchar(255) NOT NULL,
  `infosamedimidi` varchar(255) NOT NULL,
  `infodimanchematin` varchar(255) NOT NULL,
  `infodimanchemidi` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
)";
    $result=mysqli_query($conn,$sql);
    if ($result) {
    // A rajouter si besoin
    }

$sql="CREATE TABLE `periodiques` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `support` varchar(255) NOT NULL,
  `langue` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `editeurs` varchar(255) NOT NULL,
  `public` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `finabonnement` varchar(255) NOT NULL
)";
    $result=mysqli_query($conn,$sql);
    if ($result) {
    // A rajouter si besoin
    }
$sql="CREATE TABLE `suggestion` (
`id` int(11) AUTO_INCREMENT PRIMARY KEY,
`titre` varchar(255) NOT NULL,
`auteur` varchar(255) NOT NULL
)";
  $result=mysqli_query($conn, $sql);
  if ($result) {
    // A rajouter si besoin
  }


$sql= "CREATE TABLE `users` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
)";
    $result=mysqli_query($conn,$sql);
    if ($result) {
    echo 'BDD OK';
    }
}

  if(isset($_POST['submit'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "INSERT into `users` (username, password)
              VALUES ('$username','".hash('sha256', $password)."')";
    $res = mysqli_query($conn, $query);
    if($res){
      // A rajouter si besoin
    }

    $infobiblio= mysqli_real_escape_string($conn, $_POST['infobiblio']);
    $infoville= mysqli_real_escape_string($conn, $_POST['infoville']);
    $infoadresse= mysqli_real_escape_string($conn, $_POST['infoadresse']);
    $infonum= mysqli_real_escape_string($conn, $_POST['infonum']);
    $infoemail= mysqli_real_escape_string($conn, $_POST['infoemail']);
    $infolundimatin= mysqli_real_escape_string($conn, $_POST['infolundimatin']);
    $infolundimidi= mysqli_real_escape_string($conn, $_POST['infolundimidi']);
    $infomardimatin= mysqli_real_escape_string($conn, $_POST['infomardimatin']);
    $infomardimidi= mysqli_real_escape_string($conn, $_POST['infomardimidi']);
    $infomercredimatin= mysqli_real_escape_string($conn, $_POST['infomercredimatin']);
    $infomercredimidi= mysqli_real_escape_string($conn, $_POST['infomercredimidi']);
    $infojeudimatin= mysqli_real_escape_string($conn, $_POST['infojeudimatin']);
    $infojeudimidi= mysqli_real_escape_string($conn, $_POST['infojeudimidi']);
    $infovendredimatin= mysqli_real_escape_string($conn, $_POST['infovendredimatin']);
    $infovendredimidi= mysqli_real_escape_string($conn, $_POST['infovendredimidi']);
    $infosamedimatin= mysqli_real_escape_string($conn, $_POST['infosamedimatin']);
    $infosamedimidi= mysqli_real_escape_string($conn, $_POST['infosamedimidi']);
    $infodimanchematin= mysqli_real_escape_string($conn, $_POST['infodimanchematin']);
    $infodimanchemidi= mysqli_real_escape_string($conn, $_POST['infodimanchemidi']);
    $titre= mysqli_real_escape_string($conn, $_POST['titre']);
    $description= mysqli_real_escape_string($conn, $_POST['description']);

    $sql= "INSERT INTO site (infobiblio,infoville,infoadresse,infonum,infoemail,infolundimatin,infolundimidi,infomardimatin,infomardimidi,infomercredimatin,infomercredimidi,infojeudimatin,infojeudimidi,infovendredimatin,infovendredimidi,infosamedimatin,infosamedimidi,infodimanchematin,infodimanchemidi,titre,description) values('$infobiblio','$infoville','$infoadresse','$infonum','$infoemail','$infolundimatin','$infolundimidi','$infomardimatin','$infomardimidi','$infomercredimatin','$infomercredimidi','$infojeudimatin','$infojeudimidi','$infovendredimatin','$infovendredimidi','$infosamedimatin','$infosamedimidi','$infodimanchematin','$infodimanchemidi','$titre','$description')";
    $result=mysqli_query($conn,$sql);
    if ($result) {
       header('location:fininstallation.php');
    }
  }

?>

<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>CataloguePlus - Installation</title>
  <style type="text/css">
h1{
text-align: center;
color: white;
background-color: #3D464D;
line-height: 100px;
}
a{
  text-decoration: none;
}

h2{
  text-align: center;
  color: white;
  background-color: #3D464D;
  line-height: 50px;
}


input{
  margin-left: 50px;
}

label{
  line-height: 50px;
}

table
{
margin: auto;
}
td
{
text-align :center;
}
.bouton{
  height: auto;
  width: auto;
  text-align: center;
  align-items: center;
  justify-content: center;
}


  </style>
</head>
<body>
<h1>INSTALLATION OF CATALOGUEPLUS</h1>
<h3>Before you start, make sure you have read the installation instructions <a href="notice.pdf">by clicking here.</a></h3>
<h3 style="color: red;">WARNING do not leave the page until the end of the installation</h3>
<h3>All information entered below is easily editable after installation from the admin interface</h3>
<form method="post">
<h2>Creation of the first administration account</h2>
<label style="margin-right: 50px;">Username :</label>
<input type="text" name="username" autocomplete="off" required>
<p>For obvious security reasons, it is advisable not to choose a user name that is too simple to become, such as admin, management, etc.</p>
<label style="margin-right: 83px;">Password :</label>
<input type="password" name="password" autocomplete="off" required>
<p>Fot obvious security reasons, it is advisable not to choose a password that is too easy to guess, such as admin, management, etc.</p>
<h2>Library Information</h2>
<label style="margin-right: 13px;">Library Name</label>
<input type="text" name="infobiblio" autocomplete="off" required>
<br>
<label style="margin-right: 164px;">City</label>
<input type="text" name="infoville" autocomplete="off" required>
<br>
<label style="margin-right: 137px;">Address</label>
<input type="text" name="infoadresse" autocomplete="off" required>
<br>
<label style="margin-right: 25px;">Phone Number</label>
<input type="text" name="infonum" autocomplete="off" required>
<br>
<label style="margin-right: 154px;">Mail Address</label>
<input type="email" name="infoemail" autocomplete="off" required>
<br>
<h2>Schedules</h2>
<div>
<table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          Day
                        </th>
                        <th class="text-center">
                          Morning
                        </th>
                        <th class="text-center">
                          Afternoon
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          Monday
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infolundimatin" autocomplete="off">
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infolundimidi" autocomplete="off">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Tuesday
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infomardimatin" autocomplete="off">
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infomardimidi" autocomplete="off">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Wednesday
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infomercredimatin" autocomplete="off">
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infomercredimidi" autocomplete="off">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Thursday
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infojeudimatin" autocomplete="off">
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infojeudimidi" autocomplete="off">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Friday
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infovendredimatin" autocomplete="off">
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infovendredimidi" autocomplete="off">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Saturday
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infosamedimatin" autocomplete="off">
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infosamedimidi" autocomplete="off">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Sunday
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infodimanchematin" autocomplete="off">
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infodimanchemidi" autocomplete="off">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
<h2>Online portal home page</h2>
<label style="margin-right:160;">Title</label>
<input type="text" name="titre" autocomplete="off" required>
<br>
<label style="margin-right: 104px;">Description</label>
<input type="text" name="description" autocomplete="off" required>
<br>
<div class="bouton">
<button type="submit" name="submit">Install</button>
</div>
</form>
</body>
</html>