<?php
/* ******************************************************** 	
  Cours 420-G16-RO
  Session A2020 - Projet
  Fichier      : consommateur.class.php
  Descrpition  : Classe représentant un consommateur  
  Noms    : Pierre Coutu
*********************************************************** */	

class Consommateur {
	// Attributs
	private $numero;
	private $prenom;
	private $nom;
	private $telephone;
	private $courriel;
	private $solde;
	

	// Constructeur
	public function __construct($numero,$prenom,$nom,$telephone,$courriel,$solde){
		$this->numero=$numero;
		$this->prenom=$prenom;
		$this->nom=$nom;
		$this->telephone=$telephone;
		$this->courriel=$courriel;
		$this->solde=(int)$solde;
	}
	
	// Accesseurs et mutateurs
	public function getNumero() {
		return $this->numero;
	}
	public function getPrenom() {
		return $this->prenom;
	}
	public function getNom() {
		return $this->nom;
	}
	public function getTelephone() {
		return $this->telephone;
	}
	public function getCourriel() {
		return $this->courriel;
	}
	public function getSolde() {
		return $this->solde;
	}
	

	public function setTelephone ( $nouveau) {
		$this->telephone = $nouveau;
	}
	public function setCourriel ( $nouveau) {
		$this->courriel=$nouveau;
	}
	public function chargerAuCompte ( $montant) {

		$this->solde = (int)$this->solde-(int)$montant;

		return $this->solde;
	}			
	public function accepterPaiement ( $montant) {

		$this->solde = (int)$this->solde+(int)$montant;

		return $this->solde;

	}			



	
	// Affichage
	public function __toString(){
		$message=" Numero : ".$this->numero . " Prenom : ".$this->prenom . " Nom : ".$this->nom ." Telephone : ".$this->telephone . " Courriel : ".$this->courriel." Solde : ".$this->solde."<br>" ;
		return $message;
	}
}
?>
