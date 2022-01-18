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
	include_once(DOSSIER_BASE_INCLUDE."modele/consommateur.class.php");


    class creerPretEtape4 extends controleur {
		private $unPret=null;
		private $unConsommateur=null;
		protected $messagesErreur=[""];
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


			if (ISSET($_POST['infoPret'])) {
				$nouveauID=count(PretDAO::chercherTous())+1;
				if ($_POST['montantPrepaye']==null) {
					array_push($this->messagesErreur,"le montant prepayé na pas été saisi");
					return "pageCreerPret-etape4"; 
				} else {					
					$this->unConsommateur=new Consommateur(ConsommateurDAO::chercher($_SESSION['numeroConsommateur'])->getNumero(),ConsommateurDAO::chercher($_SESSION['numeroConsommateur'])->getPrenom(),
					ConsommateurDAO::chercher($_SESSION['numeroConsommateur'])->getNom(),ConsommateurDAO::chercher($_SESSION['numeroConsommateur'])->getTelephone(),
					ConsommateurDAO::chercher($_SESSION['numeroConsommateur'])->getCourriel(),ConsommateurDAO::chercher($_SESSION['numeroConsommateur'])->chargerAuCompte($_POST['montantPrepaye']));
					ConsommateurDAO::modifier($this->unConsommateur);

					$this->unPret=new Pret($nouveauID,$this->unConsommateur,AutomobilesDAO::chercher($_SESSION['codeAuto']),AutomobilesDAO::chercher($_SESSION['codeAuto'])->getCout_par_jour_suggere(),new DateTime($_POST['debutPret'],new DateTimeZone('America/Montreal')),new DateTime($_POST['retourPrevuPret'],
						new DateTimeZone('America/Montreal')),null);
					PretDAO::inserer($this->unPret);
				}
				
				if ($this->unPret == null){
					echo var_dump(PretDAO::chercher($nouveauID));
					array_push($this->messagesErreur,"le ID na pas été saisi correctement");
					return "pageCreerPret-etape4"; 
				}else{
					
					return "pageCreerPret-etape5"; 
				}
				
			}else{
				
				return "pageCreerPret-etape1"; 
			}

			
			

		}

    }
?>