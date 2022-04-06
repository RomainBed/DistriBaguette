<?php	
/* INFORMATIONS DE LA PAGE
=> PAGE ADMIN PARAMETRAGE

Affiche deux cadres où l'on peut ajouter un boulanger et un distributeur dans la bdd

	Conditions d'ajout pour le boulanger:
		- Nom
		- Prénom
		- Numéro de téléphone
		- Adresse mail
		
	Conditions d'ajout pour le distributeur:
		- Nom
		- Localisation
		- Stock
		- Etat
*/

session_start();
//Intégration de la bibliothèque Hyla_Tpl

	require 'lib/hyla_tpl.class.php';
	require 'php/msgfr.php';
	require 'connection.php';

//Affectation du fichier HTML
	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('parametrage.html');

// association des variables HTML vers PHP
	//Titres principaux
	$tpl->setVar('A_page', $A_page);
	$tpl->setVar('A_footertitle', $A_footertitle);
	$tpl->setVar('A_projet',$A_projet);
	
	//Titre pour la page concernée
	$tpl->setVar('S_admin',$S_admin);
	$tpl->setVar('S_connect',$S_connect);
	
	//Onglets 
	$tpl->setVar('AA_par',$AA_par);
	$tpl->setVar('AA_liste',$AA_liste);
	$tpl->setVar('AA_arch',$AA_arch);
	$tpl->setVar('AA_admin',$AA_admin);
	$tpl->setVar('AA_monna',$AA_monna);
	$tpl->setVar('S_admin',$S_admin);
	
	$tpl->setVar('S_Boulanger',$S_Boulanger);
	$tpl->setVar('S_Distributeur',$S_Distributeur);
	
	// $pdo = new PDO("mysql:host=172.20.233.109;dbname=distribaguette", $_SESSION['username'], $_SESSION['password']);

// Ajouter un boulanger avec le bouton "Envoyer"

	if ( @$_POST['submit'] == "Envoyer" ){
		
	$nameB = stripslashes($_POST['nom_boulanger']);
	$user = stripslashes($_POST['prenom']);
	$email = stripslashes($_POST['mail']);
	$telephone = stripslashes($_POST['telephone']);

	  try {
		  // $result = $pdo->prepare($file->$param_boulanger);
		  $request=("INSERT INTO boulanger (nom, prenom, adresse_mail, telephone) VALUES('$nameB', '$user', '$email', '$telephone')");		  
		  $result = $pdo->prepare($request);
		  $result->execute();

		  if ( $result ) {	
			   
			  header("Location: index_admin.php");
			}else{
				echo "Erreur lors de l'ajout";
			}
		}
		
	catch(Exception	$e)
	{
		echo "erreur";
	}
	}
	
// Ajouter un distributeur avec le bouton "Envoyer"

	if ( @$_POST['submit2'] == "Envoyer" ){
		
	$nameD = stripslashes($_POST['nom_distri']);
	$stock = stripslashes($_POST['stock']);
	$etat = stripslashes($_POST['etat']);
	$localisation = stripslashes($_POST['localisation']);

	  try {
		  // $result2 = $pdo->prepare($file->$param_distributeur);
		  $request=("INSERT INTO distributeur (place, localisation, stock, etat) VALUES('$nameD', '$localisation', '$stock', '$etat')");		  
		  $result = $pdo->prepare($request2);
		  $result->execute();

		  if ( $result ) {	
			  //redirection vers la page liste si la requête SQL à fonctionnée
			  header("Location: index_admin.php");
			}else{
				echo "Erreur lors de l'ajout";
			}
		}
		
	catch(Exception	$e)
	{
		echo "erreur";
	}
	}

	echo $tpl->render();
	

?>