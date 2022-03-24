<?php
//Intégration de la bibliothèque Hyla_Tpl

	require './lib/hyla_tpl.class.php';
	require './php/msgfr.php';
	require 'config.php';
	
	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('index_admin.html');

// Lien des variables HTML -> PHP

	$tpl->setVar('AA_admin', $AA_admin);
	$tpl->setVar('AA_liste', $AA_liste);
	$tpl->setVar('AA_par', $AA_par);
	$tpl->setVar('AA_arch', $AA_arch);
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
	$tpl->setVar('DA_loc_1', $DA_loc);
	$tpl->setVar('D_boulanger', $D_boulanger);
	
	$tpl->setVar('A_projet',$A_projet);
	

//BDD connexion Site
	
	$request=("SELECT D.place, D.localisation, D.stock, D.etat, B.nom, B.adresse_mail, B.telephone FROM distributeur D, boulanger B WHERE B.id_boulanger = D.id_distributeur");

	
	$result = $pdo->prepare($request);
	$result->execute();
	$results = $result->fetchAll();
		// Boucle tant qu'il y a des données il continue à incrementer
	foreach($results as $donnee){

		$tpl->setVar('AA_titleboul', $AA_titleboul);
		
		$tpl->setVar('A_nom_distri', $donnee['place']);
		$tpl->setVar('DA_loc_1', $donnee['localisation']);
		$tpl->setVar('DA_stack_1', $donnee['stock']);
		$tpl->setVar('DA_marche_1', $donnee['etat']);
		$tpl->setVar('DA_name_1', $donnee['place']);
		
		$tpl->render('distrib', $donnee);
		
		$tpl->setVar('BA_name_B_1', $donnee['nom']);
		$tpl->setVar('BA_tel_B_1', $donnee['telephone']);
		$tpl->setVar('BA_mail_B_1', $donnee['adresse_mail']);
		

		$tpl->render('boulanger', $donnee);
	}

	echo $tpl->render();

?>
