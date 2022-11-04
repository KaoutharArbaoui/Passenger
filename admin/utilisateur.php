<?php 
   	require_once('includes/fonctions.php');
  if(!estConnecte())
		header("Location: connexion.php");
	else
		$conn = connexionBDD(); 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- Bootstrap and a little bit of  CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
      .bd-placeholder-img
       {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px)
       {
        .bd-placeholder-img-lg
         {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for the dashboard -->
    <link href="\Passenger v2.2\admin\css\dashboard.css" rel="stylesheet">
  </head>
  <body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="dashboard.php">Passenger</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Rechercher" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="deconnexion.php">Déconnexion</a>
        </li>
      </ul>
    </header>

    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="dashboard.php">
                  <span data-feather="home"></span>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php">
                  <span data-feather="box"></span>
                  Trajets
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="réservations.php">
                  <span data-feather="shopping-cart"></span>
                  Réservations
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="utilisateur.php">
                  <span data-feather="users"></span>
                  Utilisateurs
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="rapport.php">
                  <span data-feather="bar-chart-2"></span>
                  Rapports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Integrations
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Rapports sauvegardés</span>
              <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Mois actuel
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Dernier quart
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Bilan
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Utilisateurs</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group me-2">
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <?php
                        $requete ="SELECT * FROM utilisateurs";                       
                        $result = $conn->query($requete);
                        if (($result->num_rows) == 0) {
                                echo("<p align='center'>Aucun utilisateur de prévu pour le moment :( </p>\n");     	  
					              }
		                   else {
                  ?>
                  <th>#</th>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Email</th>
                  <th>Naissance</th>
                  <th>sexe</th>
                  <th>Télephone</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  while ( ($colonne = mysqli_fetch_array($result))) {
                  ?>
                    <td><?php echo $colonne['uid']; ?></td>
                    <td><?php echo $colonne['nom']; ?></td>
                    <td><?php echo $colonne['prenom']; ?></td>
                    <td><?php echo $colonne['email']; ?></td>
                    <td><?php echo $colonne['dateNaissance']; ?></td>
                    <td><?php echo $colonne['sexe']; ?></td>
                    <td><?php echo $colonne['telephone']; ?></td>
                    <td><?php echo $colonne['description']; ?></td>
                    <td><span class="bg-danger"><a class="text-dark" onclick="return confirm('Vous êtes sûr de le supprimer ?')"   href="supprimerUtilisateur.php?Supprimer*=<?php echo "".$colonne['uid'];?>"  >Supprimer</a></span></td>
                </tr> 
                  <?php 							
                  //  header("Location: supprimerUtilisateur.php?suppression=1");
                    } 
                  ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
		<?php }$result->close(); 
		include('includes/footer.php')
		?>
      <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
      <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
      <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script src="js/dashboard.js"></script>
  </body>
</html>
