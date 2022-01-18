<!DOCTYPE html>
<html lang="fr">
<head>
<title>Étape 4</title>
<meta charset="utf-8" />
	<?php 
			include DOSSIER_BASE_INCLUDE."vues/inclusions/partieHead.inc.php"; 
			include DOSSIER_BASE_INCLUDE."vues/inclusions/fonctionsAffichage.inc.php"; 
		?>
</head>
<body class="bg-secondary">
	<?php
		include DOSSIER_BASE_INCLUDE."vues/inclusions/fonctionMenu.inc.php";
		afficherMenu("active",$controleur->getActeur());
	?>
	
	<div  class="container-fluid text-center" style="width: 400px">	
		<h1>Étape 4 </h1>
		<br/>
		<div class=" bg-success text-center border border-dark" >
			<h2> Produit à louer </h2>
			<br/>
			<?php
				afficherMessagesErreur($controleur->getMessagesErreur());
			?>
			<form action="?action=creerPretEtape4" method="post">
				<input type="hidden" id="numero" name="infoPret" />
				<div>
					<label for="prenom">Début :</label>
					<input type="date" id="debut" name="debutPret" />
				</div>
				<br/>
				<div>
					<label for="prenom">Retour prévu :</label>
					<input type="date" id="retour" name="retourPrevuPret" />
				</div>
				<br/>
				<div>
					<label for="prenom">Montant prépayé:</label>
					<input type="number" id="montant" name="montantPrepaye"/>
				</div>
				<br/>
				<input type="submit" value="Étape suivante" />

			</form>
			<br/>
			<a href="?action=creerPretEtape3"><input type="submit" value="Étape précedente" /></a>
			<br/>
			<br/>
			</div>
		<div class="">	
			<br/>
			<h3><a href="index.php">Accueil</a></h3>
			<br/>
			<h3><a href="?action=creerPretEtape1">Creer Pret</a></h3>
		</div>
		<br/>
		<br/>
		<br/>
	</div>
	<div class="progress">
	  		<div class="progress-bar" style="width:75%">75%</div>
	</div>

	<br/>
	<br/>
	<br/>>
	<br/>
	<br/>
	<br/>
					<?php
          // ========= Pied de page ================
          include DOSSIER_BASE_INCLUDE."vues/inclusions/piedPage.inc.php";
        	?>
</body>
</html>