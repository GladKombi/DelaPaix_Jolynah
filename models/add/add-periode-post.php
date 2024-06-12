<?php
#Cette ligne permet d'étabir la connexion à la base de données
include('../../connexion/connexion.php');
if (isset($_POST['valider'])) {
    $DateDebut = htmlspecialchars($_POST['DateDebut']);
    $DateFin = htmlspecialchars($_POST['DateFin']);
    $Montant = htmlspecialchars($_POST['Montant']);
    $statut = 0;
    #verifier si le client existe ou pas dans la bd
    $getChambre = $connexion->prepare("SELECT * FROM `periode` WHERE `dateDebut`=? AND dateFin=? AND statut=?");
    $getChambre->execute([$DateDebut,$DateFin,$statut]);
    ($tab = $getChambre->fetch());
    if ($tab > 0) {
        $msg = 'Une Periode avec le même intervalle existe dejà dans la base de données !';
        $_SESSION['msg'] = $msg;
        header("location:../../views/periode.php");
    } else {
        //Insertion data from database
        $req = $connexion->prepare("INSERT INTO `periode`(`dateDebut`, `dateFin`, `montant`, `statut`) VALUES (?,?,?,?)");
        $resultat = $req->execute([$DateDebut,$DateFin,$Montant, $statut]);

        #Si oui, la variable resultat va retourée true, donc il y a eu un enregistrement
        if ($resultat == true) {
            $_SESSION['msg'] = "Une nouvelle periode viens d'etre ajouter !"; //message
            header("location:../../views/periode.php");
        } else {
            $_SESSION['msg'] = "Echec d'enregistrement"; //message
            header("location:../../views/periode.php");
        }
    }
} else {
    header("location:../../views/periode.php");
}