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
	
	$tpl->setVar('S_Distributeur',$S_Distributeur);
	
// Ajouter un distributeur avec le bouton "Envoyer"

$request=("SELECT * FROM boulanger WHERE id_distributeur='$id'");
$result = $pdo->prepare($request);
$result->execute();
$results = $result->fetchAll();

	if ( @$_GET['id_distributeur']) {
		$id = $_GET['msg'];
		$tpl->setVar('id_distributeur',$id);
		
		$tpl->setVar('DA_name_1',$test);
		$tpl->setVar('DA_loc_1',$results['localisation']);
		$tpl->setVar('DA_stock_1',$$results['stock']);
		$tpl->setVar('DA_marche_1',$results['etat']);
		
		if ( $pdo )
			$pdo->query("SELECT * FROM boulanger WHERE id_distributeur='$id'");
			$nameD = $_POST['nom_distri'];
			$stock = $_POST['stock'];
			$etat = $_POST['etat'];
			$localisation = $_POST['localisation'];
		}		
		
	if ( @$_POST['submit2'] == "Envoyer" ){
				
	  try {
		  $nameD = stripslashes($_POST['nom_distri']);
		  $stock = stripslashes($_POST['stock']);
		  $etat = stripslashes($_POST['etat']);
		  $localisation = stripslashes($_POST['localisation']);
		  
		  $request=("UPDATE distributeur SET place='$nameD', localisation='$localisation', stock='$stock', etat='$etat' WHERE id_distributeur='$id'");		  
		  $result = $pdo->prepare($request2);
		  $result->execute();

		  if ( $result ) {	
			  //redirection vers la page liste si la requête SQL à fonctionnée
			  header("Location: index_admin.php");
			}else{
				echo "Erreur lors de l'ajout";
			}
		}
		
	  catch(Exception	$e){
			echo "erreur";
		}
	}

	echo $tpl->render();
	
?>