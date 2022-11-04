<?php
	require_once('includes/fonctions.php');
	if(!estConnecte())
		header("Location: Accueil.php");
	else
		include('includes/header1.php');
		$conn = connexionBDD();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.js"></script>
  <title>Passenger</title>
</head>
<body>
  <?php
    require_once('includes/fonctions.php');
    $conn = connexionBDD();
    $uid = getIdUtilisateur();
    $requete = 'SELECT * FROM notifications WHERE destinataire ="'.$uid.'" AND type = 2    ORDER BY timestamp DESC;'; 
		$requete1 = 'SELECT * FROM notifications WHERE destinataire ="'.$uid.'" AND type = 3    ORDER BY timestamp DESC;';
		$result = $conn->query($requete) or die("Erreur 123456 :".mysqli_error($conn));
    if (($result->num_rows) == 0) 
    {	
      echo("         
            <div class=\" my-5 py-5 text-center\" style=\"height: calc(100vh - 56px);\">
              <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\">
                <path d=\"M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 14h-12c.331 1.465 2.827 4 6.001 4 3.134 0 5.666-2.521 5.999-4zm0-3.998l-.755.506s-.503-.948-1.746-.948c-1.207 0-1.745.948-1.745.948l-.754-.506c.281-.748 1.205-2.002 2.499-2.002 1.295 0 2.218 1.254 2.501 2.002zm-7 0l-.755.506s-.503-.948-1.746-.948c-1.207 0-1.745.948-1.745.948l-.754-.506c.281-.748 1.205-2.002 2.499-2.002 1.295 0 2.218 1.254 2.501 2.002z\"/>
              </svg>
              \nAucune réservation pour le moment.\n
            </div>\n             

          ");
    }
    else 
    {
  ?>
  <div class="container-fluid" style=" height: calc(100vh - 56px);min-height:500px;">
    <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Horaire de départ</th>
              <th scope="col">Trajet</th>
              <th scope="col">Utilisateur</th>
              <th scope="col">Statut</th>
            </tr>
          </thead>
          <?php
            while($row = mysqli_fetch_array($result))
            {
              $type = $row["type"];						
          ?>
          <tbody>
            <?php 
                 if($type=="2")
                {
                      // Requête de l'expéditeur pour approuver sa requête
                      $requete = 'SELECT * FROM offres WHERE id = "'.$row["cid"].'";';	
                      $result1 = $conn->query($requete) or die("Erreur 245455642 :".mysqli_error($conn));
                      $rowcovoi = mysqli_fetch_array($result1);
                      $uid2 = $row["expediteur"];
                      $nom = getNom($uid2);
                      $prenom = getPrenom($uid2);
                      $statut = $row["statut"];
                      $slno = $row["slno"];?> 
            <tr>
              <td> <?php echo $row["timestamp"];?></td>
              <td><?php echo '<a href="trajet.php?id='. $row["cid"] . '" >'. $rowcovoi["source"] . ' - '. $rowcovoi["destination"] . '</a>';?></td>
              <td><?php echo '<a href="profil.php?id='.$uid2.'" >'.$nom.' '.$prenom.'</a>';?></td>
        <?php 
          if ($statut == "Approuvé")                 
          {                            
          echo'<td>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.393 7.5l-5.643 5.784-2.644-2.506-1.856 1.858 4.5 4.364 7.5-7.643-1.857-1.857z"/>
                  </svg>
                  Réservation approuvée'
        ?>
                  <a onclick="return confirm('Êtes-vous sûr de vouloir annuler votre réservation?')" href="supprimerRés.php?Supprimer=<?php echo $slno;?>" class="btn btn-danger" >Annuler</a>
    <?php echo '</td>';?>
        <?php
          }
        else if ($statut == "Refusé")
        {
          echo '<td>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.001 14c-2.332 0-4.145 1.636-5.093 2.797l.471.58c1.286-.819 2.732-1.308 4.622-1.308s3.336.489 4.622 1.308l.471-.58c-.948-1.161-2.761-2.797-5.093-2.797zm-3.501-6c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5-.672-1.5-1.5-1.5zm7 0c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5-.672-1.5-1.5-1.5z"/>
                  </svg>
                  Malheursement votre demande a été refusée par l\'automobiliste.
                </td>';
        ?>
        <?php
        }
        if ($statut == "Annuler") 
        
          { echo' <td>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M24 3.752l-4.423-3.752-7.771 9.039-7.647-9.008-4.159 4.278c2.285 2.885 5.284 5.903 8.362 8.708l-8.165 9.447 1.343 1.487c1.978-1.335 5.981-4.373 10.205-7.958 4.304 3.67 8.306 6.663 10.229 8.006l1.449-1.278-8.254-9.724c3.287-2.973 6.584-6.354 8.831-9.245z"/>
                  </svg>
                  Réservation annulée.
                </td>';
        }
        if ($statut == "Trajet supprimé par automobiliste") 
                                    echo '<td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M9 19c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5-17v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712zm-3 4v16h-14v-16h-2v18h18v-18h-2z"/></svg> Trajet supprimé '?> <?php echo '</td>';
         if ($statut == "Trajet modifié"){ 
                                    echo '<td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18.363 8.464l1.433 1.431-12.67 12.669-7.125 1.436 1.439-7.127 12.665-12.668 1.431 1.431-12.255 12.224-.726 3.584 3.584-.723 12.224-12.257zm-.056-8.464l-2.815 2.817 5.691 5.692 2.817-2.821-5.693-5.688zm-12.318 18.718l11.313-11.316-.705-.707-11.313 11.314.705.709z"/></svg> Trajet modifié'?>
                                            <a onclick="return confirm('Voulez-vous annuler votre réservation?')" href="supprimerRés.php?Supprimer=<?php echo $slno; ?>"
                                                    class="btn btn-danger" >Annuler</a><?php echo'</td>'; ?>
            </tr>
                   <?php
        } 
                  }
                  ?>
          </tbody> 
              <?php
                 }} 
              ?>
    </table>
  </div>
</body>
</html>
<?php
include('includes/footer.php');
include('includes/footer1.php');
?>