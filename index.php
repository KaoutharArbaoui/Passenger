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
    <?php
require_once 'includes/fonctions.php';
if (!estConnecte()) {
    header("Location: Accueil.php");
} else {
    include 'includes/header1.php';
}

$conn = connexionBDD();
?>
    <?php
include 'includes/messages.php';
?>
    <?php
$aujourdhui = date("Y-m-d");
$requete = "SELECT id, source , destination , datedebut, duree, typetrajet FROM offres WHERE datedebut >= '" . $aujourdhui . "' AND nbpersonne > 0 AND statut='Approuvé'";
$result = $conn->query($requete);
$i = 0;
if (mysqli_num_rows($result) == 0) {
    echo ("
          <div class=\" my-5 py-5 text-center\" style=\"height: calc(100vh - 56px);\">
            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\">
              <path d=\"M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm5.508 13.941c-1.513 1.195-3.174 1.931-5.507 1.931-2.335 0-3.996-.736-5.509-1.931l-.492.493c1.127 1.72 3.2 3.566 6.001 3.566 2.8 0 4.872-1.846 5.999-3.566l-.492-.493zm.492-3.939l-.755.506s-.503-.948-1.746-.948c-1.207 0-1.745.948-1.745.948l-.754-.506c.281-.748 1.205-2.002 2.499-2.002 1.295 0 2.218 1.254 2.501 2.002zm-7 0l-.755.506s-.503-.948-1.746-.948c-1.207 0-1.745.948-1.745.948l-.754-.506c.281-.748 1.205-2.002 2.499-2.002 1.295 0 2.218 1.254 2.501 2.002z\"/>
            </svg>
            \nAucun trajet de prévu pour le moment.\n
           </div>\n
          ");
} else {
    echo "<div class=\"container-fluid my-5\" style=\"height: calc(100vh - 56px);display: flex;
    justify-content: space-around;
    flex-wrap: wrap;\">";
    while (($i < 10) && ($colonne = mysqli_fetch_array($result))) {?>
    <div class="card-item" onclick="window.location.href = 'trajet.php?id=<?php echo $colonne['id']; ?>';">
      <div class="from"><?php echo $colonne['source']; ?></div>
      <div class="icon">
        <svg viewBox="0 0 448 512" width="100" title="arrow-right">
          <path
            d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z" />
        </svg>
      </div>
      <div class="to"><?php echo $colonne['destination']; ?></div>
      <div class="icon">
        <svg viewBox="0 0 256 512" width="100" title="angle-right">
          <path
            d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z" />
        </svg>
      </div>
      <?php $i++;?>
    </div>
    <?php
}
    echo "</div>";
}
?>
<?php
include('includes/footer.php');
include('includes/footer1.php')
?>
</html>
