<?php
include 'connexion/connexion.php';
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
          <li><a href="#" class="active">Acceuil</a></li>
          <li><a href="#Apropos">Apropos</a></li>
          <li><a href="#chambre">Chambres disponibles</a></li>
          <li><a href="#contact">Contact</a></li>
          <li class="dropdown has-dropdown "><a href="#"><span class="btn-getstarted">Se connecter<i class="bi bi-chevron-down"></i></span> </a>
            <ul>
              <li><a href="views/login.php?Rsponsable">Responsanble de la galerie</a></li>
              <li><a href="views/login.php?locat">Locataire</a></li>
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <img src="assetts/img/hero-bg.jpg" alt="" data-aos="fade-in">

      <div class="container">
        <h2 data-aos="fade-up" data-aos-delay="100" class="">De_la_paix<br>Galerie ya butamu</h2>
        <p data-aos="fade-up" data-aos-delay="200">Nous somme la galerie la plus belle De Butembo !</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="#" class="btn-get-started">Lire plus </a>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">
      <h3 id="Apropos" class="text-center">A propos de nous</h3>
      <div class="container">
        <div class="row gy-4">

          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="assetts/img/hero-bg.jpg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
            <h3>lire sur nous !</h3>
            <p class="fst-italic">
              La galerie DE LA PAIX est en pleine évolution et fonctionne sur la Rue président
              de la république N94, dans le quartier Vungi, commune Mususa, ville de Butembo,
              province du Nord-Kivu en République Démocratique du Congo.
            </p>
            <h6>Les fondateurs</h6>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                  consequat.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Duis aute irure dolor in reprehenderit in voluptate
                  velit.</span></li>
            </ul>
            <p class="fst-italic">
              La galerie DE LA PAIX a été créée en 2016 par deux grands commerçants de la ville,
              PALUKU TSHIYIRE et monsieur DIDO. Chacun de deux a une partie qu’on appelle block,
              block A avec 40 portes et block B avec 42 portes.
            </p>
            <a href="#" class="read-more"><span>Lire plus</span><i class="bi bi-arrow-right"></i></a>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Courses Section -->
    <section id="courses" class="courses section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 id="chambre">Chambres disponibles</h2>
        <p class="">Des chambres au choix</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row">
          <?php
          $req = $connexion->prepare("SELECT * from chambre");
          $req->execute();
          $num = 0;
          $categorie="";
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
                    <p class="price">$<?=$montant?></p>
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

        </div>

      </div>

    </section><!-- /Courses Section -->

  </main>

  <footer id="footer" class="footer position-relative">

    <div class="container footer-top" id="contact">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="">De_la_paix</span>
          </a>
          <div class="footer-contact pt-3">
            <p>R.D.CONGO</p>
            <p>Nord-Kivu, ville de Butembo</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>delapaix@gmail.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Abonnez-vous à notre infolettre et recevez les dernières nouvelles sur nos chambres et services !</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="S'inscrire"></div>
            <div class="loading">Chargement</div>
            <div class="error-message"></div>
            <div class="sent-message">Votre inscription viens d'etres envoyer. Merci!</div>
          </form>
        </div>

      </div>
    </div>

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