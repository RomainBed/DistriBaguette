<?php
//---------------------------------------------------------------------------
//Connexion

	try{		
		$pdo = new PDO('mysql:host=172.20.233.109;dbname=distribaguette;','admin','root');
	}
	catch(Exception	$e)
	{
		echo "erreur";
	}
	
//---------------------------------------------------------------------------
?>