<?php	
/* INFORMATIONS DE LA PAGE
=> PAGE ADMIN MONNAYEUR

*/

//Intégration de la bibliothèque Hyla_Tpl

	require 'lib/hyla_tpl.class.php';
	require 'php/msgfr.php';

	$tpl = new Hyla_Tpl('html');
	$tpl->importFile('erreur.html');

// association des variables HTML vers PHP

	$tpl->setVar('A_page', $A_page);
	
	$tpl->setVar('SE_erreur', $SE_erreur);
	$tpl->setVar('SE_retour', $SE_retour);
	$tpl->setVar('A_footertitle',$A_footertitle);
	$tpl->setVar('A_projet',$A_projet);
	
	echo $tpl->render();

?>