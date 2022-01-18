<?php
    // *****************************************************************************************
	// Cours 420-G16-RO
	// Session A2020 - Projet
    // Fichier       : creerPret.class.php
	// Description   : Contrôleur spécifique qui crée des prêts
	// Auteur        : Ziyu Han
    // *****************************************************************************************
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
    include_once(DOSSIER_BASE_INCLUDE."modele/DAO/PretDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/AutomobilesDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/ConsommateurDAO.class.php");

    class creerPretEtape1 extends controleur {
		private $unPret=null;
		private $unConsommateur=null;
		private $uneAutomobile=null;
        // ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		public function getPret(){
			return $this->unPret;
		}

        // ******************* Méthode exécuter action
		public function executerAction() {

			if (ISSET($_POST['ChercherPret']) AND ISSET($_POST['numeroClient'])) {
					$unNumero=$_POST['numeroClient'];
					$this->unConsommateur=ConsommateurDAO::chercher($unNumero);
					//echo var_dump($this->unConsommateur);
					if ($this->unConsommateur == null){
						array_push($this->messagesErreur,"le numero Client n'a pas été saisi correctement ou bien il est invalide");
						return"pageCreerPret-etape1";
					}else{
						$_SESSION['numeroConsommateur'] = $unNumero;
						return "pageCreerPret-etape3"; 
					}
			} else if (ISSET($_POST['Nouveau'])) {

				return "pageCreerPret-etape2"; 
			}else{
				
				return "pageCreerPret-etape1"; 
			}

			
			

		}

    }
?>