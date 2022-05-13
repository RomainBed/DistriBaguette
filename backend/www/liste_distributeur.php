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
	require 'DAL_class.php';
	
	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('index_admin.html');

	$dal = new DAL('DAL_class');

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
	$dal($_SESSION['username'], $_SESSION['password']);
	
// suppression d'un id_distributeur	
	if ( @$_GET['id_distributeur']) {
		$id = $_GET['id_distributeur'];
		$dal->suppr_distributeur;

//Liste de Distributeur

	$dal->liste_distributeur;

	foreach($dal as $donnee){
		
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
