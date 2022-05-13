<?php
/* INFORMATIONS DE LA PAGE
=> PAGE ADMIN LISTE

Affiche deux tableaux où l'on peut voir,modifier et supprimer un/des boulanger/s

*/

session_start();
//Intégration de la bibliothèque Hyla_Tpl

	require 'lib/hyla_tpl.class.php';
	require 'php/msgfr.php';
	require 'DAL_class.php';
	
	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('liste_boulanger.html');

// association des variables HTML vers PHP

	// boulanger
	$tpl->setVar('BA_num_B', $BA_num_B);
	$tpl->setVar('BA_name_B', $BA_name_B);
	$tpl->setVar('BA_mail_B', $BA_mail_B);
	$tpl->setVar('BA_tel_B', $BA_tel_B);
	
	
	// footer/page
	$tpl->setVar('A_page', $A_page);
	$tpl->setVar('A_title', $A_title);
	$tpl->setVar('A_footertitle', $A_footertitle);
	$tpl->setVar('A_projet', $A_projet);
	

//BDD connexion au Site
	$dal = new DAL($_SESSION['username'], $_SESSION['password']);
	
// suppression d'un id_boulanger
	if ( @$_GET['id_boulanger']) {
		$id = $_GET['id_boulanger'];
		$dal->suppr_boulanger($id_boulanger);
	}
		
// Liste de Boulanger

	$dal->liste_boulanger();
	
	// Boucle tant qu'il y a des données il continue à incrementer
	foreach($dal as $donnee){
				
		$tpl->setVar('BA_num_B_1', $donnee['id_boulanger']);
		$tpl->setVar('BA_tel_B_1', $donnee['telephone']);
		$tpl->setVar('BA_name_B_1', $donnee['nom']);
		$tpl->setVar('BA_prenom_B_1', $donnee['prenom']);
		$tpl->setVar('BA_mail_B_1', $donnee['adresse_mail']);
		$tpl->setVar('id_boulanger', $donnee['id_boulanger']);
		
		
		$tpl->render('boulanger', $donnee);
	}

	echo $tpl->render();

?>
