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
	
	// distri
	$tpl->setVar('DA_num', $DA_num);
	$tpl->setVar('DA_name', $DA_name);
	$tpl->setVar('DA_stock', $DA_stock);
	$tpl->setVar('DA_loc', $DA_loc);
	
	
	// footer/page
	$tpl->setVar('A_page', $A_page);
	$tpl->setVar('A_title', $A_title);
	$tpl->setVar('A_footertitle', $A_footertitle);
	$tpl->setVar('A_projet', $A_projet);
	

//BDD connexion au Site
	$pdo = new PDO("mysql:host=172.20.233.109;dbname=distribaguette", $_SESSION['username'], $_SESSION['password']);
	
// suppression d'un id_distributeur	
	if ( @$_GET['id_distributeur']) {
		$id = $_GET['id_distributeur'];
		if ( $pdo )
			$pdo->query("DELETE FROM distributeur WHERE id_distributeur = $id;ALTER TABLE distributeur DROP id_distributeur;ALTER TABLE distributeur ADD COLUMN id_distributeur int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST");
		}

//Liste de Distributeur

	$request = ("SELECT id_distributeur, place, localisation, stock, etat FROM distributeur");

	$result = $pdo->prepare($request);
	$result->execute();
	$results = $result->fetchAll();

	foreach($results as $donnee){
		
		$tpl->setVar('A_nom_distri', $donnee['place']);
		
		$tpl->setVar('DA_loc_1', $donnee['localisation']);
		$tpl->setVar('DA_stock_1', $donnee['stock']);
		$tpl->setVar('DA_name_1', $donnee['place']);
		$tpl->setVar('DA_num_1', $donnee['id_distributeur']);
		$tpl->setVar('id_distributeur', $donnee['id_distributeur']);
		
		$tpl->render('distrib', $donnee);
		
	}

	echo $tpl->render();

?>
