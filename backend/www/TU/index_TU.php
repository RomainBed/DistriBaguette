<?php
<?php	
//introduction du fichier config.php
include 'config.php';
require './lib/hyla_tpl.class.php';
require './php/msgfr.php';


//Intégration de la bibliothèque Hyla_Tpl

	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('index.html');
	
	// $tpl->setVar('distrii',$distrii);
	
	$tpl->setVar('page', $page);
	$tpl->setVar('title', $title);
	$tpl->setVar('footertitle', $footertitle);
	$tpl->setVar('projet', $projet);
	
	$tpl->setVar('stock', $stock);
	$tpl->setVar('etat', $etat);
	$tpl->setVar('loca', $loca);
	$tpl->setVar('boulanger', $boulanger);

// Distributeur 
//---------------------------------------------------------------------------
//Connexion
	try{
		// $pdo = mysqli_connect($host,$user,$password,$base);
		// $pdo = new PDO("mysql:$host,$user,$password,$base");
		// $pdo = new PDO('mysql:host=172.20.233.109;dbname=distribaguette;charset=utf8','client','client1');
		$pdo = new PDO('mysql:host=172.20.233.109;dbname=distribaguette;','client','client1');
	}
	catch(Exception	$e)
	{
		echo "erreur";
	}
//---------------------------------------------------------------------------
//BDD connexion Site

	// $request = "SELECT * FROM distributeur WHERE ID_Distributeur='1'";
	// $request = ("SELECT * FROM distributeur, boulanger");
	
	$request=("SELECT D.place, D.localisation, D.stock, D.etat, B.nom FROM distributeur D, boulanger B WHERE B.id_boulanger = D.id_distributeur");

	
	$result = $pdo->prepare($request);
	$result->execute();
	$results = $result->fetchAll();
	// $result = mysqli_query($pdo, $request);
	$tpl->setVar('desc', $desc);
	
	$id = 0;
	foreach($results as $donnee)
	{			
			// $test = array(
			// 'desc' => $desc,
			// 'nom_distri' => $donnee['place'],
			// 'loca1' => $donnee['localisation'],
			// 'stock1' => $donnee['stock'],
			// 'etat1' => $donnee['etat'],
			// );
						
			// $tpl->setVar('test', $test);
			// $tpl->render('test');
							
			$tpl->setVar('id',$id);
			$tpl->setVar('nom_distri', $donnee['place']);
			$tpl->setVar('loca1', $donnee['localisation']);
			$tpl->setVar('stock1', $donnee['stock']);
			$tpl->setVar('etat1', $donnee['etat']);
			$tpl->setVar('boulanger1', $donnee['nom']);
				// Rendu
			$tpl->render('distrib', $donnee);
			$id++;
	}
	
	echo $tpl->render();
	
//---------------------------------------------------------------------------

	// $request = "SELECT * FROM users";
	// $result = mysqli_query($pdo, $request);

	// while ($row = $result->fetch_row()) 
	// {
		// $tpl->setVar('nom_distri', $row[1]);
		// $tpl->render('distrib');
	// }	
	
	// echo $tpl->render();
		
//---------------------------------------------------------------------------
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

?>