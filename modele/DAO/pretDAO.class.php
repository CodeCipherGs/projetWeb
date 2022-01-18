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
		include_once DOSSIER_BASE_INCLUDE."modele/pret.class.php";
		include_once DOSSIER_BASE_INCLUDE."modele/DAO/consommateurDAO.class.php";
		include_once DOSSIER_BASE_INCLUDE."modele/DAO/automobilesDAO.class.php";  
	} else {
		include_once("../DAO/DAO.interface.php");
		include_once("../pret.class.php");
		include_once("../DAO/consommateurDAO.class.php");
		include_once("../DAO/automobilesDAO.class.php");	
	}


	class PretDAO implements DAO {	
	
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

			$unPret=null;

			// ... Préparer et exécuter la requête SQL	
			$requete= $connexion->prepare("SELECT * FROM pret  WHERE id=?");

			$requete->execute(array($cles));			
			
			// ... Analyser l’enregistrement
			if ($requete->rowCount() > 0) {
				$enregistrement=$requete->fetch();

				$consommateur=ConsommateurDAO::chercher($enregistrement['numero_consommateur']);
				$automobiles=AutomobilesDAO::chercher($enregistrement['code_automobiles']);

				$unPret=new Pret($enregistrement['id'], $consommateur,$automobiles,$enregistrement['cout_par_jour'],new DateTime($enregistrement['debut'],new DateTimeZone('America/Montreal')),new DateTime($enregistrement['fin_prevue'],new DateTimeZone('America/Montreal')),$enregistrement['fin_reele']);
			}
			// ... Fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionBD::close();	
		  
			// Retourner l'instance de la classe 
			return $unPret;	 
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
			$requete= $connexion->prepare("SELECT * FROM pret  ".$filtre);
			$requete-> execute();			

			// ... Analyser les enristrements  
			foreach ($requete as $enregistrement) {
				$unPret=new Pret($enregistrement['id'], ConsommateurDAO::chercher($enregistrement['numero_consommateur']),AutomobilesDAO::chercher($enregistrement['code_automobiles']),$enregistrement['cout_par_jour'],$enregistrement['debut'],$enregistrement['fin_prevue'],$enregistrement['fin_reele']);;
				array_push($liste, $unPret);
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
		static function inserer($unPret){ 
			// ... Connecter à la BD
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			
			// ... Prépare et exécuter la commande 
			$commandeSQL  = "INSERT INTO pret  (id,numero_consommateur,code_automobiles,cout_par_jour,debut,fin_prevue,fin_reele) ";  
			$commandeSQL .=  "VALUES (?,?,?,?,?,?,?)";			
			$requete = $connexion->prepare($commandeSQL);
			$tab = [$unPret->getId(),$unPret->getEmprunteur()->getNumero(),$unPret->getObjetEmprunte()->getCode(),$unPret->getCoutParJour(),$unPret->getDebut()->format('Y-m-d'),
			$unPret->getFinPrevue()->format('Y-m-d'),$unPret->getFinReelle()];
			ConsommateurDAO::modifier($unPret->getEmprunteur());
			AutomobilesDAO::modifier($unPret->getObjetEmprunte());
			$requete-> execute($tab);
		}

		// **********************************************************************************
		// Cette méthode modifie tous les champs (sauf la clé primaire) de l'objet reçu en 
		// paramètre dans la table
		// **********************************************************************************
		static public function modifier($unPret) {
			// ... Connecter à la BD
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// ... Prépare et exécuter la commande
			$commandeSQL = "UPDATE pret  SET numero_consommateur =?, code_automobiles=?, cout_par_jour=?, debut =?,fin_prevue=?, fin_reele=? WHERE id=?";
			$requete = $connexion->prepare($commandeSQL);
			$tab = [$unPret->getEmprunteur()->getNumero(),$unPret->getObjetEmprunte()->getCode(),$unPret->getCoutParJour(),
			$unPret->getDebut()->format('Y-m-d'),$unPret->getFinPrevue()->format('Y-m-d'),$unPret->getFinReelle()->format('Y-m-d'),$unPret->getId() ];
			
			ConsommateurDAO::modifier($unPret->getEmprunteur());
			
			$requete-> execute($tab);
		}

		// **********************************************************************************
		// Cette méthode supprime l'objet reçu en paramètre de la table (en fonction de sa clé primaire)
		// **********************************************************************************
		static public function supprimer($unPret){
			// ... Connecter à la BD
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// ... Prépare et exécuter la commande
			$commandeSQL = "DELETE FROM pret  WHERE id=?";
			$requete = $connexion->prepare($commandeSQL);
			ConsommateurDAO::modifier($unPret->getEmprunteur());
			AutomobilesDAO::modifier($unPret->getObjetEmprunte());
			$requete-> execute([$unPret->getId()]);
		}
		static public  function retourneID(){
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$tableau=PretDAO::chercherTous();
			for ($i=0; $i < count($tableau) ; $i++) { 
			
				$dernierPret= $tableau[count($tableau)-1]->getId();
			}
			//echo "dernier ID :". (int)$dernierPret ;
			return $dernierPret+1;
		} 
		
		
		
	}
	
?>