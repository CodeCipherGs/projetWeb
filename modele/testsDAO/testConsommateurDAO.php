<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- labo #5                                                   --->
<!---- Fichier de test unitaire pour la classe ConsommateurDAO     ---> 
<!---- Auteurs : Pierre Coutu                                    --->
<!------------------------------------------------------------------>
<html lang="fr">
<head>
	<title>Labo5 test</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../css/tests.css" />
</head>
<body >

	<!---- Création d'un accessoire ---->
	<h1>Fichier de test pour la classe ConsommateurDAO</h1>
	<?php
		// ****** INLCUSIONS *******
		// Importe l'interface DAO et la classe ConsommateurDAO (qui importe déjà la classe infoOption)
		include_once "../DAO/ConsommateurDAO.class.php"; 
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
				<td>chercher(105) ... trouvé <br/>chercher(155) ... pas trouvé</td>
				<td>
					<?php 
						$unConsommateur=ConsommateurDAO::chercher(105);
						echo $unConsommateur?$unConsommateur:"Pas trouvé";
						echo "<br/>";
						$unConsommateur=ConsommateurDAO::chercher(155);
						echo $unConsommateur?$unConsommateur:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>chercherTous()</td>
				<td>
					<?php
						$tableau=ConsommateurDAO::chercherTous();
						foreach($tableau as $unConsommateur) {
							echo $unConsommateur."<br/>";
						}
					?>
				</td>
			</tr>
			<tr>
				<td>chercherAvecFiltre("WHERE solde < 120.0")</td>
				<td>
					<?php
						$tableau=ConsommateurDAO::chercherAvecFiltre("WHERE solde  < 120.0");
						foreach($tableau as $unConsommateur) {
							echo $unConsommateur."<br/>";
						}
					?>
				</td>
			</tr>
			<tr>
				<td>inserer(...)</td>
				<td>
					<?php
						$unConsommateur=new Consommateur(119,"John","Doe","514-321-1535","johnDoe@gmail.com",5000);
						ConsommateurDAO::inserer($unConsommateur);
						$unConsommateur=ConsommateurDAO::chercher(119);
						echo $unConsommateur?$unConsommateur:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>modifier(...)</td>
				<td>
					<?php
						$unConsommateur=ConsommateurDAO::chercher(119);
						$unConsommateur->setTelephone("514-321-4235");
						$unConsommateur->SetCourriel("doej@yahoo.ca");
						$unConsommateur->chargerAuCompte(300.5);
						$unConsommateur->accepterPaiement(20.5);
						ConsommateurDAO::modifier($unConsommateur);
						$unConsommateur=ConsommateurDAO::chercher(119);
						echo $unConsommateur?$unConsommateur:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>supprimer(...)</td>
				<td>
					<?php
						ConsommateurDAO::supprimer($unConsommateur);
						$unConsommateur=ConsommateurDAO::chercher(119);
						echo $unConsommateur?$unConsommateur:"Pas trouvé";
					?>
				</td>
			</tr>
		</tbody>
	</table>
	<br/>
	<br/>
	<img alt="Diagramme de classes" src="../../images/DiagrammeDeClasses.png" height="600" />

	<!---- Retour au fichier d'accueil -->
	<h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>
</html>
