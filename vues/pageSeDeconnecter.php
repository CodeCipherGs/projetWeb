<!-- On redirige vers l'inde du site si on essaie d'avoir une accès direct -->
	<?php if(!ISSET($controleur)) header("Location: ..\index.php");?>	

<!DOCTYPE html>
<!-- 	
  Cours 420-G16-RO
  Session A2020 - Projet
  Fichier     : pageSeDeconnecter.php
  Description : page permettant à un utilisateur de se déconnecter 
  Noms        : ziyu han saoudi ghilas
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
		<br/><br/><br/><br/><br/><br/><br/><br/>
		<br/><br/><br/><br/><br/><br/><br/><br/>
		<div >
			
				<div style="width: 500px"class="container-fluid  text-center container-md border border-danger container p-3 my-3 bg-primary " >
					<form action="?action=seDeconnecter" method="post">
						<input type="hidden" name="deconnexion"/>
						<input type="submit" value="Confirmer la déconnexion"/>
					</form>
				
				</div>
			
		</div>	
		<div class="text-center">
			<a href="?action=voirAccueil" class="text-info font-weight-bold"><h3>page d'accueil</h3></a>	
		</div>
			<br/>
	<br/><br/><br/><br/><br/><br/><br/><br/><br/>
	<br/>
	<br/>
					<?php
          // ========= Pied de page ================
          include DOSSIER_BASE_INCLUDE."vues/inclusions/piedPage.inc.php";
        	?>
	</body>
</html>
