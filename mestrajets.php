<!DOCTYPE html>
  <title>Passenger</title>			
		<?php
		/*
		* Script de notification
		*/
			require_once('includes/fonctions.php');
      include('includes/messages.php');
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
     <?php $uid=getIdUtilisateur();
								$aujourdhui = date("Y-m-d");
								$requete ="SELECT id, source , destination , datedebut, duree, typetrajet,statut FROM offres WHERE uid=$uid";
								// echo $requete; exit(-1);
								$result = $conn->query($requete);
								$i = 0;
								if (($result->num_rows) == 0) {
									echo(" 
                        <div class=\" my-5 py-5 text-center\" style=\"height: calc(100vh - 56px);\">
                          <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\">
                            <path d=\"M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm5.508 13.941c-1.513 1.195-3.174 1.931-5.507 1.931-2.335 0-3.996-.736-5.509-1.931l-.492.493c1.127 1.72 3.2 3.566 6.001 3.566 2.8 0 4.872-1.846 5.999-3.566l-.492-.493zm.492-3.939l-.755.506s-.503-.948-1.746-.948c-1.207 0-1.745.948-1.745.948l-.754-.506c.281-.748 1.205-2.002 2.499-2.002 1.295 0 2.218 1.254 2.501 2.002zm-7 0l-.755.506s-.503-.948-1.746-.948c-1.207 0-1.745.948-1.745.948l-.754-.506c.281-.748 1.205-2.002 2.499-2.002 1.295 0 2.218 1.254 2.501 2.002z\"/>
                          </svg>
                          \nAucun trajet de prévu pour le moment.\n
                        </div>\n
                        ");     	  
								}
                  else
                {?>
    <div style="height: calc(100vh - 56px);">
      <table id="tabListe"class="table table-hover table"style="flex-wrap: wrap;">
          <thead>
            <tr>
              <th scope="col">Départ</th>
              <th scope="col">Arrivée</th>
              <th scope="col">Date de départ</th>
              <th scope="col">Heure de départ</th>
              <th scope="col">Type de trajet</th>
              <th scope="col">Statut</th>
            </tr>
          </thead>
          <tbody>
          <?php while (($i < 10) && ($colonne = mysqli_fetch_array($result))) {?>
            <?php if($colonne['statut']=='Supprimé'){?>
            <tr>
              <td><?php echo $colonne['source']; ?></td>
              <td><?php echo $colonne['destination']; ?></td>
              <td><?php echo $colonne['datedebut']; ?></td>
              <td><?php echo $colonne['duree']; ?></td>
              <td><?php echo $colonne['typetrajet']; ?></td>
              <td><a class="text-light bg-dark" href="trajet.php?id=<?php echo $colonne['id']; ?>"><?php echo $colonne['statut']; ?></a></td>
              <?php 
                  $i++;
                    
              ?>
            </tr>
            <?php } elseif($colonne['statut']=='Approuvé'){ ?>
            <tr>
              <td><?php echo $colonne['source']; ?></td>
              <td><?php echo $colonne['destination']; ?></td>
              <td><?php echo $colonne['datedebut']; ?></td>
              <td><?php echo $colonne['duree']; ?></td>
              <td><?php echo $colonne['typetrajet']; ?></td>
              <td ><a class="text-light bg-success" href="trajet.php?id=<?php echo $colonne['id']; ?>"><?php echo $colonne['statut']; ?></a></td>
              <?php 
                  $i++;
                    
              ?>
            </tr>
            <?php } elseif($colonne['statut']=='Refusé'){ ?>
            <tr>
              <td><?php echo $colonne['source']; ?></td>
              <td><?php echo $colonne['destination']; ?></td>
              <td><?php echo $colonne['datedebut']; ?></td>
              <td><?php echo $colonne['duree']; ?></td>
              <td><?php echo $colonne['typetrajet']; ?></td>
              <td><a class="text-dark bg-danger" href="trajet.php?id=<?php echo $colonne['id']; ?>"><?php echo $colonne['statut']; ?></a></td>
              <?php 
                  $i++;
                    
              ?>
            </tr>
            <?php } else{ ?>
            <tr>
              <td><?php echo $colonne['source']; ?></td>
              <td><?php echo $colonne['destination']; ?></td>
              <td><?php echo $colonne['datedebut']; ?></td>
              <td><?php echo $colonne['duree']; ?></td>
              <td><?php echo $colonne['typetrajet']; ?></td>
              <td><a class="text-dark bg-warning" href="trajet.php?id=<?php echo $colonne['id']; ?>"><?php echo $colonne['statut']; ?></a></td>
              <?php 
                  $i++;
            }}}
              ?>
            </tr> 
          </tbody>
      </table>
    </div>
</body>
</html>
<?php
			include('includes/footer.php');
			include('includes/footer1.php');
?>