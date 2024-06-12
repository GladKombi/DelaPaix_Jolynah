<?php
//la connexion a la base de données
include_once('../../connexion/connexion.php');

if (isset($_POST['send'])) {
    $date=date('Y-m-d'); 
    $locataire = htmlspecialchars($_POST['locataire']);
    $periode = htmlspecialchars($_POST['periode']);
    $montant = htmlspecialchars($_POST['montant']);
    $statut=0;
    $req = $connexion->prepare("SELECT periode.id,periode.dateDebut, periode.dateFin, periode.montant,affectation.Chambre, affectation.date,chambre.Categorie FROM periode,affectation,chambre,catchambre WHERE chambre.Categorie=catchambre.id AND affectation.Chambre=chambre.id AND affectation.id=? AND affectation.statut=?;");
    $req->execute([$locataire,$statut]);

    $req = $connexion->prepare("SELECT panier.quantite*panier.prix as montant from panier,commande where commande.id=panier.commande  and commande.id='$_commande'");
    $req->execute();
    $montrecup = 0;

    while ($mon = $req->fetch()) {
        $montrecup = $montrecup + $mon['montant'];
    }

    if ($montrecup < $_montant) {
        $_SESSION['msg'] = "le montant est superieur ";
        header("Location:../../views/paiement.php");
    } else if ($montrecup > $_montant) {
        $supprimer = 0;

        $_sendData = $connexion->prepare("INSERT INTO paiement VALUES (NULL,NOW(),?,?,?,?)");
        $_rows = $_sendData->execute([$_description, $_montant, $_commande, $supprimer]);

        if ($_rows == 1) {
            $montant = $montrecup - $_montant;
            $description = "reste";

            $_sendData = $connexion->prepare("INSERT INTO dettes VALUES (NULL,NOW(),?,?,?,?)");
            $_rowss = $_sendData->execute([$description, $montant, $_commande, $supprimer]);

            if ($_rowss == 1) {
                $statut = 1;
                $req = $connexion->prepare("UPDATE commande set statut=? where id='$_commande'");
                $req->execute(array($statut));

                $_SESSION['msg'] = "Enregistrement reussie";
                header("Location:../../views/paiement.php");
            }
        } else {
            $_SESSION['msg'] = "Echec d'enregistrement";
            header("Location:../../views/paiement.php");
        }
    } else {
        $supprimer=0;
        $_sendData = $connexion->prepare("INSERT INTO paiement VALUES (NULL,NOW(),?,?,?,?)");
        $_rows = $_sendData->execute([$_description, $_montant, $_commande, $supprimer]);

        if ($_rows == 1) {

            $statut = 1;
            $req = $connexion->prepare("UPDATE commande set statut=? where id='$_commande'");
            $req->execute(array($statut));

            $_SESSION['msg'] = "Enregistrement reussie";
            header("Location:../../views/paiement.php");
        } else {
            $_SESSION['msg'] = "Echec d'enregistrement";
            header("Location:../../views/paiement.php");
        }
    }


    //    $_sendData=$connexion->prepare("INSERT INTO paiement VALUES (NULL,NOW(),?,?,?)");
    //    $_rows=$_sendData->execute([$_description,$_montant,$_commande]);
    //    if($_rows==1){
    //     $_SESSION['msg']="Enregistrement reussie";
    //         header("Location:../../views/paiement.php");
    //    }
    //    else{
    //     $_SESSION['msg']="Echec d'enregistrement";
    //         header("Location:../../views/paiement.php");
    //    }

} else {
    header("Location:../../views/paiement.php");
}
