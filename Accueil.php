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
 * Script de recherche de trajet
 */
require_once 'includes/fonctions.php';

include 'includes/header.php';
$conn = connexionBDD();
?>
  <header class="container-fluid  my-5 text-center">
      <h3 class="text-muted">Rechercher un trajet</h3>
  </header>
    <!-- <input type="hidden" name="action" value="search"> -->
    <form method="post" action="Accueil.php">
            <?php if (isset($_POST['action'])) {?>
                <input type="hidden" name="action" value="search"/>

              <div class="container-fluid my-5">
                  <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8 my-5">
                        <div class="form-floating mb-3">
                            <!-- <input type="hidden" name="action" value="search"/> -->
                            <select class="form-select" name="source" id="floatingSelect" aria-label="Floating label select example" style="height: 60px;"rquired>
                                  <option  value=""><?php echo $_POST['source']; ?></option>
                                  <option value="Agadir">Agadir</option>
                                  <option value="Ahfir">Ahfir</option>
                                  <option value="Al Hoceima">Al Hoceïma</option>
                                  <option value="Al jadida">Al Jadida</option>
                                  <option value="Al khmisSat">Al Khmissat</option>
                                  <option value="Amizmiz">Amizmiz</option>
                                  <option value="Ain El Aouda">Aïn El Aouda</option>
                                  <option value="Ain Harrouda">Aïn Harrouda</option>
                                  <option value="Asfi">Asfi</option>
                                  <option value="Assilah">Asilah</option>
                                  <option value="Assa">Assa</option>
                                  <option value="Ait Mellol">Aït Melloul</option>
                                  <option value="Ait Ourir">Aït Ourir</option>
                                  <option value="Attaouia">Attaouia</option>
                                  <option value="Azemmour">Azemmour</option>
                                  <option value="Azilal">Azilal</option>
                                  <option value="Azrou">Azrou</option>
                                  <option value="Barrechid">Barrechid</option>
                                  <option value="Benguerir">Benguerir</option>
                                  <option value="Bni Drar">Beni Drar</option>
                                  <option value="Beni Mellal">Beni Mellal</option>
                                  <option value="Ben Slimane">Ben Slimane</option>
                                  <option value="Berkane">Berkane</option>
                                  <option value="Berrechid">Berrechid</option>
                                  <option value="Bir Jdid">Bir Jdid</option>
                                  <option value="Bou Knadel">Bou Knadel</option>
                                  <option value="Boulmane">Boulmane</option>
                                  <option value="Bouskoura">Bouskoura</option>
                                  <option value="Bouznika">Bouznika</option>
                                  <option value="Casablanca">Casablanca</option>
                                  <option value="Chaouén">Chaouèn</option>
                                  <option value="Chefchaouene">Chefchaouene</option>
                                  <option value="Chemaïa">Chemaïa</option>
                                  <option value="Chichaoua">Chichaoua</option>
                                  <option value="Demnat">Demnat</option>
                                  <option value="Deroua">Deroua</option>
                                  <option value="El Aioun">El Aioun</option>
                                  <option value="El Gara">El Gara</option>
                                  <option value="El Hajeb">El Hajeb</option>
                                  <option value="El Harhoura">El Harhoura</option>
                                  <option value="El Jadida">El Jadida</option>
                                  <option value="El Kelaa">El Kelaa</option>
                                  <option value="El Ksar Kbir">El Ksar El Kbir</option>
                                  <option value="El Menzah">El Menzeh</option>
                                  <option value="Erfoud">Erfoud</option>
                                  <option value="Er Rachidia">Er Rachidia</option>
                                  <option value="Essaouira">Essaouira</option>
                                  <option value="Fez">Fez</option>
                                  <option value="Fkih Ben Salah">Fkih Ben Salah</option>
                                  <option value="Fnideq">Fnideq</option>
                                  <option value="Fès Jadid">Fès Jdid</option>
                                  <option value="Fès">Fès</option>
                                  <option value="Guelmim">Guelmim</option>
                                  <option value="Guercif">Guercif</option>
                                  <option value="Ifrane">Ifrane</option>
                                  <option value="Imouzzer du Kandar">Imouzzer Du Kandar</option>
                                  <option value="Imouzzer">Imouzzer</option>
                                  <option value="Jerada">Jerada</option>
                                  <option value="Jorf">Jorf</option>
                                  <option value="Kasba Tadla">Kasba Tadla</option>
                                  <option value="Kelaa">Kelaa</option>
                                  <option value="Kenitra">Kenitra</option>
                                  <option value="Khemisset">Khemisset</option>
                                  <option value="Khenifra">Khenifra</option>
                                  <option value="Khouribga">Khouribga</option>
                                  <option value="Ksar El Kbir">Ksar El Kebir</option>
                                  <option value="Larache">Larache</option>
                                  <option value="Mansouria">Mansouria</option>
                                  <option value="Marrakech">Marrakech</option>
                                  <option value="Martil">Martil</option>
                                  <option value="M'diq">M'diq</option>
                                  <option value="Meknès">Meknès</option>
                                  <option value="Midar">Midar</option>
                                  <option value="Midelt">Midelt</option>
                                  <option value="Mighleft">Mighleft</option>
                                  <option value="Mohammadia">Mohammadia</option>
                                  <option value="Moulay-Bousselham">Moulay-bousselham</option>
                                  <option value="Nador">Nador</option>
                                  <option value="Nouasser">Nouasser</option>
                                  <option value="Oualidia">Oualidia</option>
                                  <option value="Ouarzazate">Ouarzazate</option>
                                  <option value="Ouazzane">Ouazzane</option>
                                  <option value="Oued Zem">Oued Zem</option>
                                  <option value="Oujda">Oujda</option>
                                  <option value="Oulad Ayad">Oulad Ayad</option>
                                  <option value="Oulad Teima">Oulad Teïma</option>
                                  <option value="Oulmes">Oulmes</option>
                                  <option value="Ourika">Ourika</option>
                                  <option value="Rabat">Rabat</option>
                                  <option value="Rissani">Rissani</option>
                                  <option value="Saidia">Saïdia</option>
                                  <option value="Safi">Safi</option>
                                  <option value="Salé">Salé</option>
                                  <option value="Sefrou">Sefrou</option>
                                  <option value="Settat">Settat</option>
                                  <option value="Sidi Allal El Bahraoui">Sidi Allal El Bahraoui</option>
                                  <option value="Sidi Allal">Sidi Allal</option>
                                  <option value="Sidi Bennour">Sidi Bennour</option>
                                  <option value="Sidi Ifni">Sidi Ifni</option>
                                  <option value="Sidi Kacem">Sidi Kacem</option>
                                  <option value="Sidi Rahal">Sidi Rahal</option>
                                  <option value="Sidi Slimane">Sidi Slimane</option>
                                  <option value="Sidi Yahia Az Za'er">Sidi Yahia Az Za'er</option>
                                  <option value="Sidi Yahia El Gharb">Sidi Yahia El Gharb</option>
                                  <option value="Skhirate">Skhirate</option>
                                  <option value="Smara">Smara</option>
                                  <option value="Souk El Arbâa">Souk El Arbâa</option>
                                  <option value="Tadla">Tadla</option>
                                  <option value="Tamesna">Tamesna</option>
                                  <option value="Tanger">Tanger</option>
                                  <option value="Tan-Tan">Tan-tan</option>
                                  <option value="Taounate">Taounate</option>
                                  <option value="Taourirt">Taourirt</option>
                                  <option value="Targuist">Targuist</option>
                                  <option value="Taroudant">Taroudant</option>
                                  <option value="Taza">Tata</option>
                                  <option value="Tawnat">Tawnat</option>
                                  <option value="Taza">Taza</option>
                                  <option value="Temara">Temara</option>
                                  <option value="Tiflet">Tiflet</option>
                                  <option value="Tinghir">Tinghir</option>
                                  <option value="Tiznit">Tiznit</option>
                                  <option value="Tétouan">Tétouan</option>
                                  <option value="Wazzan">Wazzan</option>
                                  <option value="Youssoufia">Youssoufia</option>
                                  <option value="Zagora">Zagora</option>
                                  <option value="Zaio">Zaïo</option>
                                  <option value="Zemamra">Zemamra</option>
                                  <option value="Zarhoun">Zerhoun</option>
                                  <option value="Boujdour">Boujdour</option>
                                  <option value="Imlil">Imlil</option>
                                  <option value="Laayoune">Laayoune</option>
                                  <option value="Sala Al-Jadida">Sala Al-Jadida</option>
                            </select>
                            <label for="floatingSelect">Départ</label>
                        </div>
                        <div class="form-floating">
                            <select name="destination" class="mt-5 mb-3 form-select" id="floatingSelect" aria-label="Floating label select example" style="height: 60px;"required>
                                  <option  value=""><?php echo $_POST['destination']; ?></option>
                                  <option value="Agadir">Agadir</option>
                                  <option value="Ahfir">Ahfir</option>
                                  <option value="Al Hoceima">Al Hoceïma</option>
                                  <option value="Al jadida">Al Jadida</option>
                                  <option value="Al khmisSat">Al Khmissat</option>
                                  <option value="Amizmiz">Amizmiz</option>
                                  <option value="Ain El Aouda">Aïn El Aouda</option>
                                  <option value="Ain Harrouda">Aïn Harrouda</option>
                                  <option value="Asfi">Asfi</option>
                                  <option value="Assilah">Asilah</option>
                                  <option value="Assa">Assa</option>
                                  <option value="Ait Mellol">Aït Melloul</option>
                                  <option value="50">Aït Ourir</option>
                                  <option value="Attaouia">Attaouia</option>
                                  <option value="Azemmour">Azemmour</option>
                                  <option value="Azilal">Azilal</option>
                                  <option value="Azrou">Azrou</option>
                                  <option value="Barrechid">Barrechid</option>
                                  <option value="Benguerir">Benguerir</option>
                                  <option value="Bni Drar">Beni Drar</option>
                                  <option value="Beni Mellal">Beni Mellal</option>
                                  <option value="Ben Slimane">Ben Slimane</option>
                                  <option value="Berkane">Berkane</option>
                                  <option value="Berrechid">Berrechid</option>
                                  <option value="Bir Jdid">Bir Jdid</option>
                                  <option value="Bou Knadel">Bou Knadel</option>
                                  <option value="Boulmane">Boulmane</option>
                                  <option value="Bouskoura">Bouskoura</option>
                                  <option value="Bouznika">Bouznika</option>
                                  <option value="Casablanca">Casablanca</option>
                                  <option value="Chaouén">Chaouèn</option>
                                  <option value="Chefchaouene">Chefchaouene</option>
                                  <option value="Chemaïa">Chemaïa</option>
                                  <option value="Chichaoua">Chichaoua</option>
                                  <option value="Demnat">Demnat</option>
                                  <option value="Deroua">Deroua</option>
                                  <option value="El Aioun">El Aioun</option>
                                  <option value="El Gara">El Gara</option>
                                  <option value="El Hajeb">El Hajeb</option>
                                  <option value="El Harhoura">El Harhoura</option>
                                  <option value="El Jadida">El Jadida</option>
                                  <option value="El Kelaa">El Kelaa</option>
                                  <option value="El Ksar Kbir">El Ksar El Kbir</option>
                                  <option value="El Menzah">El Menzeh</option>
                                  <option value="Erfoud">Erfoud</option>
                                  <option value="Er Rachidia">Er Rachidia</option>
                                  <option value="Essaouira">Essaouira</option>
                                  <option value="Fez">Fez</option>
                                  <option value="Fkih Ben Salah">Fkih Ben Salah</option>
                                  <option value="Fnideq">Fnideq</option>
                                  <option value="Fès Jadid">Fès Jdid</option>
                                  <option value="Fès">Fès</option>
                                  <option value="Guelmim">Guelmim</option>
                                  <option value="Guercif">Guercif</option>
                                  <option value="Ifrane">Ifrane</option>
                                  <option value="Imouzzer du Kandar">Imouzzer Du Kandar</option>
                                  <option value="Imouzzer">Imouzzer</option>
                                  <option value="Jerada">Jerada</option>
                                  <option value="Jorf">Jorf</option>
                                  <option value="Kasba Tadla">Kasba Tadla</option>
                                  <option value="Kelaa">Kelaa</option>
                                  <option value="Kenitra">Kenitra</option>
                                  <option value="Khemisset">Khemisset</option>
                                  <option value="Khenifra">Khenifra</option>
                                  <option value="Khouribga">Khouribga</option>
                                  <option value="Ksar El Kbir">Ksar El Kebir</option>
                                  <option value="Larache">Larache</option>
                                  <option value="Mansouria">Mansouria</option>
                                  <option value="Marrakech">Marrakech</option>
                                  <option value="Martil">Martil</option>
                                  <option value="M'diq">M'diq</option>
                                  <option value="Meknès">Meknès</option>
                                  <option value="Midar">Midar</option>
                                  <option value="Midelt">Midelt</option>
                                  <option value="Mighleft">Mighleft</option>
                                  <option value="Mohammadia">Mohammadia</option>
                                  <option value="Moulay-Bousselham">Moulay-bousselham</option>
                                  <option value="Nador">Nador</option>
                                  <option value="Nouasser">Nouasser</option>
                                  <option value="Oualidia">Oualidia</option>
                                  <option value="Ouarzazate">Ouarzazate</option>
                                  <option value="Ouazzane">Ouazzane</option>
                                  <option value="Oued Zem">Oued Zem</option>
                                  <option value="Oujda">Oujda</option>
                                  <option value="Oulad Ayad">Oulad Ayad</option>
                                  <option value="Oulad Teima">Oulad Teïma</option>
                                  <option value="Oulmes">Oulmes</option>
                                  <option value="Ourika">Ourika</option>
                                  <option value="Rabat">Rabat</option>
                                  <option value="Rissani">Rissani</option>
                                  <option value="Saidia">Saïdia</option>
                                  <option value="Safi">Safi</option>
                                  <option value="Salé">Salé</option>
                                  <option value="Sefrou">Sefrou</option>
                                  <option value="Settat">Settat</option>
                                  <option value="Sidi Allal El Bahraoui">Sidi Allal El Bahraoui</option>
                                  <option value="Sidi Allal">Sidi Allal</option>
                                  <option value="Sidi Bennour">Sidi Bennour</option>
                                  <option value="Sidi Ifni">Sidi Ifni</option>
                                  <option value="Sidi Kacem">Sidi Kacem</option>
                                  <option value="Sidi Rahal">Sidi Rahal</option>
                                  <option value="Sidi Slimane">Sidi Slimane</option>
                                  <option value="Sidi Yahia Az Za'er">Sidi Yahia Az Za'er</option>
                                  <option value="Sidi Yahia El Gharb">Sidi Yahia El Gharb</option>
                                  <option value="Skhirate">Skhirate</option>
                                  <option value="Smara">Smara</option>
                                  <option value="Souk El Arbâa">Souk El Arbâa</option>
                                  <option value="Tadla">Tadla</option>
                                  <option value="Tamesna">Tamesna</option>
                                  <option value="Tanger">Tanger</option>
                                  <option value="Tan-Tan">Tan-tan</option>
                                  <option value="Taounate">Taounate</option>
                                  <option value="Taourirt">Taourirt</option>
                                  <option value="Targuist">Targuist</option>
                                  <option value="Taroudant">Taroudant</option>
                                  <option value="Taza">Tata</option>
                                  <option value="Tawnat">Tawnat</option>
                                  <option value="Taza">Taza</option>
                                  <option value="Temara">Temara</option>
                                  <option value="Tiflet">Tiflet</option>
                                  <option value="Tinghir">Tinghir</option>
                                  <option value="Tiznit">Tiznit</option>
                                  <option value="Tétouan">Tétouan</option>
                                  <option value="Wazzan">Wazzan</option>
                                  <option value="Youssoufia">Youssoufia</option>
                                  <option value="Zagora">Zagora</option>
                                  <option value="Zaio">Zaïo</option>
                                  <option value="Zemamra">Zemamra</option>
                                  <option value="Zarhoun">Zerhoun</option>
                                  <option value="Boujdour">Boujdour</option>
                                  <option value="Imlil">Imlil</option>
                                  <option value="Laayoune">Laayoune</option>
                                  <option value="Sala Al-Jadida">Sala Al-Jadida</option>
                            </select>
                            <label for="floatingSelect">Arrivée</label>
                        </div>
                        <div class="form-floating d-grid gap-2 mt-5">
                            <button class="btn btn-info btn-block mb-3" name="submit" type="submit">Rechercher</button>
                      </form>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                  </div>
              </div>
    <!-- </form>	 -->
              <?php
if (isset($_POST['action'])) {
    $source = $_POST['source'];
    $destination = $_POST['destination'];
    //$datedebut = $_POST['datedebut'];
    $aujourdhui = date("Y-m-d");
    $compt = 0;
    /*$taxi = 0; $voiture = 0; $poussepousse = 0;
    if(isset($_POST['taxi'])) $taxi = 1;
    if(isset($_POST['voiture'])) $voiture = 1;
    if(isset($_POST['poussepousse'])) $poussepousse = 1;*/
    $requete = "SELECT R1.cid FROM route R1 INNER JOIN route R2 ON R1.via = '" . $source . "' AND R2.via = '" . $destination . "' AND R1.numeroserie < R2.numeroserie AND R1.cid = R2.cid";
    $result = $conn->query($requete) or die($conn->error);
    while ($temp = mysqli_fetch_array($result)) {
        $requete2 = "SELECT id FROM offres WHERE id ='" . $temp['cid'] . "' AND datedebut >= '" . $aujourdhui . "'";
        $result2 = $conn->query($requete2) or die($conn->error);
        if (($result2->num_rows) != 0) {
            $compt++;
        }
    }
    if (($result->num_rows) == 0 || $compt == 0) {
      echo(" 
            <div class=\" my-5 py-5 text-center\" style=\"height: calc(100vh - 56px);\">
              <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\">
                <path d=\"M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm5.508 13.941c-1.513 1.195-3.174 1.931-5.507 1.931-2.335 0-3.996-.736-5.509-1.931l-.492.493c1.127 1.72 3.2 3.566 6.001 3.566 2.8 0 4.872-1.846 5.999-3.566l-.492-.493zm.492-3.939l-.755.506s-.503-.948-1.746-.948c-1.207 0-1.745.948-1.745.948l-.754-.506c.281-.748 1.205-2.002 2.499-2.002 1.295 0 2.218 1.254 2.501 2.002zm-7 0l-.755.506s-.503-.948-1.746-.948c-1.207 0-1.745.948-1.745.948l-.754-.506c.281-.748 1.205-2.002 2.499-2.002 1.295 0 2.218 1.254 2.501 2.002z\"/>
              </svg>
              \n Aucun trajet ne correspond à votre recherche.\n
            </div>\n
          ");
    } else {
        echo '<div class="table-responsive">
                        <table  id="tabListe" class="table table-hover  table-striped table-sm" style="height: calc(100vh - 56px);"><thead><tr><th> De </th> <th> À </th> <th> Date de départ </th> <th> Heure de départ </th> <th> Type de trajet</th><th></th></tr></thead></div><tbody>';
        $requete3 = "SELECT R1.cid FROM route R1 INNER JOIN route R2 ON R1.via = '" . $source . "' AND R2.via = '" . $destination . "' AND R1.numeroserie < R2.numeroserie AND R1.cid = R2.cid";
        $result3 = $conn->query($requete3) or die($conn->error);

        while ($row = mysqli_fetch_array($result3)) {
            $requete4 = "SELECT id,source,destination,datedebut,duree,typetrajet FROM offres WHERE id ='" . $row['cid'] . "' AND datedebut >= '" . $aujourdhui . "' AND statut='Approuvé'";
            $result4 = $conn->query($requete4) or die($conn->error);
            if (($result4->num_rows) == 0) {
                //
            } else {
                $result5 = mysqli_fetch_array($result4);
                echo "<tr><td>" . $result5['source'] . "</td><td>" . $result5['destination'] . "</td><td>" . $result5['datedebut'] . "</td><td>" . $result5['duree'] . "</td><td>" . $result5['typetrajet'] . "</td>"?><td><a type="button" href="connecter.php" class="btn btn-primary">Réserver</a><?php echo "</tr>";
            }
        }
    }
}
    ?>
                        </tbody>
                      </table>


      <?php } else {?>
                <input type="hidden" name="action" value="search">
                <div class="container-fluid  my-5">
                  <!-- <input type="hidden" name="action" value="search"> -->
                    <div class="row">
                      <!-- <input type="hidden" name="action" value="search"> -->
                      <div class="col-lg-2"></div>
                      <!-- <input type="hidden" name="action" value="search"> -->
                      <div class="col-lg-8 my-5">
                        <!-- <input type="hidden" name="action" value="search"> -->
                          <div class="form-floating mb-3">
                              <select class="form-select" name="source" id="floatingSelect" aria-label="Floating label select example" style="height: 60px;">
                                    <option value="Agadir">Agadir</option>
                                    <option value="Ahfir">Ahfir</option>
                                    <option value="Al Hoceima">Al Hoceïma</option>
                                    <option value="Al jadida">Al Jadida</option>
                                    <option value="Al khmisSat">Al Khmissat</option>
                                    <option value="Amizmiz">Amizmiz</option>
                                    <option value="Ain El Aouda">Aïn El Aouda</option>
                                    <option value="Ain Harrouda">Aïn Harrouda</option>
                                    <option value="Asfi">Asfi</option>
                                    <option value="Assilah">Asilah</option>
                                    <option value="Assa">Assa</option>
                                    <option value="Ait Mellol">Aït Melloul</option>
                                    <option value="50">Aït Ourir</option>
                                    <option value="Attaouia">Attaouia</option>
                                    <option value="Azemmour">Azemmour</option>
                                    <option value="Azilal">Azilal</option>
                                    <option value="Azrou">Azrou</option>
                                    <option value="Barrechid">Barrechid</option>
                                    <option value="Benguerir">Benguerir</option>
                                    <option value="Bni Drar">Beni Drar</option>
                                    <option value="Beni Mellal">Beni Mellal</option>
                                    <option value="Ben Slimane">Ben Slimane</option>
                                    <option value="Berkane">Berkane</option>
                                    <option value="Berrechid">Berrechid</option>
                                    <option value="Bir Jdid">Bir Jdid</option>
                                    <option value="Bou Knadel">Bou Knadel</option>
                                    <option value="Boulmane">Boulmane</option>
                                    <option value="Bouskoura">Bouskoura</option>
                                    <option value="Bouznika">Bouznika</option>
                                    <option value="Casablanca">Casablanca</option>
                                    <option value="Chaouén">Chaouèn</option>
                                    <option value="Chefchaouene">Chefchaouene</option>
                                    <option value="Chemaïa">Chemaïa</option>
                                    <option value="Chichaoua">Chichaoua</option>
                                    <option value="Demnat">Demnat</option>
                                    <option value="Deroua">Deroua</option>
                                    <option value="El Aioun">El Aioun</option>
                                    <option value="El Gara">El Gara</option>
                                    <option value="El Hajeb">El Hajeb</option>
                                    <option value="El Harhoura">El Harhoura</option>
                                    <option value="El Jadida">El Jadida</option>
                                    <option value="El Kelaa">El Kelaa</option>
                                    <option value="El Ksar Kbir">El Ksar El Kbir</option>
                                    <option value="El Menzah">El Menzeh</option>
                                    <option value="Erfoud">Erfoud</option>
                                    <option value="Er Rachidia">Er Rachidia</option>
                                    <option value="Essaouira">Essaouira</option>
                                    <option value="Fez">Fez</option>
                                    <option value="Fkih Ben Salah">Fkih Ben Salah</option>
                                    <option value="Fnideq">Fnideq</option>
                                    <option value="Fès Jadid">Fès Jdid</option>
                                    <option value="Fès">Fès</option>
                                    <option value="Guelmim">Guelmim</option>
                                    <option value="Guercif">Guercif</option>
                                    <option value="Ifrane">Ifrane</option>
                                    <option value="Imouzzer du Kandar">Imouzzer Du Kandar</option>
                                    <option value="Imouzzer">Imouzzer</option>
                                    <option value="Jerada">Jerada</option>
                                    <option value="Jorf">Jorf</option>
                                    <option value="Kasba Tadla">Kasba Tadla</option>
                                    <option value="Kelaa">Kelaa</option>
                                    <option value="Kenitra">Kenitra</option>
                                    <option value="Khemisset">Khemisset</option>
                                    <option value="Khenifra">Khenifra</option>
                                    <option value="Khouribga">Khouribga</option>
                                    <option value="Ksar El Kbir">Ksar El Kebir</option>
                                    <option value="Larache">Larache</option>
                                    <option value="Mansouria">Mansouria</option>
                                    <option value="Marrakech">Marrakech</option>
                                    <option value="Martil">Martil</option>
                                    <option value="M'diq">M'diq</option>
                                    <option value="Meknès">Meknès</option>
                                    <option value="Midar">Midar</option>
                                    <option value="Midelt">Midelt</option>
                                    <option value="Mighleft">Mighleft</option>
                                    <option value="Mohammadia">Mohammadia</option>
                                    <option value="Moulay-Bousselham">Moulay-bousselham</option>
                                    <option value="Nador">Nador</option>
                                    <option value="Nouasser">Nouasser</option>
                                    <option value="Oualidia">Oualidia</option>
                                    <option value="Ouarzazate">Ouarzazate</option>
                                    <option value="Ouazzane">Ouazzane</option>
                                    <option value="Oued Zem">Oued Zem</option>
                                    <option value="Oujda">Oujda</option>
                                    <option value="Oulad Ayad">Oulad Ayad</option>
                                    <option value="Oulad Teima">Oulad Teïma</option>
                                    <option value="Oulmes">Oulmes</option>
                                    <option value="Ourika">Ourika</option>
                                    <option value="Rabat">Rabat</option>
                                    <option value="Rissani">Rissani</option>
                                    <option value="Saidia">Saïdia</option>
                                    <option value="Safi">Safi</option>
                                    <option value="Salé">Salé</option>
                                    <option value="Sefrou">Sefrou</option>
                                    <option value="Settat">Settat</option>
                                    <option value="Sidi Allal El Bahraoui">Sidi Allal El Bahraoui</option>
                                    <option value="Sidi Allal">Sidi Allal</option>
                                    <option value="Sidi Bennour">Sidi Bennour</option>
                                    <option value="Sidi Ifni">Sidi Ifni</option>
                                    <option value="Sidi Kacem">Sidi Kacem</option>
                                    <option value="Sidi Rahal">Sidi Rahal</option>
                                    <option value="Sidi Slimane">Sidi Slimane</option>
                                    <option value="Sidi Yahia Az Za'er">Sidi Yahia Az Za'er</option>
                                    <option value="Sidi Yahia El Gharb">Sidi Yahia El Gharb</option>
                                    <option value="Skhirate">Skhirate</option>
                                    <option value="Smara">Smara</option>
                                    <option value="Souk El Arbâa">Souk El Arbâa</option>
                                    <option value="Tadla">Tadla</option>
                                    <option value="Tamesna">Tamesna</option>
                                    <option value="Tanger">Tanger</option>
                                    <option value="Tan-Tan">Tan-tan</option>
                                    <option value="Taounate">Taounate</option>
                                    <option value="Taourirt">Taourirt</option>
                                    <option value="Targuist">Targuist</option>
                                    <option value="Taroudant">Taroudant</option>
                                    <option value="Taza">Tata</option>
                                    <option value="Tawnat">Tawnat</option>
                                    <option value="Taza">Taza</option>
                                    <option value="Temara">Temara</option>
                                    <option value="Tiflet">Tiflet</option>
                                    <option value="Tinghir">Tinghir</option>
                                    <option value="Tiznit">Tiznit</option>
                                    <option value="Tétouan">Tétouan</option>
                                    <option value="Wazzan">Wazzan</option>
                                    <option value="Youssoufia">Youssoufia</option>
                                    <option value="Zagora">Zagora</option>
                                    <option value="Zaio">Zaïo</option>
                                    <option value="Zemamra">Zemamra</option>
                                    <option value="Zarhoun">Zerhoun</option>
                                    <option value="Boujdour">Boujdour</option>
                                    <option value="Imlil">Imlil</option>
                                    <option value="Laayoune">Laayoune</option>
                                    <option value="Sala Al-Jadida">Sala Al-Jadida</option>
                              </select>
                              <label for="floatingSelect">Départ</label>
                            </div>
                            <div class="form-floating">
                              <select class="mt-5 mb-3 form-select" name="destination" id="floatingSelect" aria-label="Floating label select example" style="height: 60px;">
                                    <option value="Agadir">Agadir</option>
                                    <option value="Ahfir">Ahfir</option>
                                    <option value="Al Hoceima">Al Hoceïma</option>
                                    <option value="Al jadida">Al Jadida</option>
                                    <option value="Al khmisSat">Al Khmissat</option>
                                    <option value="Amizmiz">Amizmiz</option>
                                    <option value="Ain El Aouda">Aïn El Aouda</option>
                                    <option value="Ain Harrouda">Aïn Harrouda</option>
                                    <option value="Asfi">Asfi</option>
                                    <option value="Assilah">Asilah</option>
                                    <option value="Assa">Assa</option>
                                    <option value="Ait Mellol">Aït Melloul</option>
                                    <option value="50">Aït Ourir</option>
                                    <option value="Attaouia">Attaouia</option>
                                    <option value="Azemmour">Azemmour</option>
                                    <option value="Azilal">Azilal</option>
                                    <option value="Azrou">Azrou</option>
                                    <option value="Barrechid">Barrechid</option>
                                    <option value="Benguerir">Benguerir</option>
                                    <option value="Bni Drar">Beni Drar</option>
                                    <option value="Beni Mellal">Beni Mellal</option>
                                    <option value="Ben Slimane">Ben Slimane</option>
                                    <option value="Berkane">Berkane</option>
                                    <option value="Berrechid">Berrechid</option>
                                    <option value="Bir Jdid">Bir Jdid</option>
                                    <option value="Bou Knadel">Bou Knadel</option>
                                    <option value="Boulmane">Boulmane</option>
                                    <option value="Bouskoura">Bouskoura</option>
                                    <option value="Bouznika">Bouznika</option>
                                    <option value="Casablanca">Casablanca</option>
                                    <option value="Chaouén">Chaouèn</option>
                                    <option value="Chefchaouene">Chefchaouene</option>
                                    <option value="Chemaïa">Chemaïa</option>
                                    <option value="Chichaoua">Chichaoua</option>
                                    <option value="Demnat">Demnat</option>
                                    <option value="Deroua">Deroua</option>
                                    <option value="El Aioun">El Aioun</option>
                                    <option value="El Gara">El Gara</option>
                                    <option value="El Hajeb">El Hajeb</option>
                                    <option value="El Harhoura">El Harhoura</option>
                                    <option value="El Jadida">El Jadida</option>
                                    <option value="El Kelaa">El Kelaa</option>
                                    <option value="El Ksar Kbir">El Ksar El Kbir</option>
                                    <option value="El Menzah">El Menzeh</option>
                                    <option value="Erfoud">Erfoud</option>
                                    <option value="Er Rachidia">Er Rachidia</option>
                                    <option value="Essaouira">Essaouira</option>
                                    <option value="Fez">Fez</option>
                                    <option value="Fkih Ben Salah">Fkih Ben Salah</option>
                                    <option value="Fnideq">Fnideq</option>
                                    <option value="Fès Jadid">Fès Jdid</option>
                                    <option value="Fès">Fès</option>
                                    <option value="Guelmim">Guelmim</option>
                                    <option value="Guercif">Guercif</option>
                                    <option value="Ifrane">Ifrane</option>
                                    <option value="Imouzzer du Kandar">Imouzzer Du Kandar</option>
                                    <option value="Imouzzer">Imouzzer</option>
                                    <option value="Jerada">Jerada</option>
                                    <option value="Jorf">Jorf</option>
                                    <option value="Kasba Tadla">Kasba Tadla</option>
                                    <option value="Kelaa">Kelaa</option>
                                    <option value="Kenitra">Kenitra</option>
                                    <option value="Khemisset">Khemisset</option>
                                    <option value="Khenifra">Khenifra</option>
                                    <option value="Khouribga">Khouribga</option>
                                    <option value="Ksar El Kbir">Ksar El Kebir</option>
                                    <option value="Larache">Larache</option>
                                    <option value="Mansouria">Mansouria</option>
                                    <option value="Marrakech">Marrakech</option>
                                    <option value="Martil">Martil</option>
                                    <option value="M'diq">M'diq</option>
                                    <option value="Meknès">Meknès</option>
                                    <option value="Midar">Midar</option>
                                    <option value="Midelt">Midelt</option>
                                    <option value="Mighleft">Mighleft</option>
                                    <option value="Mohammadia">Mohammadia</option>
                                    <option value="Moulay-Bousselham">Moulay-bousselham</option>
                                    <option value="Nador">Nador</option>
                                    <option value="Nouasser">Nouasser</option>
                                    <option value="Oualidia">Oualidia</option>
                                    <option value="Ouarzazate">Ouarzazate</option>
                                    <option value="Ouazzane">Ouazzane</option>
                                    <option value="Oued Zem">Oued Zem</option>
                                    <option value="Oujda">Oujda</option>
                                    <option value="Oulad Ayad">Oulad Ayad</option>
                                    <option value="Oulad Teima">Oulad Teïma</option>
                                    <option value="Oulmes">Oulmes</option>
                                    <option value="Ourika">Ourika</option>
                                    <option value="Rabat">Rabat</option>
                                    <option value="Rissani">Rissani</option>
                                    <option value="Saidia">Saïdia</option>
                                    <option value="Safi">Safi</option>
                                    <option value="Salé">Salé</option>
                                    <option value="Sefrou">Sefrou</option>
                                    <option value="Settat">Settat</option>
                                    <option value="Sidi Allal El Bahraoui">Sidi Allal El Bahraoui</option>
                                    <option value="Sidi Allal">Sidi Allal</option>
                                    <option value="Sidi Bennour">Sidi Bennour</option>
                                    <option value="Sidi Ifni">Sidi Ifni</option>
                                    <option value="Sidi Kacem">Sidi Kacem</option>
                                    <option value="Sidi Rahal">Sidi Rahal</option>
                                    <option value="Sidi Slimane">Sidi Slimane</option>
                                    <option value="Sidi Yahia Az Za'er">Sidi Yahia Az Za'er</option>
                                    <option value="Sidi Yahia El Gharb">Sidi Yahia El Gharb</option>
                                    <option value="Skhirate">Skhirate</option>
                                    <option value="Smara">Smara</option>
                                    <option value="Souk El Arbâa">Souk El Arbâa</option>
                                    <option value="Tadla">Tadla</option>
                                    <option value="Tamesna">Tamesna</option>
                                    <option value="Tanger">Tanger</option>
                                    <option value="Tan-Tan">Tan-tan</option>
                                    <option value="Taounate">Taounate</option>
                                    <option value="Taourirt">Taourirt</option>
                                    <option value="Targuist">Targuist</option>
                                    <option value="Taroudant">Taroudant</option>
                                    <option value="Taza">Tata</option>
                                    <option value="Tawnat">Tawnat</option>
                                    <option value="Taza">Taza</option>
                                    <option value="Temara">Temara</option>
                                    <option value="Tiflet">Tiflet</option>
                                    <option value="Tinghir">Tinghir</option>
                                    <option value="Tiznit">Tiznit</option>
                                    <option value="Tétouan">Tétouan</option>
                                    <option value="Wazzan">Wazzan</option>
                                    <option value="Youssoufia">Youssoufia</option>
                                    <option value="Zagora">Zagora</option>
                                    <option value="Zaio">Zaïo</option>
                                    <option value="Zemamra">Zemamra</option>
                                    <option value="Zarhoun">Zerhoun</option>
                                    <option value="Boujdour">Boujdour</option>
                                    <option value="Imlil">Imlil</option>
                                    <option value="Laayoune">Laayoune</option>
                                    <option value="Sala Al-Jadida">Sala Al-Jadida</option>
                              </select>
                              <label for="floatingSelect">Arrivée</label>
                            </div>
                            <div class="form-floating d-grid gap-2 mt-5">
                              <button class="btn btn-info btn-block mb-3" type="submit" name="submit">Rechercher</button>
                            </div>
                      </div>
                      <div class="col-lg-2"></div>
                    </div>
                  </div>
        <?php }?>
        <?php
include 'includes/footer1.php';
// include('includes/footer.php');
?>
</html>