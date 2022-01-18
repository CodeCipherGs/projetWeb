<!-- On redirige vers l'inde du site si on essaie d'avoir une accès direct -->
<?php if(!ISSET($controleur)) header("Location: ..\index.php");?>	

<!DOCTYPE html>
<!-- 	
  Cours 420-G16-RO
  Session A2020 - Projet
  Fichier     : pageAlouer.php
  Description : page pour louer les autos
  Noms        : Ziyu Han
-->	
<html lang="fr">
	<!-- ************************ Section HEAD ******************************* -->
	<head>
		<meta charset="UTF-8" />
		<?php 
			include DOSSIER_BASE_INCLUDE."vues/inclusions/partieHead.inc.php";
			include_once DOSSIER_BASE_INCLUDE."modele/DAO/AutomobilesDAO.class.php"; 
		?>

	</head>
	  <body  class="bg-danger">
		<div>
			<?php
				include DOSSIER_BASE_INCLUDE."vues/inclusions/fonctionMenu.inc.php";
				afficherMenu("active",$controleur->getActeur());
			?>
			</div>
		<div class="container-fluid text-center">	
			<h2>Formulaire de recherche </h2></br>
			<div class="row  border border-danger bg-primary">
				
					<div class=" col-md-4">
						<form action="?action=aLouer" method="post" >
							<input type="hidden" name="ProduitDispo" value="true" />
							<div>
								<h4>Tous les véhicules disponibles :</h4>
											
								<input type="hidden" name="ProduitDispo" value="true" />
								<label for="type">Par disponibilité</label>
						
									<div>
										<input type="text" name="disponibilite" />
									</div>
								<div>
									<input type="submit" value="Soumettre"/>
								</div>
							</div>	
						</form>
					
					</div>
					<div class=" col-md-4">
						<h4>Les informations du véhicule sélectionné :</h4>
						<div>
							<?php
								$tabProduit=$controleur->getTabProduit();
								$unFormulaire=$controleur->getFormulaire();
								if ($unFormulaire== "ProduitDispo") {
						
									if ($tabProduit==null) {
										echo "<p>Aucun produit trouvé. Utilisez le formulaire";
										echo " pour effectuer une nouvelle recherche.</p>";
									} else {
										echo "<ul>";
							            foreach($tabProduit as $leProduit) {
			       			                echo "<h4>$leProduit</h4>";
							                 }
							            echo "</ul>";
										
									}
								}
							?>
						</div>
					</div>
			</div>
			<div class="row  border border-danger bg-primary">
	
					<div class=" col-md-4">
						<form action="?action=aLouer" method="post" >
							<input type="hidden" name="ProduitParCode" value="true" />
							<div>
								<h4>Véhicule correspondant à un code(a01 - a05) :</h4>
											
								<input type="hidden" name="ProduitParCode" value="true" />
								<label for="type">Par Code</label>
						
									<div>
										<input type="text" name="codeAuto" />
									</div>
								<div>
									<input type="submit" value="Soumettre"/>
								</div>
							</div>	
						</form>
					
					</div>
					<div class=" col-md-4">
						<h4>Les informations du véhicule sélectionné</h4>
						<div>
							<?php
							$unFormulaire=$controleur->getFormulaire();
							$unProduit=$controleur->getProduit();
							if ($unFormulaire == "ProduitParCode") {
					
								
								if ($unProduit==null) {
									echo "<p>Aucun produit trouvé. Utilisez le formulaire";
									echo " pour effectuer une nouvelle recherche.</p>";
								} else {   
		       			              echo "<h4>$unProduit</h4>";

								}
							}
							?>
						</div>
					</div>
			</div>
			<div class="row  border border-danger bg-primary">
	
					<div class=" col-md-4">
						<form action="?action=aLouer" method="post" >
							<input type="hidden" name="ProduitParNom" value="true" />
							<div>
								<h4>Véhicule dont un mot, ou un bout de phrase, apparait dans le nom:</h4>
											
								<input type="hidden" name="ProduitParNom" value="true" />
								<label for="type">Par nom</label>
						
									<div>
										<input type="text" name="titreAuto" />
									</div>
								<div>
									<input type="submit" value="Soumettre"/>
								</div>
							</div>	
						</form>
					
					</div>
					<div class=" col-md-4">
						<h4>Les informations du véhicule sélectionné</h4>
						<div>
							<?php
								$tableauProduit=$controleur->getTabProduit();
								$unFormulaire=$controleur->getFormulaire();
								
				
								if ($unFormulaire == "ProduitParNom") {
									
									if ($tableauProduit==null) {
										echo "<p>Aucun produit trouvé. Utilisez le formulaire";
										echo " pour effectuer une nouvelle recherche.</p>";
												
									
									} else {   
			       			             echo "<ul>";
							            foreach($tableauProduit as $Produit) {
			       			                echo "<h4>$Produit</h4>";
							                 }
							            echo "</ul>";
										
									}
								}
							?>
						</div>
					</div>
						<br/>

	
			</div>

		</div>
<br/>
	<br/>
	<br/>
		<br/>
	<br/>
	<br/>
	<br/>
	<br/><br/><br/><br/>

			<?php
          // ========= Pied de page ================
          include DOSSIER_BASE_INCLUDE."vues/inclusions/piedPage.inc.php";
        	?>

	</body>
</html>