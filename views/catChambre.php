<?php
include '../connexion/connexion.php'; //Se connecter à la BD
require_once('../models/select/select-categorie.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorie</title>
    <?php require_once('style.php') ?>
</head>

<body class="sidebar-mini fixed">
    <div class="loader-bg">
        <div class="loader-bar">
        </div>
    </div>
    <div class="wrapper">
        <?php require_once('header.php') ?>
        <?php require_once('aside.php') ?>

        <div class="content-wrapper">
            <!-- Main content starts -->
            <div class="container-fluid">
                <div class="row">
                    <div class="main-header">
                        <h4>Categorie des Chambres</h4>
                    </div>
                </div>
                <div class="row">
                    <?php
                    if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) {
                    ?>
                        <div class="col-lg-12">
                            <div class="alert-info alert text-center"><em><?= $_SESSION['msg'] ?></em></div>
                        </div>
                    <?php
                    }
                    unset($_SESSION['msg']);
                    if (isset($_GET['AjoutBout'])) {
                    ?>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h3 class="text-center"><?= $title ?></h3>
                                    <form action="<?= $url ?>" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-control-label">Description de la Categorie</label>
                                            <input type="text" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer une description de Categorie" name="description">
                                        </div>

                                        <button type="submit" class="btn btn-info w-100 waves-effect waves-light m-r-30" name="valider"><?= $btn ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    } else if (isset($_GET['idcat'])) {
                    ?>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h3 class="text-center"><?= $title ?></h3>
                                    <form action="<?= $url ?>" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-control-label">Description de la Categorie</label>
                                            <input type="text" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer une description de Categorie" name="description" <?php if (isset($_GET['idcat'])) { ?> value="<?php echo $tab['description']; ?> <?php } ?>">
                                        </div>

                                        <button type="submit" class="btn btn-info w-100 waves-effect waves-light m-r-30" name="valider"><?= $btn ?></button>
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
                                    <a href="catChambre.php?AjoutBout" class="mb-3">
                                        <button type="submit" class="btn btn-info w-100 waves-effect waves-light m-r-30">Ajouter une categorie </button>
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
                        <h5 class="card-header-text text-center">Liste des Categorie</h5>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                        
                                        <?php
                                        $n = 0;                                        
                                        while ($idbout = $getData->fetch()) {
                                            $n++;
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $n; ?></th>
                                                <td> <?= $idbout["description"] ?></td>                                                
                                                <td>
                                                <a href="catChambre.php?idcat=<?= $idbout['id'] ?>" class="btn btn-sm btn-info">
                                                    <i class="bi bi-pen-fill"></i>
                                                </a>
                                                <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')" href='../models/delete/del-categorie-post.php?idSupcat=<?= $idbout['id'] ?>' class="btn btn-danger btn-sm mt-1">
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

    <?php require_once('script.php') ?>

</body>

</html>