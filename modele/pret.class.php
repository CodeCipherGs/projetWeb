<?php
/* ******************************************************** 	
  Cours 420-G16-RO
  Session A2020 - Projet
  Fichier      : Pret.class.php
  Descrpition  : Classe représentant un Pret 
  Noms    : Pierre Coutu
*********************************************************** */	

class Pret {
	// Attributs
	private $id;
	private $emprunteur;
	private $objetEmprunte;
	private $coutParJour;
	private $debut;
	private $finPrevue;
	private $finReelle = NULL;

	// Constructeur
	public function __construct($id,$emprunteur,$objetEmprunte,$coutParJour,$debut,$finPrevue,$finReelle ){

		$this->id=$id;
		$this->emprunteur=$emprunteur;
		if ($objetEmprunte != "") {
			$this->objetEmprunte=$objetEmprunte;
			//$this->objetEmprunte.setDisponibilite("prêté");
		}
		$this->coutParJour=$coutParJour;
		$this->debut=$debut;
		$this->finPrevue=$finPrevue;
	//pas fini
		$this->finReelle=$finReelle;
	}
	
	// Accesseurs et mutateurs
	public function getId() {
		return $this->id;
	}
	public function getEmprunteur() {
		return $this->emprunteur;
	}
	public function getObjetEmprunte() {
		return $this->objetEmprunte;
	}
	public function getDebut() {
		return $this->debut;
	}
	public function getFinReelle () {
		return $this->finReelle;
	}
	public function getFinPrevue() {
		return $this->finPrevue;
	}
	public function getCoutParJour  () {
		return $this->coutParJour;
	}

	public function calculerCoutEstime () {	
		
		$ecart = $this->debut->diff($this->finPrevue);
		$coutEstime = $ecart->days * $this->coutParJour;
		return $coutEstime;
	}
	public function enregistrerFinReelle ( $dateRetour) {
		$this->finReelle=$dateRetour;
		$this->emprunteur->chargerAuCompte($this->calculerCoutFinal());
		$this->getObjetEmprunte()->setDisponibilite("disponible");
	}

	public function calculerCoutFinal() {
		$coutReelle = -1.0;
		if ($this->finReelle != NULL) {
			//echo var_dump($this);
			$ecart=$this->debut->diff($this->finReelle);
			$coutReelle = $ecart->days * $this->coutParJour;
		}
		return $coutReelle;
	}			
	



	
	// Affichage ->format('Y-m-d')
	public function __toString(){
		$messageFinReelle="----/--/--";
		if ( $this->finReelle != null){
			$messageFinReelle=$this->finReelle->format('Y-m-d');
		}
		$message=" Id :". $this->id ." Emprunteur :". $this->emprunteur->getNumero() ." ObjetEmprunte :". $this->objetEmprunte->getCode() ." CoutParJour :". $this->coutParJour. " Debut :".
		 $this->debut->format('Y-m-d')." Fin Prevue :". $this->finPrevue->format('Y-m-d') ." Fin Reelle :".$messageFinReelle."<br>";
		return $message;
	}
}
?>
