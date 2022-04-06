<?php
/* INFORMATIONS DE LA PAGE
=> PAGE ADMIN CONNECTION

Affiche une page de connection où un LOGIN et un MDP est demmandé pour se connecter à la bdd

*/

session_start();

//Intégration de la bibliothèque Hyla_Tpl

	require 'lib/hyla_tpl.class.php';
	require 'php/msgfr.php';
	require 'connection.php';
	
	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('service.html');
	
// association des variables HTML vers PHP
	//Title global
	$tpl->setVar('A_page', $A_page);
	$tpl->setVar('A_footertitle', $A_footertitle);
	$tpl->setVar('A_projet',$A_projet);
	
	//Titre pour la page
	$tpl->setVar('S_admin',$S_admin);
	$tpl->setVar('S_connect',$S_connect);
	
	if ( @$_POST['submit'] == "Login" ){
		
	  $username = stripslashes($_POST['username']);	  
	  $password = stripslashes($_POST['password']);
	  
	  //Connexion à la base de données comme admin
	  try {
		  $pdo = new PDO("mysql:host=172.20.233.109;dbname=distribaguette", $username, $password);

		  if ( $pdo ) {
			   $_SESSION['username'] = $username;
			   $_SESSION['password'] = $password;

			  header("Location: index_admin.php");
			}
		}
	catch(Exception	$e)
	{
		echo "erreur";
	}
	}
	echo $tpl->render();
?>