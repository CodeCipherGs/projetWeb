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
		include_once DOSSIER_BASE_INCLUDE."modele/automobiles.class.php"; 
	} else {
		include_once("../DAO/DAO.interface.php");
		include_once("../automobiles.class.php");
	}


	class AutomobilesDAO implements DAO {	
	
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

			$uneAutomobile=null;

			// ... Préparer et exécuter la requête SQL	
			$requete= $connexion->prepare("SELECT * FROM automobiles  WHERE code=?");
			$requete->execute(array($cles));			
			
			// ... Analyser l’enregistrement
			if ($requete->rowCount() > 0) {
				$enregistrement=$requete->fetch();
				$uneAutomobile=new Automobiles ($enregistrement['code'], $enregistrement['nom'],$enregistrement['description'],$enregistrement['disponibilite'],$enregistrement['cout_par_jour_suggere'],$enregistrement['marque'],$enregistrement['annee_fabrication']);
			}
			// ... Fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionBD::close();	
		  
			// Retourner l'instance de la classe 
			return $uneAutomobile;	 
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
			$requete= $connexion->prepare("SELECT * FROM automobiles  ".$filtre);
			$requete-> execute();			

			// ... Analyser les enristrements  
			foreach ($requete as $enregistrement) {
				$uneAutomobile=new Automobiles ($enregistrement['code'], $enregistrement['nom'],$enregistrement['description'],$enregistrement['disponibilite'],$enregistrement['cout_par_jour_suggere'],$enregistrement['marque'],$enregistrement['annee_fabrication']);
				array_push($liste, $uneAutomobile);
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
		static function inserer($uneAutomobile){ 
			// ... Connecter à la BD
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			
			// ... Prépare et exécuter la commande
			$commandeSQL  = "INSERT INTO automobiles  (code,nom,description,disponibilite,cout_par_jour_suggere,marque,annee_fabrication)";  
			$commandeSQL .=  "VALUES (?,?,?,?,?,?,?)";			
			$requete = $connexion->prepare($commandeSQL);
			$tab = [$uneAutomobile->getCode(),$uneAutomobile->getNom(),$uneAutomobile->getDescription(),$uneAutomobile->getDisponibilite(),$uneAutomobile->getCout_par_jour_suggere(),$uneAutomobile->getMarque(),$uneAutomobile->getAnnee_fabrication()];
			$requete-> execute($tab);
		}

		// **********************************************************************************
		// Cette méthode modifie tous les champs (sauf la clé primaire) de l'objet reçu en 
		// paramètre dans la table
		// **********************************************************************************
		static public function modifier($uneAutomobile) {
			// ... Connecter à la BD
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// ... Prépare et exécuter la commande
			$commandeSQL = "UPDATE automobiles  SET  nom=?, description=?, disponibilite=?, cout_par_jour_suggere=?,marque=?, annee_fabrication=?  WHERE code=?";
			$requete = $connexion->prepare($commandeSQL);
			$tab =[ $uneAutomobile->getNom(),$uneAutomobile->getDescription(),$uneAutomobile->getDisponibilite(),
			$uneAutomobile->getCout_par_jour_suggere(),$uneAutomobile->getMarque(),$uneAutomobile->getAnnee_fabrication(), $uneAutomobile->getCode()];
			$requete-> execute($tab);
		}

		// **********************************************************************************
		// Cette méthode supprime l'objet reçu en paramètre de la table (en fonction de sa clé primaire)
		// **********************************************************************************
		static public function supprimer($uneAutomobile){
			// ... Connecter à la BD
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// ... Prépare et exécuter la commande
			$commandeSQL = "DELETE FROM automobiles  WHERE code=?";
			$requete = $connexion->prepare($commandeSQL);
			$requete->execute([$uneAutomobile->getCode()]);
			ConnexionBD::close();
		} 
		
		
		
	}
	
?>