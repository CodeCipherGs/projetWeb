<?php
    // *****************************************************************************************
	// Cours 420-G16-RO
	// Session A2020 - Projet
    // Fichier       : terminerPret.class.php
	// Description   : Contrôleur spécifique qui termine les prêts
	// Auteur        : Ziyu Han
    // *****************************************************************************************
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
    include_once(DOSSIER_BASE_INCLUDE."modele/DAO/pretDAO.class.php");


    class terminerPret extends controleur {
		private $unPret=null;
         // ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		public function getPret(){
			return $this->unPret;
		}
		public function getMessagesErreur(){
			return $this->messagesErreur;
		}
        // ******************* Méthode exécuter action
		public function executerAction() {

			if (ISSET($_POST['ChercherPret']) AND ISSET($_POST['idPret']) AND ISSET($_POST['dateRetour'])) {
					$_SESSION['unID']=$_POST['idPret'];
					$_SESSION['dateRetour']=$_POST['dateRetour'];
					
					$this->unPret=PretDAO::chercher($_SESSION['unID']);
					
					if ($_POST['dateRetour'] == null) {
						array_push($this->messagesErreur,"veuillez saisir une date de retour");
						return "pageTerminerPret"; 
					}
					$dateRetour=new DateTime($_POST['dateRetour'],new DateTimeZone('America/Montreal'));
					$this->unPret=PretDAO::chercher($_SESSION['unID']);
					//echo var_dump($this->unPret);
					$this->unPret->enregistrerFinReelle($dateRetour);
					PretDAO::modifier($this->unPret);
			}
			if (ISSET($_POST['terminerPret']) AND ISSET($_POST['MontantPaye'])) {
				
				$this->unPret=new Pret($_SESSION['unID'],PretDAO::chercher($_SESSION['unID'])->getEmprunteur(),PretDAO::chercher($_SESSION['unID'])->getObjetEmprunte(),
				PretDAO::chercher($_SESSION['unID'])->getCoutParJour(),PretDAO::chercher($_SESSION['unID'])->getDebut(),PretDAO::chercher($_SESSION['unID'])->getFinPrevue(),
				new DateTime($_SESSION['dateRetour'],new DateTimeZone('America/Montreal')));

				if ($_POST['MontantPaye'] < (ConsommateurDAO::chercher($this->unPret->getEmprunteur()->getNumero())->getSolde() * -1)){

					return "pageTerminerPret"; 
				} else {
					$this->unPret->getEmprunteur()->accepterPaiement($_POST['MontantPaye']);

					
					PretDAO::modifier($this->unPret);


				}
				
			} 
			return "pageTerminerPret"; 
		}









        
    }
?>