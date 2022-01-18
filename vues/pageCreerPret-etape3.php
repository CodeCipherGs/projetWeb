
<!DOCTYPE html>
<html lang="fr">
<head>
<title>Étape 3</title>
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
		<h1>Étape 3 </h1>
		<br/>
		<div class=" bg-success text-center border border-dark" >
			<h2> Produit à louer </h2>
			<br/>
			<?php
				afficherMessagesErreur($controleur->getMessagesErreur());
			?>
			<form action="?action=creerPretEtape3" method="post">
				<input type="hidden" id="numero" name="produitLouer" />
				<label for="prenom">code (a01- a05):</label>
				<input type="text" id="code" name="codeProduit" />
				<br/>
				<br/>
				<input type="submit" value="Étape suivante" />

			</form>
			<br/>
			<a href="?action=creerPretEtape1"><input type="submit" value="Étape précedente" /></a>
		<br/>
		<br/>
		</div>
		<br/>
		<h3><a href="index.php">Accueil</a></h3>
		<h3><a href="?action=creerPretEtape1">Creer Pret</a></h3>
		<br/>
	</div>


	<div class="progress">
			<div class="progress-bar" style="width:50%">50%</div>
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
				<?php
          // ========= Pied de page ================
          include DOSSIER_BASE_INCLUDE."vues/inclusions/piedPage.inc.php";
        	?>
</body>
</html>