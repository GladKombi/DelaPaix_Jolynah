<?php
  include('../../connexion/connexion.php');
  #suppression
  if (isset($_GET['block']) && !empty($_GET['block'])) {
      $initial=$_GET['block'];
      
      $req=$connexion->prepare("DELETE from chambre  where numero like ?");
      $req->execute(array("%".$initial."%"));

      if($req){
        $_SESSION['msg']="Suppression du block réussie";
        header('location:../../views/boutique.php?AjoutBout');
      }else{
        $_SESSION['msg']="Echec de la suppression";
        header('location:../../views/boutique.php?AjoutBout');
      }
  }
  if (isset($_GET['supchambre']) && !empty($_GET['supchambre'])) {
    $id=$_GET['supchambre'];
    
    $req=$connexion->prepare("DELETE from chambre  where id=?");
    $req->execute(array($id));

    if($req){
      $_SESSION['msg']="Suppression  réussie";
      header('location:../../views/boutique.php?AjoutBout');
    }else{
      $_SESSION['msg']="Echec de la suppression";
      header('location:../../views/boutique.php?AjoutBout');
    }
}
  else{
    header('location:../../views/boutique.php?AjoutBout');
  }