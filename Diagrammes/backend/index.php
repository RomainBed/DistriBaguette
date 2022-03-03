<?php	
	$id=mysqli_connect("localhost","root","root","personnes") or die("Erreur de connexion");
	$req=mysqli_query($id,"select nom,prenom from personnes");
while($tab=mysqli_fetch_assoc($req)){
   echo $tab["nom"]." ".$tab["prenom"];
}
?>
