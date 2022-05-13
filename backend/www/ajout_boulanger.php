<?php	
/* INFORMATIONS DE LA PAGE
=> PAGE ADMIN PARAMETRAGE

Affiche deux cadres où l'on peut ajouter un boulanger dans la bdd

	Conditions d'ajout pour le boulanger, prérequis:
		- Nom
		- Prénom
		- Numéro de téléphone
		- Adresse mail
*/

session_start();
//Intégration de la bibliothèque Hyla_Tpl

	require 'lib/hyla_tpl.class.php';
	require 'php/msgfr.php';
	require 'DAL_class.php';
	
	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('index_admin.html');

	$dal = new DAL('DAL_class');

// association des variables HTML vers PHP
	//Titres principaux
	$tpl->setVar('A_page', $A_page);
	$tpl->setVar('A_footertitle', $A_footertitle);
	$tpl->setVar('A_projet',$A_projet);
	
	$tpl->setVar('S_Boulanger',$S_Boulanger);
	
	//BDD connexion au Site
	$dal = new DAL($_SESSION['username'], $_SESSION['password']);
		
// Ajouter un boulanger avec le bouton "Envoyer"

	if ( @$_POST['submit'] == "Envoyer" ){
		
	$nameB = stripslashes($_POST['nom_boulanger']);
	$user = stripslashes($_POST['prenom']);
	$email = stripslashes($_POST['mail']);
	$telephone = stripslashes($_POST['telephone']);

	  try {
		  // $result = $pdo->prepare($file->$param_boulanger);
		  $dal->ajout_boulanger($id_boulanger, $nameB, $user, $email, $telephone);
		  
		  if ( $dal ) {	
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