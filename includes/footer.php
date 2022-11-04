<!DOCTYPE html> 
	
	<!-- JS placé à la fin pour un chargement plus rapide -->
    
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<script src="../js/datetimepicker.js"></script>
	
	<script>
		// $(".dropdown-menu li a").click(function(){
		// 	alert("okok");
		// 		var texte = $(this).text();
		// 		$('#fartDropDown').html(texte);
        
		// });

		function ApprouveRequete (slno, stat) {
			if (stat == "0") {
				$.post("includes/miseajournotification.php", { type: "1", numeroNo: slno, stat: "Refusé" })
				.done(function(data) {
					//alert("Données chargées : " + data);
					location.reload();
				});     
            } 
            else if (stat == "1") {
				$.post("includes/miseajournotification.php", { type: "1", numeroNo: slno, stat: "Approuvé" })
				.done(function(data) {
					//alert("Données chargées : " + data);
					location.reload();
				});     
            }
            else {
				alert("Erreur 8656896753");
            }
		}

		// $('.dropdown-toggle').dropdown();
	  
    </script>

    <script type="text/javascript">
		$('#choixdatedebut').datetimepicker({
			format: 'yyyy-MM-dd',
		});
	  
		$('td:nth-child(1),th:nth-child(1)').hide(); // pour cacher les ID
		$('#tabListe').find('tr').click( function() {
			var colonne = $(this).find('td:first').text();
			window.location.href = "trajet.php?id="+colonne;
		});
    </script>
      
    <!-- popup pour confirmer -->
	<script>
      function confirmAction() {
        let confirmAction = confirm("Voulez-vous supprimer le trajet");
        if (confirmAction) {
          alert("trajet Supprimer");
        } else {
          alert("trajet non Supprimer");
        }
      }
    </script> 
</html>