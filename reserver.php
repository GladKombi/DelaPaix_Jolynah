<?php
include 'connexion/connexion.php';
if (isset($_GET['idReservation'])) {
    $id = $_GET['idReservation'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>De_la_paix</title>
    <meta content="" name="description">
    <meta name="keywords" content=", de la paix, galerie, de la paix online">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assetts/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assetts/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assetts/vendor/aos/aos.css" rel="stylesheet">
    <link href="assetts/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assetts/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assetts/css/main.css" rel="stylesheet">

</head>

<body>

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assetts/img/logo.png" alt=""> -->
                <h1 class="">DE LA PAIX</h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.php" class="active">Acceuil</a></li>                   
                    <li><a href="index.php">Chambres disponibles</a></li>                
                    
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">

        <!-- Courses Section -->
        <section id="courses" class="courses section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Reservation</h2>
                <p class="text-center">Vous souhatez reserver cette Chambre <b>??</b></p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row">
                    <?php
                    $req = $connexion->prepare("SELECT * from chambre WHERE id=?");
                    $req->execute([$id]);
                    $num = 0;
                    $categorie = "";
                    while ($Data = $req->fetch()) {
                        $cateorie = $Data['Categorie'];
                        $statut = 0;
                        $getCategorie = $connexion->prepare("SELECT * from prix where prix.categorie=? and statut=?");
                        $getCategorie->execute([$cateorie, $statut]);
                        if ($Cat = $getCategorie->fetch()) {
                            $montant = $Cat['montant'];
                        }

                    ?>
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="course-item">
                                <img src="assetts/img/course-1.jpg" class="img-fluid" alt="...">
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <a href="reserver.php?idReservation=<?= $Data['id'] ?>">
                                            <p class="category">Reserver</p>
                                        </a>
                                        <p class="price">$<?= $montant ?></p>
                                    </div>

                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <a href="" class="trainer-link"><em>Chambre numro:</em><b> <?= $Data['numero'] ?></b></a>
                                        </div>
                                        <div class="trainer-rank d-flex align-items-center">
                                            <i class="bi bi-person user-icon"></i>&nbsp;50
                                            &nbsp;&nbsp;
                                            <i class="bi bi-heart heart-icon"></i>&nbsp;65
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Course Item--> <?php } ?>
                    <div class="col-lg-8 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="row">
                            <?php
                            if (isset($_GET['idCompte'])) {
                            ?>
                                <div class="col-lg-12">
                                    <form action="add-locatair-post.php?idReservation=<?= $id ?>" method="POST" class="shadow p-3" enctype="multipart/form-data">
                                        <h3 class="mb-3">S'inscrire</h3>
                                        <div class="form-group mb-3">
                                            <label class="form-control-label">Nom </label>
                                            <input type="text" class="form-control" autocomplete="off" <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['nom']; ?> <?php } ?>" id="nom" name="nom" required placeholder="Entrer votre Nom">
                                        </div>
                                        <div class="form-groupmb-3">
                                            <label class="form-control-label">Postnom </label>
                                            <input type="text" class="form-control" autocomplete="off" <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['postnom']; ?> <?php } ?>" name="postnom" required placeholder="Entrer votre Postnom">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-control-label">Prenom </label>
                                            <input type="text" class="form-control" autocomplete="off" <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['prenom']; ?> <?php } ?>" name="prenom" required placeholder="Entrer votre Prenom">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-control-label">Adresse Du domicile</label>
                                            <input type="text" class="form-control" autocomplete="off" <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['adresse']; ?> <?php } ?>" name="adresse" required placeholder="Entrer votre Adresse">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-control-label">Numero de Telephone </label>
                                            <input type="text" class="form-control" autocomplete="off" <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['numero']; ?> <?php } ?>" name="telephone" required placeholder="Entrer votre numero de telephone">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="exampleInputPassword1" class="form-control-label">Mot de passe</label>
                                            <input type="password" class="form-control" autocomplete="off" <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['pwd']; ?> <?php } ?>" id="pwd" name="pwd" required placeholder="Saisir un mot de passe">
                                        </div>
                                        <div class="">
                                            <input name="valider" type="submit" class="btn btn-info w-100 waves-effect waves-light m-r-30" value="S'inscrire">
                                        </div>
                                    </form>
                                </div>
                            <?php
                            } elseif(isset($_GET['comptCree'])){
                                ?>
                                <div class="col-lg-12">
                                    <form action="add-locatair-post.php?idReservation=<?= $id ?>" method="POST" class="shadow p-3" enctype="multipart/form-data">
                                        <h3 class="mb-3">Paiement par reseau de telecomunication</h3>
                                        <div class="form-group mb-3">
                                            <label class="form-control-label">Numero de virement</label>
                                            <input type="text" class="form-control" autocomplete="off"  id="nom" name="num" required placeholder="Entrer un numero valide ">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="exampleInputPassword1" class="form-control-label">Mot de passe</label>
                                            <input type="password" class="form-control" autocomplete="off" <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['pwd']; ?> <?php } ?>" id="pwd" name="pwd" required placeholder="Saisir un mot de passe">
                                        </div>
                                        <div class="">
                                            <input name="valider" type="submit" class="btn btn-info w-100 waves-effect waves-light m-r-30" value="Conifimer le paiement">
                                        </div>
                                    </form>
                                </div>
                            <?php

                            } else {
                            ?>
                                <div class="col-lg-12">
                                    <center>
                                        <h2>Avez-vous un compte ??</h2>

                                        <button class="bg-Success">
                                            <a href="login.php" class=" category mt-3">Se connecter</a> <br>
                                        </button>
                                        <br>
                                        
                                        <a href="reserver.php?idReservation=<?= $id ?>&idCompte">creer un compte</a>
                                    </center>
                                </div>
                            <?php
                            }

                            ?>


                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Courses Section -->

    </main>

    <footer id="footer" class="footer position-relative">

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1">De_la_paix</strong> <span>All Rights Reserved</span></p>
            <div class="credits">
                Designed by <a href="tel:0997019883">Jolynah_Lydia</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assetts/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assetts/vendor/php-email-form/validate.js"></script>
    <script src="assetts/vendor/aos/aos.js"></script>
    <script src="assetts/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assetts/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assetts/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assetts/js/main.js"></script>

</body>

</html>