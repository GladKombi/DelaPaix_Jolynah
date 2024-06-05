<?php
    include '../connexion/connexion.php';//Se connecter à la BD
    #Appel de la page qui fait les affichages
    require_once('../models/select/select-utilisateur.php');
     #appel de la fontion
     require_once('../fonctions/fonctions.php');
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs</title>
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
                        <h4>Gestion des utilisateurs</h4>
                    </div>
                </div>

                <!-- 1-3-block row start -->
                <div class="row">
                    <?php
                    if (isset($_GET['AjoutUser'])) {
                    ?>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h3 class="text-center">Ajouter un utilisateur</h3>
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
                                    <form action="<?=$url?>" method="POST" class="shadow p-3" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label  class="form-control-label">Nom </label>
                                            <input type="text"  class="form-control" autocomplete="off"   name="nom" required placeholder="Entrer votre Nom">
                                        </div>  
                                        <div class="form-group">
                                            <label  class="form-control-label">Telephone </label>
                                            <input type="text"  class="form-control" autocomplete="off"   name=" telephone" required placeholder="Entrer votre Telephone">
                                        </div>                                      
                                        <div class="form-group">
                                            <label for="exampleSelect1" class="form-control-label">Fonction</label>
                                            <select name="fonction" class="form-control " id="exampleSelect1">
                                                <option>Locataire</option>
                                                <option>Admin</option>                                                
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label  class="form-control-label">Password </label>
                                            <input type="password"  class="form-control" autocomplete="off"   name="password" required placeholder="Entrer votre Password">
                                         </div>
                                         <div class="form-group row">
                                            <label for="file" class="col-md-2 col-form-label form-control-label">Image</label>
                                            <div class="col-lg-12">
                                                <label for="file" class="custom-file">
                                                <input type="file" name="photo" id="file" class="custom-file-input form-control">
                                                <span class="custom-file-control"></span>
                                                </label>
                                            </div>
                                        </div>
                                        
                                         <div class="col-xl-6 col-lg-12 col-md-6  col-sm-6 ">
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
                                    <h3 class="text-center">Modifier un utilisateur</h3>
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
                                    <form action="<?=$url?>" method="POST" class="shadow p-3" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label  class="form-control-label">Nom </label>
                                            <input type="text"  class="form-control" autocomplete="off"  <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['nom']; ?> <?php }?>"name="nom" required placeholder="Entrer votre Nom">
                                        </div>  
                                        <div class="form-group">
                                            <label  class="form-control-label">Telephone </label>
                                            <input type="text"  class="form-control" autocomplete="off"  <?php if (isset($_GET['iduser'])) { ?> value="<?php echo $tab['telephone']; ?> <?php }?>"name="telephone" required placeholder="Entrer votre Nom">
                                        </div>                                      
                                        <div class="form-group">
                                            <label for="exampleSelect1" class="form-control-label">Fonction</label>
                                            <select name="fonction" class="form-control " id="exampleSelect1">
                                                <option>Locataire</option>
                                                <option>Admin</option>                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-control-label">Password </label>
                                            <input autocomplete="off" value="<?php isset($password) && print $password;?>" name="pwd" required type="password" class="form-control" placeholder="Entrer votre password">
                                        </div>
                                         <div class="form-group row">
                                            <label for="file" class="col-md-2 col-form-label form-control-label">Image</label>
                                            <div class="col-lg-12">
                                                <label for="file" class="custom-file">
                                                <input type="file" name="photo" id="file" class="custom-file-input form-control">
                                                <span class="custom-file-control"></span>
                                                </label>
                                            </div>
                                        </div>
                                         <div class="col-xl-6 col-lg-6 col-md-6  col-sm-6 ">
                                        <input name="valider" type="submit"  class="btn btn-info w-100 waves-effect waves-light m-r-30" value="<?=$btn?>">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php  
                    }
                     else {
                    ?>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <a href="utilisateur.php?AjoutUser" class="mb-3">
                                        <button type="submit" class="btn btn-info w-100 waves-effect waves-light m-r-30"> Nouvel Utilisateur </button>
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
                        <h5 class="card-header-text text-center">Liste des utilisateurs</h5>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Fonction</th>
                                            <th>Telephone</th>
                                            <th>Photo</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                     $getData=$connexion->prepare("SELECT * from user where statut=0 ");
                                     $getData->execute();
                                    $n=0;
                                    while($iduser=$getData->fetch()){
                                        $n++;
                                        ?>
                                        <tr>
                                        <th scope="row"><?= $n;?></th>
                                        <td> <?= $iduser["nom"] ?></td>
                                        <td> <?= $iduser["fonction"] ?></td>
                                        <td> <?= $iduser["telephone"] ?></td>
                                        <td>
                                            <img src="../photo/<?= $iduser["photo"] ?>" width="60" height="40" alt="">
                                        </td>
                                        <td>
                                            <a href='utilisateur.php?iduser=<?=$iduser['id'] ?>' class="btn btn-info btn-sm mb-3 ">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')"
                                                href='../models/delete/del-utilisateur-post.php?idSupcat=<?=$iduser['id'] ?>'
                                                class="btn btn-danger btn-sm mt-2"><i class="bi bi-trash-fill"></i></a>
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