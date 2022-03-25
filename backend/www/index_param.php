<?php	
//Intégration de la bibliothèque Hyla_Tpl

	require './lib/hyla_tpl.class.php';
	require './php/msgfr.php';
	require 'config.php';

	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('parametrage.html');

// Lien des variables HTML -> PHP
	//Title global
	$tpl->setVar('A_page', $A_page);
	$tpl->setVar('A_footertitle', $A_footertitle);
	$tpl->setVar('A_projet',$A_projet);
	
	//Titre pour la page
	$tpl->setVar('S_admin',$S_admin);
	$tpl->setVar('S_connect',$S_connect);
	
	//Onglet 
	$tpl->setVar('AA_par',$AA_par);
	$tpl->setVar('AA_liste',$AA_liste);
	$tpl->setVar('AA_arch',$AA_arch);
	$tpl->setVar('AA_admin',$AA_admin);
	$tpl->setVar('S_admin',$S_admin);
	
	$tpl->setVar('S_Boulanger',$S_Boulanger);
	$tpl->setVar('S_Distributeur',$S_Distributeur);
	
	$username = $_POST['prenom'];
	$name = $_POST['nom'];
	$email = $_POST['mail'];
	$numero = $_POST['tel'];
	
$post= $pdo->query("INSERT INTO boulanger VALUES(DEFAULT,'$name', '$username', '$email', '$numero)");
		
	if($post) {
			header("location:index_param.php");
		} else {
			echo "Erreur create";
		}

		echo $tpl->render();

?>