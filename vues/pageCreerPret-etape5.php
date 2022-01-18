<?php if(!ISSET($controleur)) header("Location: ..\index.php");?>	

<!DOCTYPE html>
<html lang="fr">
<head>
<title>Étape 5</title>
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
	
	<div  class="container-fluid text-center" style="width: 600px">		
		<h1>Étape 5 </h1>
		<br/>
		<div class=" bg-success text-center border border-dark" >
		<h2> Page de confirmation </h2>
		<br/>
		<br/>
					<?php
						//afficherMessagesErreur($controleur->getMessagesErreur());

						
						$unPret=$controleur->getPret();
						//echo var_dump($unPret);
							if ($unPret==null) {
								echo "<p>Aucun produit trouvé. Utilisez le formulaire";
								echo " pour effectuer une nouvelle recherche.</p>";
							} else {   
			       				echo "<h4> LE PRÊT À ÉTÉ CRÉE AVEC SUCCÉS</h4>";
			       				echo "<br/>";
			       				echo "<h4> LE MONTANT PRÉPAYÉ À ÉTÉ DÉDUIT DE VOTRE SOLDE</h4>";
							}
						
					?>
	
		</div>
		<h3><a href="index.php">Accueil</a></h3>
		<br/>
		<h3><a href="?action=creerPretEtape1">Creer Pret</a></h3>
		<br/>
	</div>
	<br/>
	<br/>
	<br/>
	<br/>	
	<div class="progress">
		  <div class="progress-bar" style="width:100%">100%</div>
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

	

					<?php
          // ========= Pied de page ================
          include DOSSIER_BASE_INCLUDE."vues/inclusions/piedPage.inc.php";
        	?>
</body>
</html>