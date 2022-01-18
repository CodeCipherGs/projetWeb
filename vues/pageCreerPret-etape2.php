

<!DOCTYPE html>
<html lang="fr">
<head>
<title>Étape 2</title>
<meta charset="utf-8" />
	<?php 
			include DOSSIER_BASE_INCLUDE."vues/inclusions/partieHead.inc.php"; 
			include DOSSIER_BASE_INCLUDE."vues/inclusions/fonctionsAffichage.inc.php"; 
		?>
</head>
<body class="bg-secondary">
<div>
	<?php
		include DOSSIER_BASE_INCLUDE."vues/inclusions/fonctionMenu.inc.php";
		afficherMenu("active",$controleur->getActeur());
	?>
	
	<div  class="container-fluid text-center" style="width: 400px">	
		
		<h1>Étape 2 </h1>
		<div class=" bg-success text-center border border-dark" >
			<h2> Création d'un nouveau Client </h2>
			<?php
				afficherMessagesErreur($controleur->getMessagesErreur());
			?>
		
			<form action="?action=creerPretEtape2" method="post">
				<input type="hidden" id="numero" name="CreerPret" />
				<div>
					<label for="numeroNouveau">Numéro :</label>
					<input type="number" id="numero" name="numeroNouveau" />
				</div>
				<br/>
				<div>
					<label for="prenomNouveau">Prénom :</label>
					<input type="text" id="prenom" name="prenomNouveau" />
				</div>
				<br/>
				<div>
					<label for="nomNouveau">Nom :</label>
					<input type="text" id="prenom" name="nomNouveau" />
				</div>
				<br/>
				<div>
					<label for="telephoneNouveau">Numero Telephone :</label>
					<input type="text" id="telephone" name="telephoneNouveau" />
				</div>
				<br/>
				<div>
					<label for="courrielNouveau">Courriel :</label>
					<input type="email" id="courriel" name="courrielNouveau" />
				</div>
				<br/>
				<div>
					<label for="soldeNouveau">Solde :</label>
					<input type="number" id="solde" name="soldeNouveau" />
				</div>
				<br/>
					<input type="submit" value="Étape suivante" />

			</form>
		
			<br/>

			<a href="?action=creerPretEtape1"><input type="submit" value="Étape précedente" /></a>
			<br/><br/>
		</div>
		<h3><a href="index.php">Accueil</a></h3>
		<h3><a href="?action=creerPretEtape1">Creer Pret</a></h3>

	</div>
	<div class="progress">
		    <div class="progress-bar" style="width:25%">25%</div>
	</div>
	<br/>
	<br/>
	<br/>
	<br/>
					<?php
          // ========= Pied de page ================
          include DOSSIER_BASE_INCLUDE."vues/inclusions/piedPage.inc.php";
        	?>
</body>
</html>