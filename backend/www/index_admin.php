<?php
/* INFORMATIONS DE LA PAGE
=> PAGE ADMIN LISTE

Affiche deux tableaux où l'on peut voir et supprimer un boulanger ou un distributeurs

*/

session_start();
//Intégration de la bibliothèque Hyla_Tpl

	require 'lib/hyla_tpl.class.php';
	require 'php/msgfr.php';
	require 'connection.php';
	
	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('index_admin.html');

// association des variables HTML vers PHP

	$tpl->setVar('AA_admin', $AA_admin);
	$tpl->setVar('AA_liste', $AA_liste);
	$tpl->setVar('AA_par', $AA_par);
	$tpl->setVar('AA_arch', $AA_arch);
	$tpl->setVar('AA_monna',$AA_monna);
	
	$tpl->setVar('DA_name', $DA_name);
	$tpl->setVar('DA_stack', $DA_stack);
	$tpl->setVar('DA_marche', $DA_marche);
	$tpl->setVar('AA_titledistri', $AA_titledistri);
	$tpl->setVar('AA_titleboul', $AA_titleboul);
	$tpl->setVar('AA_titleboul', $DA_name);
	$tpl->setVar('BA_name_B', $BA_name_B);
	$tpl->setVar('BA_mail_B', $BA_mail_B);
	$tpl->setVar('BA_tel_B', $BA_tel_B);
	
	$tpl->setVar('A_page', $A_page);
	$tpl->setVar('A_title', $A_title);
	$tpl->setVar('A_footertitle', $A_footertitle);
	$tpl->setVar('A_projet', $A_projet);
	
	$tpl->setVar('D_stock', $D_stock);
	$tpl->setVar('D_etat', $D_etat);
	$tpl->setVar('DA_loc', $DA_loc);
	$tpl->setVar('D_boulanger', $D_boulanger);
	
	$tpl->setVar('A_projet',$A_projet);
	

//BDD connexion au Site
	$pdo = new PDO("mysql:host=172.20.233.109;dbname=distribaguette", $_SESSION['username'], $_SESSION['password']);
	
// suppression d'un id_boulanger
	if ( @$_GET['id_boulanger']) {
		$id = $_GET['id_boulanger'];
		if ( $pdo )
			$pdo->query("DELETE FROM boulanger WHERE id_boulanger = $id");
		}
// suppression d'un id_distributeur	
	if ( @$_GET['id_distributeur']) {
		$id = $_GET['id_distributeur'];
		if ( $pdo )
			$pdo->query("DELETE FROM distributeur WHERE id_distributeur = $id");
		}
	
// -- lecture base de données

// Liste de Boulanger

	$request= ("SELECT id_boulanger, nom, adresse_mail, telephone FROM boulanger");

	$result = $pdo->prepare($request);
	$result->execute();
	$results = $result->fetchAll();
	
	// Boucle tant qu'il y a des données il continue à incrementer
	foreach($results as $donnee){

		$tpl->setVar('AA_titleboul', $AA_titleboul);
				
		$tpl->setVar('BA_tel_B_1', $donnee['telephone']);
		$tpl->setVar('BA_name_B_1', $donnee['nom']);
		$tpl->setVar('BA_mail_B_1', $donnee['adresse_mail']);
		$tpl->setVar('id_boulanger', $donnee['id_boulanger']);
		
		$tpl->render('boulanger', $donnee);
	}
//Liste de Distributeur

	$request = ("SELECT id_distributeur, place, localisation, stock, etat FROM distributeur");
	
	$result = $pdo->prepare($request);
	$result->execute();
	$results = $result->fetchAll();

foreach($results as $donnee){
		
		$tpl->setVar('A_nom_distri', $donnee['place']);
		
		$tpl->setVar('DA_loc_1', $donnee['localisation']);
		$tpl->setVar('DA_stack_1', $donnee['stock']);
		$tpl->setVar('DA_marche_1', $donnee['etat']);
		$tpl->setVar('DA_name_1', $donnee['place']);
		$tpl->setVar('id_distributeur', $donnee['id_distributeur']);
		
		$tpl->render('distrib', $donnee);
		
	}



	echo $tpl->render();

?>
