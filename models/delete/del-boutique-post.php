<?php
  include('../../connexion/connexion.php');
  #suppression
  if (isset($_GET['idSupcat']) && !empty($_GET['idSupcat'])) {
      $id=$_GET['idSupcat'];
      $supprimer=1;
      $req=$connexion->prepare("UPDATE `boutique` SET statut=? WHERE id=?");
      $resultat=$req->execute([$supprimer, $id]);

      if($resultat==true){
        $_SESSION['msg']="Suppression réussie";
        header("location:../../views/boutique.php");
      }else{
        $_SESSION['msg']="Echec de la suppression";
        header("location:../../views/boutique.php");
      }
  }
  else{
    header("location:../../views/boutique.php");
  }