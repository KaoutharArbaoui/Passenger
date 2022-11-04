<?php
/*
 * Script de connexion
 */
	require_once('includes/fonctions.php');
	if (estConnecte())
		header("Location: dashboard.php");
	else if (isset($_POST['action'])) {
		$email = $_POST['email'];
		if ($_POST['action'] == 'connexion') {
			if(trim($_POST['email']) == "" or trim($_POST['motdepasse']) == "")
				header("Location: connecter.php?erreurvide=1"); 
			else {
				$conn = connexionBDD();			
				$requete = "SELECT * FROM admin WHERE email = '".$_POST['email']."'";
				$result = $conn->query($requete);
				$champs = mysqli_fetch_array($result);
				$motdepasse = $_POST['motdepasse'];
				if($motdepasse == $champs['motdepasse']) {
					$_SESSION['admin'] = $champs['uid'];
					header("Location: dashboard.php");

				} else
					header("Location: connecter.php?erreur=1");
			}
		}

	}
?>

<?php
include("includes/header.php");
?>

 
	<?php
		include('includes/messages.php');
	?>
      <!-- <h1><small>Connexion</small></h1><br> -->
    <form method="post" action="connecter.php">
        <!-- <input type="hidden" name="action" value="connexion"/> -->
        <header class="container-fluid my-5 text-center">
         <h3 class="text-muted">Administration</h3>
        </header>
        <div class="container-fluid my-5">
          <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="form-floating mb-3">
                <input type="hidden" name="action" value="connexion"/>
                <input type="text" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" name="motdepasse" class="form-control" id="floatingPassword" placeholder="mot de passe" required>
                <label for="floatingPassword">Mot de passe</label>
              </div>
              <div class="form-floating d-grid gap-2 ">          
                <button class="btn btn-primary btn-block mb-3" name="submit" type="submit">Connexion</button>
              </div>
            </div>
            <div class="col-lg-2"></div>
          </div>
        </div>
    </from>

