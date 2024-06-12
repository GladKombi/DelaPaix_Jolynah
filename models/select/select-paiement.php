<?php

if (isset($_GET['idMod']) && !empty($_GET['idMod'])) {
    $_id = $_GET['idMod'];
    #affichage simple
    $_getDataMod = $connexion->prepare("SELECT * FROM paiement WHERE id=?");
    $_getDataMod->execute([$_id]);

    if ($_tab = $_getDataMod->fetch()) {
        $_description = $_tab[2];
        $_montant = $_tab[3];
        $_commande = $_tab[4];
    }

    $_url = "../models/updat/up-paiement-post.php?id=" . $_tab[0];
    $_btn = "Modifier";    
    $title = "Modifier le paiement";
    //la requete qui recupere les commandes pour les ajouter dans le combobox
    // $_getCommande = $connexion->prepare("SELECT client.nom,client.postnom,client.prenom,commande.id,commande.dates FROM 
    // client,commande where commande.client=client.id AND client.supprimer=0 AND commande.supprimer=0");
    // $_getCommande->execute();
} else {
    $_url = "../models/add/add-paiement-post.php";
    $_btn = "Ajouter";    
    $title = "Nouveau paiment";
    //la requete qui recupere les commandes pour les ajouter dans le combobox
    $_GetLoc = $connexion->prepare("SELECT affectation.id, affectation.date,affectation.statut,locataire.nom,locataire.prenom, locataire.numero,chambre.numero FROM affectation,locataire,chambre WHERE affectation.locataire=locataire.id AND affectation.Chambre=Chambre.id AND affectation.statut=?;");
    $_GetLoc->execute([0]);
    $_GetPer=$connexion->prepare("SELECT * FROM periode;");
    $_GetPer->execute();
}

//la requete qui permet d'afficher les données
if (isset($_GET['search']) && !empty($_GET['search'])) {
    #La recherche...
    // $_search = $_GET['search'];
    // $_getData = $connexion->prepare("SELECT paiement.*,client.nom,client.postnom,client.prenom from 
    //     paiement,client,commande where commande.id=paiement.commande and commande.client=client.id AND paiement.supprimer=0  AND commande.supprimer=0 AND client.supprimer=0 AND 
    //     (paiement.dates LIKE ? OR client.nom LIKE ? OR client.postnom LIKE ? OR client.prenom LIKE ? OR paiement.montant LIKE ?)");
    // $_getData->execute(["%" . $_search . "%", "%" . $_search . "%", "%" . $_search . "%", "%" . $_search . "%", "%" . $_search . "%"]);
} else {
    #Affichage simple
    $_getData = $connexion->prepare("SELECT * FROM paiement");
    $_getData->execute();
}
