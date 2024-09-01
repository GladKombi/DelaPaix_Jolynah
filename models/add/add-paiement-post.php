<?php
include_once('../../connexion/connexion.php');
if (isset($_GET['periode'])) {
    $periode = $_GET['periode'];
    $date = date('Y-m-d');
    $req = $connexion->prepare("SELECT * from periode where periode.id=?;");
    $req->execute(array($periode));
    $selection = $req->fetch();
    $Affectation=$selection['affectation'];
    $montant=$selection['montant'];
    $statut=0;
    $insert = $connexion->prepare("INSERT INTO `paiement`(`date`,`affectation`,`periode`,`montant`,`statut`) VALUES (?,?,?,?,?)");
    $resultat = $insert->execute([$date, $Affectation, $periode,$montant,$statut]);
    if ($resultat == true) {
        $_SESSION['msg'] = "Un paiment viens d'etre effectuer";
        header("location:../../views/paiement.php");
    } else {
        $_SESSION['msg'] = "Echec d'enregistrement";
        header("location:../../views/boutique.php");
    }
}
