<?php
    // *****************************************************************************************
	// Cours 420-G16-RO
	// Session A2020 - Projet
    // Fichier       : changerMotPasse.class.php
	// Description   : Contrôleur spécifique qui change le mot de passe
	// Auteur        : Ziyu Han
    // *****************************************************************************************
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
    include_once(DOSSIER_BASE_INCLUDE."modele/DAO/utilisateurDAO.class.php");


    class changerMotPasse extends controleur {

        // ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}

	// ******************* Méthode exécuter action
		public function executerAction() {
			//----------------------------- VÉRIFIER LA VALIDITÉ DES POSTS ---------------
			
			if (ISSET($_POST['changerMotPasse'])) { 
				if (ISSET($_POST['nomUtilisateur'])){
					$unUtilisateur=UtilisateurDAO::chercher($_POST['nomUtilisateur']);
					
					$unUtilisateur = new Utilisateur($_POST['nomUtilisateur'],$_POST['motPasseConfirmer']);
						
					UtilisateurDAO::modifier($unUtilisateur);
				}
				
				return "pageAccueil";
			} else {
				return "pageChangerMotPasse";
			}
		}


	}

?>