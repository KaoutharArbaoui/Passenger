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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.js"></script>
        <title>Pessenger</title>
    </head>

    <?php
    if (isset($_GET['id'])){
				$requete = "SELECT * FROM utilisateurs WHERE uid = ".$_GET['id'];
				$res = $conn->query($requete);
				$recuperer = mysqli_fetch_array($res);
				$nom = $recuperer['nom'];
				$prenom = $recuperer['prenom'];
				$email = $recuperer['email'];
				$dateNaissance = $recuperer['dateNaissance'];
				$telephone = $recuperer['telephone'];
				$sexe = $recuperer['sexe'];
				$desc = $recuperer['description'];
				$id = $_GET['id'];
				if ($sexe == "M") {
					$sex="Homme";
				}	
				else $sex="Femme";
    ?>
    <body>
        <div class="container-fluid my-5" style="height: calc(100vh - 56px);">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-7 border" style="background-color: #F3F2F2;">
                <header class="container-fluid">
                    <h5 class="text-muted mt-3 mb-3 text-center ">Informations d'utilisateur</h5>
                </header>
                <div class="row">
                    <div class="mb-3" style="display: flex;">
                        <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4 border profile-image">
                                <img src="img/profile.png" class="img-fluid img-thumbnail">
                            </div>
                            <div class="col-lg-8 border">
                                <table class="table">
                                    <tbody>
                                    <tr class="my-2">
                                        <th scope="row">Nom</td>
                                        <td>
                                            <?php echo $nom; ?>
                                        </td>
                                    </tr>
                                    <tr class="my-2">
                                        <th scope="row">Prénom</th>
                                        <td>
                                            <?php echo $prenom; ?>
                                        </td>
                                    </tr>
                                    <tr class="my-2">
                                        <th scope="row">Date de naissance</th>
                                        <td>
                                            <?php echo $dateNaissance; ?>
                                        </td>
                                    </tr>
                                    <tr class="my-2">
                                        <th scope="row">Sexe</th>
                                        <td>
                                             <?php echo $sexe; ?>
                                        </td>
                                    </tr>
                                    <tr class="my-2">
                                        <th scope="row">Email</th>
                                        <td>
                                             <?php echo $email; ?>
                                        </td>
                                    </tr>
                                    <tr class="my-2">
                                        <th scope="row">Numéro de téléphone</th>
                                        <td>
                                             <?php echo $telephone; ?>
                                        </td>
                                    </tr>
                                    <tr class="my-2">
                                        <th scope="row">Description</th>
                                        <td>
                                             <?php echo $desc; ?>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
    <?php } else{ $uid = $_SESSION['identification'];
				$requete = "SELECT * FROM utilisateurs WHERE uid = '".$uid."'";
				$res = $conn->query($requete);
				$recuperer = mysqli_fetch_array($res);
				$nom = $recuperer['nom'];
				$prenom= $recuperer['prenom'];
				$email = $recuperer['email'];
				$dateNaissance = $recuperer['dateNaissance'];
				$telephone = $recuperer['telephone'];
				$sexe = $recuperer['sexe'];
				$desc = $recuperer['description'];
				if ($sexe == "Homme") {
					$sex="Homme";
				}
				else $sex="Femme";
    ?>
    <body>
      
        <div class="container-fluid my-5">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-7 border" style="background-color: #F3F2F2;">
                <header class="container-fluid">
                    <h5 class="text-muted mt-3 mb-3 text-center ">Informations d'utilisateur</h5>
                </header>
                <div class="row">
                    <div class="mb-3" style="display: flex;">
                        <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4 border profile-image">
                                <img src="img/profile.png" class="img-fluid img-thumbnail">
                            </div>
                            <div class="col-lg-8 border">
                                <table class="table">
                                    <tbody>
                                    <tr class="my-2">
                                        <th scope="row">Nom</td>
                                        <td>
                                            <?php echo $nom; ?>
                                        </td>
                                    </tr>
                                    <tr class="my-2">
                                        <th scope="row">Prénom</th>
                                        <td>
                                            <?php echo $prenom; ?>
                                        </td>
                                    </tr>
                                    <tr class="my-2">
                                        <th scope="row">Date de naissance</th>
                                        <td>
                                            <?php echo $dateNaissance; ?>
                                        </td>
                                    </tr>
                                    <tr class="my-2">
                                        <th scope="row">Sexe</th>
                                        <td>
                                             <?php echo $sexe; ?>
                                        </td>
                                    </tr>
                                    <tr class="my-2">
                                        <th scope="row">Email</th>
                                        <td>
                                             <?php echo $email; ?>
                                        </td>
                                    </tr>
                                    <tr class="my-2">
                                        <th scope="row">Numéro de téléphone</th>
                                        <td>
                                             <?php echo $telephone; ?>
                                        </td>
                                    </tr>
                                    <tr class="my-2">
                                        <th scope="row">Déscription</th>
                                        <td>
                                             <?php echo $desc; ?>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
<?php
    }
	include('includes/footer.php');
	include('includes/footer1.php');
?>