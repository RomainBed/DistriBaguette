<?php
//introduction du fichier config.php
include 'config.php';
//------------------------------------CONNECTION---------------------------------------
//connection à la base de données 
	try{
		 // $pdo = mysqli_connect($host,$user,$password,$base);
		//$pdo = new PDO("mysql:$host,$user,$password,$base");
		$pdo = new PDO('mysql:host=172.20.233.109;dbname=distribaguette;charset=utf8','client','client1');
	}
	catch(Exception	$e)
	{
		echo "erreur";
	}
// ---------------------------------------------------------------------------

?>