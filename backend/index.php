<?php	
//introduction du fichier config.php
include 'config.php';

	require 'hyla_tpl.class.php';
	
	$tpl = new Hyla_Tpl('tpl');
	$tpl->importFile('index.html');

//connection à la base de données 
	$id=mysqli_connect($host,$user,$password,$table) or "Erreur de connexion";
	
	$sql= "SELECT * FROM 'boulanger'";
	
	$test=mysqli_query($id,$sql);
	echo($test);
?>
