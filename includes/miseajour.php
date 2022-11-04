<?php
/*
 * Script de mise à jour
 */
include('fonctions.php');
$conn = connexionBDD();

if (isset($_POST['action'])) {
		if ($_POST['action'] == 'partager') {
			$uid = getIdUtilisateur();
			$source = $_POST['source'];
			$destination = $_POST['destination'];
			$datedebut = $_POST['datedebut'];
			$duree = $_POST['duree'];
			$matricule = $_POST['matricule'];
			$marque = $_POST['marque'];
			$nbpersonne = $_POST['nbpersonne'];
			$mode = $_POST['typetrajet'];
			$aujourdhui = date("Y-m-d H:i:s");
			$descriptiontrajet = $_POST['descriptiontrajet'];
			// $statut=$_POST['statut'];
			
			if ($mode == "ponctuel") {
				$typetrajet = "ponctuel";
			}
			else if ($mode == "régulier") {
				$typetrajet = "régulier";
			}
			

			$conn->query("INSERT INTO offres (uid,source,destination,datedebut,duree,matricule,marque,nbpersonne,typetrajet,descriptiontrajet,statut,time) VALUES 
				('".$uid."','".$source."','".$destination."','".$datedebut."','".$duree."','".$matricule."','".$marque."','".$nbpersonne."','".$typetrajet."','".$descriptiontrajet."','En attente','".$aujourdhui."' )") or die('Error: ' . mysqli_error($conn));

			$requete = "SELECT id FROM offres WHERE uid= ".$uid." AND source ='".$source."' AND destination ='".$destination."' 
			AND datedebut ='".$datedebut."' AND duree='".$duree."' AND matricule='".$matricule."' AND marque='".$marque."'
			 AND nbpersonne =".$nbpersonne."
			 AND typetrajet ='".$typetrajet."' AND descriptiontrajet ='".$descriptiontrajet."'";
			
			$result = $conn->query($requete) or die('Error: ' . mysqli_error($conn));
			$rep = mysqli_fetch_array($result);
			$cid = $rep['id'];
			$conn->query("INSERT INTO route (cid,via,numeroserie) VALUES(".$cid.",'".$source."',1)") or die("Erreur insertion dans la table route 1".mysqli_error($conn));
			$num = $_POST['nbRequetes'];
			for($i = 1; $i <= $num; $i++){
				$id = "dynamic".(string)$i;
				$donnees = $_POST[$id];
				$j = $i+1;
				$conn->query("INSERT INTO route (cid,via,numeroserie) VALUES(".$cid.",'".$donnees."',".$j.")") or die("Erreur insertion dans la table route 2".mysqli_error());
			}
			$j = $i+1;
			$conn->query("INSERT INTO route (cid,via,numeroserie) VALUES(".$cid.",'".$destination."',".$j.")") or die("Erreur insertion dans la table route 3".mysqli_error());

			header("Location: ../index.php?partager=1");
	} 
	
}


?>
