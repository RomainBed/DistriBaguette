<?php	
//Intégration de la bibliothèque Hyla_Tpl

	require './lib/hyla_tpl.class.php';
	require './php/msgfr.php';
	require 'config.php';

	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('parametrage.html');

// Lien des variables HTML -> PHP

	$tpl->setVar('A_page', $A_page);
	$tpl->setVar('A_footertitle', $A_footertitle);
	$tpl->setVar('A_projet',$A_projet);
	$tpl->setVar('S_admin',$S_admin);
	$tpl->setVar('S_connect',$S_connect);
	$tpl->setVar('AA_par',$AA_par);
	$tpl->setVar('AA_liste',$AA_liste);
	$tpl->setVar('AA_arch',$AA_arch);
	$tpl->setVar('AA_admin',$AA_admin);
	$tpl->setVar('S_admin',$S_admin);
	$tpl->setVar('S_Boulanger',$S_Boulanger);
	$tpl->setVar('S_Distributeur',$S_Distributeur);
	$tpl->setVar('A_footertitle',$A_footertitle);
	
$username = $_REQUEST['prenom'];
$name = $_REQUEST['nom'];
$email = $_REQUEST['mail'];
$numero = $_REQUEST['tel'];
	
$post= $pdo->query("INSERT INTO boulanger VALUES(DEFAULT,'$username', '$name', '$email', '$numero)");
		
	if($post) {
			header("location:index_param.php");
		} else {
			echo "Erreur create";
		}




// if (isset($_REQUEST['Prenom'],$_REQUEST['Nom'] ,$_REQUEST['Adresse'], $_REQUEST['numero'])){
	  // $username = stripslashes($_REQUEST['username']);
	  // $username = quote($pdo, $username); 
	  // $name = stripslashes($_REQUEST['name']);
	  // $name = quote($pdo, $name); 
	  // $email = stripslashes($_REQUEST['email']);
	  // $email = quote($pdo, $email);
	  // $numero = stripslashes($_REQUEST['numero']);
	  // $numero = quote($pdo, $numero);
	  // $query = "INSERT into `boulanger` (username, email, numero)
				  // VALUES ('$username', '$email', '$numero)')";
	  // $res = PDO::exec($pdo, $query);
// }
		echo $tpl->render();

?>