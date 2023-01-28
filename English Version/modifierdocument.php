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
  $id= mysqli_real_escape_string($conn, $_GET['updateid']);
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
  $status=$row['status'];
  $retour=$row['retour'];
  $nom=$row['nom'];
  $demprunt=$row['demprunt'];

  if(isset($_POST['submit'])){
    $support= mysqli_real_escape_string($conn, $_POST['support']);
    $langue= mysqli_real_escape_string($conn, $_POST['langue']);
    $titre= mysqli_real_escape_string($conn, $_POST['titre']);
    $auteur= mysqli_real_escape_string($conn, $_POST['auteur']);
    $parution= mysqli_real_escape_string($conn, $_POST['parution']);
    $cb= mysqli_real_escape_string($conn, $_POST['cb']);
    $isbn= mysqli_real_escape_string($conn, $_POST['isbn']);
    $cout= mysqli_real_escape_string($conn, $_POST['cout']);
    $editeurs= mysqli_real_escape_string($conn, $_POST['editeurs']);
    $collection= mysqli_real_escape_string($conn, $_POST['collection']);
    $collation= mysqli_real_escape_string($conn, $_POST['collation']);
    $cote= mysqli_real_escape_string($conn, $_POST['cote']);
    $type= mysqli_real_escape_string($conn, $_POST['type']);
    $nature= mysqli_real_escape_string($conn, $_POST['nature']);
    $genres= mysqli_real_escape_string($conn, $_POST['genres']);
    $public= mysqli_real_escape_string($conn, $_POST['public']);
    $resume= mysqli_real_escape_string($conn, $_POST['resume']);
    $status= mysqli_real_escape_string($conn, $_POST['status']);
    $retour= mysqli_real_escape_string($conn, $_POST['retour']);
    $nom= mysqli_real_escape_string($conn, $_POST['nom']);
    $demprunt= mysqli_real_escape_string($conn, $_POST['demprunt']);
    

    $sql="update books set id=$id,support='$support',langue='$langue',titre='$titre',auteur='$auteur' ,parution='$parution',cb='$cb',isbn='$isbn',cout='$cout',editeurs='$editeurs',collection='$collection',collation='$collation',cote='$cote',type='$type',nature='$nature',genres='$genres',public='$public',resume='$resume',status='$status',retour='$retour',nom='$nom',demprunt='$demprunt' where id=$id";
    $result=mysqli_query($conn,$sql);
    if ($result) {
       // echo "Données modifiés";
      header('location:inventaire.php');
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
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    CataloguePlus - Editing a Document
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
              <p>Home Page</p>
            </a>
          </li>
          <li class="active ">
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
              <p>Rerservation Management</p>
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
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Bibliographic Description</h5>
              </div>
              <div class="card-body">
                <form method="post">
                  <div class="row">
                    <div class="col-md-5 pr-md-1">
                      <div class="form-group">
                        <label>Document medium</label>
                        <input type="text" class="form-control" placeholder="Printed Text ..." name="support" autocomplete="off" value="<?= htmlspecialchars($support) ?>">
                      </div>
                    </div>
                    <div class="col-md-5 px-md-2">
                      <div class="form-group">
                        <label>Languages</label>
                        <input type="text" class="form-control" placeholder="French, English ..." name="langue" autocomplete="off" value="<?= htmlspecialchars($langue) ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="titre" autocomplete="off" value="<?= htmlspecialchars($titre) ?>">
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Author</label>
                        <input type="text" class="form-control" name="auteur" autocomplete="off" value="<?= htmlspecialchars($auteur) ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                        <label>Publication Date</label>
                        <input type="date" class="form-control" name="parution" autocomplete="off"value="<?= htmlspecialchars($parution) ?>">
                      </div>
                    </div>
                    <div class="col-md-4 px-md-1">
                      <div class="form-group">
                        <label>Barcode</label>
                        <input type="text" class="form-control" name="cb" autocomplete="off" value="<?= htmlspecialchars($cb) ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group">
                        <label>Isbn</label>
                        <input type="text" class="form-control" name="isbn" autocomplete="off" value="<?= htmlspecialchars($isbn) ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                        <label>Cost</label>
                        <input type="text" class="form-control" name="cout" autocomplete="off" value="<?= htmlspecialchars($cout) ?>">
                      </div>
                    </div>
                    <div class="col-md-4 px-md-1">
                      <div class="form-group">
                        <label>Editor</label>
                        <input type="text" class="form-control" name="editeurs" autocomplete="off" value="<?= htmlspecialchars($editeurs) ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group">
                        <label>Collection</label>
                        <input type="text" class="form-control" name="collection" autocomplete="off" value="<?= htmlspecialchars($collection) ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Number of Pages</label>
                        <input type="text" rows="4" cols="80" class="form-control" name="collation" autocomplete="off" value="<?= htmlspecialchars($collation) ?>">
                      </div>
                    </div>
                                                    <div class="card-footer">
                <button class="btn btn-fill btn-primary" name="submit">Edit</button>
              </div>
                  </div>
              </div>
            </div>
          </div>
            <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Documentary Analysis</h5>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-3 px-md-3">
                      <div class="form-group">
                        <label>Pressmark</label>
                        <input type="text" class="form-control" name="cote" autocomplete="off" value="<?= htmlspecialchars($cote) ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group">
                        <label>Type of document</label>
                        <input type="text" class="form-control"name="type" autocomplete="off" value="<?= htmlspecialchars($type) ?>">
                      </div>
                    </div>
                      <div class="col-md-3 px-md-1">
                      <div class="form-group">
                        <label>Kind of document</label>
                        <input type="text" class="form-control" name="nature" autocomplete="off" value="<?= htmlspecialchars($nature) ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Types of document</label>
                        <input type="text" class="form-control" name="genres" autocomplete="off" value="<?= htmlspecialchars($genres) ?>">
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Audience</label>
                        <input type="text" class="form-control" name="public" autocomplete="off" value="<?= htmlspecialchars($public) ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Synopsis</label>
                        <textarea rows="4" cols="80" class="form-control" name="resume" autocomplete="off"><?= htmlspecialchars($resume) ?></textarea>
                      </div>
                    </div>
                  <div class="card-footer">
                <button class="btn btn-fill btn-primary" name="submit">Edit</button>
              </div>
              </div>
              </div>
            </div>
          </div>
            <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Availablity</h5>
              </div>
              <div class="card-body">

                  <div class="row">
                    <div class="col-md-12 pr-md-1">
                      <div class="form-group">
                        <label>Available :</label>
                        <select class="col-md-11 pr-md-3" name="status">
                          <option autocomplete="off"><?= htmlspecialchars($status) ?></option>
                          <option autocomplete="off">Unavailable</option>
                          <option autocomplete="off">Lost</option>
                          <option autocomplete="off">Yes</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-md-1">
                      <div class="form-group">
                        <label>Return scheduled for :</label>
                        <input type="date" class="form-control" name="retour" autocomplete="off" value="<?= htmlspecialchars($retour) ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-md-1">
                      <div class="form-group">
                        <label>Borrowed on :</label>
                        <input type="date" class="form-control" name="demprunt" autocomplete="off" value="<?= htmlspecialchars($demprunt) ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-md-1">
                      <div class="form-group">
                        <label>Current borrower number :</label>
                        <input type="text" class="form-control" name="nom" autocomplete="off" value="<?= htmlspecialchars($nom) ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="card-footer">
                <button class="btn btn-fill btn-primary" name="submit">Edit</button>
              </div>
                </div>
              </div>
            </div>
          </div>
            <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Barcode</h5>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 pr-md-1">
                      <div class="form-group">
                        <label>Number :</label>
                        <input type="text" class="form-control" disabled autocomplete="off" value="<?= htmlspecialchars($id) ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-md-1">
                      <div class="form-group">
                        <label>Barcode :</label>
                        </br>
                          <?php
require 'vendor/autoload.php';

// This will output the barcode as HTML output to display in the browser
$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
echo $generator->getBarcode($id, $generator::TYPE_CODE_128);
?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
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