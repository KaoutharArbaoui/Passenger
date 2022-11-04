<?php
/*
 * Script d'ajout d'un trajet
 */
require_once('includes/fonctions.php');
$conn = connexionBDD();
// $id=$_GET['supprimer'];
// echo $id,exit(-1);
        if(isset($_GET['Supprimer']))
          {
              $id=$_GET['Supprimer'];
              $b=getIdUtilisateur(); 
              $c=$id+1; 
               
	
                // $requete = "SELECT expediteur FROM notifications WHERE destinataire=$b AND slno=$id";
                // echo $requete."</br>";
                // $res=$conn->query($requete)or die($conn->error());
                // while($row= mysqli_fetch_array($res)){ 	
                // $auto=$row["expediteur"];
                // $nb1=$nb+1; 
                // echo "l'automobiliste :".$auto."</br>";  
                $requete1 = "SELECT nbpersonne FROM offres WHERE uid=$auto AND statut='Approuvé'";
                // echo $requete1."</br>";
                $res=$conn->query($requete1);
                while($row= mysqli_fetch_array($res)){ 	
                $nb=$row["nbpersonne"];
                $nb1=$nb+1; 
                // echo "nombre de personne est :".$nb1."</br>";  
                  }
                // } 
    
         $a="SELECT slno FROM `notifications` WHERE type=2 AND destinataire=$id  ";
            echo $a;  
            $res=$conn->query($a)or die("Erreur 412417246424");
            while($row= mysqli_fetch_array($res)){ 
				
              $slno=$row["slno"];
            
            } 
  
          // $k="DELETE FROM notifications WHERE  slno=$id" ;
          // echo $k; exit(-1); 

             $conn->query("DELETE FROM notifications WHERE  slno=$id")or die($conn->error());
              header("Location: réservations.php?Supprimer=1");
          } 
          
           
?>


