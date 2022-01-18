<!DOCTYPE html>
<html lang="fr">
<head>
<title>Terminer Pret</title>
<meta charset="utf-8" />
	<?php 
			include DOSSIER_BASE_INCLUDE."vues/inclusions/partieHead.inc.php"; 
			include DOSSIER_BASE_INCLUDE."vues/inclusions/fonctionsAffichage.inc.php"; 
		?>
</head>
<body class="bg-dark">
	<div>
			<?php
				include DOSSIER_BASE_INCLUDE."vues/inclusions/fonctionMenu.inc.php";
				afficherMenu("active",$controleur->getActeur());
			?>
	</div>
	<br/>
	<div  class="container-fluid text-center" style="width: 400px">	
		<div class="row">
			<div class=" bg-success text-center border border-dark" >
				
				<h1>Recherche d’un prêt par id </h1>
				<div class="col-md-12">
					<form action="?action=terminerPret" method="post">
						<input type="hidden" id="numero" name="ChercherPret" />
						<div>
							<label for="id">ID :</label>
							<input type="text" id="id" name="idPret" />
						</div>
						<br/>
						<div>
							<label for="dateRetour"> Date de retour  :</label>
							<input type="Date" id="dateRetour" name="dateRetour" />
						</div>
						<br/>
						<input type="submit" value="submit" />

					</form>
					<br/>
				</div>
			</div>	
			<div class=" bg-primary text-center border border-dark" >	
			<div class="col-md-12">
			<h2> Affichage </h2>
			<br/>
						<?php
							$unPret=$controleur->getPret();
							//echo var_dump($unPret);
								if ($unPret==null) {
									echo "<p>Aucun produit trouvé. Utilisez le formulaire";
									echo " pour effectuer une nouvelle recherche.</p>";
								} else {   
									echo "<h3> Le Prêt: </h3>";
				       				echo "<h4>".$unPret."</h4>";
									echo "<h3> Le Solde du Client: </h3>";
				       				echo "<h4>".ConsommateurDAO::chercher($unPret->getEmprunteur()->getNumero())->getSolde()."</h4>";
				       				echo "<h3> Le Produit: </h3>";
				       				echo "<h4>".$unPret->getObjetEmprunte()."</h4>";
				       				echo "<h3> Le cout final: </h3>";
				       				echo "<h4>".$unPret->calculerCoutFinal()."</h4>";
								}
							
						?>
						<br/>
			</div>
		</div>
			<div class=" bg-success text-center border border-dark" >			
			<h2> Terminer le prêt  </h2>
			<br/>
			<?php
				afficherMessagesErreur($controleur->getMessagesErreur());
			?>
			<div class="col-md-12">
				<form action="?action=terminerPret" method="post">
					<input type="hidden" id="pret" name="terminerPret" />
					<label for="Montant"> Montant À Payé  :</label>
					<input type="number" id="Montant" name="MontantPaye" />

					<input type="submit" value="submit" />
				</form>
			</div>
			<br/>
		</div>
		<br/>
			<h3><a href="index.php">Accueil </a></h3>
			<br/>
			
			<h3><a href="?action=terminerPret">Terminer prêt</a></h3>
			
	</div>
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