<?php
class DAL {
	private $pdo

	//connexion BDD
	
	public __construct($dbname, $username, $password) {
		$this -> pdo  = new PDO("mysql:host=172.20.233.109;dbname=$dbname", $username, $password); 
	}
	
	// suppresion boulanger
	
	public function suppr_boulanger($id_boulanger) { 
		if ( $this->pdo )
			$pdo->query("DELETE FROM boulanger WHERE id_boulanger = $id;ALTER TABLE boulanger DROP id_boulanger;ALTER TABLE boulanger ADD COLUMN id_boulanger int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST");
	}
	
	 // affichage liste distributeur
	
	public function liste_distributeur() {
		if ( $this->pdo ) {
			$result = $pdo->prepare("SELECT id_distributeur, place, localisation, stock, etat FROM distributeur");
			$result->execute();
			return $result->fetchAll();
			}
		}
		
		// affichage liste boulanger
		
	public function liste_boulanger() { 
		if ( $this->pdo ) {
			$result = $pdo->prepare("SELECT id_boulanger, nom, prenom, adresse_mail, telephone FROM boulanger");
			$result->execute();
			return $result->fetchAll();
			}
		}
		
		// suppresion distributeur
		
	public function suppr_boulanger($id_distributeur) { 
		if ( $this->pdo )
			$pdo->query("DELETE FROM distributeur WHERE id_distributeur = $id;ALTER TABLE distributeur DROP id_distributeur;ALTER TABLE distributeur ADD COLUMN id_distributeur int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST");
	}
	
	// ajout d'un boulanger
	
	public function ajout_boulanger ($id_boulanger, $nameB, $user, $email, $telephone) { 
		if ( $this->pdo ) {
			 $result = $pdo->prepare("ALTER TABLE boulanger DROP id_boulanger;ALTER TABLE boulanger ADD COLUMN id_boulanger int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST;INSERT INTO boulanger (nom, prenom, adresse_mail, telephone) VALUES('$nameB', '$user', '$email', '$telephone')");
			 $result->execute(array($id));
			}
		}
		
		// ajout d'un distributeur
		
	public function ajout_distributeur ($id_dsitributeur, $stock, $localisation, $nameD) { 
		if ( $this->pdo ) {
			 $result = $pdo->prepare("ALTER TABLE distributeur DROP id_distributeur;ALTER TABLE distributeur ADD COLUMN id_distributeur int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST;INSERT INTO distributeur (place, localisation, stock) VALUES('$nameD', '$localisation', '$stock')");
			 $result->execute(array($id));
			}
		}
		
		// modifictaion distributeur
		
	public function modif_distributeur ($id_distributeur, $nameD, $localisation, $stock) { 
		if ( $this->pdo ) {
			 $result = $pdo->prepare("UPDATE distributeur SET place='$nameD', localisation='$localisation', stock='$stock' WHERE id_distributeur='$id';ALTER TABLE distributeur DROP id_distributeur;ALTER TABLE distributeur ADD COLUMN id_distributeur int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST");
			 $result->execute();
			}
		}
		
		 // modification boulanger
		
	public function modif_boulanger ($id_boulanger, $nameB, $user, $email, $telephone, $numero) {
		if ( $this->pdo ) {
			 $result = $pdo->prepare("UPDATE boulanger SET nom='$nameB', prenom='$user', adresse_mail='$email', telephone='$telephone', id_boulanger='$numero' WHERE id_boulanger='$id'");
			 $result->execute();
			}
		}
		
		// affichage de la page web client
		
	public function affiche_client() { 
		if ( $this->pdo ) {
			$result = $pdo->prepare("SELECT D.place, D.localisation, D.stock, D.etat, B.nom FROM distributeur D, boulanger B WHERE B.id_boulanger = D.id_distributeur");
			$result->execute();
			return $result->fetchAll();
			}
		}
}
?>