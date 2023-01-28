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


  if(isset($_POST['submit'])){
    $nom= mysqli_real_escape_string($conn, $_POST['nom']);
    $id= mysqli_real_escape_string($conn, $_POST['id']);
    $sql="SELECT * FROM books WHERE id=$id";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $reserve=$row['reserve'];
    $carte=$row['reservecard'];
    if ($reserve == 'Oui' AND $nom !=$carte){
      echo '<script>alert("ATTENTION EMPRUNT IMPOSSIBLE CE DOCUMENT EST RESERVE");</script>';
    }else{  

        $sql="update books set id=$id,status='Non',nom='$nom',retour='$retour',demprunt='$date',reserve='Non',reservecard='',reservele='' where id=$id";
    $result=mysqli_query($conn,$sql);
    if ($result) {
       // echo "Données modifiés";
    } else {
      die(mysqli_error($sql));
    }
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
    CataloguePlus - Pret Retour
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
          <li>
            <a href="admin.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Page accueil</p>
            </a>
          </li>
          <li>
            <a href="inventaire.php">
              <i class="tim-icons icon-book-bookmark"></i>
              <p>Inventaire</p>
            </a>
          </li>
          <li>
            <a href="gestiondesperiodiques.php">
              <i class="tim-icons icon-paper"></i>
              <p>Gestion des periodiques</p>
            </a>
          </li>
          <li class="active">
            <a href="pret-retour.php">
              <i class="tim-icons icon-check-2"></i>
              <p>Pret-Retour</p>
            </a>
          </li>
          <li>
            <a href="retard.php">
              <i class="tim-icons icon-simple-remove"></i>
              <p>Gestion des Retards</p>
            </a>
          </li>
          <li>
            <a href="reservation.php">
              <i class="tim-icons icon-calendar-60"></i>
              <p>Gestion des Reservations</p>
            </a>
          </li>
          <li>
            <a href="achat.php">
              <i class="tim-icons icon-cart"></i>
              <p>Suggestions d'Achat</p>
            </a>
          </li>
          <li>
            <a href="abonnés.php">
              <i class="tim-icons icon-badge"></i>
              <p>Gestion des Abonnés</p>
            </a>
          </li>
          <li>
            <a href="users.php">
              <i class="tim-icons icon-single-02"></i>
              <p>Gestion des Utilisateurs</p>
            </a>
          </li>
          <li>
            <a href="gesportail.php">
              <i class="tim-icons icon-tap-02"></i>
              <p>Gestion du Portail</p>
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
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h2 class="card-title">Pret</h2>
                  </div>
                  <div class="col-sm-6">
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                      <label class="btn btn-sm btn-primary btn-simple active" id="0">
                        <input type="radio" name="options" checked>
                        <a class="d-none d-sm-block d-md-block d-lg-block d-xl-block" href="pret-retour.php" style="color: white;">Pret</a>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-single-02"></i>
                        </span>
                      </label>
                      <label class="btn btn-sm btn-primary btn-simple" id="2">
                        <input type="radio" class="d-none" name="options">
                        <a class="d-none d-sm-block d-md-block d-lg-block d-xl-block" href="retour.php" style="color: white;">Retour</a>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-tap-02"></i>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form method="post">
                  <div class="row">
                    <div class="col-md-5 px-md-4">
                      <div class="form-group">
                        <label>Carte Abonné</label>
                        <input type="text" class="form-control" name="nom" autocomplete="off" required="required">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5 px-md-4">
                      <div class="form-group">
                        <label>Code Document</label>
                        <input type="text" class="form-control" name="id" autocomplete="off" required="required">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5 px-md-2">
                <button type="submit" class="btn btn-fill btn-primary" name="submit">Prêter</button>
                 </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Emprunt en cours par l'abonné</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          Nom du document
                        </th>
                        <th>
                          Emprunté le
                        </th>
                        <th>
                          Retour le
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($nom != ''){
                    $sql="SELECT * from books where nom='$nom'";
                    $result=mysqli_query($conn,$sql);
                    if ($result) {
                    while ($row=mysqli_fetch_assoc($result)){
                    $titre=$row['titre'];
                    $demprunt=$row['demprunt'];
                    $retour=$row['retour'];
                    echo '<tr>
                    <th>'.$titre.'</th>
                    <td>'.$demprunt.'</td>
                    <td>'.$retour.'</td>
                    </tr>';
                    }
                    }
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
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
