<?php
include('../../connexion/connexion.php');
if (isset($_GET['idSupPer']) && !empty($_GET['idSupPer'])) {
  $id = $_GET['idSupPer'];
  $statut = 1;
  $req = $connexion->prepare("UPDATE periode SET statut=? WHERE id=?");
  $resultat = $req->execute([$statut, $id]);
  #Si oui, la variable resultat va retourée true, donc il y a eu une modification
  if ($resultat == true) {
    $_SESSION['msg'] = "Vous venez de supprimer une Periode !"; 
    header("location:../../views/periode.php");
  } else {
    $_SESSION['msg'] = "Echec de Suppression"; 
    header("location:../../views/periode.php");
  }
} else {
  header("location:../../views/periode.php");
}