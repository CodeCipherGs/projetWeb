<?php
/* ******************************************************** 	
  Cours 420-G16-RO
  Session A2020 - Projet
  Fichier      : connexionBD.class.php
  Descrpition  : classe permettant d'obtenir une connexion à une BD
  Noms         : Pierre Coutu
*********************************************************** */	

	// ****** INLCUSIONS *******
	if (defined('DOSSIER_BASE_INCLUDE')) {
		include_once DOSSIER_BASE_INCLUDE."modele/DAO/configs/configBD.interface.php"; 
	} else {
		include_once "../DAO/configs/configBD.interface.php"; 
	}	
	// ********* Classe englobante de PDO *************
	class ConnexionBD  {	
		// Attribut représentant la connexion à la BD (de type PDO)
		private static $instance=null;
		// Constructeur de ConnexionDB inutilisable de l’extérieur
		private function __construct() {}
		
		// Fonction statique qui gère la création de l’instance PDO et la retourne.
		// Note : self:: représente le nom de classe courante ConnexionBD  
		public static function getInstance() {
			// Si l’instance de PDO n’exsite pas on la crée
			if (self::$instance==null) {
				$configuration="mysql:host=".ConfigBD::BD_HOTE.";dbname=".ConfigBD::BD_NOM;
				$utilisateur=ConfigBD::BD_UTILISATEUR;
				$motPasse=ConfigBD::BD_MOT_PASSE;
				self::$instance=new PDO($configuration,$utilisateur,$motPasse);	
				self::$instance->exec("SET character_set_results = 'utf8'");	
				self::$instance->exec("SET character_set_client = 'utf8'");	
				self::$instance->exec("SET character_set_connection = 'utf8'");	
			}
			// Maintenant qu’on est certain qu’elle existe on la retourne
			return self::$instance;
		}
	  
		// Fonction qui libère la connexion PDO (pour le garbage collector)
		public static function close() {
			self::$instance=null;
		}
	}
?>