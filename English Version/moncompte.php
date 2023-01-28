<?php
  session_start();
  if(!isset($_SESSION["carte"])){
    header("Location: identification.php");
    exit();
  }
$carte = $_SESSION['carte'];
?>

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

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Portal - <?php echo $infobiblio; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="<?php echo $infobiblio; ?>, library , portal" name="keywords">
    <meta content="Online Portal <?php echo $infobiblio; ?>" name="description">
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
                        <input type="search" class="form-control" name="terme" placeholder="Search in the catalog">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <button class="fa fa-search text-primary" style="background-color: white; border-color: white; border: none;"></button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Phone Number</p>
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
                        <a href="catalogue.php?terme=novel" class="nav-item nav-link">Novel</a>
                        <a href="catalogue.php?terme=fiction" class="nav-item nav-link">Science Fiction</a>
                        <a href="catalogue.php?terme=journal" class="nav-item nav-link">Journal</a>
                        <a href="catalogue.php?terme=manga" class="nav-item nav-link">Manga</a>
                        <a href="catalogue.php?terme=youth" class="nav-item nav-link">Youth</a>
                        <a href="catalogue.php?terme=comic" class="nav-item nav-link">Comic</a>
                        <a href="catalogue.php?terme=biography" class="nav-item nav-link">Biography</a>
                        <a href="catalogue.php?terme=adventure" class="nav-item nav-link">Adventure Novel</a>
                        <a href="catalogue.php?terme=theater" class="nav-item nav-link">Theater</a>
                        <a href="catalogue.php?terme=fantastic" class="nav-item nav-link">Fantastic</a>
                        <a href="catalogue.php?terme=poetry" class="nav-item nav-link">Poetry</a>
                        <a href="catalogue.php?terme=tale" class="nav-item nav-link">Tale, legend</a>
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
                            <a href="index.php" class="nav-item nav-link">Home Page</a>
                            <a href="catalogue.php" class="nav-item nav-link">Catalog</a>
                            <a href="horaires.php" class="nav-item nav-link">Schedules</a>
                            <a href="lesactus.php" class="nav-item nav-link">News</a>
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
                    <a class="breadcrumb-item text-dark" href="index.php">Home Page</a>
                    <span class="breadcrumb-item active">My Account</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-6">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">My current loans</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-3">Title</h6>
                            <h6 class="mb-3">Return scheduled for :</h6>
                        </div>
                      <?php
            $sql="SELECT * from books WHERE nom='$carte'";
             $result=mysqli_query($conn,$sql);
              if ($result) {
                while ($row=mysqli_fetch_assoc($result)){
                  $id=$row['id'];
                    $titre=$row['titre'];
                      $retour=$row['retour'];
                        echo '
                        <div class="d-flex justify-content-between">
                            <p>'.$titre.'</p>
                            <p>'.$retour.'</p>
                        </div>';
                    }
                    }
            ?>          
                    </div>
                </div>
            </div>
              <div class="col-lg-6">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">My Reservations</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-3">Title</h6>
                            <h6 class="mb-3">Available</h6>
                        </div>
            <?php
            $sql="SELECT * from books WHERE reservecard='$carte'";
             $result=mysqli_query($conn,$sql);
              if ($result) {
                while ($row=mysqli_fetch_assoc($result)){
                  $id=$row['id'];
                    $titre=$row['titre'];
                      $status=$row['status'];
                        echo '
                        <div class="d-flex justify-content-between">
                            <p>'.$titre.'</p>
                            <p>'.$status.'</p>
                        </div>';
                    }
                    }
            ?>          
                    </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->


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