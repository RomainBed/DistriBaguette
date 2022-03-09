<?php	
//introduction du fichier config.php
include 'config.php';

	require './lib/hyla_tpl.class.php';
	
//connection à la base de données 
	$id=mysqli_connect($host,$user,$password,$table) or "Erreur de connexion";
	
	$sql= "SELECT * FROM 'boulanger'";
	
	$test=mysqli_query($id,$sql);	
	$tpl = new Hyla_Tpl('tpl');
	$tpl->importFile('page_web.html');
	
	$i = 1;
	while ($i <= 10) {
		$tpl->render('distrib');
		echo $i++;
	}		
	
	echo $tpl->render();
?>
