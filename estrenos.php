<!doctype html> 

<html lang="es">
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/header-footer.css">
		<link rel="stylesheet" type="text/css" href="css/asidescss/aside.css">
		<link rel="stylesheet" type="text/css" href="css/asidescss/estrenosaside.css">
		<link rel="stylesheet" type="text/css" href="css/moviedisplaycss.css">
		
				

		<title> Cines Subbética </title>
	</head>

	<body>
		<header>
			<?php include('includes/header.inc.php'); ?>
		</header>
		
		<main>
			<?php
				include('includes/aside.inc.php');
			?>
			<section class="fullDisplay">
				<section class="moviesDisplay">
					<h5 id="estsemana">ESTRENOS DE LA SEMANA</h5>
					<article>
						<a href="peli1.html"><img class="moviesDisplay" src = "imagenes/creed3.jpg" alt = "ERROR"  width="265" height="377"/> </a>
						<p><i class="material-icons">info</i> CREED III</p>
					</article>

					<article>
						<a href="peli2.html"><img class="moviesDisplay" src = "imagenes/elextrano.jpg" alt = "ERROR"  width="265" height="377"> </a>
						<p><i class="material-icons">info</i> EL EXTRAÑO</p>
					</article>

					<article>
						<a href="peli3.html"><img class="moviesDisplay" src = "imagenes/iberia.jpg" alt = "ERROR"  width="265" height="377"> </a>
						<p><i class="material-icons">info</i> IBERIA NATURALEZA INFINITA</p>
					</article>

					<article>
						<a href="peli4.html"><img class="moviesDisplay" src = "imagenes/mosqueteros.jpg" alt = "ERROR"  width="265" height="377"> </a>
						<p><i class="material-icons">info</i> LOS TRES MOSQUETEROS</p>
					</article>

					<article>
						<a href="peli5.html"><img class="moviesDisplay" src = "imagenes/suzume.jpg" alt = "ERROR"  width="265" height="377"> </a>
						<p><i class="material-icons">info</i>SUZUME</p>
					</article>

					<article>
						<a href="peli6.html"><img class="moviesDisplay" src = "imagenes/jhonwick4.jpg" alt = "ERROR"  width="265" height="377"> </a>
						<p><i class="material-icons">info</i>JOHN WICK 4</p>
					</article>

					<article>
						<a href="peli7.html"><img class="moviesDisplay" src = "imagenes/renfield.jpg" alt = "ERROR"  width="265" height="377"> </a>
						<p><i class="material-icons">info</i>RENFIELD</p>
					</article>
					
					<article>
						<a href="peli8.html"><img class="moviesDisplay" src = "imagenes/air.jpg" alt = "ERROR"  width="265" height="377"> </a>
						<p><i class="material-icons">info</i>AIR</p>
					</article>
					
					
					
				</section>

				
			</section>
		</main>

	    <footer id="pie">
	    	<?php include('includes/footer.inc.php'); ?>
	    </footer>

	</body>	
</html>