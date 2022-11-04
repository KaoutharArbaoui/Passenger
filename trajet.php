<?php
require_once 'includes/fonctions.php';
require_once 'includes/header1.php';
if (!estConnecte()) {
    header("Location: Accueil.php");
} else {
    $conn = connexionBDD();
}

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
    </head>
    <body>
      <main>
        <?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $requete = "SELECT * FROM offres WHERE id =$id ";
    // echo $requete;exit(-1);
    $result = $conn->query($requete);
    if (($result->num_rows) == 0) {
        echo ("<p align='center'>Il semblerait que vous ayez entré une URL qui n'existe pas ! Revenez à la page précédente !</p>\n");
    } else {
        $row = mysqli_fetch_array($result);
        $uid = $row['uid'];
        $source = $row['source'];
        $destination = $row['destination'];
        $datedebut = $row['datedebut'];
        $duree = $row['duree'];
        $nbpersonne = $row['nbpersonne'];
        $typetrajet = $row['typetrajet'];
        $matricule = $row['matricule'];
        $marque = $row['marque'];
        $desc = $row['descriptiontrajet'];
        $cid = $row['id'];
        $statut = $row['statut'];
        $uidlive = getIdUtilisateur();
        // echo $uidlive.$uid.$statut;exit(-1);
        ?>




        <div class="container-fluid my-5">
          <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
              <div class="card mb-4 rounded-3 shadow-sm border-primary">
                <div class="card-body">
                <form method="post" action="ajoutertrajet.php">
                  <ul class="list-unstyled">
                    <div class="mb-3" style="display: flex;">
                      <div class="col-lg-1">
                        <li>
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M20.822 18.096c-3.439-.794-6.641-1.49-5.09-4.418 4.719-8.912 1.251-13.678-3.732-13.678-5.081 0-8.464 4.949-3.732 13.678 1.597 2.945-1.725 3.641-5.09 4.418-2.979.688-3.178 2.143-3.178 4.663l.005 1.241h10.483l.704-3h1.615l.704 3h10.483l.005-1.241c.001-2.52-.198-3.975-3.177-4.663zm-8.231 1.904h-1.164l-.91-2h2.994l-.92 2z"/>
                          </svg>
                        </li>
                      </div>
                      <div class="col-lg-6">
                        <li>
                          <a href="<?php echo "profil.php?id=" . $uid; ?>" > <?php echo getNom($uid) . " " . getPrenom($uid); ?></a>
                        </li>
                      </div>
                      <div class="col-lg-4"></div>
                    </div>
                    <div class="mb-3" style="display: flex;">
                      <div class="col-lg-1">
                        <li>
                          <?php echo $source; ?>
                          <!-- Ville départ -->
                        </li>
                      </div>
                      <div class="col-lg-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                          <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                        </svg>
                      </div>
                      <div class="col-lg-1">
                        <li>
                           <?php echo $destination; ?>
                          <!-- Ville d'arrivé -->
                        </li>
                      </div>
                      <div class="col-lg-9"></div>
                    </div>
                    <div class="mb-3" style="display: flex;">
                      <div class="col-lg-4">
                        <li>
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M17 3v-2c0-.552.447-1 1-1s1 .448 1 1v2c0 .552-.447 1-1 1s-1-.448-1-1zm-12 1c.553 0 1-.448 1-1v-2c0-.552-.447-1-1-1-.553 0-1 .448-1 1v2c0 .552.447 1 1 1zm13 13v-3h-1v4h3v-1h-2zm-5 .5c0 2.481 2.019 4.5 4.5 4.5s4.5-2.019 4.5-4.5-2.019-4.5-4.5-4.5-4.5 2.019-4.5 4.5zm11 0c0 3.59-2.91 6.5-6.5 6.5s-6.5-2.91-6.5-6.5 2.91-6.5 6.5-6.5 6.5 2.91 6.5 6.5zm-14.237 3.5h-7.763v-13h19v1.763c.727.33 1.399.757 2 1.268v-9.031h-3v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-9v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-3v21h11.031c-.511-.601-.938-1.273-1.268-2z"/>
                          </svg>
                          <?php echo $datedebut ?>
                        </li>
                      </div>
                      <div class="col-sm-2">
                        <li>
                          <?php echo $duree; ?>
                        </li>
                      </div>
                      <div class="col-lg-6"></div>
                    </div>
                    <div class="mb-3" style="display: flex;">
                      <div class="col-lg-4">
                        <li>
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M23.5 7c.276 0 .5.224.5.5v.511c0 .793-.926.989-1.616.989l-1.086-2h2.202zm-1.441 3.506c.639 1.186.946 2.252.946 3.666 0 1.37-.397 2.533-1.005 3.981v1.847c0 .552-.448 1-1 1h-1.5c-.552 0-1-.448-1-1v-1h-13v1c0 .552-.448 1-1 1h-1.5c-.552 0-1-.448-1-1v-1.847c-.608-1.448-1.005-2.611-1.005-3.981 0-1.414.307-2.48.946-3.666.829-1.537 1.851-3.453 2.93-5.252.828-1.382 1.262-1.707 2.278-1.889 1.532-.275 2.918-.365 4.851-.365s3.319.09 4.851.365c1.016.182 1.45.507 2.278 1.889 1.079 1.799 2.101 3.715 2.93 5.252zm-16.059 2.994c0-.828-.672-1.5-1.5-1.5s-1.5.672-1.5 1.5.672 1.5 1.5 1.5 1.5-.672 1.5-1.5zm10 1c0-.276-.224-.5-.5-.5h-7c-.276 0-.5.224-.5.5s.224.5.5.5h7c.276 0 .5-.224.5-.5zm2.941-5.527s-.74-1.826-1.631-3.142c-.202-.298-.515-.502-.869-.566-1.511-.272-2.835-.359-4.441-.359s-2.93.087-4.441.359c-.354.063-.667.267-.869.566-.891 1.315-1.631 3.142-1.631 3.142 1.64.313 4.309.497 6.941.497s5.301-.184 6.941-.497zm2.059 4.527c0-.828-.672-1.5-1.5-1.5s-1.5.672-1.5 1.5.672 1.5 1.5 1.5 1.5-.672 1.5-1.5zm-18.298-6.5h-2.202c-.276 0-.5.224-.5.5v.511c0 .793.926.989 1.616.989l1.086-2z"/>
                          </svg>
                          <?php echo $marque; ?>
                        </li>
                      </div>
                      <div class="col-sm-2">
                        <li>
                          <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                            <path d="M9.484 15.696l-.711-.696-2.552 2.607-1.539-1.452-.698.709 2.25 2.136 3.25-3.304zm0-5l-.711-.696-2.552 2.607-1.539-1.452-.698.709 2.25 2.136 3.25-3.304zm0-5l-.711-.696-2.552 2.607-1.539-1.452-.698.709 2.25 2.136 3.25-3.304zm10.516 11.304h-8v1h8v-1zm0-5h-8v1h8v-1zm0-5h-8v1h8v-1zm4-5h-24v20h24v-20zm-1 19h-22v-18h22v18z"/>
                          </svg>
                          <?php echo $matricule; ?>
                        </li>
                      </div>
                      <div class="col-lg-6"></div>
                    </div>
                    <div class="mb-3" style="display: flex;">
                      <div class="col-lg-4">
                        <li>
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M17.997 18h-11.995l-.002-.623c0-1.259.1-1.986 1.588-2.33 1.684-.389 3.344-.736 2.545-2.209-2.366-4.363-.674-6.838 1.866-6.838 2.491 0 4.226 2.383 1.866 6.839-.775 1.464.826 1.812 2.545 2.209 1.49.344 1.589 1.072 1.589 2.333l-.002.619zm4.811-2.214c-1.29-.298-2.49-.559-1.909-1.657 1.769-3.342.469-5.129-1.4-5.129-1.265 0-2.248.817-2.248 2.324 0 3.903 2.268 1.77 2.246 6.676h4.501l.002-.463c0-.946-.074-1.493-1.192-1.751zm-22.806 2.214h4.501c-.021-4.906 2.246-2.772 2.246-6.676 0-1.507-.983-2.324-2.248-2.324-1.869 0-3.169 1.787-1.399 5.129.581 1.099-.619 1.359-1.909 1.657-1.119.258-1.193.805-1.193 1.751l.002.463z"/>
                          </svg>
                          <?php echo $nbpersonne; ?>
                        </li>
                      </div>
                      <div class="col-sm-2">
                        <li>
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M18 0c-3.148 0-6 2.553-6 5.702 0 4.682 4.783 5.177 6 12.298 1.217-7.121 6-7.616 6-12.298 0-3.149-2.852-5.702-6-5.702zm0 8c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm-12-3c-2.099 0-4 1.702-4 3.801 0 3.121 3.188 3.451 4 8.199.812-4.748 4-5.078 4-8.199 0-2.099-1.901-3.801-4-3.801zm0 5.333c-.737 0-1.333-.597-1.333-1.333s.596-1.333 1.333-1.333 1.333.596 1.333 1.333-.596 1.333-1.333 1.333zm6 5.775l-3.215-1.078c.365-.634.777-1.128 1.246-1.687l1.969.657 1.92-.64c.388.521.754 1.093 1.081 1.75l-3.001.998zm12 7.892l-6.707-2.427-5.293 2.427-5.581-2.427-6.419 2.427 3.62-8.144c.299.76.554 1.776.596 3.583l-.443.996 2.699-1.021 4.809 2.091.751-3.725.718 3.675 4.454-2.042 3.099 1.121-.461-1.055c.026-.392.068-.78.131-1.144.144-.84.345-1.564.585-2.212l3.442 7.877z"/>
                          </svg>
                          <?php echo $typetrajet; ?>
                        </li>
                      </div>
                      <div class="col-lg-6"></div>
                    </div>
                    <div class="mb-3" style="display: flex;">
                      <div class="col-lg-6">
                        <li><p><?php echo $desc; ?></p></li>
                      </div>
                      <div class="col-lg-4"></div>
                    </div>
                  </ul>
                        <?php $aujourdhui = date("Y-m-d");
        if ($uidlive != $uid) {
            ?>
                            <?php if ($datedebut >= $aujourdhui) {?>
                            <?php if ($nbpersonne > 0) {?>
                            <?php if ($statut !='Supprimé') {?>
                                <input type="hidden" id="formsource" name="source" value=<?php echo $source; ?> />
                                <input type="hidden" id="formdestination" name="destination" value="<?php echo $destination; ?>" />
                                <input type="hidden" name="uid" value=<?php echo getIdUtilisateur(); ?> />
                                <input type="hidden" name="cid" value=<?php echo $cid; ?> />


                                <div class="text-center mb-2">Pour réserver une place, cliquez sur le bouton ci-dessous:</div>
                        <!-- <button type="button" class="w-100 btn btn-lg btn-primary" name="submit">Réserver</button> -->
                        <input  class="w-100 btn btn-lg btn-primary" type="submit" name="submit" value="Réserver"/>

                </form>
                  <div class="mt-3 mb-3" style="display: flex;">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6 mx-5">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3"></div>
          </div>
        </div>
                    <?php }} else {echo "<div class=\"text-center\"><svg width=\"24\" height=\"24\" xmlns=\"http://www.w3.org/2000/svg\" fill-rule=\"evenodd\" clip-rule=\"evenodd\"><path d=\"M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11 4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm-.019 14c1.842.005 3.613.791 5.117 2.224l-.663.748c-1.323-1.27-2.866-1.968-4.456-1.972h-.013c-1.568 0-3.092.677-4.4 1.914l-.664-.748c1.491-1.4 3.243-2.166 5.064-2.166h.015zm-3.494-6.5c.552 0 1 .448 1 1s-.448 1-1 1-1-.448-1-1 .448-1 1-1zm7.013 0c.552 0 1 .448 1 1s-.448 1-1 1-1-.448-1-1 .448-1 1-1z\"/></svg>Toutes les places ont été réservées malheuresement"?></div><?php echo "";} ?>

                        <?php } else {
                echo "<div class=\"text-center\">Trajet archivé.Veuillez revenir à la page précédente</div>";
            }
            ?>

                        <?php } else {
            echo "<div class=\"text-center\">Vous ne pouvez pas réserver sur votre propre trajet.</div>";?>
                        <?php if ($statut == 'Supprimé') {?>
                          <div class="text-center bg-danger">Trajet Supprimé</div>

                    <?php } elseif (($statut == 'Refusé')) {?>
                    <h6> Trajet refusé par l'admin</h6>
                    <?php } elseif (($statut == 'En attente')) {?>
                    <div class="text-center bg-danger">Trajet en cours de confirmation</div>
                    <?php } else {?>
                        <a href="modifiertrajet.php?modifier=<?php echo $row['id']; ?>"
                        class="btn btn-info"  onsubmit="return confirm('Etes-vous sûr ?');" name="edit">Modifier</a>
                        <a onclick="return confirm('Êtes vous sûr de supprimer votre trajet ?')"  href="supprimertrajet.php?Supprimer=<?php echo $row['id']; ?>"
                        class="btn btn-danger" >Supprimer</a>
                         <!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Supprimer</button>
                         <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="staticBackdropLabel">Supprimer trajet</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  Voulez-vous supprimer votre trajet?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                  <button type="button" class="btn btn-danger">Supprimer</button>
                                </div>
                              </div>
                            </div>
                          </div> -->
                    <?php }?>
                    <?php
}

        ?>
                    <!-- modification -->
                    <?php

        ?>
                    <!-- modification -->
                        <?php

    }
} else {
    echo ("<div class='text-center border bg-danger text-dark mt-5'>Il semblerait que vous ayez entré une URL qui n'existe pas. Veuillez revenir à la page précédente.</div>\n");
}?>
      </main>
    </body>
</html>