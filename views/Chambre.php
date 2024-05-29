<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chambres</title>
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
                                    <h3 class="text-center">Ajouter une chambre</h3>
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-control-label">Numero de la chambre</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer un Numero chambre">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleSelect1" class="form-control-label">Categorie</label>
                                            <select class="form-control " id="exampleSelect1">
                                                <option>Double-porte</option>
                                                <option>Mono-porte</option>                                                
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-info w-100 waves-effect waves-light m-r-30">Enregistrer</button>
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
                                    <a href="Chambre.php?AjoutBout" class="mb-3">
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
                                            <th>Categorie</th>
                                            <th>Prix</th>                                            
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>                                            
                                            <td>Mono-porte</td>
                                            <td>15$</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-info">
                                                    <i class="bi bi-pen-fill"></i>
                                                </a>
                                                <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')" href="#" class="btn btn-danger btn-sm mt-1">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>
                                            </td>
                                        </tr>
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