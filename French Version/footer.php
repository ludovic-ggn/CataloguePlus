<?php
require_once 'config.php';
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
?>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4"><?php echo $infobiblio ?></h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i><?php echo $infoadresse; ?>, <?php echo $infoville; ?></p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i><?php echo $infoemail; ?></p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i><?php echo $infonum; ?></p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Catalogue</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="index.php#barrerecherche"><i class="fa fa-angle-right mr-2"></i>Rechercher</a>
                            <a class="text-secondary mb-2" href="index.php#lesnouveautés"><i class="fa fa-angle-right mr-2"></i>Les Nouveautés</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Mon Compte</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="moncompte.php"><i class="fa fa-angle-right mr-2"></i>Mon Compte</a>
                            <a class="text-secondary mb-2" href="moncompte.php"><i class="fa fa-angle-right mr-2"></i>Mes Emprunts</a>
                            <a class="text-secondary mb-2" href="moncompte.php"><i class="fa fa-angle-right mr-2"></i>Mes Reservations</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Informations</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Accueil</a>
                            <a class="text-secondary mb-2" href="horaires.php"><i class="fa fa-angle-right mr-2"></i>Les Horaires</a>
                            <a class="text-secondary mb-2" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Nous contacter</a>
                            <a class="text-secondary mb-2" href="lesactus.php"><i class="fa fa-angle-right mr-2"></i>Les Actus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="https://www.github.com/ludovic-ggn/CataloguePlus">CataloguePlus</a>. Designed
                    by
                    <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
        </div>


    </div>
    <!-- Footer End -->