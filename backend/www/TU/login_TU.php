<?php
include 'config.php';
require 'lib/hyla_tpl.class.php';
require 'php/msgfr.php';
//Intégration de la bibliothèque Hyla_Tpl

	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('service.html');
				
$tpl->setVar('connect', $connect);

session_start();
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		// connexion à la base de données
		try{
			$pdo = new PDO('mysql:host=172.20.233.109;dbname=distribaguette;','admin','root');
		}
		catch(Exception	$e)
		{
			echo "erreur";
		}
		
		// on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
		// pour éliminer toute attaque de type injection SQL et XSS
		$username = $pdo->quote($db,htmlspecialchars($_POST['username'])); 
		$password = $pdo->quote($db,htmlspecialchars($_POST['password']));
		
		if($username !== "" && $password !== "")
		{			
			$count = $reponse['count(*)'];
			if($count!=0) // nom d'utilisateur et mot de passe correctes
			{
			   $_SESSION['username'] = $username;
			   header('Location: principale.php');
			}
			else
			{
			   header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
			}
		}
		else
		{
		   header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
		}
	}
else
{
   header('Location: login.php');
}
$db = null; // fermer la connexion
?>