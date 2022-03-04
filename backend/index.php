<?php	
	$hostname = "172.20.233.53/bdd";
	$username = "root";
	$password = "";
	$table = "distri_baguette";
	
	$id=mysqli_connect($hostname,$username,$password,$table) or die("Erreur de connexion");
	
	$boulanger = $_GET['boulanger'];
	$distributeur = $_GET['distributeur'];
	
	$sql= "SELECT * FROM 'boulanger'";
	
	$test=mysqli_query($id,$sql);
	echo($test);
?>
