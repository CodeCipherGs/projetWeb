<?php
/* ******************************************************** 	
  Cours 420-G16-RO
  Session A2020 - Projet
  Fichier      : automobiles.class.php
  Descrpition  : Classe représentant une automobile 
  Noms    : Pierre Coutu
*********************************************************** */	

class Automobiles {
	// Attributs
	private $code;
	private $nom;
	private $description;
	private $disponibilite;
	private $cout_par_jour_suggere;
	private $marque;
	private $annee_fabrication;

	// Constructeur
	public function __construct($code,$nom,$description,$disponibilite,$cout_par_jour_suggere,$marque,$annee_fabrication){
		$this->code=$code;
		$this->nom=$nom;
		$this->description=$description;
		$this->disponibilite=$disponibilite;
		$this->cout_par_jour_suggere=$cout_par_jour_suggere;
		$this->marque=$marque;
		$this->annee_fabrication=$annee_fabrication;
	}
	
	// Accesseurs et mutateurs
	public function getCode() {
		return $this->code;
	}
	public function getNom() {
		return $this->nom;
	}
	public function getDescription() {
		return $this->description;
	}
	public function getDisponibilite() {
		return $this->disponibilite;
	}
	public function getCout_par_jour_suggere() {
		return $this->cout_par_jour_suggere;
	}
	public function getMarque () {
		return $this->marque;
	}
	public function getAnnee_fabrication () {
		return $this->annee_fabrication;
	}

	public function setNom ( $nom) {
		$this->nom= $nom;
	}
	public function SetDescription ( $description) {
		$this->description=$description;
	}
	public function setDisponibilite ( $disponibilite) {
		$this->disponibilite = "";
		if ($disponibilite == "hors-service" || $disponibilite == "prêté" || $disponibilite == "disponible") {
			$this->disponibilite = $disponibilite;
		}
	}			
	public function setCout_par_jour_suggere ( $cout_par_jour_suggere) {
		$this->cout_par_jour_suggere = $cout_par_jour_suggere;
	}			



	
	// Affichage
	public function __toString(){
		$message=" Code :".$this->code . " Nom :".$this->nom . " Descrpition :".$this->description . " Disponibilite :".$this->disponibilite." Cout_par_jour_suggere :".$this->cout_par_jour_suggere . " Marque :".$this->marque . " Annee de fabrication :".$this->annee_fabrication."<br>";
		return $message;
	}
}
?>
