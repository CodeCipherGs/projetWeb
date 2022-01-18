<?php
    // *****************************************************************************************
	// Cours 420-G16-RO
	// Session A2020 - Projet
    // Fichier       : seConnecter.class.php
	// Description   : Contrôleur spécifique qui gère la connexion
	// Auteur        : Pierre Coutu
    // *****************************************************************************************
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/utilisateurDAO.class.php");

	class SeConnecter extends  Controleur {
		
		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		

		// ******************* Méthode exécuter action
		public function executerAction() {
			//----------------------------- VÉRIFIER LA VALIDITÉ DE LA SESSION  -----------
			if ($this->acteur=="utilisateur") {
				return "pageAccueil";
			}
			//----------------------------- VÉRIFIER LA VALIDITÉ DES POSTS ---------------
			if (ISSET($_POST['nom_utilisateur']) AND ISSET($_POST['mot_passe'])){ 
				$unUtilisateur=UtilisateurDAO::chercher($_POST['nom_utilisateur']);
				if ($unUtilisateur==null) {
					return "pageSeConnecter";					
				} elseif (!$unUtilisateur->verifierMotPasse($_POST['mot_passe']))  {
					return "pageSeConnecter";										
				} else {
					$this->acteur="utilisateur";
					$_SESSION['utilisateurConnecte']=$_POST['nom_utilisateur'];
					return "pageAccueil";
				}
			} else {
				return "pageSeConnecter";
			}
		}
	}	
	
?>