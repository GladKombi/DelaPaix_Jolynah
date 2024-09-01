<?php
    #Cette ligne permet d'étabir la connexion à la base de données
    include('../../connexion/connexion.php');
    if(isset($_POST['valider'])){
        $dateaffectation=date('Y-m-d'); 
        $locataire=htmlspecialchars($_POST['locataire']);
        $Chambre=htmlspecialchars($_POST['Chambre']);
        //Insertion data from database
        $req=$connexion->prepare("INSERT INTO `affectation`(`locataire`, `Chambre`, `dateaffectation`) values (?,?,?)" );
        $resultat=$req->execute(array($locataire,$Chambre,$dateaffectation));//Il faut  stocker la requette dans la variable qui s'appel resultat, pour qu'on sache que la requette a été exequitée ou pas

        #Si oui, la variable resultat va retourée true, donc il y a eu un enregistrement
        if($resultat==true){
            $datepaiement=date('Y-m-d',strtotime($dateaffectation . '+30 days' ));
            //Selection de l'affectation
            $reqSel=$connexion->prepare("SELECT `id` FROM `affectation` WHERE locataire=? and chambre=?;");
            $reqSel->execute(array($locataire,$Chambre,));
            $Selection=$reqSel->fetch();
            $idAffectation=$Selection[0];
            //Selection du du montant
            $reqMont=$connexion->prepare("SELECT montant FROM `prix` ORDER BY id DESC LIMIT 1;");
            $reqMont->execute();
            $idmontant=$reqMont->fetch();
            $montant=$idmontant[0];

            $reqet=$connexion->prepare("INSERT INTO `periode`(`affectation`, `dateDebut`, `dateFin`, `montant`, `statut`) values (?,?,?,?,?)" );
            $resultat=$reqet->execute(array($idAffectation,$dateaffectation,$datepaiement,$montant,0));

            $_SESSION['msg']= "L'enreigistrement réussi";
            header("location:../../views/Affectation.php?AjoutAffect");
        }
        else{
            $_SESSION['msg']= "Echec d'enreigistrement";//Cette ligne permet d'ajouter un message dans la session Lors qu'il n'y a aucun enregistrement
            header("location:../../views/Affectation.php?AjoutAffect");
        }
    }else{
        //Cette ligne permet de rediriger l'utiliseteur lors qu'il a pas cliquer sur le button qui sert à enregistrer
        header("location:../../views/Affectation.php?AjoutAffect");
    }
 