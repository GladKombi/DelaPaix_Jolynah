<?php
#inclusion de la page de connexion
include('connexion/connexion.php');
if (isset($_GET['idReservation'])) {
    $id = $_GET['idReservation'];
}
// creation de l'evenement sur le bouton valider
if (isset($_POST['valider'])) {
  $nom = htmlspecialchars($_POST['nom']);
  $postnom = htmlspecialchars($_POST['postnom']);
  $prenom = htmlspecialchars($_POST['prenom']);
  $adresse = htmlspecialchars($_POST['adresse']);
  $telephone = htmlspecialchars($_POST['telephone']);
  $password = htmlspecialchars($_POST['pwd']);
  #verifier si l'utilisateur existe ou pas dans la bd
  $getlocataire = $connexion->prepare("SELECT * FROM `locataire` WHERE numero=? AND statut=?");
  $getlocataire->execute([$telephone, 0]);
  $tab = $getlocataire->fetch();
  // verification si la variable tab est superieur à zéro
  if ($tab > 0) {
    $_SESSION['msg'] = 'Lu numero que vous avez utiliser existe deja dans le systeme'; //Cette variable recoit le message pour notifier l'utilisateur de l'opération qu'il deja fait
    header("location:reserver.php?idReservation=$id&idCompte");
  } else {
    // verifier la validité du numero de télephone
    if (is_numeric($telephone)) {
      //Insertion data from database
      $req = $connexion->prepare("INSERT INTO locataire (nom, postnom, prenom, adresse, numero, pwd) values (?,?,?,?,?,?)");
      $resultat = $req->execute([$nom, $postnom, $prenom, $adresse, $telephone, $password]);
      if ($resultat == true) {
        $msg = "Enregistrement réussie";
        $_SESSION['msg'] = $msg;
        header("location:reserver.php?idReservation=$id&comptCree");
      } else {
        $_SESSION['msg'] = "Echec d'enregistrement";
        header("location:reserver.php?idReservation=$id&idCompte");
      }
    } else {
      $_SESSION['msg'] = "Le numero de téléphone ne doit pas être une chaîne de caractère";
      header("location:reserver.php?idReservation=$id&idCompte");
    }
  }
} else {
  header("location:reserver.php?idReservation=$id&idCompte");
}