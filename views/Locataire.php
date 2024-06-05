<?php
    include '../connexion/connexion.php';//Se connecter à la BD
    #Appel de la page qui fait les affichages
    require_once('../models/select/select-locataire.php');
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locataire</title>
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
            <!-- Container-fluid starts -->
            <!-- Main content starts -->
            <div class="container-fluid">
                <div class="row">
                    <div class="main-header">
                        <h4>Locataires</h4>
                    </div>
                </div>

                <!-- 1-3-block row start -->
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
                    if (isset($_GET['AjoutLoc'])) {
                    ?>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h3 class="text-center">Ajouter un Locataire</h3>
                                     <!-- pour afficher les massage  -->
                                        
                                    <form  action="<?=$url?>" method="POST" class="shadow p-3" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label  class="form-control-label">Nom </label>
                                            <input type="text"  class="form-control" autocomplete="off"  <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['nom']; ?> <?php }?>" id="nom" name="nom" required placeholder="Entrer votre Nom">
                                        </div>
                                        <div class="form-group">
                                            <label  class="form-control-label">Postnom </label>
                                            <input type="text" class="form-control" autocomplete="off"  <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['postnom']; ?> <?php }?>" name="postnom" required placeholder="Entrer votre Postnom">
                                        </div>
                                        <div class="form-group">
                                            <label  class="form-control-label">Prenom </label>
                                            <input type="text" class="form-control" autocomplete="off"  <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['prenom']; ?> <?php }?>" name="prenom" required placeholder="Entrer votre Prenom">
                                        </div>
                                        <div class="form-group">
                                            <label  class="form-control-label">Adresse Du domicile</label>
                                            <input type="text" class="form-control" autocomplete="off"  <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['adresse']; ?> <?php }?>" name="adresse" required placeholder="Entrer votre Adresse">
                                        </div>
                                        <div class="form-group">
                                            <label  class="form-control-label">Numero de Telephone </label>
                                            <input type="text" class="form-control" autocomplete="off"  <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['numero']; ?> <?php }?>" name="telephone" required placeholder="Entrer votre numero de telephone">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" class="form-control-label">Mot de passe</label>
                                            <input type="password" class="form-control" autocomplete="off"  <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['pwd']; ?> <?php }?>" id="pwd" name="pwd" required  placeholder="Saisir un mot de passe">
                                        </div>                                       
                                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 ">
                                        <input name="valider" type="submit"  class="btn btn-info w-100 waves-effect waves-light m-r-30" value="<?=$btn?>">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                    }else if (isset($_GET['iduser'])){
                     ?>
                    <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h3 class="text-center">Ajouter un Locataire</h3>
                                     <!-- pour afficher les massage  -->
                                     <?php if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) {
                                            ?>
                                                <div class="col-lg-12">
                                                    <div class="alert-info alert text-center"><em><?= $_SESSION['msg'] ?></em></div>
                                                </div>
                                            <?php
                                            }
                                            unset($_SESSION['msg']);
                                        ?>
                                    <form  action="<?=$url?>" method="POST" class="shadow p-3" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label  class="form-control-label">Nom </label>
                                            <input type="text"  class="form-control" autocomplete="off"  <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['nom']; ?> <?php }?>"name="nom" required placeholder="Entrer votre Nom">
                                        </div>
                                        <div class="form-group">
                                            <label  class="form-control-label">Postnom </label>
                                            <input type="text" class="form-control" autocomplete="off"  <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['postnom']; ?> <?php }?>" name="postnom" required placeholder="Entrer votre Postnom">
                                        </div>
                                        <div class="form-group">
                                            <label  class="form-control-label">Prenom </label>
                                            <input type="text" class="form-control" autocomplete="off"  <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['prenom']; ?> <?php }?>" name="prenom" required placeholder="Entrer votre Prenom">
                                        </div>
                                        <div class="form-group">
                                            <label  class="form-control-label">Adresse Du domicile</label>
                                            <input type="text" class="form-control" autocomplete="off"  <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['adresse']; ?> <?php }?>" name="adresse" required placeholder="Entrer votre Adresse">
                                        </div>
                                        <div class="form-group">
                                            <label  class="form-control-label">Numero de Telephone </label>
                                            <input type="text" class="form-control" autocomplete="off"  <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['numero']; ?> <?php }?>" name="telephone" required placeholder="Entrer votre numero de telephone">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" class="form-control-label">Mot de passe</label>
                                            <input type="password" class="form-control" autocomplete="off"  <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['pwd']; ?> <?php }?>" id="pwd"name="pwd" required  placeholder="Saisir un mot de passe">
                                        </div>                                       
                                        <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 ">
                                        <input name="valider" type="submit"  class="btn btn-info w-100 waves-effect waves-light m-r-30" value="<?=$btn?>">
                                        </div>
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
                                    <a href="Locataire.php?AjoutLoc" class="mb-3">
                                        <button type="submit" class="btn btn-info w-100 waves-effect waves-light m-r-30">Ajouter un locataire </button>
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
                                            <th>ID</th>
                                            <th>Noms</th>
                                            <th>Adresse du domicile</th>
                                            <th>Telephone</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                     $getData=$connexion->prepare("SELECT * from locataire where statut=0 ");
                                     $getData->execute();
                                    $n=0;
                                    while($iduser=$getData->fetch()){
                                        $n++;
                                        ?>
                                        <tr>
                                        <th scope="row"><?= $n;?></th>
                                        <td> <?= $iduser["nom"]." ".$iduser["postnom"]." ".$iduser["prenom"] ?></td>
                                        <td> <?= $iduser["adresse"] ?></td>
                                        <td> <?= $iduser["numero"] ?></td>
                                        <td><a href='locataire.php?iduser=<?=$iduser['id'] ?>' class="btn btn-info btn-sm "><i
                                                    class="bi bi-pencil-square"></i></a>
                                            <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')"
                                                href='../models/delete/del-locataire-post.php?idSupcat=<?=$iduser['id'] ?>'
                                                class="btn btn-danger btn-sm "><i class="bi bi-trash-fill"></i></a>
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