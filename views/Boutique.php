<?php 
include('../connexion/connexion.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chambres</title>
    <link rel="stylesheet" href="boutique.css">
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
                        <h4>Chambres</h4>
                    </div>
                </div>              
                <div class="row">
                    <?php
                    if (isset($_GET['AjoutBout'])) {
                    ?>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h3 class="text-center"> chambre</h3>
                                    <?php if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])){ 
                    ?> <div class="alert-info alert text-center"><?php echo $_SESSION['msg'];?> </div><?php 
                } 
                unset($_SESSION['msg']);
            ?>
                                    <form action="../models/add/add-boutique-post.php" method="POST">
                                        <div class="row">
                                            <div class=" form-group">
                                                <label for="nombre" class="form-control-label">Nombre de chambre </label>
                                                <input type="number" name="nombre"class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="Entrer le nombre de chambre">
                                            </div>
                                            <div class=" form-group">
                                                <label for="initial" class="form-control-label">Choisir l'initial</label>
                                                <select class="form-control " name="initial" id="initial">
                                                <?php 
                                                $req=$connexion->prepare("SELECT * from lettre");
                                                $req->execute();
                                                while($lettre=$req->fetch()){
                                                    $initial=$lettre['lettres'];
                                                    $reqq=$connexion->prepare("SELECT count(id) as nb from chambre where numero like ?");
                                                    $reqq->execute(array("%".$initial."%"));
                                                    $count=$reqq->fetch();
                                                    $nb=$count['nb'];
                                            
                                                    if($nb<32){
                                                
                                                ?>
                                                    <option value="<?=$lettre['lettres']?>"><?=$lettre['lettres'].' '.$nb?> chambres enregistrer sur les 32</option>
                                                <?php } } ?>                          
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="categorie" class="form-control-label">Categorie</label>
                                                <select class="form-control " name="categorie" id="categorie">
                                                    <option value="1">Double-porte</option>
                                                    <option value="2">Mono-porte</option>                                                
                                                </select>
                                            </div>
                                            <button type="submit"name="valider" class="btn btn-info w-100 waves-effect waves-light m-r-30">Enregistrer</button>
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
                                    <a href="Boutique.php?AjoutBout" class="mb-3">
                                        <button type="submit" class="btn btn-info w-100 waves-effect waves-light m-r-30">Ajouter une chambre </button>
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
                        <h5 class="card-header-text text-center">Liste des chambres</h5>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                     
                                            <th>Numero chambre</th>                                            
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                                $req=$connexion->prepare("SELECT * from lettre");
                                                $req->execute();
                                                $num=0;
                                                while($Data=$req->fetch()){
                                                    $num++;
                                                    $initial=$Data['lettres'];
                                                    $reqq=$connexion->prepare("SELECT count(id) as nb from chambre where numero like ?");
                                                    $reqq->execute(array("%".$initial."%"));
                                                    $count=$reqq->fetch();
                                                    $nb=$count['nb'];
                                            
                                                    if($nb>0){
                                                
                                                ?>
                                        <tr class="ligne">
                                                                                      
                                            <td>Bloc   <?=$Data['lettres']?></td>
                               
                                            <td>Total chambre :   <?=$nb?></td>
                                            <td> 
                                              
                                                
                                                <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')" href="../models/delete/del-boutique-post.php?block=<?=$Data['lettres'] ?>" class="btn btn-danger btn-sm mt-1">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>
                                                
                                            </td>
                                        </tr>
                                      
                                        <?php 
                                        $requ=$connexion->prepare("SELECT * from chambre where numero like ? ");
                                        $requ->execute(array("%".$initial."%"));
                                        $numch=0;
                                        while($chambre=$requ->fetch()){
                                            $numch++;
                                            



                                        ?>
                                        <tr>
                                        <td><?=$numch?></td>
                                        <td><?=$chambre['numero']?></td>
                                        
                                        <td>
                                            <?php if($numch==$nb){?>

                                                <!-- <a href="" class="btn btn-sm btn-info">
                                                    <i class="bi bi-pen-fill"></i>
                                                </a> -->
                                               
                                                <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')" href="../models/delete/del-boutique-post.php?supchambre=<?=$chambre['id']?>" class="btn btn-danger btn-sm mt-1">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>
                                                <?php } ?>
                                                
                                            </td>
                                        </tr>
                                        <?php } } } ?>
                                        
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