<?php
include('../../connexion/connexion.php');
if (isset($_GET['idSupcat']) && !empty($_GET['idSupcat'])) {
  $id = $_GET['idSupcat'];
  $statut = 1;
  $req = $connexion->prepare("UPDATE catChambre SET statut=? WHERE id=?");
  $resultat = $req->execute([$statut, $id]);
  #Si oui, la variable resultat va retourée true, donc il y a eu une modification
  if ($resultat == true) {
    $_SESSION['msg'] = "Vous venez de supprimer une catégorie !"; //Cette ligne permet d'ajouter un message dans la session Lors qu'il y a eu un enregistrement
    header("location:../../views/catChambre.php");
  } else {
    $_SESSION['msg'] = "Echec de Suppression"; //Cette ligne permet d'ajouter un message dans la session Lors qu'il n'y a aucune modification
    header("location:../../views/catChambre.php");
  }
} else {
  header("location:../../views/catChambre.php");
}
