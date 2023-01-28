<?php
  session_start();
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
  }
$username=$_SESSION['username'];
?>
<?php
include 'config.php';
?>


<?php
$date = date('Y-m-d');
$retour =  date('Y-m-d', strtotime($date. ' + 15 days'));


  if(isset($_POST['submitpret'])){
    $nom= mysqli_real_escape_string($conn, $_POST['nom']);
    $id= mysqli_real_escape_string($conn, $_POST['id']);
    $sql="SELECT * FROM books WHERE id=$id";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $reserve=$row['reserve'];
    $carte=$row['reservecard'];
    if ($reserve == 'Yes' AND $nom !=$carte){
      echo '<script>alert("ATTENTION BORROWING IMPOSSIBLE THIS DOCUMENT IS RESERVED");</script>';
    }else{  

        $sql="update books set id=$id,status='No',nom='$nom',retour='$retour',demprunt='$date',reserve='No',reservecard='',reservele='' where id=$id";
    $result=mysqli_query($conn,$sql);
    if ($result) {
    } else {
      die(mysqli_error($sql));
    }
  }
  }
?>



<?php

  if(isset($_POST['submitretour'])){
    $id= mysqli_real_escape_string($conn, $_POST['id']);
    $sql="SELECT reserve FROM books WHERE id=$id";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $reserve=$row['reserve'];
    if ($reserve == 'Yes'){
      echo '<script>alert("ATTENTION THIS DOCUMENT IS RESERVED");</script>';
    }   
    $date = date('Y-m-d');
    $finreservation =  date('Y-m-d', strtotime($date. ' + 5 days'));
    $sql="update books set id=$id,status='Yes',nom='',retour='',demprunt='',finreservation='$finreservation' where id=$id";
    $result=mysqli_query($conn,$sql);
    if ($result) {
       // echo "Données modifiés";
    } else {
      die(mysqli_error($sql));
    }
  }
?>




<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png">
  <link rel="icon" type="image/png" href="/img/favicon.png">
  <title>
    CataloguePlus - Administration
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <meta name="robots" content="noindex">
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="admin.php" class="simple-text logo-mini">
            CP
          </a>
          <a href="admin.php" class="simple-text logo-normal">
            CataloguePlus
          </a>
        </div>
        <ul class="nav">
          <li class="active ">
            <a href="admin.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Home Page</p>
            </a>
          </li>
          <li>
            <a href="inventaire.php">
              <i class="tim-icons icon-book-bookmark"></i>
              <p>Catalog Management</p>
            </a>
          </li>
          <li>
            <a href="gestiondesperiodiques.php">
              <i class="tim-icons icon-paper"></i>
              <p>Periodical Management</p>
            </a>
          </li>
          <li>
            <a href="pret-retour.php">
              <i class="tim-icons icon-check-2"></i>
              <p>Loan-Return</p>
            </a>
          </li>
          <li>
            <a href="retard.php">
              <i class="tim-icons icon-simple-remove"></i>
              <p>Overdue Management</p>
            </a>
          </li>
          <li>
            <a href="reservation.php">
              <i class="tim-icons icon-calendar-60"></i>
              <p>Reservation Management</p>
            </a>
          </li>
          <li>
            <a href="achat.php">
              <i class="tim-icons icon-cart"></i>
              <p>Purchase Suggestions</p>
            </a>
          </li>
          <li>
            <a href="abonnés.php">
              <i class="tim-icons icon-badge"></i>
              <p>Subscriber Management</p>
            </a>
          </li>
          <li>
            <a href="users.php">
              <i class="tim-icons icon-single-02"></i>
              <p>User Management</p>
            </a>
          </li>
          <li>
            <a href="gesportail.php">
              <i class="tim-icons icon-tap-02"></i>
              <p>Portal Management</p>
            </a>
          </li>
          <li>
            <a href="importexport.php">
              <i class="tim-icons icon-upload"></i>
              <p>Import Export</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="admin.php">CataloguePlus</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li>
                <a href="index.php" class="dropdown-toggle nav-link">
                  <i class="tim-icons icon-world"></i>
                </a>
              </li>
              <li>
                <a href="logout.php" class="dropdown-toggle nav-link">
                  <i class="tim-icons icon-button-power"></i>
                </a>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-6">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h2 class="card-title">Quick Loan</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form method="post">
                  <div class="row">
                    <div class="col-md-5 px-md-4">
                      <div class="form-group">
                        <label>Subscriber Card</label>
                        <input type="text" class="form-control" name="nom" autocomplete="off" required="required">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5 px-md-4">
                      <div class="form-group">
                        <label>Document Number</label>
                        <input type="text" class="form-control" name="id" autocomplete="off" required="required">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5 px-md-2">
                <button type="submit" class="btn btn-fill btn-primary" name="submitpret">Lend</button>
                 </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h2 class="card-title">Quick Return</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <form method="post">
                  <div class="row">
                    <div class="col-md-5 px-md-4">
                      <div class="form-group">
                        <label>Docuement Number</label>
                        <input type="text" class="form-control" name="id" autocomplete="off" required="required">
                      </div>
                    </div>
                  </div>
              </br>
              </br>
              </br>
              </br>
                  <div class="col-md-5 px-md-2">
                <button type="submit" class="btn btn-fill btn-primary" name="submitretour">Return</button>
                 </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-chart">
              <div class="card-header">
                <h3 class="card-title"><i class="tim-icons icon-badge text-success"></i> Subscriber</h3>
              </div>
              <div class="card-body">
                <h1 style="text-align: center;">
                  <?php
                  $sql = "SELECT * from abonné";
                  if ($result = mysqli_query($conn, $sql)) {
                  $rowcount = mysqli_num_rows( $result );
                  echo $rowcount;
                  }
                  ?>
                </h1>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-chart">
              <div class="card-header">
                <h3 class="card-title"><i class="tim-icons icon-book-bookmark text-info"></i> Documents</h3>
              </div>
              <div class="card-body">
                <h1 style="text-align: center;">
                  <?php
                  $sql = "SELECT * from books";
                  if ($result = mysqli_query($conn, $sql)) {
                  $rowcount = mysqli_num_rows( $result );
                  echo $rowcount;
                  }
                  ?>
                </h1>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h3 class="card-title"><i class="tim-icons icon-bullet-list-67 text-success"></i> Loan in progress</h3>
              </div>
              <div class="card-body">
                <h1 style="text-align: center;">
                  <?php
                  $sql = "SELECT * from books WHERE status='No'";
                  if ($result = mysqli_query($conn, $sql)) {
                  $rowcount = mysqli_num_rows( $result );
                  echo $rowcount;
                  }
                  ?>
                </h1>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h3 class="card-title"><i class="tim-icons icon-simple-remove text-danger"></i> Ongoing delay</h3>
              </div>
              <div class="card-body">
                <h1 style="text-align: center;">
                  <?php
                  $sql="SELECT * from books where retour < CURDATE() AND retour != ''";
                  if ($result = mysqli_query($conn, $sql)) {
                  $rowcount = mysqli_num_rows( $result );
                  echo $rowcount;
                  }
                  ?>
                  </h1>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h3 class="card-title"><i class="tim-icons icon-calendar-60 text-info"></i> Reservation</h3>
              </div>
              <div class="card-body">
                <h1 style="text-align: center;">
                  <?php
                  $sql="SELECT * from books where reserve='Yes'";
                  if ($result = mysqli_query($conn, $sql)) {
                  $rowcount = mysqli_num_rows( $result );
                  echo $rowcount;
                  }
                  ?>
                  </h1>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <ul class="nav">
            <li class="nav-item">
              <a href="https://www.github.com/ludovic-ggn/CataloguePlus" class="nav-link">
                CataloguePlus
              </a>
            </li>
          </ul>
          <div class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script>
            <a href="https://www.github.com/ludovic-ggn/CataloguePlus" target="_blank">CataloguePlus</a>
          </div>
        </div>
      </footer>
    </div>
  </div>
</body>
</html>
