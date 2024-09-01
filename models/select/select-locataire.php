<?php
    if (isset($_GET['iduser'])){
        $id=$_GET['iduser'];
        $getDataMod=$connexion->prepare("SELECT * FROM locataire WHERE id=? and statut=0");
        $getDataMod->execute([$id]);
        if($tab=$getDataMod->fetch()){
            $nom=$tab[1];
            $postnom=$tab[2];
            $prenom=$tab[3];
            $adresse=$tab[4];
            $telephone=$tab[5];
            $password=$tab[6];
            
           
        }
        /**
         * Ici je specifie le lien lors qu'il s'agit de la modification, ce lien montre ou il faut allez faire la modification 
         * Et changer le texte de bouton pour que les utiliseures sachent s'il s'agit de quel action
         */
        $url="../models/updat/up-locataire-post.php?iduser=".$id;
        $btn="Modifier";
        $title="Modifier locataire";
    }
    else{
        /**
         * Ici je specifie le lien lors qu'il s'agit de l'enregistrement, ce lien montre ou il faut allez faire l'enregistrement 
         * Et changer le texte de bouton pour que les utiliseures sachent s'il s'agit de quel action
         */
        $url="../models/add/add-locataire-post.php";
        $btn="Enregistrer";
        $title="Ajouter locataire";
    }

   