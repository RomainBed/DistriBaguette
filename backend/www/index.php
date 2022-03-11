<?php	
//introduction du fichier config.php
include 'config.php';
include 'connection.php';
require './lib/hyla_tpl.class.php';


//Intégration de la bibliothèque Hyla_Tpl

	$tpl = new Hyla_Tpl('tpl');
	$tpl->importFile('page_web.html');
	
//---------------------------------------------------------------------------
//Distributeur
//---------------------------------------------------------------------------

	$Distributeur = 1;	
	//Nombre de distributeur
	while ($Distributeur <= 10) {

		$users= $con->query("SELECT * FROM utilisateur");
		
		//echo $user['name'];
		//echo $lieu[''];
		
		$Distributeur++;
		//rendu du bloc distrib
		$tpl->render('distrib');
	}		
	// while($user=$users->mysql_fetch_assoc()){
			// echo $user;
			// $tpl->render('stock');
		// }
	
	echo $tpl->render();
	
//---------------------------------------------------------------------------

	/*
	//Ajouter valeur dans la table depuis html
	$post= $con->query("INSERT INTO users VALUES(DEFAULT,'$name','$lieu')");
	if($post) {
		header("location:page_web.html");
	} else {
		echo "Erreur create";
	}
	*/
	
	/*Test selection
	
	$sql= $con->("SELECT * FROM 'users'");*/
?>
