<?php
if(isset($_GET['deconnexion']))
          echo("
		  		<div class=\"alert alert-info alert-dismissible fade show\" role=\"alert\">
					<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\">
						<path d=\"M16 9v-4l8 7-8 7v-4h-8v-6h8zm-16-7v20h14v-2h-12v-16h12v-2h-14z\"/>
					</svg>
					\nVous vous êtes déconnecté.\n
					<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
				</div>");
?>