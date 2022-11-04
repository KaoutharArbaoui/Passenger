<?php

require_once('includes/fonctions.php');
$conn = connexionBDD();

if(isset($_GET['Supprimer*'])){
        $id = $_GET['Supprimer*'];
        $requete = "SELECT * FROM offres WHERE uid = ".$id;
		// echo $requete; exit(-1);
        $result = $conn->query($requete);
        
          $row = mysqli_fetch_array($result);
          $uid = $row['uid'];
          
          $cid = $row['id'];

       $req4= "DELETE FROM notifications WHERE expediteur=$uid OR destinataire=$uid";
              //  echo $req4; exit(-1);

       $req1= "DELETE FROM route WHERE cid=$cid ";
              //  echo $req; exit(-1);
       $req2= "DELETE FROM offres WHERE uid=$id ";
       $req3= "DELETE FROM utilisateurs WHERE uid=$id ";
       mysqli_query($conn, $req4);
       mysqli_query($conn, $req1);
       mysqli_query($conn, $req2);
       mysqli_query($conn, $req3);
 header("Location: utilisateur.php?drop=1");

        // echo $req; exit(-1);
}
          ?>