<?php
  session_start();
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
  }
include 'config.php';

  if (isset($_POST["importcatalogue"])) {
    
        $fileName = $_FILES["file"]["tmp_name"];

if ($_FILES["file"]["size"] > 0) {

    $file = fopen($fileName, "r");

    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
      $support= mysqli_real_escape_string($conn, $column[1]);
      $langue= mysqli_real_escape_string($conn, $column[2]);
      $titre= mysqli_real_escape_string($conn, $column[3]);
      $auteur= mysqli_real_escape_string($conn, $column[4]);
      $parution= mysqli_real_escape_string($conn, $column[5]);
      $cb= mysqli_real_escape_string($conn, $column[6]);
      $isbn= mysqli_real_escape_string($conn, $column[7]);
      $cout= mysqli_real_escape_string($conn, $column[8]);
      $editeurs= mysqli_real_escape_string($conn, $column[9]);
      $collection= mysqli_real_escape_string($conn, $column[10]);
      $collation= mysqli_real_escape_string($conn, $column[11]);
      $cote= mysqli_real_escape_string($conn, $column[12]);
      $type= mysqli_real_escape_string($conn, $column[13]);
      $nature= mysqli_real_escape_string($conn, $column[14]);
      $genres= mysqli_real_escape_string($conn, $column[15]);
      $public= mysqli_real_escape_string($conn, $column[16]);
      $resume= mysqli_real_escape_string($conn, $column[17]);
        $sql = "INSERT into books (support,langue,titre,auteur,parution,cb,isbn,cout,editeurs,collection,collation,cote,type,nature,genres,public,resume,status,retour,nom,demprunt,reserve,reservecard,finreservation,reservele)
             values ('$support','$langue','$titre','$auteur','$parution','$cb','$isbn','$cout','$editeurs','$collection','$collation','$cote','$type','$nature','$genres','$public','$resume','Oui','','','','','','','')";
        $result = mysqli_query($conn, $sql);
        
        if (! empty($result)) {
        header("Location: inventaire.php");
        }
      }
    }
  }


?>



<?php
if (isset($_POST["exportcatalogue"])) {
 
// Fetch records from database 
$sql = "SELECT * FROM books"; 
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows( $result ) > 0){ 
    $delimiter = ","; 
    $filename = "export_catalogue" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('ID', 'SUPPORT', 'LANGUE', 'TITTRE', 'AUTEUR', 'PARUTION', 'CB', 'ISBN', 'COUT', 'EDITEURS', 'COLLECTION', 'COLLATION', 'COTE', 'TYPE', 'NATURE', 'GENRES', 'PUBLIC', 'RESUME', 'DISPONIBLE'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = mysqli_fetch_assoc($result)){ 
        $lineData = array($row['id'], $row['support'], $row['langue'], $row['titre'], $row['auteur'], $row['parution'], $row['cb'], $row['isbn'], $row['cout'], $row['editeurs'], $row['collection'], $row['collation'], $row['cote'], $row['type'], $row['nature'], $row['genres'], $row['public'], $row['resume'], $row['status']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
}
exit();
}
?>

<?php
if (isset($_POST["exportemprunt"])) {
 
// Fetch records from database 
$sql = "SELECT * FROM books WHERE status='Non'"; 
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows( $result ) > 0){ 
    $delimiter = ","; 
    $filename = "export_emprunt" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('NUMERO','TITRE','NOM EMPRUNTEUR','DATE EMPRUNT','DATE RETOUR'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = mysqli_fetch_assoc($result)){ 
        $lineData = array($row['id'], $row['titre'], $row['nom'], $row['demprunt'], $row['retour']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
}
exit();
}
?>

<?php
if (isset($_POST["exportretard"])) {
 
// Fetch records from database 
$sql = "SELECT * FROM books WHERE retour < CURDATE() AND retour != ''"; 
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows( $result ) > 0){ 
    $delimiter = ","; 
    $filename = "export_retard" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('NUMERO','TITRE','NOM EMPRUNTEUR','DATE EMPRUNT','DATE RETOUR'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = mysqli_fetch_assoc($result)){ 
        $lineData = array($row['id'], $row['titre'], $row['nom'], $row['demprunt'], $row['retour']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
}
exit();
}
?>

<?php
if (isset($_POST["exportreservation"])) {
 
// Fetch records from database 
$sql = "SELECT * FROM books WHERE reserve='Oui'"; 
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows( $result ) > 0){ 
    $delimiter = ","; 
    $filename = "export_reservation" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('NUMERO','TITRE','NOM RESERVATION','DATE RESERVATION','DISPONIBLE','FIN RESERVATION'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = mysqli_fetch_assoc($result)){ 
        $lineData = array($row['id'], $row['titre'], $row['reservecard'], $row['reservele'], $row['status'], $row['finreservation']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
}
exit();
}
?>

<?php
if (isset($_POST["exportsuggestion"])) {
 
// Fetch records from database 
$sql = "SELECT * FROM suggestion"; 
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows( $result ) > 0){ 
    $delimiter = ","; 
    $filename = "export_suggestion" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('NUMERO','TITRE','AUTEUR'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = mysqli_fetch_assoc($result)){ 
        $lineData = array($row['id'], $row['titre'], $row['auteur']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
}
exit();
}
?>

<?php
  if (isset($_POST["importabonnés"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];

if ($_FILES["file"]["size"] > 0) {

    $file = fopen($fileName, "r");

    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
        $genre = mysqli_real_escape_string($conn, $column[1]);
        $nom = mysqli_real_escape_string($conn, $column[2]);
        $prenom = mysqli_real_escape_string($conn, $column[3]);
        $adresse = mysqli_real_escape_string($conn, $column[4]);
        $tel = mysqli_real_escape_string($conn, $column[5]);
        $naissance = mysqli_real_escape_string($conn, $column[6]);
        $sql = "INSERT INTO abonné (genre,nom,prenom,adresse,tel,naissance)
                VALUES ('$genre','$nom','$prenom','$adresse','$tel','$naissance')";
        $result = mysqli_query($conn, $sql);

        if (! empty($result)) {
            header("Location: abonnés.php");
        }
    }
}
}

?>

<?php
if (isset($_POST["exportabonnés"])) {
 
// Fetch records from database 
$sql = "SELECT * FROM abonné"; 
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows( $result ) > 0){ 
    $delimiter = ","; 
    $filename = "export_abonnés" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('NUMERO','GENRE','NOM','PRENOM','ADRESSE','TEL','NAISSANCE'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = mysqli_fetch_assoc($result)){ 
        $lineData = array($row['id'], $row['genre'], $row['nom'], $row['prenom'], $row['adresse'], $row['tel'], $row['naissance']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
}
exit();
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
    CataloguePlus - Import Export
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
          <li>
            <a href="gesportail.php">
              <i class="tim-icons icon-tap-02"></i>
              <p>Gestion du Portail</p>
            </a>
          </li>
          <li class="active">
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
                    <h2 class="card-title">Import Catalogue</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form enctype="multipart/form-data" method="post">
                  <div class="row">
                    <div class="col-md-5 px-md-4">
                      <div class="form-group">
                        <p>Ouvrer le fichier .csv à importer et cliquer sur "Importer"</p>
                        <label>Fichier à Importer</label>
                        <input type="file" name="file" id="file" accept=".csv">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5 px-md-2">
                <button type="submit" class="btn btn-fill btn-primary" name="importcatalogue">Importer</button>
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
                    <h2 class="card-title">Export Catalogue</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <form method="post">
                  <div class="row">
                    <div class="col-md-5 px-md-4">
                      <div class="form-group">
                        <p>Pour exporter le catalogue cliqué sur "Exporter"</p>
                      </br>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5 px-md-2">
                <button type="submit" class="btn btn-fill btn-primary" name="exportcatalogue">Exporter</button>
                 </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h2 class="card-title">Export Pret</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form method="post">
                  <div class="row">
                    <div class="col-md-5 px-md-4">
                      <div class="form-group">
                        <p>Pour exporter les emprunts cliqué sur "Exporter"</p>
                      </br>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5 px-md-2">
                <button type="submit" class="btn btn-fill btn-primary" name="exportemprunt">Exporter</button>
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
                    <h2 class="card-title">Export Retard</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <form method="post">
                  <div class="row">
                    <div class="col-md-5 px-md-4">
                      <div class="form-group">
                        <p>Pour exporter les retards cliqué sur "Exporter"</p>
                      </br>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5 px-md-2">
                <button type="submit" class="btn btn-fill btn-primary" name="exportretard">Exporter</button>
                 </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h2 class="card-title">Export Reservation</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form method="post">
                  <div class="row">
                    <div class="col-md-5 px-md-4">
                      <div class="form-group">
                        <p>Pour exporter les reservations cliqué sur "Exporter"</p>
                      </br>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5 px-md-2">
                <button type="submit" class="btn btn-fill btn-primary" name="exportreservation">Exporter</button>
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
                    <h2 class="card-title">Export Suggestions d'Achat</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <form method="post">
                  <div class="row">
                    <div class="col-md-5 px-md-4">
                      <div class="form-group">
                        <p>Pour exporter les suggestions d'achat cliqué sur "Exporter"</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5 px-md-2">
                <button type="submit" class="btn btn-fill btn-primary" name="exportsuggestion">Exporter</button>
                 </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h2 class="card-title">Import Abonnés</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-5 px-md-4">
                      <div class="form-group">
                        <p>Ouvrer le fichier .csv à importer et cliquer sur "Importer"</p>
                        <label>Fichier à Importer</label>
                        <input type="file" name="file" id="file" accept=".csv">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5 px-md-2">
                <button type="submit" class="btn btn-fill btn-primary" name="importabonnés">Importer</button>
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
                    <h2 class="card-title">Export Abonnés</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <form method="post">
                  <div class="row">
                    <div class="col-md-5 px-md-4">
                      <div class="form-group">
                      <p>Pour exporter les abonnés cliqué sur "Exporter"</p>
                    </br>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5 px-md-2">
                <button type="submit" class="btn btn-fill btn-primary" name="exportabonnés">Exporter</button>
                 </div>
                </form>
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