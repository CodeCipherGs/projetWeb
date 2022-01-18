<!-- On redirige vers l'inde du site si on essaie d'avoir une accès direct -->
	<?php if(!ISSET($controleur)) header("Location: ..\index.php");?>	

<!DOCTYPE html>
<!-- 	
  Cours 420-G16-RO
  Session A2020 - Projet
  Fichier     : pageAccueil.php
  Description : page principale d'accueil du site  
  Noms        : Ziyu Han
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
	<body class="bg-dark">
		<div>
			<?php
				include DOSSIER_BASE_INCLUDE."vues/inclusions/fonctionMenu.inc.php";
				afficherMenu("active",$controleur->getActeur());
			?>
		</div>
		<br/>
		
		<div  class="container-fluid">	
			<div class="text-center" style="width:auto; ">

				<div class="card bg-warning text-dark border border-danger text-center  " > <!-- avec exemple d'utilisation de Bootstrap ... -->
					<?php echo "Type d'usager : ".$controleur->getActeur();?>
				</div>
			
			</div>
				<br/>
			<div id="demo" class="carousel slide " data-ride="carousel">

				  <!-- Indicators -->
				  <ul class="carousel-indicators">
					    <li data-target="#demo" data-slide-to="0" class="active"></li>
					    <li data-target="#demo" data-slide-to="1"></li>
					    <li data-target="#demo" data-slide-to="2"></li>
					  	<li data-target="#demo" data-slide-to="3"></li>
					    <li data-target="#demo" data-slide-to="4"></li>

				  </ul>


				  <!-- The slideshow -->
				  <div class="carousel-inner ">
					    <div class="carousel-item active ">
					      <img src="images/camaro.jpg" alt="camaro" class="mx-auto d-block " width="1300" height="650">
					    </div>
					    <div class="carousel-item ">
					    <img src="images/g63.jpg" alt="g63" class="mx-auto d-block" width="1300" height="650">
					    </div>
					      <div class="carousel-item ">
					      <img src="images/rs6.jpg" alt="rs6"  class="mx-auto d-block" width="1300" height="650">
					    </div>
					      <div class="carousel-item ">
					      <img src="images/911.jpg" alt="911"  class="mx-auto d-block" width="1300" height="650">
					    </div>
				 		<div class="carousel-item ">
					      <img src="images/mustang.jpg" alt="mustang" class="mx-auto d-block" width="1300" height="650">
					    </div>
				  </div>

				  <!-- Left and right controls -->
				  <a class="carousel-control-prev" href="#demo" data-slide="prev">
				    <span class="carousel-control-prev-icon"></span>
				  </a>
				  <a class="carousel-control-next" href="#demo" data-slide="next">
				    <span class="carousel-control-next-icon"></span>
				  </a>

			</div>
		</div>	
		<br/>
		<br/>
		<br/>
							<?php
          // ========= Pied de page ================
          include DOSSIER_BASE_INCLUDE."vues/inclusions/piedPage.inc.php";
        	?>
	</body>
</html>
