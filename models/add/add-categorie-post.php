<?php
#Cette ligne permet d'étabir la connexion à la base de données
include('../../connexion/connexion.php');
if (isset($_POST['valider'])) {
    $description = htmlspecialchars($_POST['description']);
    $statut = 0;
    #verifier si le client existe ou pas dans la bd
    $getChambre = $connexion->prepare("SELECT * FROM `catchambre` WHERE `description`=? AND statut=?");
    $getChambre->execute([$description, $statut]);
    ($tab = $getChambre->fetch());
    if ($tab > 0) {
        $msg = 'Une categorie portant la même description existe dejà dans la base de données !';
        $_SESSION['msg'] = $msg;
        header("location:../../views/catChambre.php");
    } else {
        //Insertion data from database
        $req = $connexion->prepare("INSERT INTO `catchambre`(`description`, `statut`) VALUES (?,?)");
        $resultat = $req->execute([$description, $statut]);

        #Si oui, la variable resultat va retourée true, donc il y a eu un enregistrement
        if ($resultat == true) {
            $_SESSION['msg'] = "Une nouvelle catégorie de chambre viens d'etre ajouter !"; //message
            header("location:../../views/catChambre.php");
        } else {
            $_SESSION['msg'] = "Echec d'enregistrement"; //message
            header("location:../../views/catChambre.php");
        }
    }
} else {
    header("location:../../views/catChambre.php");
}

