<?php
#inclusion de la page de connexion
  include('../../connexion/connexion.php');
  
// creation de l'evenement sur le bouton valider
  if(isset($_POST['valider'])){
      $nom=htmlspecialchars($_POST['nom']);
      $postnom=htmlspecialchars($_POST['postnom']);
      $prenom=htmlspecialchars($_POST['prenom']);
      $adresse=htmlspecialchars($_POST['adresse']);
      $telephone=htmlspecialchars($_POST['telephone']);
      $password=htmlspecialchars($_POST['pwd']);
      /**
       * Here’s the translation of your logic into English: “Here, we have hashed the password. So, for a new user, you first need to create a file that will allow you to hash the password in order to log in. Please create this file outside of this ‘dk’ project.”
       * for example
       * $pwd=1234;
       * $hash = password_hash($pwd, PASSWORD_DEFAULT);
       * print $hash;
       */

      // password hashing
      // $passwordh=$password;
      // $passwordhacher=password_hash($passwordh, PASSWORD_DEFAULT);
    
        #verifier si l'utilisateur existe ou pas dans la bd
        $getlocataire=$connexion->prepare("SELECT * FROM `locataire` WHERE numero=? AND statut=?");
        $getlocataire->execute([$telephone, 0]);
        $tab=$getlocataire->fetch();
        // verification si la variable tab est superieur à zéro
          if($tab>0){
          $_SESSION['msg']='ce locataire existe dejà dans la base de données';//Cette variable recoit le message pour notifier l'utilisateur de l'opération qu'il deja fait
          header("location:../../views/locataire.php");
          }else{
            // verifier la validité du numero de télephone
            if(is_numeric($telephone)){
            //Insertion data from database
            $req=$connexion->prepare("INSERT INTO locataire (nom, postnom, prenom, adresse, numero, pwd) values (?,?,?,?,?,?)");
            $resultat=$req->execute([$nom,$postnom,$prenom,$adresse,$telephone, $password]);
            if($resultat==true){
              $msg="Enregistrement réussie";
              $_SESSION['msg']=$msg;
              header("location:../../views/locataire.php");
            }
            else{
              $_SESSION['msg']="Echec d'enregistrement";
               header("location:../../views/locataire.php");
            }
          }else{
            $_SESSION['msg']="Le numero de téléphone ne doit pas être une chaîne de caractère";
            header("location:../../views/locataire.php");
          }
        }
     

  }else{
   header("location:../../views/locataire.php");
  }
?>