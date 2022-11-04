<?php
/*
 * Script d'ajout d'un trajet
 */
require_once('includes/fonctions.php');
$conn = connexionBDD();
          if(isset($_GET['Supprimer']))
          {
              $id=$_GET['Supprimer'];
              $cid=$_GET['Supprimer'];

            //   $sql="DELETE FROM notifications WHERE cid=$id";
            //   echo $sql;exit(-1);
              $conn->query("UPDATE  notifications SET statut='Trajet supprimé par automobiliste' WHERE cid=$id")or die($conn->error());
              $conn->query("DELETE FROM route WHERE cid=$id")or die($conn->error());
              $conn->query("UPDATE offres SET statut='Supprimé' WHERE id=$id")or die($conn->error());
              
              header("Location: index.php?suppression=1");
          } 
?>


