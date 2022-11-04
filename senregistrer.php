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
    * Script d'inscription
    */

      require_once('includes/fonctions.php');
      if(estConnecte())
        header("Location: index.php");
        else if(isset($_POST['action']))
        {
        $conn = connexionBDD();
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
          if($_POST['action']=='inscription')
          {
            $email = $_POST['email'];
            $motdepasse = $_POST['motdepasse'];
            $salt="Passenger";
            $password_encrypted=sha1($motdepasse.$salt); 
            $dateNaissance = $_POST['dateNaissance'];
            $telephone = $_POST['telephone'];			
            $sexe = $_POST['sexe'];
            $desc = $_POST['description'];
            $aujourdhui = date("Y-m-d H:i:s");
            $errors=[];
            $nomA=$prenomA=$emailA=$telephoneA="";
            // $errors1=[];
              if ($_SERVER['REQUEST_METHOD'] == 'POST') 
              {
                if (empty($_POST['nom'])) 
                  {
                    $errors['nom'] = "Nom obligatoire";
                  } else
                        {
                          $nomA = test_input($_POST["nom"]);
                          if (!preg_match("/^[a-zA-Z ]*$/",$nomA)) 
                          {
                          $errors['nom'] = "seulement les lettres et les espaces";
                          } 
                        }
                if (empty($_POST['prenom'])) 
                  {
                    $errors['prenom'] = "Prenom obligatoire";
                  } else
                        {
                          $prenomA = test_input($_POST["prenom"]);
                          if (!preg_match("/^[a-zA-Z ]*$/",$prenomA)) 
                          {
                          $errors['prenom'] = "seulement les lettres et les espaces";
                          } 
                        }
                if (empty($_POST['email'])) 
                  {
                    $errors['email'] = "Email obligatoire";
                  } else
                        {
                          $emailA = test_input($_POST["email"]);
                          if (!filter_var($emailA, FILTER_VALIDATE_EMAIL)) 
                          {
                          $errors['email'] = "Email nom valide ";
                          } 
                        }
                if (empty($_POST['telephone'])) 
                  {
                    $errors['telephone'] = "Telephone obligatoire";
                  } else
                        {
                          $telephoneA = test_input($_POST["telephone"]);
                          if (!preg_match("/^[0-9]*$/",$telephoneA)) 
                          {
                          $errors['telephone'] = "seulement les chiffres";
                          } 
                        }                 
                if (empty($_POST['motdepasse'])) 
                  {
                    $errors['motdepasse'] = "Mot de passe obligatoire";
                  }
                if (empty($_POST['dateNaissance'])) 
                  {
                    $errors['dateNaissance'] = "Date de naissance obligatoire";
                  }
            if(empty($errors)){ 
            $requete = "SELECT uid FROM utilisateurs WHERE email = '".$email."'";
            $result = $conn->query($requete) or die($conn->error);
            if (($result->num_rows) != 0)
            {
              header("Location: senregistrer.php?existe=1");
            }
            else
            {
              $sql = "INSERT INTO utilisateurs (nom ,prenom, email,motdepasse ,dateNaissance ,telephone, sexe ,description,time ) 
              VALUES ('".$nom."','".$prenom."', '".$email."', '".$password_encrypted."','".$dateNaissance."','".$telephone."', '".$sexe."','".$desc."','".$aujourdhui."')";
              $conn->query($sql) or die($conn->error);
              header("Location: connecter.php?enregistrer=1");
            }
          }
        }
        }}
    ?>

    <?php
    include("includes/header.php");
    include('includes/messages.php');
    ?>
    
      <header class="container-fluid my-5 text-center">
        <h4 class="text-muted">Inscription</h4>
      </header>
      <form method="POST" action="senregistrer.php">
        <input type="hidden" name="action" value="inscription"/>
        <div class="container-fluid my-5">
          <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="mb-3" style="display: flex;">
                  <div class="pe-3 col-sm-6 form-floating">
                      <input type="text" class="form-control" name="nom" id="name-l" placeholder="Entrez votre nom" value="<?php echo $nom;?>">
                      <label for="name-l">Nom</label>
                      <span style="color:red">*<?php echo $errors['nom'];  ?></span>
                  </div>
                  <div class="me-3 col-sm-6 form-floating">
                    <input type="text" class="form-control" name="prenom" id="name-f" placeholder="Entrez votre prénom" value="<?php echo $prenom;?>">
                    <label for="name-f">Prénom</label>
                    <span style="color:red">*<?php echo $errors['prenom'];  ?></span>
                  </div>
              </div>
              <div class="form-floating mb-3">
                <input type="email"name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $email;?>">
                <label for="floatingInput">Email</label>
                <span style="color:red">*<?php echo $errors['email'];  ?></span>
              </div>
              <div class="form-floating mb-3">
                <input type="tel" class="form-control"name="telephone" id="phone" placeholder="0612345678"  maxlength="10" value="<?php echo $telephone;?>">
                <label for="phone">Numéro de téléphone</label>
                <span style="color:red">*<?php echo $errors['telephone'];  ?></span>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="motdepasse" id="floatingPassword" placeholder="mot de passe" value="<?php echo $motdepasse;?>">
                <label for="floatingPassword">Mot de passe</label>
                <span style="color:red">*<?php echo $errors['motdepasse'];  ?></span>
              </div>
              <div class="mb-3" style="display: flex;">
                <div class="me-3 col-sm-6 form-floating">
                    <input type="Date" name="dateNaissance" class="form-control" id="Date" value="<?php echo $dateNaissance;?>" >
                    <label for="Date">Date de naissance</label>
                    <span style="color:red">*<?php echo $errors['dateNaissance'];  ?></span>
                </div>
                <div class="pe-3 col-sm-6 form-floating">
                        <select id="sex" name="sexe" class="form-select browser-default custom-select">
                            <option value="Homme"  >Homme</option>
                            <option value="Femme" >Femme</option>
                        </select>
                        <label for="sex">Sexe</label>
                </div>
              </div>
              <div class="mt-3 form-floating">
                    <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">À propos de moi</label>
              </div>
              <div class="form-floating mb-3 pt-3">
                <input type="checkbox" class="form-check d-inline" id="chb" required>
                <label for="chb" class="mb-3 form-check-label">&nbsp;J'accepte <a href="">les termes et les conditions d'utilisation</a></label>
              </div> 
              <div class="form-floating d-grid gap-2 ">          
                <input class="btn btn-success btn-block mb-3" type="submit" value="Inscription">
              </div>

              <p class="text-center ">ou</p>

              <div class="form-group d-grid gap-2" id="inscription">
                <a type="button" class="btn btn-outline-primary mb-3 " href="connecter.php" name="submit">Connexion</a>
              </div>
            </div>
            <div class="col-lg-2"></div>
          </div>
        </div>
      </form>
        <?php
        include('includes/footer1.php');
          function test_input($data) 
          {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
        ?>
</html>