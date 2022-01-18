<!-- On redirige vers l'inde du site si on essaie d'avoir une accès direct -->
    <?php if(!ISSET($controleur)) header("Location: ..\index.php");?>	

<!DOCTYPE html>
<!-- 	
  Cours 420-G16-RO
  Session A2020 - Projet
  Fichier     : pageChangerMotPasse.php
  Description : page le mot de passe
  Noms        : Ziyu Han ghilas saoudi
-->	
<html lang="fr">
	<!-- ************************ Section HEAD ******************************* -->
	<head>
		<meta charset="UTF-8" />
		<?php 
			include DOSSIER_BASE_INCLUDE."vues/inclusions/partieHead.inc.php"; 
		?>

	</head>
	<!-- ************************ Section BODY ******************************* -->
    <body class="container-fluid bg-dark ">
		<div>
			<?php
				include DOSSIER_BASE_INCLUDE."vues/inclusions/fonctionMenu.inc.php";
				afficherMenu("active",$controleur->getActeur());
			?>
		</div>
     <br/>
  <br/>
    <div  class="container-fluid card bg-success text-dark border border-danger text-center  " style="width: 300px"
    >
    <div class="font-weight-bold">
        <h1>Changer Mot De Passe</h1>
          
        <form action="?action=changerMotPasse" method="post">
            <input type="hidden" id="numero" name="changerMotPasse" />
            <div>
              <label for="prenom" >Nom Utilisateur :</label>
              <input type="text" id="debut" name="nomUtilisateur" />
            </div>
            <br/>
            <div>
              <label for="prenom">Ancien mot de passe :</label>
              <input type="password" id="retour" name="motPasseAncien" />
            </div>
            <br/>
            <div>
             <label for="prenom">Nouveau mot de passe :</label>
             <input type="password" id="retour" name="motPasseNouveau" />
            </div>
            <br/>
            <div>
             <label for="prenom">Confirmer mot de passe:</label>
             <input type="password" id="montant" name="motPasseConfirmer" />
            </div>
            <br/>
            <input type="submit" value="Changer Mot de Passe" />
        </form>
      <br/>
      </div>
     
    </div>
        
		
  <br/> <br/>
  <br/> <br/>
  <br/> <br/>
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