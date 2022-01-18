
<?php
    // *****************************************************************************************
	// Cours 420-G16-RO
	// Session A2020 - Projet
    // Fichier       : aLouer.class.php
	// Description   : Contrôleur spécifique qui loue des autos
	// Auteur        : Ziyu Han ghilas soaudi
    // *****************************************************************************************
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
	include_once DOSSIER_BASE_INCLUDE."modele/DAO/AutomobilesDAO.class.php";

    class aLouer extends controleur {

		// ******************* Attributs
		private $unProduit=null;
		private $tabProduit=[];
		private $formulaire="";
		protected $messagesErreur=[""];
		
		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		
		// ******************* Accesseurs
		public function getProduit(){
			return $this->unProduit;
		}
		public function getTabProduit(){
			return $this->tabProduit;
		}
		public function getFormulaire(){
			return $this->formulaire;
		}

		// ******************* Méthode exécuter action
		public function executerAction() {
			if ($this->acteur == "visiteur" ) {
					array_push($this->messagesErreur,"Vous ne pouvez pas acceder a cette fonctionnalité, il faut se connecter");
					return "pageSeConnecter";
			}elseif (ISSET($_POST['disponibilite']) AND ISSET($_POST['ProduitDispo']) ){
				$this->formulaire="ProduitDispo";
				if ($_POST['disponibilite'] == "prêté") {
					$this->tabProduit= AutomobilesDAO::chercherAvecFiltre("WHERE disponibilite LIKE '".$_POST['disponibilite']."'");

				}else if ($_POST['disponibilite'] == "disponible") {
					$this->tabProduit= AutomobilesDAO::chercherAvecFiltre("WHERE disponibilite LIKE '".$_POST['disponibilite']."'");
					
				}else{
					$this->tabProduit= AutomobilesDAO::chercherAvecFiltre("WHERE disponibilite LIKE '".$_POST['disponibilite']."'");
					
				}
				
				return"pageAlouer";

			}elseif (ISSET($_POST['codeAuto']) AND ISSET($_POST['ProduitParCode']) ){
				$this->formulaire="ProduitParCode";
				$this->unProduit= AutomobilesDAO::chercher($_POST['codeAuto']);
				return"pageAlouer";
			}elseif (ISSET($_POST['titreAuto']) AND ISSET($_POST['ProduitParNom']) ){
				$this->formulaire="ProduitParNom";
				if ($_POST['titreAuto'] == "") {

					return "pageAlouer";
				}else{
					$this->tabProduit= AutomobilesDAO::chercherAvecFiltre("WHERE nom LIKE '%".$_POST['titreAuto']."%'");
					return"pageAlouer";
				}
			}else{
				return "pageAlouer";
			}

		}


    }


?>