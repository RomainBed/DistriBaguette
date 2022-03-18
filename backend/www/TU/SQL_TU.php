<?php

	// $request = "SELECT * FROM distributeur WHERE ID_Distributeur='1'";
	// $request = ("SELECT * FROM distributeur, boulanger");
	
	$request=("SELECT D.place, D.localisation, D.stock, D.etat, B.nom FROM distributeur D, boulanger B WHERE B.id_boulanger = D.id_distributeur");

?>