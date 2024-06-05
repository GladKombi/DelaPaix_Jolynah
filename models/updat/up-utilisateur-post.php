<?php
  include('../../connexion/connexion.php');

  if(isset($_POST['valider']) && !empty($_GET['iduser'])){
    $id=$_GET['iduser'];
    $nom=htmlspecialchars($_POST['nom']);
    $fonction=htmlspecialchars($_POST['fonction']);
    $telephone=htmlspecialchars($_POST['telephone']);
    $pwd=htmlspecialchars($_POST['pwd']);
    $photo=htmlspecialchars($_POST['photo']);
   
    $photo=$_FILES['photo']['name'];
    $upload="../../photo/".$photo;
    move_uploaded_file($_FILES['photo']['tmp_name'],$upload);
    //select data from database
      
    $req=$connexion->prepare("UPDATE `user` SET  nom=?,fonction=?,telephone=?,pwd=?,photo=? WHERE id='$id'");
    $resultat=$req->execute([$nom,$fonction,$telephone,$pwd,$photo]);
     if(is_numeric($telephone)){ 
     $req=$connexion->prepare("UPDATE `user` SET  nom=?,fonction=?,telephone=?,pwd=?,photo=? WHERE id='$id'");
    $resultat=$req->execute([$nom,$fonction,$telephone,$pwd,$photo]);
    if($resultat==true){
      $msg="Modification réussie";
      $_SESSION['msg']=$msg;
      header("location:../../views/utilisateur.php");
    }
  }else{
    $_SESSION['msg']="Le numero de téléphone ne doit pas être une chaîne de caractère";
    header("location:../../views/utilisateur.php");
  }
  }
  else{
    header("location:../../views/utilisateur.php");
  }
?>