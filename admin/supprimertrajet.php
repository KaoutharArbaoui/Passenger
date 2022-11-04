<?php
/*
 * Script d'ajout d'un trajet
 */
require_once('includes/fonctions.php');
$conn = connexionBDD();
if(isset($_GET['Supprimer'])){
        $id = $_GET['Supprimer'];
       $req= "SELECT id  FROM offres WHERE id=$id  ";
      //  echo $req;
       $result=$conn->query($req); 
       
        // echo $req; exit(-1);
          // if (mysqli_num_rows($result) == 1) {
  $row=mysqli_fetch_array($result); 
    $cid=$row['id'] ;
    // $cid=$row['routeid'];
    // echo $cid; exit(-1);

    $query1="DELETE FROM notifications WHERE cid=$cid";
// echo $query1;

     $query2="DELETE FROM route WHERE cid=$cid";
// echo $query2; 


  $query3 = "DELETE FROM offres WHERE id=$cid";
// echo $query3; exit(-1);
 mysqli_query($conn, $query1);

 mysqli_query($conn, $query2);
 mysqli_query($conn, $query3);
 header("Location: index.php?suppression=1");
// } 
        }

         
           


?>


