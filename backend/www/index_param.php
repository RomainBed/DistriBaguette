<?php	
session_start();
//Intégration de la bibliothèque Hyla_Tpl

	require './lib/hyla_tpl.class.php';
	require './php/msgfr.php';
	require 'config.php';

	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('parametrage.html');

// Lien des variables HTML -> PHP
	//Title global
	$tpl->setVar('A_page', $A_page);
	$tpl->setVar('A_footertitle', $A_footertitle);
	$tpl->setVar('A_projet',$A_projet);
	
	//Titre pour la page
	$tpl->setVar('S_admin',$S_admin);
	$tpl->setVar('S_connect',$S_connect);
	
	//Onglet 
	$tpl->setVar('AA_par',$AA_par);
	$tpl->setVar('AA_liste',$AA_liste);
	$tpl->setVar('AA_arch',$AA_arch);
	$tpl->setVar('AA_admin',$AA_admin);
	$tpl->setVar('S_admin',$S_admin);
	
	$tpl->setVar('S_Boulanger',$S_Boulanger);
	$tpl->setVar('S_Distributeur',$S_Distributeur);
	
	$pdo = new PDO("mysql:host=172.20.233.109;dbname=distribaguette", $_SESSION['username'], $_SESSION['password']);
	
	if ( @$_POST['submit'] == "Envoyer" ){
		
	$user = stripslashes($_POST['prenom']);
	$name = stripslashes($_POST['nom']);
	$email = stripslashes($_POST['mail']);
	$numero = stripslashes($_POST['tel']);
	  
	  try {
		  $pdo = new PDO("mysql:host=172.20.233.109;dbname=distribaguette", $_SESSION['username'], $_SESSION['password']);
			
		  if ( $post ) {		
				$post = $pdo->query("INSERT INTO boulanger VALUES(DEFAULT, $name, $user, $email, $numero)");
			  header("Location: index_admin.php");
			}
		}
		
	  catch(PDOexception $e) {
		  
		echo $e->getMessage();
		
		}
	}
			
	  // $nom1 = stripslashes($_POST['nom1']);	  
	  // $stock = stripslashes($_POST['stock']);
	  // $etat = stripslashes($_POST['etat']);
	  // $localisation = stripslashes($_POST['localisation']);
	  

	echo $tpl->render();
		
		
		
		
		


?>