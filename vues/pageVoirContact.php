<!-- On redirige vers l'inde du site si on essaie d'avoir une accès direct -->
<?php if(!ISSET($controleur)) header("Location: ..\index.php");?>	

<!DOCTYPE html>
<!-- 	
  Cours 420-G16-RO
  Session A2020 - Projet
  Fichier     : pageChangerMotPasse.php
  Description : page le mot de passe
  Noms        : Ziyu Han
-->	
<html lang="fr">
	<!-- ************************ Section HEAD ******************************* -->
	<head>
		<meta charset="UTF-8" />
		<?php 
			include DOSSIER_BASE_INCLUDE."vues/inclusions/partieHead.inc.php"; 
		?>
    <style type="text/css">
      .center { 
            width: auto;
            display: table;
            margin-left: auto;
            margin-right: auto; 
          }
    </style>
	</head>
	<!-- ************************ Section BODY ******************************* -->
    <body class="container-fluid card bg-dark text-dark border border-danger text-center  " >
		<div>
			<?php
				include DOSSIER_BASE_INCLUDE."vues/inclusions/fonctionMenu.inc.php";
				afficherMenu("active",$controleur->getActeur());
			?>
		</div>
     <br/>
		<!---------------------------- A REMPLACER PAR VOTRE VUE ---------------------------------->
    <div class="center">
        <div class="card  border border-danger" style="width:300px">
            <img class="card-img-top " src="images/college_rosemont.jpg" alt="college">
            <div class="card-body">
                <h4 class="card-title text-danger">Contact us</h4>
                <?php 
                    $unUtilisateur=UtilisateurDAO::chercher("ghilas");
                    echo "<p class='card-text text-primary'> Propriétaire : ".$unUtilisateur;
                    echo "<br/>";
                    $unUtilisateur=UtilisateurDAO::chercher("ziyu");
                    echo "Gérant : ".$unUtilisateur;
                    echo " <br/>";
                    echo "<br/>Téléphone : 514 376-1620";
                    echo " <br/>";
                    echo "</br> Adresse : 6400, 16e Avenue Montréal (Québec) H1X 2S9 </p>";
                ?>
            </div>
        </div>
    </div>
     <br/>	
		<a href="?action=voirAccueil " class="font-weight-bold"><h3>page d'accueil</h3></a>
    <br/>
    <br/>
    <br/>
              <?php
          // ========= Pied de page ================
          include DOSSIER_BASE_INCLUDE."vues/inclusions/piedPage.inc.php";
          ?>
	</body>
</html>