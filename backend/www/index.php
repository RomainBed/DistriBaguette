<?php	
/* INFORMATIONS DE LA PAGE
=>PAGE CLIENT

Affiche la liste des distributeurs disponnible on retrouve:
	- Le nom du boulanger
	- la localisation du distributeur
	- le stock de baguette restant
	- L'état du distributeur (0=éteint, 1=allumé, 2=panne)
	- La carte MAP de google avec la loc du distributeur
*/

//Intégration de la bibliothèque Hyla_Tpl

	require 'lib/hyla_tpl.class.php';
	require 'php/msgfr.php';
	require 'DAL_class.php';

//Affectation du fichier HTML
	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('index.html');

	$dal = new DAL(distribaguette, client, client);
	
// association des variables HTML vers PHP

		$tpl->setVar('A_page', $A_page);
		$tpl->setVar('A_title', $A_title);
		$tpl->setVar('A_footertitle', $A_footertitle);
		$tpl->setVar('A_projet', $A_projet);
		
		$tpl->setVar('D_stock', $D_stock);
		$tpl->setVar('D_etat', $D_etat);
		$tpl->setVar('D_loca', $D_loca);
		$tpl->setVar('D_boulanger', $D_boulanger);
		
		$tpl->setVar('A_desc', $A_desc);

		$dal->affiche_client();
			

	// Set du ID 
		$id = 0;
		
	// Boucle tant qu'il y a des données il continue à incrementer

		foreach($dal as $donnee)
		{			
								
			$tpl->setVar('id',$id);
			$tpl->setVar('A_nom_distri', $donnee['place']);
			$tpl->setVar('D_loca_1', $donnee['localisation']);
			$tpl->setVar('D_stock_1', $donnee['stock']);
			$tpl->setVar('D_etat_1', $donnee['etat']);
			$tpl->setVar('D_boulanger_1', $donnee['nom']);
														 

			
	// Associer le bloc distrib avec les données récupérées 
			$tpl->render('distrib', $donnee);
			
			$id++;
		}
	//afficher le rendu
		echo $tpl->render();

?>
