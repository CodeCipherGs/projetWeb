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

    class creerPretEtape2 extends controleur {
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

			if (ISSET($_POST['CreerPret'])) {

				if (ISSET($_POST['numeroNouveau']) AND ISSET($_POST['prenomNouveau']) AND ISSET($_POST['nomNouveau'])  AND ISSET($_POST['telephoneNouveau'])  AND ISSET($_POST['courrielNouveau']) AND ISSET($_POST['soldeNouveau'])) {
					$this->unConsommateur=new Consommateur($_POST['numeroNouveau'],$_POST['prenomNouveau'],$_POST['nomNouveau'],$_POST['telephoneNouveau'],$_POST['courrielNouveau'],$_POST['soldeNouveau']);
					ConsommateurDAO::inserer($this->unConsommateur); 
					$_SESSION['numeroConsommateur'] = $_POST['numeroNouveau'];
				}
				//echo var_dump(ConsommateurDAO::chercher($_POST['numeroNouveau']));
				if ($_POST['numeroNouveau'] == null || $_POST['nomNouveau'] == null || $_POST['telephoneNouveau'] == null || $_POST['courrielNouveau'] == null || $_POST['courrielNouveau'] == null || $_POST['soldeNouveau'] == null){
					array_push($this->messagesErreur," Erreur : un ou plusieurs champs sont incomplets");
					return"pageCreerPret-etape2";
				}else{
						
					return "pageCreerPret-etape3"; 
				}
				
			}
		}

    }
?>