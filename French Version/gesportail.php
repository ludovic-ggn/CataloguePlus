<?php
  session_start();
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
  }
include 'config.php';
?>

<?php
  $sql="Select * from site where id=1";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $infobiblio=$row['infobiblio'];
  $infoville=$row['infoville'];
  $infoadresse=$row['infoadresse'];
  $infonum=$row['infonum'];
  $infoemail=$row['infoemail'];
  $infolundimatin=$row['infolundimatin'];
  $infolundimidi=$row['infolundimidi'];
  $infomardimatin=$row['infomardimatin'];
  $infomardimidi=$row['infomardimidi'];
  $infomercredimatin=$row['infomercredimatin'];
  $infomercredimidi=$row['infomercredimidi'];
  $infojeudimatin=$row['infojeudimatin'];
  $infojeudimidi=$row['infojeudimidi'];
  $infovendredimatin=$row['infovendredimatin'];
  $infovendredimidi=$row['infovendredimidi'];
  $infosamedimatin=$row['infosamedimatin'];
  $infosamedimidi=$row['infosamedimidi'];
  $infodimanchematin=$row['infodimanchematin'];
  $infodimanchemidi=$row['infodimanchemidi'];
  $titre=$row['titre'];
  $description=$row['description'];

  if(isset($_POST['submit'])){
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
    $infosamedimidi= mysqli_real_escape_string($conn, $_POST['infovendredimidi']);
    $infodimanchematin= mysqli_real_escape_string($conn, $_POST['infodimanchematin']);
    $infodimanchemidi= mysqli_real_escape_string($conn, $_POST['infodimanchemidi']);
    $titre= mysqli_real_escape_string($conn, $_POST['titre']);
    $description= mysqli_real_escape_string($conn, $_POST['description']);
    

    $sql="update site set id=1,infobiblio='$infobiblio',infoville='$infoville',infoadresse='$infoadresse',infonum='$infonum' ,infoemail='$infoemail',infolundimatin='$infolundimatin',infolundimidi='$infolundimidi',infomardimatin='$infomardimatin',infomardimidi='$infomardimidi',infomercredimatin='$infomercredimatin',infomercredimidi='$infomercredimidi',infojeudimatin='$infojeudimatin',infojeudimidi='$infojeudimidi',infovendredimatin='$infovendredimatin',infovendredimidi='$infovendredimidi',infosamedimatin='$infosamedimatin',infosamedimidi='$infosamedimidi',infodimanchematin='$infodimanchematin',infodimanchemidi='$infodimanchemidi',titre='$titre',description='$description' where id=1";
    $result=mysqli_query($conn,$sql);
    if ($result) {
       // echo "Données modifiés";
      header('location:gesportail.php');
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
    CataloguePlus - Gestion du Portail
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
          <li>
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
          <li class="active ">
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
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Informations Bibliothèque</h4>
              </div>
              <div class="card-body">
                <form method="post">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nom de la Bibliotheque</label>
                        <input type="text" class="form-control" name="infobiblio" autocomplete="off" value="<?= htmlspecialchars($infobiblio) ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Ville</label>
                        <input type="text" class="form-control" name="infoville" autocomplete="off" value="<?= htmlspecialchars($infoville) ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Adresse de la Bibliotheque</label>
                        <input type="text" class="form-control" name="infoadresse" autocomplete="off"value="<?= htmlspecialchars($infoadresse) ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Numero de Telephone</label>
                        <input type="text" class="form-control" name="infonum" autocomplete="off" value="<?= htmlspecialchars($infonum) ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Adresse Mail</label>
                        <input type="text" class="form-control" name="infoemail" autocomplete="off" value="<?= htmlspecialchars($infoemail) ?>">
                      </div>
                      </br>
                  </br>
                  </br>
                  </br>
                  </br>
                  </br>
                  </br>
                  </br>
                    </div>
                  </div>
                  <div class="row">
                  <div class="card-footer">
                <button class="btn btn-fill btn-primary" type="submit" name="submit">Modifier</button>
              </div>
              </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Les Horraires</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          Jour
                        </th>
                        <th class="text-center">
                          Matin
                        </th>
                        <th class="text-center">
                          Midi
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          Lundi
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infolundimatin" autocomplete="off" value="<?= htmlspecialchars($infolundimatin) ?>">
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infolundimidi" autocomplete="off" value="<?= htmlspecialchars($infolundimidi) ?>">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Mardi
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infomardimatin" autocomplete="off" value="<?= htmlspecialchars($infomardimatin) ?>">
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infomardimidi" autocomplete="off" value="<?= htmlspecialchars($infomardimidi) ?>">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Mercredi
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infomercredimatin" autocomplete="off" value="<?= htmlspecialchars($infomercredimatin) ?>">
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infomercredimidi" autocomplete="off" value="<?= htmlspecialchars($infomercredimidi) ?>">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Jeudi
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infojeudimatin" autocomplete="off" value="<?= htmlspecialchars($infojeudimatin) ?>">
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infojeudimidi" autocomplete="off" value="<?= htmlspecialchars($infojeudimidi) ?>">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Vendredi
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infovendredimatin" autocomplete="off" value="<?= htmlspecialchars($infovendredimatin) ?>">
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infovendredimidi" autocomplete="off" value="<?= htmlspecialchars($infovendredimidi) ?>">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Samedi
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infosamedimatin" autocomplete="off" value="<?= htmlspecialchars($infosamedimatin) ?>">
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infosamedimidi" autocomplete="off" value="<?= htmlspecialchars($infosamedimidi) ?>">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Dimanche
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infodimanchematin" autocomplete="off" value="<?= htmlspecialchars($infodimanchematin) ?>">
                        </td>
                        <td class="text-center">
                          <input type="text" class="form-control" style="max-width: 120px; text-align: center; margin-left: auto;margin-right: auto;" name="infodimanchemidi" autocomplete="off" value="<?= htmlspecialchars($infodimanchemidi) ?>">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="row">
                  <div class="card-footer">
                <button class="btn btn-fill btn-primary" type="submit" name="submit">Modifier</button>
              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Page Accueil</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Titre de Bienvenue</label>
                        <input type="text" class="form-control" name="titre" autocomplete="off" value="<?= htmlspecialchars($titre) ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Sous Titre</label>
                        <input type="text" class="form-control" name="description" autocomplete="off" value="<?= htmlspecialchars($description) ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="card-footer">
                <button class="btn btn-fill btn-primary" type="submit" name="submit">Modifier</button>
              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Les Actus</h4>
                <a href="ajouteractu.php">Ajouter une actu</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th scope="col">Titre</th>
                        <th scope="col">Du</th>
                        <th scope="col">Au</th>
                        <th class="text-center" scope="col">Option</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql="SELECT * from actu ORDER BY id DESC";
                    $result=mysqli_query($conn,$sql);
                    if ($result) {
                    while ($row=mysqli_fetch_assoc($result)){
                    $id=$row['id'];
                    $titre=$row['titre'];
                    $du=$row['du'];
                    $au=$row['au'];
                    echo '<tr>
                    <th scope="row">'.$titre.'</th>
                    <td>'.$du.'</td>
                    <td>'.$au.'</td>
                    <td class="text-center">
                    <button class="btn btn-primary"><a href="modifieractu.php?actuid='.$id.'" class="text-light">Modifier</a></button>
                    <button class="btn btn-danger"><a href="deleteactu.php?actuid='.$id.'" class="text-light">Supprimer</a></button>
                    </td>
                    </tr>';
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
    </form>
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
