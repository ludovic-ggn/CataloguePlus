<?php
include 'config.php';
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
?>

<?php
  $id= mysqli_real_escape_string($conn, $_GET['livreid']);
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
  $reserve=$row['reserve'];
  $reservecard=$row['reservecard'];
  $finreservation=$row['finreservation'];
  $reservele=$row['reservele'];
?>   

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Portail - <?php echo $infobiblio; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="<?php echo $infobiblio; ?>, bibliotheque , portail" name="keywords">
    <meta content="Portail en ligne <?php echo $infobiblio; ?>" name="description">
    <meta name="robots" content="index">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="index.php" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2"><?php echo $infobiblio; ?></span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="catalogue.php" method="get">
                    <div class="input-group">
                        <input type="search" class="form-control" name="terme" placeholder="Rechercher dans le catalogue">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <button class="fa fa-search text-primary" style="background-color: white; border-color: white; border: none;"></button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Numéro de téléphone</p>
                <h5 class="m-0"><?php echo $infonum ?></h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <a href="catalogue.php?terme=roman" class="nav-item nav-link">Roman</a>
                        <a href="catalogue.php?terme=fiction" class="nav-item nav-link">Science Fiction</a>
                        <a href="catalogue.php?terme=revue" class="nav-item nav-link">Revue</a>
                        <a href="catalogue.php?terme=manga" class="nav-item nav-link">Manga</a>
                        <a href="catalogue.php?terme=jeunesse" class="nav-item nav-link">Jeunesse</a>
                        <a href="catalogue.php?terme=Bande+Dessinee" class="nav-item nav-link">Bande Déssinnée</a>
                        <a href="catalogue.php?terme=biographie" class="nav-item nav-link">Biographie</a>
                        <a href="catalogue.php?terme=aventure" class="nav-item nav-link">Roman d'Aventure</a>
                        <a href="catalogue.php?terme=theatre" class="nav-item nav-link">Théatre</a>
                        <a href="catalogue.php?terme=fantastique" class="nav-item nav-link">Fantastique</a>
                        <a href="catalogue.php?terme=poesie" class="nav-item nav-link">Poésie</a>
                        <a href="catalogue.php?terme=conte" class="nav-item nav-link">Conte, légende</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="index.php" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2"><?php echo $infobiblio; ?></span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Accueil</a>
                            <a href="catalogue.php" class="nav-item nav-link active">Catalogue</a>
                            <a href="horaires.php" class="nav-item nav-link">Horaires</a>
                            <a href="lesactus.php" class="nav-item nav-link">Les Actus</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="moncompte.php" class="btn px-0">
                                <i class=" fas fa-sharp fa-solid fa-user text-primary"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Accueil</a>
                    <a class="breadcrumb-item text-dark" href="catalogue.php">Catalogue</a>
                    <span class="breadcrumb-item active"><?php echo $titre ?></span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
            	<?php
            	echo '
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img style="max-width: 700px; max-height: 700px;" class="w-100 h-100" src="https://covers.openlibrary.org/b/isbn/'.$isbn.'-L.jpg">
                        </div>
                    </div>
                </div>
            </div>'?>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3><?php echo $titre ?></h3>
                    <h6 class="font-weight-semi-bold mb-4"><?php echo $auteur ?></h6>
                    <p class="mb-4"><?php echo $resume ?></p>
                    <p class="mb-4">Date de Parution: <?php echo $parution ?></p>
                    <p class="mb-4">Public: <?php echo $public ?></p>
                    <p class="mb-4">Nature: <?php echo $nature ?></p>
                    <p class="mb-4">Genre: <?php echo $genres ?></p>
                    <h6 class="font-weight-semi-bold mb-4">Disponible: <?php echo $status ?></h6>
                    <div class="d-flex align-items-center mb-4 pt-2">
                    <form action="jereserve.php" method="get">
                     <button name="reservation" value="<?php echo $id ?>" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Je Reserve</button>
                    </form>   
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3"><?php echo $titre ?></h4>
                            <p><?php echo $resume ?></p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3"><?php echo $titre ?></h4>
                            <p><?php echo $resume ?></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Langue: <?php echo $langue ?>
                                        </li>
                                        <li class="list-group-item px-0">
                                            Code Barre: <?php echo $cb ?>
                                        </li>
                                        <li class="list-group-item px-0">
                                            Date de Parution: <?php echo $parution ?>
                                        </li>
                                        <li class="list-group-item px-0">
                                            Nature: <?php echo $nature ?>
                                        </li>
                                      </ul> 
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Editeur: <?php echo $editeurs ?>
                                        </li>
                                        <li class="list-group-item px-0">
                                            ISBN: <?php echo $isbn ?>
                                        </li>
                                        <li class="list-group-item px-0">
                                            Collation: <?php echo $collation ?>
                                        </li>
                                        <li class="list-group-item px-0">
                                            Genre: <?php echo $genres ?>
                                        </li>
                                      </ul> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Suggestions en rapport avec <?php echo $titre ?></span></h2>
        <div class="row px-xl-5">

<?php
        $sql="SELECT * from books WHERE genres='$genres' AND titre != '$titre'LIMIT 4";
        $result=mysqli_query($conn,$sql);
        if ($result) {
        while ($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
            $titre=$row['titre'];
                $auteur=$row['auteur'];
                $isbn=$row['isbn'];
                    echo ' <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img style="max-width: 500px; max-height: 500px;" class="img-fluid w-100" src="https://covers.openlibrary.org/b/isbn/'.$isbn.'-L.jpg" alt="">
                    </div>
                    <div class="text-center py-4">
                        <a href="livreview.php?livreid='.$id.'" class="h6 text-decoration-none text-truncate">'.$titre.'</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h6>'.$auteur.'</h6>
                        </div>
                    </div>
                </div>
            </div> ';
                    }
                    }
            ?>
        </div>
    </div>
    <!-- Products End -->


<?php
include 'footer.php';
?>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>