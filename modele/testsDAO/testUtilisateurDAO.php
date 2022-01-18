<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- labo #5                                          --->
<!---- Fichier de test unitaire pour la classe UtilisateurDAO         ---> 
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
	<h1>Fichier de test pour la classe UtilisateurDAO</h1>
	<?php
		// ****** INLCUSIONS *******
		// Importe l'interface DAO et la classe UtilisateurDAO (qui importe déjà la classe Option)
		include_once "../DAO/UtilisateurDAO.class.php"; 
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
				<td>chercher(ghilas) ... trouvé <br/>chercher(bob) ... pas trouvé</td>
				<td>
					<?php 
						$unUtilisateur=UtilisateurDAO::chercher("ghilas");
						echo $unUtilisateur?$unUtilisateur:"Pas trouvé";
						echo "<br/>";
						$unUtilisateur=UtilisateurDAO::chercher("bob");
						echo $unUtilisateur?$unUtilisateur:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>chercherAvecFiltre("WHERE  nom_utilisateur LIKE '%i%'")</td>
				<td>
					<?php
						$tableau=UtilisateurDAO::chercherAvecFiltre("WHERE nom_utilisateur LIKE '%i%'");
						foreach($tableau as $unUtilisateur) {
							echo $unUtilisateur."<br/>";
						}
					?>
				</td>
			</tr>
			<tr>
				<td>chercherTous()</td>
				<td>
					<?php
						$tableau=UtilisateurDAO::chercherTous();
						foreach($tableau as $unUtilisateur) {
							echo $unUtilisateur."<br/>";
						}
					?>
				</td>
			</tr>
			<tr>
				<td>inserer(...)</td>
				<td>
					<?php
						$unUtilisateur=new Utilisateur("martin","1234");
						UtilisateurDAO::inserer($unUtilisateur);
						$unUtilisateur=UtilisateurDAO::chercher("martin");
						echo $unUtilisateur?$unUtilisateur:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>modifier(...)</td>
				<td>
		
				</td>
			</tr>
			<tr>
				<td>supprimer(...)</td>
				<td>
					<?php
						$unUtilisateur=UtilisateurDAO::chercher("martin");
						UtilisateurDAO::supprimer($unUtilisateur);
						$unUtilisateur=UtilisateurDAO::chercher("martin");
						echo $unUtilisateur?$unUtilisateur:"Pas trouvé";
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
