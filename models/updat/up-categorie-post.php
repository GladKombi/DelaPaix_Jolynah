<?php
include('../../connexion/connexion.php');
#modification
if (isset($_POST['valider']) && !empty($_GET['idcat'])) {
  $id = $_GET['idcat'];
  $description = htmlspecialchars($_POST['description']);
  $statut=0;
  #verifier si le client existe ou pas dans la bd
  $getChambre = $connexion->prepare("SELECT * FROM `catchambre` WHERE `description`=? AND statut=?");
  $getChambre->execute([$description, $statut]);
  ($tab = $getChambre->fetch());
  if ($tab > 0) {
    $msg = 'Veillez saisir svp une valeur differente de ceux existants dejà dans la base de données !';
    $_SESSION['msg'] = $msg;
    header("location:../../views/catChambre.php");
  } else {
    $req = $connexion->prepare("UPDATE `catchambre` SET `description`=?  WHERE id='$id'");
    $resultat = $req->execute([$description]);
    #Si oui, la variable resultat va retourée true, donc il y a eu une modification
    if ($resultat == true) {
      $_SESSION['msg'] = "La modification a réussi";
      header("location:../../views/catchambre.php");
    } else {
      $_SESSION['msg'] = "Echec de la modification";
      header("location:../../views/catchambre.php");
    }
  }
} else {
  //Cette ligne permet de rediriger l'utiliseteur lors qu'il a pas cliquer sur le button qui sert à modifier
  header("location:../../views/catchambre.php");
}
