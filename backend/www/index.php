<?php	
//introduction du fichier config.php
include 'config.php';
require './lib/hyla_tpl.class.php';
require './php/msgfr.php';


//Intégration de la bibliothèque Hyla_Tpl

	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('index.html');
	
	$tpl->setVar('page', $page);
	$tpl->setVar('title', $title);
	

//Distributeur


//---------------------------------------------------------------------------
//Connexion
	try{
		$pdo = mysqli_connect($host,$user,$password,$base);

		//$pdo = new PDO("mysql:$host,$user,$password,$base");
		//$pdo = new PDO("mysql:host=localhost;dba=test");
	}
	catch(Exception	$e)
	{
		console.log('erreur');
	}
//---------------------------------------------------------------------------
//BDD -> Site
	$request = "SELECT * FROM users";
	$result = mysqli_query($pdo, $request);

	while ($row = $result->fetch_row()) 
	{
		$tpl->setVar('nom_distri', $row[1]);
		$tpl->render('distrib');
	}		
/*
	if ( ($stmt = $pdo->query($request)) == false )
		echo "Erreur select <br/";

	while ( $row = $stmt->fetch() )
	{
		$tpl->setVar('nom_distri', $row['nom']);
		$tpl->render('distrib');
	}

/*
	$stat = $statement->fetchAll();

	echo (count($stat));
	
	$Distributeur = 1;	
	
	//Nombre de distributeur
	while ($Distributeur = $stat) {	//nombre distri depuis BDD
		$Distributeur++;
		//rendu du bloc distrib
		$tpl->render('distrib');
	}		
*/	
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
