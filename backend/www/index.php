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
	
	$tpl->render('distrib');
	$tpl->render('distrib');
	$tpl->render('distrib');
	$tpl->render('distrib');
	
	echo $tpl->render();
?>
