<?php
    if (isset($_GET['iduser'])){
        $id=$_GET['iduser'];
        $getDataMod=$connexion->prepare("SELECT * FROM user WHERE id=? and statut=0");
        $getDataMod->execute([$id]);
        if($tab=$getDataMod->fetch()){
            $nom=$tab[1];
            $fonction=$tab[2];
            $telephone=$tab[3];
            $password=$tab[4];
            $photo=$tab[5];
            
           
        }
        /**
         * Ici je specifie le lien lors qu'il s'agit de la modification, ce lien montre ou il faut allez faire la modification 
         * Et changer le texte de bouton pour que les utiliseures sachent s'il s'agit de quel action
         */
        $url="../models/updat/up-utilisateur-post.php?iduser=".$id;
        $btn="Modifier";
        $title="Modifier Utilisateur";
    }
    elseif(isset($_GET['AjoutUser'])){
        $url="../models/add/add-utilisateur-post.php";
        $btn="Enregistrer";
        $title="Ajouter Utilisateur";
    }
    else{
        /**
         * Ici je specifie le lien lors qu'il s'agit de l'enregistrement, ce lien montre ou il faut allez faire l'enregistrement 
         * Et changer le texte de bouton pour que les utiliseures sachent s'il s'agit de quel action
         */
        // $url="../models/add/add-utilisateur-post.php";
        // $btn="Enregistrer";
        // $title="Ajouter Utilisateur";
    }

   