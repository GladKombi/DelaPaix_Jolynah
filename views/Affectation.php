<?php
include '../connexion/connexion.php';//Se connecter à la BD
#Appel de la page qui permet de faire les affichages
require_once ('../models/select/select-affectation.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locataire</title>
    <?php require_once ('style.php') ?>
</head>

<body class="sidebar-mini fixed">
    <div class="loader-bg">
        <div class="loader-bar">
        </div>
    </div>
    <div class="wrapper">
        <?php require_once ('header.php') ?>
        <?php require_once ('aside.php') ?>

        <div class="content-wrapper">
            <!-- Container-fluid starts -->
            <!-- Main content starts -->
            <div class="container-fluid">
                <div class="row">
                    <div class="main-header">
                        <h4>Gestion des affectations</h4>
                    </div>
                </div>

                <!-- 1-3-block row start -->
                <div class="row">
                    <?php
                    if (isset($_GET['AjoutAffect'])) {
                        ?>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h3 class="text-center">Ajouter une affectation</h3>
                                    <form action="../models/add/add-affectation-post.php" method="POST">
                                        <div class="form-group">
                                            <label for="exampleSelect1" class="form-control-label">Locataire</label>
                                            <select class="form-control " name="locataire" id="exampleSelect1">
                                                <?php

                                                $repChat = $connexion->query("SELECT * from locataire");
                                                while ($tab = $repChat->fetch()) {

                                                    ?>

                                                    <option value="<?php echo $tab['id']; ?>">

                                                        <?php echo $tab['nom'] . "  " . $tab['postnom']; ?>

                                                    </option>
                                                <?php

                                                }

                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelect1" class="form-control-label">Chambres</label>
                                            <select class="form-control " name="Chambre" id="Chambre">
                                                <?php

                                                $repChat = $connexion->query("SELECT * FROM `chambre`WHERE (id) NOT IN (SELECT chambre FROM affectation)");
                                                while ($tab = $repChat->fetch()) {

                                                    ?>

                                                    <option value="<?php echo $tab['id']; ?>">

                                                        <?php echo $tab['numero'] ?>

                                                    </option>
                                                <?php

                                                }

                                                ?>
                                            </select>
                                        </div>
                                        <button type="submit" name="valider"
                                            class="btn btn-info w-100 waves-effect waves-light m-r-30">Enregistrer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <a href="Affectation.php?AjoutAffect" class="mb-3">
                                        <button type="submit" class="btn btn-info w-100 waves-effect waves-light m-r-30">
                                            Nouvelle Affectation </button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    ?>
                </div>
                <!-- 1-3-block row end -->
                <div class="card mt-5">
                    <div class="card-header">
                        <h5 class="card-header-text text-center">Liste des locataires</h5>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Num</th>
                                            <th>Chambres</th>
                                            <th>Noms</th>
                                            <th>Date Affectation</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $n = 0;
                                        $req = $connexion->prepare("SELECT Chambre.numero,locataire.nom,locataire.postnom,locataire.prenom,affectation.dateaffectation FROM `affectation`,chambre,locataire WHERE affectation.locataire=locataire.id AND affectation.Chambre=chambre.id");
                                        $affichage = $req->execute();
                                        while ($affichage = $req->fetch()) {
                                            $n++;
                                            ?>
                                            <tr>
                                            <th scope="row"><?= $n;?></th>
                                                <td><?= $affichage['numero'] ?></td>
                                                <td><?= $affichage['nom'] . " " . $affichage['postnom'] ?></td>
                                                <td><?= $affichage['dateaffectation'] ?></td>
                                                <td>
                                                    <a href="" class="btn btn-sm btn-info">
                                                        <i class="bi bi-pen-fill"></i>
                                                    </a>
                                                    <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')"
                                                        href="#" class="btn btn-danger btn-sm mt-1">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- Main content ends -->
        </div>
    </div>

    <?php require_once ('script.php') ?>

</body>

</html>