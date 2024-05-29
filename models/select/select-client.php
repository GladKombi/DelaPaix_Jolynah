<?php
    if (isset($_GET['idclient'])){
        $id=$_GET['idclient'];
        $getDataMod=$connexion->prepare("SELECT * FROM client WHERE id=?");
        $getDataMod->execute([$id]);
        $tab=$getDataMod->fetch();
        
        $url="../models/updat/up-client-post.php?idclient=".$id;
        $btn="Modifier";
        $title="Modifier un Client";
    }
    else{
        $url="../models/add/add-client-post.php";
        $btn="Enregistrer";
        $title="Ajouter un Client";
    }
    /**
     * Le code qui permet d'afficher les client, lors de l'affichage simple, et lors de la recherche
     */
    if(isset($_GET['search']) && !empty($_GET['search'])){
        $search=$_GET['search'];
        $getData=$connexion->prepare("SELECT * from client WHERE supprimer=0 AND client.nom LIKE ? OR client.postnom LIKE ? OR 
        client.prenom LIKE ? OR client.genre LIKE ? OR client.adresse LIKE ? OR client.telephone LIKE ?");
        $getData->execute(["%".$search."%", "%".$search."%", "%".$search."%", "%".$search."%", "%".$search."%","%".$search."%"]);
    }
    else{
        $getData=$connexion->prepare("SELECT * from client WHERE supprimer=0");
        $getData->execute();
    }