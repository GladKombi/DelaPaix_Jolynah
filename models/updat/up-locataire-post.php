<?php
include('../../connexion/connexion.php');

if (isset($_POST['valider']) && !empty($_GET['iduser'])) {
  $id = $_GET['iduser'];
  $nom = htmlspecialchars($_POST['nom']);
  $postnom = htmlspecialchars($_POST['postnom']);
  $prenom = htmlspecialchars($_POST['prenom']);
  $adresse = htmlspecialchars($_POST['adresse']);
  $telephone = htmlspecialchars($_POST['telephone']);
  $password = htmlspecialchars($_POST['pwd']);
  //select data from database
  $req = $connexion->prepare("UPDATE `locataire` SET  nom=?,postnom=?,prenom=?,adresse=?,numero=?,pwd=? WHERE id='$id'");
  $resultat = $req->execute([$nom, $postnom, $prenom, $adresse, $telephone, $password]);
  if (is_numeric($telephone)) {
    $req = $connexion->prepare("UPDATE `locataire` SET  nom=?,postnom=?,prenom=?,adresse=?,numero=?,pwd=? WHERE id='$id'");
    $resultat = $req->execute([$nom, $postnom, $prenom, $adresse, $telephone, $password]);
    if ($resultat == true) {
      $msg = "Modification réussie";
      $_SESSION['msg'] = $msg;
      header("location:../../views/locataire.php");
    }
  } else {
    $_SESSION['msg'] = "Le numero de téléphone ne doit pas être une chaîne de caractère";
    header("location:../../views/locataire.php");
  }
} else {
  header("location:../../views/locataire.php");
}
