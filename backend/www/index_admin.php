<?php	
//introduction du fichier config.php
include 'config.php';
require './lib/hyla_tpl.class.php';
require './php/msgfr.php';


//Intégration de la bibliothèque Hyla_Tpl

	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('accueil_admin.html');
	
	$tpl->setVar('admin', $admin);
	$tpl->setVar('liste', $liste);
	$tpl->setVar('par', $par);
	$tpl->setVar('arch', $arch);
	$tpl->setVar('name', $name);
	$tpl->setVar('stack', $stack);
	$tpl->setVar('marche', $marche);
	$tpl->setVar('titledistri', $titledistri);
	$tpl->setVar('titleboul', $titleboul);
	$tpl->setVar('titleboul', $name);
	$tpl->setVar('nameB', $nameB);
	$tpl->setVar('mailB', $mailB);
	$tpl->setVar('telB', $telB);
	
	$tpl->setVar('page', $page);
	$tpl->setVar('title', $title);
	$tpl->setVar('footertitle', $footertitle);
	$tpl->setVar('projet', $projet);
	
	$tpl->setVar('stock', $stock);
	$tpl->setVar('etat', $etat);
	$tpl->setVar('loc', $loc);
	$tpl->setVar('boulanger', $boulanger);

// Distributeur 
//---------------------------------------------------------------------------
//Connexion
	try{		
		$pdo = new PDO('mysql:host=172.20.233.109;dbname=distribaguette;','client','client1');
	}
	catch(Exception	$e)
	{
		echo "erreur";
	}
//---------------------------------------------------------------------------
//BDD connexion Site
	
	$request=("SELECT D.place, D.localisation, D.stock, D.etat, B.nom, B.adresse_mail, B.telephone FROM distributeur D, boulanger B WHERE B.id_boulanger = D.id_distributeur");

	
	$result = $pdo->prepare($request);
	$result->execute();
	$results = $result->fetchAll();
		
	foreach($results as $donnee){

		$tpl->setVar('titleboul', $titleboul);
		
		$tpl->setVar('nom_distri', $donnee['place']);
		$tpl->setVar('loc1', $donnee['localisation']);
		$tpl->setVar('stack1', $donnee['stock']);
		$tpl->setVar('marche1', $donnee['etat']);
		$tpl->setVar('name1', $donnee['place']);
		
		$tpl->render('distrib', $donnee);
		
		$tpl->setVar('nameB1', $donnee['nom']);
		$tpl->setVar('telB1', $donnee['telephone']);
		$tpl->setVar('mailB1', $donnee['adresse_mail']);
		

		$tpl->render('boulanger', $donnee);
	}

	echo $tpl->render();

?>
