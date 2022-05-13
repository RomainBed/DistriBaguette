<?php
/* INFORMATIONS DE LA PAGE
=> PAGE ADMIN CONNECTION

Affiche une page de connection où un LOGIN et un MDP est demmandé pour se connecter à la bdd

*/

session_start();

//Intégration de la bibliothèque Hyla_Tpl

	require 'lib/hyla_tpl.class.php';
	require 'php/msgfr.php';
	
	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('service.html');
	
// association des variables HTML vers PHP
	//Title global
	$tpl->setVar('A_page', $A_page);
	$tpl->setVar('A_footertitle', $A_footertitle);
	$tpl->setVar('A_projet',$A_projet);
	
	if ( @$_POST['submit'] == "Login" ){
		
	  $username = stripslashes($_POST['username']);	  
	  $password = stripslashes($_POST['password']);
	  
	  //Connexion à la base de données comme admin
		  try {
			  $dal = new DAL($dbname, $username, $password);

			  if ( $pdo ) {
				   $_SESSION['username'] = $username;
				   $_SESSION['password'] = $password;

				  header("Location: liste_boulanger.php");
				}
			}
		catch(Exception	$e)
		{
			header("Location: erreur.php");
		}
	}
	echo $tpl->render();
?>