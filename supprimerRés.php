<?php
  require_once('includes/fonctions.php');
  $conn = connexionBDD();
        if(isset($_GET['Supprimer']))
          {
              $id=$_GET['Supprimer'];
              $b=getIdUtilisateur(); 
              $c=$id+1; 
                $requete = "SELECT expediteur,cid FROM notifications WHERE destinataire=$b AND slno=$id";
                $res=$conn->query($requete)or die($conn->error());
                while($row= mysqli_fetch_array($res)){ 	
                $auto=$row["expediteur"];
                $idd=$row["cid"];  
                $requete1 = "SELECT nbpersonne FROM offres WHERE uid=$auto AND id=$idd ";
                $res=$conn->query($requete1)or die($conn->error());
                while($row= mysqli_fetch_array($res)){ 	
                $nb=$row["nbpersonne"];
                $nb1=$nb+1;  
                  }}  
                $a="SELECT slno FROM `notifications` WHERE type=2 AND destinataire=$id  ";
                $res=$conn->query($a)or die("Erreur 412417246424");
                    while($row= mysqli_fetch_array($res))
                    { 
                
                      $slno=$row["slno"];
                    
                    } 
             $conn->query("UPDATE notifications SET statut='Annuler' WHERE type=2 AND destinataire=$b AND slno=$id")or die($conn->error());
             $conn->query("UPDATE notifications SET statut='Annuler par voyageur' WHERE type=1 AND slno=$c")or die($conn->error());
             $conn->query("UPDATE offres SET nbpersonne=$nb1 WHERE uid=$auto")or die($conn->error()); 
              header("Location: index.php?Supprimer=1");
          }  
           
?>


