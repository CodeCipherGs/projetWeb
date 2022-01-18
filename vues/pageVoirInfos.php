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
      include_once DOSSIER_BASE_INCLUDE."modele/DAO/AutomobilesDAO.class.php"; 
		?>
    <link rel="stylesheet" href="<?php echo DOSSIER_BASE_LIENS;?>/css/projet.css" />
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
   <div  >

      <!-- colonne 2 -->
      <div >
        <div class="container-fluid card bg-warning text-dark border border-danger text-center  ">
          <h1> 3 Statistiques Sur Notre Site :</h1>
        </div>
<br/><br/>
        <div >
         
          <div class="container-fluid card bg-success text-dark border border-danger text-center  ">
            <h2>Nombre D’employés :</h2>
            <div>
              <p>
               <?php 
                    $tabUtilisateur=UtilisateurDAO::chercherTous();
                    $i=1;
                    foreach ($tabUtilisateur as $unUtilisateur) {
                     echo "<p class='card-text '> Employé ".$i." : ".$unUtilisateur;
                      $i++;
                    }
                   
                ?>
              </p>
            
            </div>
          </div>
   <br/><br/>
          <div class=" container-fluid card bg-warning text-dark border border-danger   ">
            <div class="text-center">
              <h2> La Disponibilité Des Voitures :</h2>
            </div>  
            <div >
            <?php
    
                $tableauDispo=AutomobilesDAO::chercherAvecFiltre("WHERE disponibilite LIKE 'disponible'");
                $tableau=AutomobilesDAO::chercherTous("WHERE disponibilite LIKE 'disponible'");
                $tableau1=AutomobilesDAO::chercherAvecFiltre("WHERE disponibilite LIKE 'prêté'");
                echo "<ul>";
                  echo "<li class='text-primary'> Total : ".count($tableau)."</li>";
                  echo "<li class='text-danger'> Prêtés : ".count($tableau1)."</li>";
                  echo "<li class='text-success'> Disponibles : ".count($tableauDispo)."</li>";

                echo "</ul>";
            ?>

            </div>
          </div>
          <br/><br/>
        <div class="container-fluid card bg-primary text-dark border border-success ">
          <div class="text-center">
            <h2>  Les 3 Véhicules Les Moins Chers :</h2>
          </div>  
            <div>
              <?php
                $tableau=AutomobilesDAO::chercherAvecFiltre("ORDER BY cout_par_jour_suggere ASC LIMIT 3");
                  echo "<ul>";
                  foreach($tableau as $uneAutomobile) {

                    echo "<li> Modèle : ".$uneAutomobile->getNom()." + Prix : ".$uneAutomobile->getCout_par_jour_suggere()." </li> <br/>";
                  }
                  echo "</ul>";
              ?>

            </div>
          </div>
        </div>
  
      </div>
    </div>
<br/><br/><br/><br/>
      <?php
          // ========= Pied de page ================
          include DOSSIER_BASE_INCLUDE."vues/inclusions/piedPage.inc.php";
        ?>
  
	</body>
</html>