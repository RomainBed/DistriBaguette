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

//Affectation du fichier HTML
	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('ajout_distri.html');

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

	if ( @$_POST['submit'] == "Envoyer" ){
		
	$nameD = stripslashes($_POST['nom_distri']);
	$stock = stripslashes($_POST['stock']);
	$localisation = stripslashes($_POST['localisation']);

	  try {
		  // $result2 = $pdo->prepare($file->$param_distributeur);
		  $request=("ALTER TABLE distributeur DROP id_distributeur;ALTER TABLE distributeur ADD COLUMN id_distributeur int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST;INSERT INTO distributeur (place, localisation, stock) VALUES('$nameD', '$localisation', '$stock')");		  
		  $result = $pdo->prepare($request);
		  $result->execute();

		  if ( $result ) {	
			  //redirection vers la page liste si la requête SQL à fonctionnée
			  header("Location: index_admin.php");
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