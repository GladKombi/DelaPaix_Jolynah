
<?php

    include('../../connexion/connexion.php');
    // $lettre=range('A','Z');
    // foreach($lettre as $alp){
    //    $req=$connexion->prepare("INSERT INTO lettre (lettres) VALUES (?)");
    //    $req->execute(array($alp));
    // }
     
    if(isset($_POST['valider'])){        
      $categorie=htmlspecialchars($_POST['categorie']);
      $nombre=htmlspecialchars($_POST['nombre']);
      $nombrre=htmlspecialchars($_POST['nombre']);
      $initial=htmlspecialchars($_POST['initial']);
      $req=$connexion->prepare("SELECT count(id) as nb from chambre  where numero like ?");
      $req->execute(array("%" .$initial. "%"));
      if($selBout=$req->fetch()){
        $nbinitial=$selBout['nb'];
       
      }
      else{
        $nbinitial=0;
      }
      echo $nbinitial;
      $test="AA";
      // if(count_chars($test)==2)
      // {
      //    echo "2";
      // }
     
      //  echo strlen($test);
      // echo $bout."a";
      $lettre=$initial;
      $countInitial=$nbinitial;
      

      $numero="";
      $nbinitial=$nbinitial+1;
      $nombre=$nombre+$nbinitial;
      $nb=0;
      for($i=$nbinitial;$i<$nombre;$i++){
        $nb=$nb+1;
        $countInitial=$countInitial+1;
        if($countInitial<33)
        {
          
        
              if(strlen($i)==1)
              {
                $zero="00";
              }
              else if(strlen($i)==2)
              {
                $zero="0";
              }
              
              else{
                $zero="";
              }
              $numero="$lettre$zero$i";
              echo $numero.'</br>';
            $req=$connexion->prepare("INSERT INTO chambre(numero,Categorie) VALUES(?,?)");
            $req->execute(array($numero,$categorie));

            if($nb==$nombrre)
            {
                $_SESSION['msg']="Enregistrement reussie";
                header('location:../../views/boutique.php?AjoutBout');
            
            }
      }
       else
       {
        $nb=$nb-1;
        $_SESSION['msg']=" enregistrement reussi de $nb chambres  avec  l'initial $initial et vient d'attiendre la limite  ,choisissez un autre initial pour creer d'autres chambres";
        $i=$nombre;
        header('location:../../views/boutique.php?AjoutBout');
      }
      
      }
      echo $countInitial;
    }
?> 