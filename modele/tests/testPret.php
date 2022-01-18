<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- labo #5                                                   --->
<!---- Fichier de test unitaire pour la classe InfoAccessoire    ---> 
<!---- Auteurs : Pierre Coutu                                    --->
<!------------------------------------------------------------------>
<html lang="fr">
<head>
	<title>Labo5 test</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../css/tests.css" />
</head>
<body >
	<img alt="Diagramme de classes" src="../../images/DiagrammeDeClasses.png" height="400" />

	<!---- Création d'une InfoOption ---->
	<h1>Fichier de test pour la classe InfoOption</h1>
	<?php
		include_once "../DAO/ConsommateurDAO.class.php"; 
		include_once "../DAO/AutomobilesDAO.class.php"; 
		include_once "../pret.class.php"; 
		$unConsommateur= ConsommateurDAO::chercher(105);
		$uneAutomobile= AutomobilesDAO::chercher("a01");
		$debut=new DateTime('2020-05-17',new DateTimeZone('America/Montreal'));
		$finPrevue=new DateTime('2020-10-17',new DateTimeZone('America/Montreal'));
		$finReelle = NULL;

		$unPret=new Pret(7,$unConsommateur,$uneAutomobile,100,$debut,$finPrevue ,$finReelle);


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
				<td>toString()</td>
				<td><?php echo $unPret;?></td>
			</tr>
			<tr>
				<td>getId()<br/>getEmprunteur()<br/>getObjetEmprunte()<br/>getDebut()<br/>getFinReelle()<br/>getFinPrevue()<br/>getCoutParJour()</td>
				<td>
					<?php
						echo $unPret->getId()."<br/>";
						echo $unPret->getEmprunteur()."<br/>";
						echo $unPret->getObjetEmprunte()."<br/>";
						echo $unPret->getDebut()->format('Y-m-d')."<br/>";
						echo $unPret->getFinReelle()."<br/>";
						echo $unPret->getFinPrevue()->format('Y-m-d')."<br/>";
						echo $unPret->getCoutParJour()."<br/>";
					?>
				</td>
			</tr>
			<tr>
				<td>calculerCoutEstime()<br/>enregistrerFinReelle() <br/>calculerCoutFinal</td>
				<td>
					<?php
						
						echo $unPret->calculerCoutEstime()."</br>";
						$unPret->enregistrerFinReelle(new DateTime('2020-09-17',new DateTimeZone('America/Montreal')));
						echo $unPret->getFinReelle()->format('Y-m-d')."<br/>";	
						echo $unPret->calculerCoutFinal();
					?>
				</td>
			</tr>
		</tbody>
	</table>
	<br/>
	
	<!---- Retour au fichier d'accueil -->
	<h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>
</html>
