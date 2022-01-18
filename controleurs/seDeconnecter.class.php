<?php
    // *****************************************************************************************
	// Cours 420-G16-RO
	// Session A2020 - Projet
    // Fichier       : seDeconnecter.class.php
	// Description   : Contrôleur spécifique qui gère une déconnexion
	// Auteur        : Pierre Coutu
    // *****************************************************************************************
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/utilisateurDAO.class.php");

	class SeDeconnecter extends  Controleur {
		
		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		

		// ******************* Méthode exécuter action
		public function executerAction() {
			//----------------------------- VÉRIFIER LA VALIDITÉ DE LA SESSION  -----------
			if ($this->acteur=="visiteur") {
				array_push ($this->messagesErreur,"Vous êtes déjà déconnécté.");
				return "pageAccueil";
			} elseif (ISSET($_POST['deconnexion'])) {
				$this->acteur="visiteur";
				unset($_SESSION['utilisateurConnecte']);
				return "pageAccueil";
			} else {
				return "pageSeDeconnecter";				
			}
		}


		
	}	
	
?>