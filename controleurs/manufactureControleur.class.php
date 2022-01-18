<?php
    // *****************************************************************************************
	// Cours 420-G16-RO
	// Session A2020 - Projet
    // Fichier     : manufactureControleur.class.php
	// Description   : classe contenant la fonction statique qui instancie les contrôleurs spécifiques
	// Auteur        : Pierre Coutu
    // *****************************************************************************************
	include_once(DOSSIER_BASE_INCLUDE."controleurs/defaut.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/seConnecter.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/seDeconnecter.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/changerMotPasse.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/creerPretEtape1.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/creerPretEtape2.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/creerPretEtape3.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/creerPretEtape4.class.php");	
//	include_once(DOSSIER_BASE_INCLUDE."controleurs/creerPret-etape5.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/terminerPret.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/voirContact.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/voirInfos.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/aLouer.class.php");
	
	class ManufactureControleur {
		//  Méthode qui crée une instance du controleur associé à l'action
		//  et le retourne
		public static function creerControleur($action) {
			$controleur = null;
			if ($action=="voirAccueil") {
				$controleur = new Defaut();
			} elseif ($action=="seConnecter") {
				$controleur = new seConnecter();
			} elseif ($action=="seDeconnecter") {
				$controleur = new SeDeconnecter();
			} elseif ($action=="creerPretEtape1") {
				$controleur = new CreerPretEtape1();
			} elseif ($action=="creerPretEtape2") {
				$controleur = new CreerPretEtape2();
			} elseif ($action=="creerPretEtape3") {
				$controleur = new CreerPretEtape3();
			} elseif ($action=="creerPretEtape4") {
				$controleur = new CreerPretEtape4();
			} elseif ($action=="terminerPret") {
				$controleur = new terminerPret();
 			} elseif ($action=="voirContact") {
				$controleur = new voirContact();
			} elseif ($action=="voirInfos") {
				$controleur = new voirInfos();
			} elseif ($action=="changerMotPasse") {
				$controleur = new changerMotPasse();
			} elseif ($action=="aLouer") {
				$controleur = new aLouer();
			} else {
				$controleur = new Defaut();
			}
			return $controleur;
		}
	}
	
?>