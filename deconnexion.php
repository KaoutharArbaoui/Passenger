<?php
/*
 * Script de déconnexion
 */
	session_start();
	$_SESSION = array();
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(),"",time()-42000,'/');
	}
	session_destroy();
	header("Location: connecter.php?deconnexion=1");
?>
