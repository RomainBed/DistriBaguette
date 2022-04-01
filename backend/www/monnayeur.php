<?php	
session_start();
//Intégration de la bibliothèque Hyla_Tpl

	require './lib/hyla_tpl.class.php';
	require './php/msgfr.php';
	require 'config.php';

	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('monnayeur.html');

// Lien des variables HTML -> PHP

	$tpl->setVar('AA_par',$AA_par);
	$tpl->setVar('AA_liste',$AA_liste);
	$tpl->setVar('AA_arch',$AA_arch);
	$tpl->setVar('AA_admin',$AA_admin);
	$tpl->setVar('AA_monna',$AA_monna);
	
	$tpl->setVar('A_page', $A_page);
	$tpl->setVar('A_footertitle',$A_footertitle);
	$tpl->setVar('A_projet',$A_projet);
	
	$tpl->setVar('SA_monnayeur',$SA_monnayeur);
	$tpl->setVar('SA_nomDistri',$SA_nomDistri);
	$tpl->setVar('SA_nombre_bag_achete',$SA_nombre_bag_achete);
	$tpl->setVar('SA_prix',$SA_prix);


//BDD connexion Site
		
		$request=("SELECT place FROM distributeur");
		$pdo = new PDO("mysql:host=172.20.233.109;dbname=distribaguette", $_SESSION['username'], $_SESSION['password']);
		$result = $pdo->prepare($request);
		$result->execute();
		$results = $result->fetchAll();

	// Set du ID 
		$id = 0;
		
	// Boucle tant qu'il y a des données il continue à incrementer

		foreach($results as $donnee)
		{			
				$tpl->setVar('SA_nomDistri_1',$donnee['place']);
		
				$tpl->setVar('id',$id);
							
	// Rendu du distributeur avec les données
				$tpl->render('distrib', $donnee);
				$id++;
		}

		echo $tpl->render();

?>