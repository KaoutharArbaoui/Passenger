<?php
require_once 'includes/fonctions.php';
if (!estConnecte()) {
    header("Location: connexion.php");
} else {
    $conn = connexionBDD();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- Bootstrap and a little bit of  CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
          <div class="container-fluid my-5">
            <div class="row">
              <div class="col-lg-7 col-md-9 border"><h3 class="text-center">Trajets</h3></div>
              <div class="col-lg-1"></div>
              <div class="col-lg-4 col-md-3 border"><h3 class="text-center">Nouveaux utilisateurs</h3></div>
            </div>
            <div class="row mb-5">
              <div class="col-lg-7 col-md-9 border table-responsive">
                <table class="border text-center table table-hover  table-striped table-sm">
                  <thead>
                    <tr>
                      <?php
                          $aujourdhui = date("Y-m-d");
                          $requete = "SELECT  source,destination,count(*) AS frq FROM offres GROUP BY source,destination ORDER BY time DESC";
                          $result = $conn->query($requete);
                          $i = 0;
                          if (($result->num_rows) == 0) 
                            {
                                echo ("<p align='center'>Aucun trajet de prévu pour le moment :( </p>\n");
                            } 
                            else 
                            {
                      ?>
                      <th>Trajets</th>
                      <th>Fréquence</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                          while (($i < 10) && ($colonne = mysqli_fetch_array($result))) {
                      ?>
                    <tr>
                      <td><?php echo $colonne['source']." >> ".$colonne['destination']; ?></td>
                      <td><?php echo $colonne['frq']; ?></td>
                    </tr>
                      <?php $i++;}}?>
			            </tbody> 
                </table>
              </div>
              <div class="col-lg-1"></div>
              <div class="col-lg-4 col-md-3 border table-responsive">
                <table class="border text-center table table-hover  table-striped table-sm">
                    <thead>
                      <tr>
                        <?php
                            $aujourdhui = date("Y-m-d");
                            $requete = "SELECT  nom ,prenom,time FROM utilisateurs  ORDER BY time DESC";
                            $result = $conn->query($requete);
                            $i = 0;
                            if (($result->num_rows) == 0) 
                              {
                                  echo ("<p align='center'>Aucun utilisateur de prévu pour le moment :( </p>\n");
                              } 
                              else 
                              {
                        ?>
                        <th>Nom d'utilisateur</th>
                        <th>date d'inscription</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                            while (($i < 10) && ($colonne = mysqli_fetch_array($result))) {
                        ?>
                      <tr>
                        <td><?php echo $colonne['nom']." - ".$colonne['prenom']; ?></td>
                        <td><?php echo $colonne['time']; ?></td>
                      </tr>
                        <?php $i++;}}?>
                    </tbody> 
                </table>
              </div>
            </div>
            <div class="row border">
               <div class="row mt-4 pt-3"><h5 class="text-center">Graphe de fréquence des trajets</h5></div>
               <div class="row">
                 <div class="ps-5 ms-5"><?php require_once('test.php'); ?></div>
               </div>            
            </div>
          </div>
        </main>
      </div>
    </div>
      <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script src="js/dashboard.js"></script>
      <!-- <script src="test.js"></script> -->
  </body>
</html>
<?php
// include 'includes/footer.php'
?>
