<?php	
/* INFORMATIONS DE LA PAGE
=> PAGE ADMIN PARAMETRAGE

Affiche deux cadres où l'on peut ajouter un distributeur dans la bdd
		
	Conditions d'ajout pour le distributeur, prérequis:
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
	
	$tpl->setVar('S_Distributeur',$S_Distributeur);
	
	//BDD connexion au Site
	$dal = new DAL($_SESSION['username'], $_SESSION['password']);
	
// Ajouter un distributeur avec le bouton "Envoyer"

	if ( @$_POST['submit'] == "Envoyer" ){
		
	$nameD = stripslashes($_POST['nom_distri']);
	$stock = stripslashes($_POST['stock']);
	$localisation = stripslashes($_POST['localisation']);

		  try {
			  $dal->ajout_distributeur($id_dsitributeur, $stock, $localisation, $nameD);

			  if ( $dal ) {	
			  
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