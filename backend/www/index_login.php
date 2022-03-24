<?php
//Intégration de la bibliothèque Hyla_Tpl

	require './lib/hyla_tpl.class.php';
	require './php/msgfr.php';
	require 'config.php';

	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('service.html');
	
	$tpl->setVar('A_page', $A_page);
	$tpl->setVar('A_footertitle', $A_footertitle);
	$tpl->setVar('A_projet',$A_projet);
	$tpl->setVar('S_admin',$S_admin);
	$tpl->setVar('S_connect',$S_connect);
	
session_start();



	if (isset($_POST['username'])){
		
	  $username = stripslashes($_REQUEST['username']);
	  $username = PDO::quote($pdo, $username);
	  
	  $password = stripslashes($_REQUEST['password']);
	  $password = PDO::quote($pdo, $password);
	  
	  $query = "SELECT * FROM `users` WHERE username='$username' and password='$password.'";
		
	  $result =PDO::query($pdo,$query) or die(PDO::errorInfo());
	  $rows = fetchAll($result);

	  if($rows==1){
		  
		  $_SESSION['username'] = $username;
		  header("Location: index_admin.php");
		  
	  }else{
		  
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	  }
	}
	  
	echo $tpl->render();
?>