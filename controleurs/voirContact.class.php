<?php
    // *****************************************************************************************
	// Cours 420-G16-RO
	// Session A2020 - Projet
    // Fichier       : voirContact.class.php
	// Description   : Contrôleur spécifique qui vois les contacts
	// Auteur        : Ziyu Han
    // *****************************************************************************************
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
    include_once(DOSSIER_BASE_INCLUDE."modele/DAO/utilisateurDAO.class.php");


    class voirContact extends controleur {
        // ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}

        // ******************* Méthode exécuter action
		public function executerAction() {
			
			return "pageVoirContact"; 
		}
    }
?>