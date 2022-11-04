<?php
	require_once('includes/fonctions.php');
	if (!estConnecte())
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
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.js"></script>
        <title>Passenger</title>
    </head>
    <body>
        <?php
                    $uid = $_SESSION['identification'];
                    $requete = "SELECT * FROM utilisateurs WHERE uid = '".$uid."'";
                    $res = $conn->query($requete);
                    $recuperer = mysqli_fetch_array($res);
                    $nom = $recuperer['nom'];
                    $prenom = $recuperer['prenom'];
                    $email = $recuperer['email'];
                    $mdps = $recuperer['motdepasse'];
                    $dateNaissance = $recuperer['dateNaissance'];
                    $telephone = $recuperer['telephone'];
                    $sexe = $recuperer['sexe'];
                    $desc = $recuperer['description'];
                    if ($sexe == "M") {
                        $sex="Homme";
                    }
                    else $sex="Femme"; 
        ?> 
        <header class="container-fluid my-5 text-center">
            <h1 class="text-muted">Mon Profil</h1>
        </header>
        <div class="container-fluid my-5" style="height:calc(70vh - 56px);">
        <div class="row">
            <div class="col-lg-2">
                <div class="profile-image">
                    <img src="img/profile.png" class="img-fluid img-thumbnail">
                      <div class="my-4">
                            <button class=" btn btn-outline-primary" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                                </svg>
                                Modifier la photo de profil
                            </button>
                      </div>
                  </div>
            </div>
            <div class="col-lg-7 border" style="background-color: #F3F2F2;">
                <header class="container-fluid">
                    <h5 class="text-muted mt-4 text-center">Contact et sécurité</h5>
                </header>
                <div class="row">
                    <div class="col-lg-12 mt-3">
                        <table class="table">
                            <tbody>
                                <tr class="my-4">
                                <th scope="row">E-mail</th>
                                <td>
                                    <!--email input-->
                                        <input type="email" value="<?php echo $email; ?>" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                                </td>
                              </tr>
                              <tr class="my-4">
                                <th scope="row">Numéro de téléphone</th>
                                <td>
                                    <!--phone number input-->
                                        <input type="tel" value="<?php echo $telephone; ?>"  class="form-control" id="phone" placeholder="0612345678" required>
                                </td>
                              </tr>
                              <tr class="my-4">
                                <th scope="row">Mot de passe</th>
                                <td>
                                    <!--password input-->
                                        <input type="password" value="<?php echo $mdps; ?>" class="form-control" id="floatingPassword" placeholder="******" required>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <div class="text-center">
                            <button class="btn btn-outline-primary" disabled>Sauvegarder</button>
                          </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="list-group">
                    <a href="profil1.php" class="list-group-item list-group-item-action" aria-current="true">Informations générales</a>
                    <a href="profil2.php" class="list-group-item list-group-item-action active">Contact et sécurité</a>
                  </div>
            </div>
        </div>
        </div>
    </body>
</html>
<?php
	include('includes/footer.php');
	include('includes/footer1.php');
?>