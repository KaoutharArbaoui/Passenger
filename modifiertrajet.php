<?php
/*
 * Script de partage de trajet
 */ 
	require_once('includes/fonctions.php');
	if(!estConnecte())
		header("Location: Accueil.php");
	else
		$conn = connexionBDD();

?>
  <body onload="load()">
        <?php
        include('includes/header1.php')
        ?>
        </header> 
     

<div class="container">

	  
	<?php
		include('includes/messages.php');
	?>

<?php
	if (isset($_POST['modifier'])){
		echo("<div class=\"alert alert-info alert-dismissible fade show\" role=\"alert\">
				<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\">
					<path d=\"M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2.033 16.01c.564-1.789 1.632-3.932 1.821-4.474.273-.787-.211-1.136-1.74.209l-.34-.64c1.744-1.897 5.335-2.326 4.113.613-.763 1.835-1.309 3.074-1.621 4.03-.455 1.393.694.828 1.819-.211.153.25.203.331.356.619-2.498 2.378-5.271 2.588-4.408-.146zm4.742-8.169c-.532.453-1.32.443-1.761-.022-.441-.465-.367-1.208.164-1.661.532-.453 1.32-.442 1.761.022.439.466.367 1.209-.164 1.661z\"/>
				</svg>
				\nVotre trajet sera vérifier par l'administrateur. Merci de Vérifiez vos trajets fréquemment.\n
				<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
			</div>");
  }
          $source ='';
          $destination = '';
          $datedebut = '';
          $duree = '';
          $nbpersonne = '';
          $typetrajet = '';
          $matricule='';
          $marque='';
          $desc = '';
?>

<?php
if(isset($_GET['modifier']))
{
  $id=$_GET['modifier'];
  $sql="SELECT * FROM offres WHERE id=$id";
  $result=$conn->query($sql);
  if(mysqli_num_rows($result) == 1)
  {
    $row=mysqli_fetch_array($result);
          $id=$row['id'];
          $source = $row['source'];
          $destination = $row['destination'];
          $datedebut = $row['datedebut'];
          $duree = $row['duree'];
          $nbpersonne = $row['nbpersonne'];
          $typetrajet = $row['typetrajet'];
          $matricule=$row['matricule'];
          $marque=$row['marque'];
          $descriptiontrajet = $row['descriptiontrajet'];
  }} 
        if (isset($_POST['modifier'])) {

      $id = $_POST['id'];
      $source = $_POST['source'];
			$destination = $_POST['destination'];
			$datedebut = $_POST['datedebut'];
			$duree = $_POST['duree'];
			$matricule = $_POST['matricule'];
			$marque = $_POST['marque'];
			$nbpersonne = $_POST['nbpersonne'];
			$mode = $_POST['typetrajet'];
			$descriptiontrajet = $_POST['descriptiontrajet'];
      $cid=$_POST['routeid'];
			
			if ($mode == "ponctuel") {
				$typetrajet = "ponctuel";
			}
			else if ($mode == "régulier") {
				$typetrajet = "régulier";
        
			}
  $query0="UPDATE notifications SET statut='Trajet modifié' WHERE cid='$id' AND  statut='Approuvé'" ;
  // echo $query0;exit(-1);
  $query1="UPDATE route SET via='$source' WHERE cid='$id' AND numeroserie=1";

  $query2="UPDATE route SET via='$destination' WHERE cid='$id' AND numeroserie=2";

  $query3 = "UPDATE offres SET source='$source',destination='$destination',datedebut='$datedebut',
            duree='$duree',matricule='$matricule',marque='$marque',nbpersonne='$nbpersonne',
            typetrajet='$mode',descriptiontrajet='$descriptiontrajet',statut='En attente' WHERE id=$id ";
  mysqli_query($conn, $query0);
  mysqli_query($conn, $query1);
 mysqli_query($conn, $query2);
 mysqli_query($conn, $query3);

}
    ?>      
      <h2 align="center"><small>Modifier votre trajet</small></h2>
                
                <br/>
      <form method="post" action="modifiertrajet.php" >
                  <input type="hidden" name="id" value="<?php echo $id;?>" />
                  <input type="hidden" name="action" value="partager" />
                  <input type="hidden" id="total" name="nbRequetes" value=0 />
                    <header class="container-fluid my-5 text-center">
                    </header>
                          <div class="container-fluid my-5">
                              <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8">
                                    <div class="form-floating mb-3">              
                        <select class="form-select" name="source" id="floatingSelect" aria-label="Floating label select example" style="height: 60px;">
                                          <option value="<?php echo $source;?>"><?php echo $source;?></option>
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
                    <select name="destination" class="mt-3 mb-3 form-select" id="floatingSelect" aria-label="Floating label select example" style="height: 60px;">
                                          <option value="<?php echo $destination;?>"><?php echo $destination;?></option>
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
                            <br/>
                            </div>
                          <div class="mb-3" style="display: flex;">
                              <div class="me-3 col-sm-10 form-group">
                                  <label for="Date">Date de départ</label>
                                  <input type="Date" name="datedebut"  value="<?php if( isset($_POST['datedebut'])) {echo $_POST['datedebut'];}
                                                  else echo date("Y").'-'.date("m").'-'.date("d")?>" class="form-control" id="Date"  required>
                              </div>        
                          <div class="mb-3 pe-3 col-sm-2 form-group">
                            <label for="sex">Heure de départ</label>
                            <input type="time"name="duree" class="form-control" id="Date"  value="<?php echo $duree;?>" required>
                        </div>
                      </div>
                      <div class="mb-3" style="display: flex;">
                        <div class="me-3 col-sm-6 form-floating">
                            <input type="text" class="form-control" value="<?php echo $marque;?>" name="marque" id="name-f" placeholder="Entrez votre prénom" required>
                            <label for="name-f">Véhicule</label>
                        </div>
                        <div class="pe-3 mb-3 col-sm-6 form-floating">
                            <input type="text" class="form-control" name="matricule" value="<?php echo $matricule;?>" id="name-l" placeholder="Entrez votre nom" required>
                            <label for="name-l">Matricule du véhicule</label>
                        </div>
                      </div>
                      <div class="mb-3" style="display: flex;">
                        <div class="col-sm-4 form-floating">
                          <input type="number" value="<?php echo $nbpersonne;?>" id="typeNumber" min="1" name="nbpersonne"  max="4" class="form-control" >
                          <label class="form-label"  for="typeNumber">Places</label>
                        </div>
                        <div class="ms-3 col-sm-8 form-floating">
                          <div class="mt-3 mb-3" style="display: flex;">
                            <div class="ms-5 me-5 form-check">
                              <input class="form-check-input" <?php if (isset($typetrajet) && $typetrajet=="ponctuel") echo "checked";?> type="radio" name="typetrajet" value="ponctuel" name="flexRadioDefault" id="flexRadioDefault1">
                              <label class="form-check-label" for="flexRadioDefault1">Trajet Ponctuel</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" <?php if (isset($typetrajet) && $typetrajet=="régulier") echo "checked";?> type="radio" name="typetrajet" value="régulier" id="flexRadioDefault2" checked>
                              <label class="form-check-label" for="flexRadioDefault2">Trajet Régulier</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="mt-3 mb-5 form-floating">
                        <textarea class="form-control" name="descriptiontrajet" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2"><?php echo $descriptiontrajet;?></label>
                      </div>
                      <div class="form-floating d-grid gap-2 ">          
                        <input class="btn btn-warning btn-block mb-3" type="submit" name="modifier" value="Modifier"/>
                      </div>
                </div>
                <div class="col-lg-2"></div>
              </div>
            </div>
          </div>
        </div>
      </form>



    
		

<?php
	include('includes/footer.php');
?> 