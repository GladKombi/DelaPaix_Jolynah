<?php
    #Cette ligne permet d'étabir la connexion à la base de données
    include('../../connexion/connexion.php');
    if(isset($_POST['valider'])){
        $description=htmlspecialchars($_POST['description']);
        $statut=0;
        //Insertion data from database
        $req=$connexion->prepare("INSERT INTO typeproduit(`description`, statut) values (?,?)");
        $resultat=$req->execute([$description,$statut]);

        #Si oui, la variable resultat va retourée true, donc il y a eu un enregistrement
        if($resultat==true){
            $_SESSION['msg']= "L'enreigistrement réussi";//message
            header("location:../../views/categories.php");
        }
        else{
            $_SESSION['msg']= "Echec d'enreigistrement";//message
            header("location:../../views/categories.php");
        }
    }else{        
        header("location:../../views/categories.php");
    }
?> 
 