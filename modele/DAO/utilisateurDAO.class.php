<?php
/* ******************************************************** 	
  Cours 420-G16-RO
  Session A2020 - Projet
  Fichier      : utilisateur.class.php
  Descrpition  : DAO pour la classe Utilisateur	
  Noms         : Pierre Coutu
*********************************************************** */	
	if (defined('DOSSIER_BASE_INCLUDE')) {
		include_once DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php"; 
		include_once DOSSIER_BASE_INCLUDE."modele/utilisateur.class.php"; 
	} else {
		include_once("../DAO/DAO.interface.php");
		include_once("../utilisateur.class.php");
	}


	class UtilisateurDAO implements DAO {	
	
		// **********************************************************************************
		// Cette méthode doit retourner l'objet dont la clé primaire a été reçu en paramètre
		// On retourne null si non-trouvé, 
		// **********************************************************************************
		public static function chercher($cles) { 
		    //... Connecter à la BD
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			$leUtilisateur=null;

			// ... Préparer et exécuter la requête SQL	
			$requete= $connexion->prepare("SELECT * FROM utilisateur WHERE nom_utilisateur LIKE ?");
			$requete->execute(array($cles));			
			
			// ... Analyser l’enregistrement
			if ($requete->rowCount() > 0) {
				$enregistrement=$requete->fetch();
				$leUtilisateur=new Utilisateur($enregistrement['nom_utilisateur'], $enregistrement['mot_passe']);
			}
			// ... Fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionBD::close();	
		  
			// Retourner l'instance de la classe 
			return $leUtilisateur;	 
		} 
		
		// **********************************************************************************
		// Cette méthode doit retourner une liste de tous les objets reliés à la table de la BD
		// **********************************************************************************
		static public function chercherTous() { 
			return self::chercherAvecFiltre("");
		} 
		
		// **********************************************************************************
		// Comme la méthode chercherTous, mais en applicant le filtre (clause WHERE ...) reçue en param.
		// **********************************************************************************
		static public function chercherAvecFiltre($filtre){ 
			// ... Connecter à la BD
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			$liste = array(); 
				
			// ... Préparer et exécuter la requête	
			$requete= $connexion->prepare("SELECT * FROM utilisateur ".$filtre);
			$requete-> execute();			

			// ... Analyser les enristrements  
			foreach ($requete as $enregistrement) {
				$leUtilisateur=new Utilisateur($enregistrement['nom_utilisateur'], $enregistrement['mot_passe']);
				array_push($liste, $leUtilisateur);
			}
			
			// ... Fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionBD::close();	
			
			// ... Retour d'un tableau contenant les instances trouvées
			return $liste;	 
		} 
		
		// **********************************************************************************
		// Cette méthode insère l'objet reçu en paramètre dans la table
		// **********************************************************************************
		static function inserer($unUtilisateur){ 
			// ... Connecter à la BD
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			
			// ... Prépare et exécuter la commande
			$commandeSQL  = "INSERT INTO Utilisateur (nom_utilisateur,mot_passe)";  
			$commandeSQL .=  "VALUES (?,?)";			
			$requete = $connexion->prepare($commandeSQL);
			$tab = [$unUtilisateur->getNomUtilisateur(), $unUtilisateur->getMotPasse()];
			$requete-> execute($tab);
		}

		// **********************************************************************************
		// Cette méthode modifie tous les champs (sauf la clé primaire) de l'objet reçu en 
		// paramètre dans la table
		// **********************************************************************************
		static public function modifier($unUtilisateur) {
			// ... Connecter à la BD
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// ... Prépare et exécuter la commande
			$commandeSQL = "UPDATE utilisateur SET mot_passe=? WHERE nom_utilisateur=?";
			$requete = $connexion->prepare($commandeSQL);
			$tab = [$unUtilisateur->getMotPasse(),$unUtilisateur->getNomUtilisateur()];
			$requete-> execute($tab);
		}

		// **********************************************************************************
		// Cette méthode supprime l'objet reçu en paramètre de la table (en fonction de sa clé primaire)
		// **********************************************************************************
		static public function supprimer($unUtilisateur){
			// ... Connecter à la BD
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// ... Prépare et exécuter la commande
			$commandeSQL = "DELETE FROM utilisateur WHERE nom_utilisateur LIKE ?";
			$requete = $connexion->prepare($commandeSQL);
			$requete-> execute([$unUtilisateur->getNomUtilisateur()]);
		} 
		
		
		
	}
	
?>