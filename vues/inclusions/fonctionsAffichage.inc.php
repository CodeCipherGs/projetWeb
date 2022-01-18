<!--
    Cours 420-G16-RO
    Session A2020 - Projet
	Fichier     : fonctionsAffichage.inc.php
	Description : fonctions d'affichage 
 	Noms        : 
-->
<?php
function afficherMessagesErreur($tabMessages){
	if (count($tabMessages)>0) {
		echo "<div class='erreur'>";
		echo "<ul>";
		foreach ($tabMessages as $message) {
			echo "<li>$message</li>";
		}
		echo "</ul>";
		echo "</div>";
	}	

}
?>