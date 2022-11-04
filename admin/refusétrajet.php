<?php

            require_once('includes/fonctions.php');
            $conn = connexionBDD();
            if(isset($_GET['Refuser'])){
                    $id = $_GET['Refuser'];
                $req= "SELECT id  FROM offres WHERE statut='En attente' ";
                //  echo $req;
                $result=$conn->query($req); 
                
                    // echo $req; exit(-1);
                    // if (mysqli_num_rows($result) == 1) {
            $row=mysqli_fetch_array($result); 
                $cid=$row['id'] ;
                // $cid=$row['routeid'];
                // echo $cid; exit(-1);

            //     $query1="UPDATE notifications SET statut='trajet Supprimer' WHERE cid=$cid";
            // echo $query1; exit(-1);

                $query2="DELETE FROM route WHERE cid=$cid";
            // echo $query2; exit(-1);

            $query3 = "UPDATE offres SET statut='Refusé'  WHERE id=$cid";
            // echo $query3; exit(-1);
            // mysqli_query($conn, $query1);

            mysqli_query($conn, $query2);
            mysqli_query($conn, $query3);
            header("Location: index.php?suppression=1");
            // } 
                    }

                    
           


?>


