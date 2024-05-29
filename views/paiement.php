<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement</title>
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
                        <h4>Gestion des Paiments</h4>
                    </div>
                </div>

                <!-- 1-3-block row start -->
                <div class="row">
                    <?php
                    if (isset($_GET['newPaiement'])) {
                    ?>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h3 class="text-center">Nouveau paiment</h3>
                                    <form>                                      
                                        <div class="form-group">
                                            <label for="exampleSelect1" class="form-control-label">Locataire</label>
                                            <select class="form-control " id="exampleSelect1">
                                                <option>Masika Mirera Jolynah</option>
                                                <option>Nsele Gafura Lydia</option>
                                                <option>Muhindo Kombi Glad</option>                                               
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelect1" class="form-control-label">Periode</label>
                                            <select class="form-control " id="exampleSelect1">
                                                <option>Janviers</option>
                                                <option>Fevrier</option>
                                                <option>Mars</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-control-label">Montant </label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer votre Nom">
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
                                    <a href="paiement.php?newPaiement" class="mb-3">
                                        <button type="submit" class="btn btn-info w-100 waves-effect waves-light m-r-30"> Nouveau Paiement</button>
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
                        <h5 class="card-header-text text-center">Liste des Paiements</h5>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Locataire</th>
                                            <th>Periode</th>
                                            <th>Montant</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>02 fevrier 2024</td>
                                            <td>
                                                Masika
                                                Mirera
                                                Jolynah
                                            </td>
                                            <td>fevrier 2024</td>
                                            <td>500/<b>500$</b></td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-info">
                                                    <i class="bi bi-pen-fill"></i>
                                                </a>
                                                <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')" href="#" class="btn btn-danger btn-sm mt-1">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>02 fevrier 2024</td>
                                            <td>                                                
                                                Masika
                                                Mirera
                                                Jolynah
                                            </td>
                                            <td>fevrier 2024</td>
                                            <td><span class="text-danger">200</span>/<b>550$</b></td>
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