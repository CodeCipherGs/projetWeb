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
		include_once DOSSIER_BASE_INCLUDE."modele/consommateur.class.php"; 
	} else {
		include_once("../DAO/DAO.interface.php");
		include_once("../consommateur.class.php");
	}


	class ConsommateurDAO implements DAO {	
	
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

			$leConsommateur=null;

			// ... Préparer et exécuter la requête SQL	
			$requete= $connexion->prepare("SELECT * FROM consommateur WHERE numero=?");
			$requete->execute(array($cles));			
			
			// ... Analyser l’enregistrement
			if ($requete->rowCount() > 0) {
				$enregistrement=$requete->fetch();
				$leConsommateur=new Consommateur($enregistrement['numero'], $enregistrement['prenom'],$enregistrement['nom'],$enregistrement['telephone'],$enregistrement['courriel'],(int)$enregistrement['solde']);
			}
			// ... Fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionBD::close();	
		  
			// Retourner l'instance de la classe 
			return $leConsommateur;	 
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
			$requete= $connexion->prepare("SELECT * FROM consommateur ".$filtre);
			$requete-> execute();			

			// ... Analyser les enristrements  
			foreach ($requete as $enregistrement) {
				$leConsommateur=new Consommateur($enregistrement['numero'], $enregistrement['prenom'],$enregistrement['nom'],$enregistrement['telephone'],$enregistrement['courriel'],$enregistrement['solde']);
				array_push($liste, $leConsommateur);
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
		static function inserer($unConsommateur){ 
			// ... Connecter à la BD
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			
			// ... Prépare et exécuter la commande
			$commandeSQL  = "INSERT INTO consommateur (numero,prenom,nom,telephone,courriel,solde)";  
			$commandeSQL .=  "VALUES (?,?,?,?,?,?)";			
			$requete = $connexion->prepare($commandeSQL);
			$tab = [$unConsommateur->getNumero(), $unConsommateur->getPrenom(),$unConsommateur->getNom(),$unConsommateur->getTelephone(),$unConsommateur->getCourriel(),$unConsommateur->getSolde()];
			$requete-> execute($tab);
			ConnexionBD::close();
		}

		// **********************************************************************************
		// Cette méthode modifie tous les champs (sauf la clé primaire) de l'objet reçu en 
		// paramètre dans la table
		// **********************************************************************************
		static public function modifier( $unConsommateur) {
			// ... Connecter à la BD
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// ... Prépare et exécuter la commande
			$commandeSQL = "UPDATE consommateur SET prenom=?, nom=?, telephone=?, courriel=?, solde=? WHERE numero=?";
			$requete = $connexion->prepare($commandeSQL);
			$tab =[$unConsommateur->getPrenom(),$unConsommateur->getNom(),$unConsommateur->getTelephone(),$unConsommateur->getCourriel(),$unConsommateur->getSolde(),$unConsommateur->getNumero()];
			$requete-> execute($tab);
			ConnexionBD::close();
		}

		// **********************************************************************************
		// Cette méthode supprime l'objet reçu en paramètre de la table (en fonction de sa clé primaire)
		// **********************************************************************************
		static public function supprimer($unConsommateur){
			// ... Connecter à la BD
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// ... Prépare et exécuter la commande
			$commandeSQL = "DELETE FROM consommateur WHERE numero=?";
			$requete = $connexion->prepare($commandeSQL);
			$requete->execute([$unConsommateur->getNumero()]);
			ConnexionBD::close();
		} 
		
		
		
	}
	
?>