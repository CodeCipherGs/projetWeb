<!DOCTYPE html>
<html lang="fr">
<head>
<title>Étape 1</title>
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
	</div>

	<div  class="container-fluid text-center" style="width: 400px">	
		<h1>Étape 1 </h1>
		<div class=" bg-success text-center border border-dark" >
			<h2> Client Existant </h2>
			<?php
				afficherMessagesErreur($controleur->getMessagesErreur());
			?>
			<form action="?action=creerPretEtape1" method="post">
				<input type="hidden" id="numero" name="ChercherPret" />
				<label for="numeroClient">Numéro :</label>
				<input type="number" id="numeroClient" name="numeroClient" />
				<input type="submit" value="Étape suivante" />
			</form>
			<h2> Nouveau Client  </h2>
			<form action="?action=creerPretEtape1" method="post">
			<input type="hidden" id="Nouveau" name="Nouveau" />
			<input type="submit" value="Étape suivante" />
			
		</form>
	</div>

		<h3><a href="index.php">Accueil</a></h3>
		<h3><a href="?action=creerPretEtape1">Creer Pret</a></h3>
	</div>
	<br/>
	<br/>
	<br/>
	<br/>
			<div class="progress">
		    <div class="progress-bar" style="width:10%">10%</div>
		</div>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
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