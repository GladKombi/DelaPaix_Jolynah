<?php
  include '../../connexion/connexion.php';
  #modification
  if(isset($_POST['valider']) && !empty($_GET['idbout'])){
    $id=$_GET['idbout'];
    $nom=htmlspecialchars($_POST['nom']);
    $description=htmlspecialchars($_POST['description']);
    $adresse=htmlspecialchars($_POST['adresse']);
    //Metter seulement les paramètre lors que vous préparez la requette
    $req=$connexion->prepare("UPDATE `boutique` SET  nom=?,description=?,adress=? WHERE id='$id'");
    $resultat=$req->execute([$nom,$description,$adresse]);
    if($resultat==true){
      $_SESSION['msg']="Modification réussie";
      header("location:../../views/boutique.php");
    }else{
      $_SESSION['msg']="Echec de la odification";
      header("location:../../views/boutique.php");
    }
  }else{
    header("location:../../views/boutique.php");
  }
