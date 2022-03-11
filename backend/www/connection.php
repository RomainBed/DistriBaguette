<?php
//introduction du fichier config.php
include 'config.php';
//------------------------------------CONNECTION---------------------------------------
//connection à la base de données 
	$con= mysqli_connect($host,$user,$password,$base);
		if ($con->connect_errno) {
			
			error_log('Connection erreur: ' . $con->connect_errno);
		}
	// $con=mysqli_query($con,$sql);
// ---------------------------------------------------------------------------

?>