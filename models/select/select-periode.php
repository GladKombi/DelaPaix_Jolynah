<?php
    if (isset($_GET['idper']))
    {
        $id=$_GET['idper'];        
        $getDataMod=$connexion->prepare("SELECT * FROM periode WHERE id= ?");
        $getDataMod->execute([$id]);
        $tab=$getDataMod->fetch();        
        
        $url="../models/updat/up-periode-post.php?idper=".$id;//Cette varible permet de savoir sur quelle page l'action va etre executée lors de la modification
        $btn="Modifier";//On chager le texte sur le button qui sert à modifier ou ajouter
        $title="Modifier une Période";
    }
    else if (isset($_GET['AjoutPeriode'])){
        $url="../models/add/add-periode-post.php";//Cette varible permet de savoir sur quelle page l'action va etre executée lors de l'enregistrement. il sera mit dans l'attribut action dans le form
        $btn="Enregistrer";//On chager le texte sur le button qui sert à modifier ou ajouter
        $title="Ajouter une nouvelle periode";
    }

    #La requette qui permet de faire les affichages et recherche
    if(isset($_GET['search']) && !empty($_GET['search'])){
        $search=$_GET['search'];
        $getData=$connexion->prepare("SELECT * from periode WHERE staut=? AND description LIKE ?");
        $getData->execute([0, "%".$search."%"]);
    }
    else{
        $getData=$connexion->prepare("SELECT * from periode WHERE statut=?");
        $getData->execute([0]);
    }