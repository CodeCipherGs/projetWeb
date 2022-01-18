<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- labo #5                                          --->
<!---- Fichier de test unitaire pour la classe AutomobilesDAO         ---> 
<!---- Auteurs : Pierre Coutu                                    --->
<!------------------------------------------------------------------>
<html lang="fr">
<head>
	<title>Labo5 test</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../css/tests.css" />
</head>
<body >

	<!---- Création d'un option ---->
	<h1>Fichier de test pour la classe AutomobilesDAO</h1>
	<?php
		// ****** INLCUSIONS *******
		// Importe l'interface DAO et la classe AutomobilesDAO (qui importe déjà la classe Option)
		include_once "../DAO/AutomobilesDAO.class.php"; 
	?>

	<!---- Utilisation et affichage des méthodes -->
	<table>
		<thead>
			<tr>
				<th>Méthode</th>
				<th>Résultat</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>chercher(6032) ... trouvé <br/>chercher(6789) ... pas trouvé</td>
				<td>
					<?php 
						$uneAutomobile=AutomobilesDAO::chercher("a01");
						echo $uneAutomobile?$uneAutomobile:"Pas trouvé";
						echo "<br/>";
						$uneAutomobile=AutomobilesDAO::chercher("a02");
						echo $uneAutomobile?$uneAutomobile:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>chercherAvecFiltre("WHERE  disponibilite == 'disponible'")</td>
				<td>
					<?php
						$tableau=AutomobilesDAO::chercherAvecFiltre("WHERE disponibilite LIKE 'disponible'");
						foreach($tableau as $uneAutomobile) {
							echo $uneAutomobile."<br/>";
						}
					?>
				</td>
			</tr>
			<tr>
				<td>chercherTous()</td>
				<td>
					<?php
						$tableau=AutomobilesDAO::chercherTous();
						foreach($tableau as $uneAutomobile) {
							echo $uneAutomobile."<br/>";
						}
					?>
				</td>
			</tr>
			<tr>
				<td>inserer(...)</td>
				<td>
					<?php
						$uneAutomobile=new Automobiles("a07","RS7","Modèle Sport Biturbo","hors-service",100,"Audi",2020);
						AutomobilesDAO::inserer($uneAutomobile);
						$uneAutomobile=AutomobilesDAO::chercher("a07");
						echo $uneAutomobile?$uneAutomobile:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>modifier(...)</td>
				<td>
					<?php
						$uneAutomobile=AutomobilesDAO::chercher("a02");
						$uneAutomobile->SetDescription("Modèle coupé Américain");
						$uneAutomobile->setDisponibilite("disponible");
						$uneAutomobile->setCout_par_jour_suggere(70);
						AutomobilesDAO::modifier($uneAutomobile);
						$uneAutomobile=AutomobilesDAO::chercher("a02");
						echo $uneAutomobile?$uneAutomobile:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>supprimer(...)</td>
				<td>
					<?php
						$uneAutomobile=AutomobilesDAO::chercher("a07");
						AutomobilesDAO::supprimer($uneAutomobile);
						$uneAutomobile=AutomobilesDAO::chercher("a07");
						echo $uneAutomobile?$uneAutomobile:"Pas trouvé";
					?>
				</td>
			</tr>
		</tbody>
	</table>
	<br/>
	<br/>
	<img alt="Diagramme de classes" src="../../images/DiagrammeDeClasses.png" height="400" />
	
	<!---- Retour au fichier d'accueil -->
	<h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>
</html>
