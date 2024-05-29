<?php
    if (isset($_GET['idbout'])){
        $id=$_GET['idbout'];
        
        $getDataMod=$connexion->prepare("SELECT * FROM boutique WHERE id=?");
        $getDataMod->execute([$id]);
        $tab=$getDataMod->fetch();
        /**
         * Ici je specifie le lien lors qu'il s'agit de la modification, ce lien montre ou il faut allez faire la modification 
         * Et changer le texte de bouton pour que les utiliseures sachent s'il s'agit de quel action
         */
        $url="../models/updat/up-boutique-post.php?idbout=".$id;
        $btn="Modifier";
        $title="Modifier Boutique";
    }
    else{
        /**
         * Ici je specifie le lien lors qu'il s'agit de l'enregistrement, ce lien montre ou il faut allez faire l'enregistrement 
         * Et changer le texte de bouton pour que les utiliseures sachent s'il s'agit de quel action
         */
        $url="../models/add/add-boutique-post.php";
        $btn="Enregistrer";
        $title="Ajouter Boutique";
    }

    /**
     * Le code qui permet d'afficher les boutiques, lors de l'affichage simple, et lors de la recherche
     */
    if(isset($_GET['search']) && !empty($_GET['search'])){
        $search=$_GET['search'];
        $getData=$connexion->prepare("SELECT * from boutique WHERE statut=0 AND boutique.nom LIKE ? OR boutique.description LIKE ? 
        OR boutique.adresse LIKE ?");
        $getData->execute(["%".$search."%", "%".$search."%", "%".$search."%"]);
    }
    else{
        $getData=$connexion->prepare("SELECT * from boutique WHERE statut=0");
        $getData->execute();
    }