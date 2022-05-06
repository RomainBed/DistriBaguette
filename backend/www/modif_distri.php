<?php	
/* INFORMATIONS DE LA PAGE
=> PAGE ADMIN PARAMETRAGE

Affiche deux cadres où l'on peut ajouter un distributeur dans la bdd
		
	Conditions d'ajout pour le distributeur:
		- Nom
		- Localisation
		- Stock
		- Etat
*/

session_start();
//Intégration de la bibliothèque Hyla_Tpl

	require 'lib/hyla_tpl.class.php';
	require 'php/msgfr.php';
	require 'connection.php';

//Affectation du fichier HTML
	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('modifdistri.html');

// association des variables HTML vers PHP
	//Titres principaux
	$tpl->setVar('A_page', $A_page);
	$tpl->setVar('A_footertitle', $A_footertitle);
	$tpl->setVar('A_projet',$A_projet);
	
	//Titre pour la page concernée
	$tpl->setVar('S_admin',$S_admin);
	$tpl->setVar('S_connect',$S_connect);
	
	//Onglets 
	$tpl->setVar('AA_par',$AA_par);
	$tpl->setVar('S_admin',$S_admin);
	
	$tpl->setVar('S_DistributeurModif',$S_DistributeurModif);
	
// Ajouter un distributeur avec le bouton "Envoyer"

	if ( @$_GET['id_distributeur']) {
		$id = $_GET['id_distributeur'];
		$request = file_get_contents("sql/select_id_distributeur.txt");
		$result = $pdo->prepare($request);
		$result->execute(array($id));
		
		foreach ( $result->fetchAll() as $donnee ) {
			$tpl->setVar('DA_name_1', $donnee['place']);
			$tpl->setVar('DA_loc_1', $donnee['localisation']);
			$tpl->setVar('DA_stock_1', $donnee['stock']);
			}

		}		
		
	if ( @$_POST['submit'] == "Envoyer" ){
				
	  try {
		  $nameD = stripslashes($_POST['nom_distri']);
		  $stock = stripslashes($_POST['stock']);
		  $localisation = stripslashes($_POST['localisation']);
		  
			// $request=file_get_contents("sql/update_distributeur.txt");
			$request=("UPDATE distributeur SET place='$nameD', localisation='$localisation', stock='$stock' WHERE id_distributeur='$id';ALTER TABLE distributeur DROP id_distributeur;ALTER TABLE distributeur ADD COLUMN id_distributeur int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST");		  
						$result = $pdo->prepare($request);
			$result->execute();

		  if ( $result ) {	
			  //redirection vers la page liste si la requête SQL à fonctionnée
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