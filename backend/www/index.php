<?php	
//introduction du fichier config.php
include 'config.php';

	require './lib/hyla_tpl.class.php';
	
//connection à la base de données 
	
	$id=mysqli_connect($host,$user,$password,$table) or "Erreur de connexion";
		if($con->mysqli_connect_errno){
			
		} else {
			echo "Error connection";
		};
		

	//$con=mysqli_query($id,$sql);
//Test selection
	
	//$sql= $con->("SELECT * FROM 'boulanger'");

	
//Intégration de la bibliothèque Hyla_Tpl

	$tpl = new Hyla_Tpl('tpl');
	$tpl->importFile('page_web.html');

//Distributeur

	$Distributeur = 1;	
	//Nombre de distributeur
	while ($Distributeur <= 10) {

		//$users= $con->query("SELECT * FROM users");
		
		//echo $user['name'];
		//echo $lieu[''];
		
		$Distributeur++;
		//rendu du bloc distrib
		$tpl->render('distrib');
	}		
	
	echo $tpl->render();
	
	/*
	//Ajouter valeur dans la table depuis html
	$post= $con->query("INSERT INTO users VALUES(DEFAULT,'$name','$lieu')");
	if($post) {
		header("location:page_web.html");
	} else {
		echo "Erreur create";
	}
	*/
?>
