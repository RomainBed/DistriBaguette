<?php	
//Intégration de la bibliothèque Hyla_Tpl

	require './lib/hyla_tpl.class.php';
	require './php/msgfr.php';
	require 'config.php';

	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('index.html');
	
//---------------------------------------------------------------------------
//Connexion

	try{		
		$pdo = new PDO('mysql:host=172.20.233.109;dbname=distribaguette;','admin','root');
	}
	catch(Exception	$e)
	{
		echo "erreur";
	}

//---------------------------------------------------------------------------

// Lien des variables HTML -> PHP

		$tpl->setVar('A_page', $A_page);
		$tpl->setVar('A_title', $A_title);
		$tpl->setVar('A_footertitle', $A_footertitle);
		$tpl->setVar('A_projet', $A_projet);
		
		$tpl->setVar('D_stock', $D_stock);
		$tpl->setVar('D_etat', $D_etat);
		$tpl->setVar('D_loca', $D_loca);
		$tpl->setVar('D_boulanger', $D_boulanger);
		
		$tpl->setVar('A_desc', $A_desc);

//BDD connexion Site
		
		// $file = file_get_contents("requete.txt");
		
		$request=("SELECT D.place, D.localisation, D.stock, D.etat, B.nom FROM distributeur D, boulanger B WHERE B.id_boulanger = D.id_distributeur");

		$result = $pdo->prepare($request);
		// $result = $pdo->prepare($file->$index_admin);

		$result->execute();
		$results = $result->fetchAll();
		

	// Set du ID 
		$id = 0;
		
	// Boucle tant qu'il y a des données il continue à incrementer

		foreach($results as $donnee)
		{			
								
			$tpl->setVar('id',$id);
			$tpl->setVar('A_nom_distri', $donnee['place']);
			$tpl->setVar('D_loca_1', $donnee['localisation']);
			$tpl->setVar('D_stock_1', $donnee['stock']);
			$tpl->setVar('D_etat_1', $donnee['etat']);
			$tpl->setVar('D_boulanger_1', $donnee['nom']);
			
	// Rendu du distributeur avec les données
			$tpl->render('distrib', $donnee);
			
			$id++;
		}
		
		echo $tpl->render();

?>
