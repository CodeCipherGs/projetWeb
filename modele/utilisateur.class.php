<?php
/* ******************************************************** 	
  Cours 420-G16-RO
  Session A2020 - Projet
  Fichier      : utilisateur.class.php
  Descrpition  : Classe représentant un utilisateur avec mot de passe	
  Noms    : Pierre Coutu
*********************************************************** */	

class Utilisateur {
	// Attributs
	private $nomUtilisateur;
	private $motPasse;

	// Constructeur
	public function __construct($nomUtilisateur,$motPasse){
		$this->nomUtilisateur=$nomUtilisateur;
		$this->motPasse=$motPasse;
	}
	
	// Accesseurs et mutateurs
	public function getNomUtilisateur() {
		return $this->nomUtilisateur;
	}
	public function getMotPasse() {
		return $this->motPasse;
	}

	// Autres méthodes
	public function verifierMotPasse($motAVerifier) {
		return $this->motPasse == $motAVerifier; 
	}
	
	// Affichage
	public function __toString(){
		$message=$this->nomUtilisateur;
		return $message;
	}
}
?>






