<?php	
/* INFORMATIONS DE LA PAGE
=> PAGE ADMIN PARAMETRAGE

Affiche deux cadres où l'on peut ajouter un boulanger dans la bdd

	Conditions de modification pour le boulanger, prérequis:
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
	$tpl->importFile('modifboulanger.html');

// association des variables HTML vers PHP
	//Titres principaux
	$tpl->setVar('A_page', $A_page);
	$tpl->setVar('A_footertitle', $A_footertitle);
	$tpl->setVar('A_projet',$A_projet);
	
	$tpl->setVar('S_BoulangerModif',$S_BoulangerModif);

	//BDD connexion au Site
	$dal = new DAL($_SESSION['username'], $_SESSION['password']);
	
// Ajouter un boulanger avec le bouton "Envoyer"

	if ( @$_GET['id_boulanger']) {
		$id = $_GET['id_boulanger'];
		$dal->select_id_boulanger();
		
		foreach ( $result->fetchAll() as $donnee ) {
			$tpl->setVar('BA_name_B_1', $donnee['nom']);
			$tpl->setVar('BA_prenom_B_1', $donnee['prenom']);
			$tpl->setVar('BA_mail_B_1', $donnee['adresse_mail']);
			$tpl->setVar('BA_tel_B_1', $donnee['telephone']);
			}
		}		

	if ( @$_POST['submit'] == "Envoyer" ){
		
	$nameB = stripslashes($_POST['nom_boulanger']);
	$user = stripslashes($_POST['prenom']);
	$email = stripslashes($_POST['mail']);
	$telephone = stripslashes($_POST['telephone']);
	$numero = stripslashes($_POST['numero']);

	  try {
		  
		  $dal->modif_boulanger($id_boulanger, $nameB, $user, $email, $telephone, $numero);
		
		  if ( $result ) {	
			  header("Location: liste_distributeur.php");
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