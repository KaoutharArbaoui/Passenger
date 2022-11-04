<!DOCTYPE html>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.js"></script>
  <title>Passenger</title>
    <?php
/*
 * Script de connexion
 */
require_once 'includes/fonctions.php';
if (estConnecte()) {
    header("Location: index.php");
} else if (isset($_POST['action'])) {
    $email = $_POST['email'];
    if ($_POST['action'] == 'connexion') {
        if (trim($_POST['email']) == "" or trim($_POST['motdepasse']) == "") {
            header("Location: connecter.php?erreurvide=1");
        } else {
            $conn = connexionBDD();
            $requete = "SELECT * FROM utilisateurs WHERE email = '" . $_POST['email'] . "'";
            $result = $conn->query($requete);
            $champs = mysqli_fetch_array($result);
            $motdepasse = $_POST['motdepasse'];
            if ($motdepasse == $champs['motdepasse']) {
                $_SESSION['identification'] = $champs['uid'];
                header("Location: index.php");

            } else {
                header("Location: connecter.php?erreur=1");
            }

        }
    }

}
?>

    <?php
include "includes/header.php";
?>


      <?php
include 'includes/messages.php';
?>
          <!-- <h1><small>Connexion</small></h1><br> -->
    <form method="post" action="connecter.php">
      <input type="hidden" name="action" value="connexion"/>
      <header class="container-fluid my-5 text-center">
        <h4 class="text-muted">Veuillez vous connecter ou inscrivez vous pour pouvoir partager un trajet</h4>
      </header>
      <div class="container-fluid my-5" style="height: calc(65vh - 56px);">
          <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" name="motdepasse" class="form-control" id="floatingPassword" placeholder="mot de passe" required>
                <label for="floatingPassword">Mot de passe</label>
              </div>
              <div class="form-floating d-grid gap-2 ">
                <button class="btn btn-primary btn-block mb-3" type="submit">Connexion</button>
              </div>
      </from>
              <p class="text-center ">ou</p>
              <div class="form-group d-grid gap-2" id="inscription">
              <a href="senregistrer.php" class="btn btn-outline-success mb-3 " role="button"> S'inscrire </a>
          <!-- <button class="btn btn-outline-success mb-3 " type="submit" onclick="senregistrer.php">Inscription</button> -->
              </div>
            </div>
            <div class="col-lg-2"></div>
          </div>


        </div>
      </div>
        </div>
      <?php
include 'includes/footer1.php'
?>
</html>

