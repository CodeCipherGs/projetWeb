<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- labo #5                                          --->
<!---- Fichier de test unitaire pour la classe PretDAO         ---> 
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
	<h1>Fichier de test pour la classe PretDAO</h1>
	<?php
		// ****** INLCUSIONS *******
		// Importe l'interface DAO et la classe PretDAO (qui importe déjà la classe Option)
		include_once "../DAO/PretDAO.class.php"; 
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
						$unPret=PretDAO::chercher(1);
						echo $unPret?$unPret:"Pas trouvé";
						echo "<br/>";
						$unPret=PretDAO::chercher(3);
						echo $unPret?$unPret:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>chercherAvecFiltre("WHERE  disponibilite == 'disponible'")</td>
				<td>
					<?php
						$tableau=PretDAO::chercherAvecFiltre("WHERE cout_par_jour < 50");
						foreach($tableau as $unPret) {
							echo $unPret."<br/>";
						}
					?>
				</td>
			</tr>
			<tr>
				<td>chercherTous()</td>
				<td>
					<?php
						$tableau=PretDAO::chercherTous();
						foreach($tableau as $unPret) {
							echo $unPret."<br/>";
						}
					?>
				</td>
			</tr>
			<tr>
				<td>inserer(...)</td>
				<td>

					<?php
						$unConsommateur= ConsommateurDAO::chercher(105);
						$uneAutomobile= AutomobilesDAO::chercher("a01");
						$unPret=new Pret(7,$unConsommateur,$uneAutomobile,100,new DateTime('2020-05-17',new DateTimeZone('America/Montreal')),new DateTime('2020-10-17',
						new DateTimeZone('America/Montreal')),new DateTime('2020-12-17',new DateTimeZone('America/Montreal')));
						echo var_dump($unPret);
						PretDAO::inserer($unPret);
						$unPret=PretDAO::chercher(7);
						echo $unPret?$unPret:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>modifier(...)</td>
				<td>
					<?php
						$unPret=PretDAO::chercher(1);
						
						$unPret->getObjetEmprunte()->setDisponibilite("disponible");
				
						PretDAO::modifier($unPret);
						$unPret=PretDAO::chercher(1);
						echo $unPret?$unPret:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>supprimer(...)</td>
				<td>
					<?php
						$unPret=PretDAO::chercher(7);
						PretDAO::supprimer($unPret);
						$unPret=PretDAO::chercher(7);
						echo $unPret?$unPret:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>retournID(...)</td>
				<td>
					<?php
						
						$id=PretDAO::retourneID();
						echo "le new id : ".$id;
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
