<?php
session_start();

//Intégration de la bibliothèque Hyla_Tpl

	require './lib/hyla_tpl.class.php';
	require './php/msgfr.php';
	require './config.php';
	
	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('service.html');
	
// Lien des variables HTML -> PHP
	//Title global
	$tpl->setVar('A_page', $A_page);
	$tpl->setVar('A_footertitle', $A_footertitle);
	$tpl->setVar('A_projet',$A_projet);
	
	//Titre pour la page
	$tpl->setVar('S_admin',$S_admin);
	$tpl->setVar('S_connect',$S_connect);
	
	if ( @$_POST['submit'] == "Login" ){
		
	  $username = stripslashes($_POST['username']);	  
	  $password = stripslashes($_POST['password']);
	  
	  try {
		  $pdo = new PDO("mysql:host=172.20.233.109;dbname=distribaguette", $username, $password);

		  if ( $pdo ) {
			   $_SESSION['username'] = $username;
			   $_SESSION['password'] = $password;

			  header("Location: index_admin.php");
			}
		}
	  catch(PDOexception $e) {
		echo $e->getMessage();
		}
	}
	echo $tpl->render();
?>