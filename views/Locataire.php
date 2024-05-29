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
                    if (isset($_GET['AjoutLoc'])) {
                    ?>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h3 class="text-center">Ajouter un Locataire</h3>
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-control-label">Nom </label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer votre Nom">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-control-label">Postnom </label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer votre Postnom">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-control-label">Prenom </label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer votre Prenom">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-control-label">Adresse Du domicile</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer votre Adresse">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-control-label">Numero de Telephone </label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer votre numero de telephone">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" class="form-control-label">Mot de passe</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Saisir un mot de passe">
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
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                Masika
                                                Mirera
                                                Jolynah
                                            </td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
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