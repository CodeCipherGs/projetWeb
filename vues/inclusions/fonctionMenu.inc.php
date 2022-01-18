<!--
    Cours 420-G16-RO
    Session A2020 - Projet
	Fichier     : fonctionMenu.inc.php
	Description : fonctions de gestion du Menu 
 	Noms        : Ziyu Han
	
-->
<?php

function afficherMenu($optionActive,$typeActeur){
	echo "<ul class='nav nav-pills row'>";
		echo "<li class='nav-item bg-primary col'>";
			echo "<a class='nav-link text-white'.$optionActive href='?action=pageAccueil'>Accueil</a></li>";
		echo "<li class='nav-item dropdown bg-primary col'>";
			echo "<a class='nav-link dropdown-toggle text-white' data-toggle='dropdown' href='#'>À propos</a>";
			echo "<div class='dropdown-menu bg-info border border-success'>";
				echo "<a class='dropdown-item  text-primary' href='?action=voirContact'>Contact</a>";
				echo "<a class='dropdown-item text-primary' href='?action=voirInfos'>Infos</a></div></li>";
		echo "<li class='nav-item bg-primary col'>";
			echo "<a class='nav-link text-white' href='?action=aLouer'>À louer</a></li>";
		echo "<li class='nav-item dropdown bg-primary col'>";
			echo "<a class='nav-link dropdown-toggle text-white' data-toggle='dropdown' href='#'>Employé</a>";
			echo "<div class='dropdown-menu'>";
				if ($typeActeur == "visiteur") {
					echo "<a class='dropdown-item bg-warning text-danger visible' href='?action=seConnecter'>Se connecter</a>";
				} else {
					echo "<a class='dropdown-item bg-warning text-danger invisible' href='?action=seConnecter'>Se connecter</a>";
				}
				if ($typeActeur == "utilisateur") {
					echo "<a class='dropdown-item bg-success text-primary visible' href='?action=seDeconnecter'>Se déconnecter</a>";
					echo "<a class='dropdown-item bg-success text-primary visible' href='?action=changerMotPasse'>Changer mot passe</a></div></li>";
				} else {
					echo "<a class='dropdown-item bg-success text-primary invisible' href='?action=seDeconnecter'>Se déconnecter</a>";
					echo "<a class='dropdown-item bg-success text-primary invisible' href='?action=changerMotPasse'>Changer mot passe</a></div></li>";
				}
				
		if ($typeActeur == "utilisateur") {
			echo "<li class='nav-item bg-success col'>";
				echo "<a class='nav-link text-white visible' href='?action=creerPretEtape1'>Créer Prêt</a></li>";
			echo "<li class='nav-item bg-success col'>";
				echo "<a class='nav-link text-white visible' href='?action=terminerPret'>Terminer Prêt</a></li></ul>";
		} else {
			echo "<li class='nav-item bg-primary'>";
				echo "<a class='nav-link text-white invisible' href='?action=creerPretEtape1'>Créer Prêt</a></li>";
			echo "<li class='nav-item bg-primary'>";
				echo "<a class='nav-link text-white invisible' href='?action=terminerPret'>Terminer Prêt</a></li></ul>";
		}
}
?>