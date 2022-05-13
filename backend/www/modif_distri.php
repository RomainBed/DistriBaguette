<?php	
/* INFORMATIONS DE LA PAGE
=> PAGE ADMIN PARAMETRAGE

Affiche un cadre où l'on peut modifier un distributeur dans la bdd
		
	Conditions de modification pour le distributeur, prérequis:
		- Nom
		- Localisation
		- Stock
		- Etat
*/

session_start();
//Intégration de la bibliothèque Hyla_Tpl

	require 'lib/hyla_tpl.class.php';
	require 'php/msgfr.php';
	require 'DAL_class.php';
	
	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('index_admin.html');

// association des variables HTML vers PHP
	//Titres principaux
	$tpl->setVar('A_page', $A_page);
	$tpl->setVar('A_footertitle', $A_footertitle);
	$tpl->setVar('A_projet',$A_projet);
	
	$tpl->setVar('S_DistributeurModif',$S_DistributeurModif);
	
	//BDD connexion au Site
	$dal = new DAL($_SESSION['username'], $_SESSION['password']);
	
// Ajouter un distributeur avec le bouton "Envoyer"

	if ( @$_GET['id_distributeur']) {
		$id = $_GET['id_distributeur'];
		$dal->select_id_distributeur();
		
		foreach ( $dal->fetchAll() as $donnee ) {
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
			
		  $dal->modif_distributeur($id_distributeur, $nameD, $localisation, $stock);

		  if ( $dal ) {	
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