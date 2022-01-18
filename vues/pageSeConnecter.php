<!-- On redirige vers l'inde du site si on essaie d'avoir une accès direct -->
	<?php if(!ISSET($controleur)) header("Location: ..\index.php");?>	

<!DOCTYPE html>
<!-- 	
  Cours 420-G16-RO
  Session A2020 - Projet
  Fichier     : pageSeConnecter.php
  Description : page permettant à un utilisateur de se connecter 
  Noms        : saoudi ghilas ziyu han
-->	
<html lang="fr">
	<!-- ************************ Section HEAD ******************************* -->
	<head>
		<?php include DOSSIER_BASE_INCLUDE."vues/inclusions/partieHead.inc.php"; ?>
	</head>
	<!-- ************************ Section BODY ******************************* -->
	<body class="bg-dark">
		<div>
			<?php
				include DOSSIER_BASE_INCLUDE."vues/inclusions/fonctionMenu.inc.php";
				afficherMenu("active",$controleur->getActeur());
			?>
		</div>
		<!---------------------------- A REMPLACER PAR VOTRE VUE ---------------------------------->
		<br/><br/>
		<br/>
		<br/>


		<div  class="container-fluid text-center" style="width: 400px">	

		<div class=" bg-success text-center border border-dark" >
			<br/>
			<h2> Se connecter </h2>
			<br/>
			<br/>

			<form action="?action=seConnecter" method="post">
				<div class = "form-group">
					<label for = "nom_utilisateur"> Nom utilisateur:</label>
					<input type="text" class="form-control" placeholder="entrer votre nom" name="nom_utilisateur">
				</div>
				<br/>

				<div class = "form-group">
					<label for = "password">Mot passe:</label>
					<input type="password" class="form-control" placeholder="entrer votre mot de passe" name="mot_passe">
				</div>
				<br/>

				<div class = "form-group form-check">
					<label class="form-check-label">
						  <input class="form-check-input" type="checkbox"> Remember me
					</label>
				</div> 
				<button type="submit" value="Se connecter" class="btn btn-primary">Submit</button>

			</form>
			<br/>

		</div>
		<br/>

		<a href="?action=voirAccueil">page d'accueil</a>
		<br/>

		</div>	
		<br/>
		<br/>
		<br/><br/>
		<br/><br/>
		<br/>
			<?php
          // ========= Pied de page ================
          include DOSSIER_BASE_INCLUDE."vues/inclusions/piedPage.inc.php";
        	?>	
	</body>
</html>
