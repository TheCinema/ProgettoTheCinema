<?php
	session_start();
 ?>
<html>


		<head>
				<title>The Cinema </title>
			<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		  <link rel="stylesheet" type="text/css" href="style.css" />
		  <link rel="stylesheet" type="text/css" href="File-CSS/swiper.min.css" />

			<script
						src="https://kit.fontawesome.com/81c2c05f29.js"
						crossorigin="anonymous">
					const openIcon = document.querySelector('.icon');
					const linksWrapper = document.querySelector('.links-wrapper');
					const backdrop = document.querySelector('.backdrop');
					const closeIcon = document.querySelector('.close-btn');

					openIcon.addEventListener('click', () => {
						linksWrapper.classList.add('open');
					});
					closeIcon.addEventListener('click', () => {
						linksWrapper.classList.remove('open');
					});
					backdrop.addEventListener('click', () => {
						linksWrapper.classList.remove('open');
					});
			</script>
			<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

		<style>
		  @import url("https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css");
			@import url('https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap');

			* {
				margin: 0;
				padding: 0;
			}
			body {
				background: rgb(253,187,45);
				background: linear-gradient(0deg, rgba(253,187,45,1) 0%, rgba(34,193,195,1) 100%);
				min-height: 100vh;
				font-family: 'Poppins';
				overflow-x: hidden;
			}
			/* Desktop view */
			.navbar {
				z-index: 9999;/* non faccio sovrapporre gli altri oggetti*/
				width: 100%;
				background: rgba(34,193,195,1);
				border-bottom: 1px solid #ccc;
				display: flex;
				justify-content: space-between;
				align-items: center;
				padding: 5px 30px;
				box-sizing: border-box;
				position: fixed;
			}
			.icon,
			.close-btn {
				display: none;
				font-size: 1.2em;
				cursor: pointer;
			}
			.links {
				display: flex;
				list-style: none;
				background: rgba(34,193,195,1);
			}
			.links li {
				margin-top: 20px;
				margin-bottom: 10px;
				margin-right: 24px;
			}
			.links li a {
				text-decoration: none;
				color: #575757;
				letter-spacing: -0.5px;
			}
			.links li a:hover {
				color: #000;
			}
			.backdrop {
				display: none;
				animation: 0.4s ease-in-out fadeIn forwards;
				position: absolute;
				top: 0;
				bottom: 0;
				right: 0;
				left: 0;
				background: rgba(0, 0, 0, 0);
				cursor: pointer;
			}
			@keyframes fadeIn {
				to {
					background: rgba(0, 0, 0, 0.8);
				}
			}
			/* Mobile view */
			@media (max-width: 675px) {
				.icon,
				.close-btn {
					display: block;
				}
				.icon {
					position: absolute;
					right: 24px;
				}
				.links {
					position: absolute;
					top: 0;
					height: 100%;
					width: 90%;
					right: -90%;
					background: #f8eeee;
					flex-direction: column;
					justify-content: center;
					text-align: center;
					z-index: 2;
					transition: 0.3s ease-in-out;
				}
				.links li {
					margin-right: 0;
					margin-bottom: 50px;
					font-size: 1.5em;
				}
				.close-btn {
					position: absolute;
					top: 24px;
					right: -90vh;
					color: #575757;
					font-size: 2em;
					z-index: 3;
					transition: 0.3s ease-in-out;
				}
				.close-btn:hover {
					color: #000;
					cursor: pointer;
				}
				/* Open class */
				.open .links {
					right: 0;
				}
				.open .close-btn {
					right: 32px;
				}
				.open .backdrop {
					display: block;
				}
			}

			.logoTheCinema {
				vertical-align: middle;
				border: 0;
				max-width: 100%;
				width: 40px;
			}


			.title{
				text-align: center;
			  padding-top: 10%;
			}

		/* scroll immagini al centro*/
			.swiper-container {
				width: 100%;
				padding-top: 80px;
				padding-bottom: 20px;
			}
			.swiper-slide {
				background-position: center;
				background-size: cover;
				width: 350px;
				height: 200px;
				background: #000;
			}
			.swiper-slide .imgBx{
				width: 100%;
				height: 100%;
				overflow: hidden;
			}

			.swiper-slide .imgBx img{
				width: 100%;
			}
			.swiper-slide .details{
				box-sizing: border-box;

				padding: 20px;
			}
			.swiper-slide .details h3{
				margin: 0;
				padding: 0;
				font-size: 20px;
				text-align: center;
				line-height: 20px;
			}

		/*blocco in basso del sito*/
			.footer, .push {
				border-top: 1px solid #ccc;
				background: black;
				text-align: center;
			  height: 100px;
			}

			</style>

		</head>

<body>
	<body>
		<?php
		include "connessione.php";
			//non sono admin

			$_SESSION["dataDaMantenere"]=null;
			$_SESSION["datiLoginNonPresenti"]=null;
			$_SESSION["logFallito"]=null;
			$_SESSION["regsterFall"]=null;
			if(empty($_SESSION["log"])){
					//home senza aver effettuato il login
					$_SESSION["editMode"]=null;
					$home = "

					<nav class=\"navbar\">
					 <h3>LOGO</h3>
					 <div class=\"icon\"><i class=\"fas fa-bars\"></i></div>
						<div class=\"links-wrapper active\">
							<div class=\"backdrop\"></div>
							<div class=\"close-btn\"><i class=\"fas fa-times\"></i></div>
							<ul class=\"links\">
								<li><a href=\"Home.php\"><b>HOME</b></a></li>
								<li><a href=\"Prenotazione/Prenotazione.php\"><b>PRENOTAZIONE</b></a></li>
								<li><a href=\"Registrazione/loginregister/Login-Registra.php\"><b>REGISTRATI - ACCEDI</b></a></li>
							</ul>
						</div>
					</nav>

					<h3 class=\"title\">FILM RECENTI</h3>


					<div class=\"swiper-container\">
			    	<div class=\"swiper-wrapper\">
						";
						/////////prendo le foto dal database //////////////////////////
						$arrFoto=Array();
						$sql = "SELECT film.foto,film.nome from film";
						$records=$conn->query($sql);
						if ( $records == TRUE) {
								//echo "<br>Query eseguita!";
						}else {
							die("Errore nella query: " . $conn->error);
						}
						//gestisco gli eventuali dati estratti dalla query
						if($records->num_rows == 0){
								///dati non corretti
									$_SESSION["logFallito"]="yes";
								header('Location: Login-Registra.php');
						}else{
								while($tupla=$records-> fetch_assoc()){
									//echo $tupla["id"];
									$foto=$tupla["foto"];
									$nome=$tupla["nome"];
									$arrFoto+=Array($nome=>$foto);
								}
							}

							foreach($arrFoto as $nome=>$foto){
								$home.="<div class=\"swiper-slide\">
					 			        <div class=\"imgBx\">
					 			          <img src=\"$foto\" />
					 			        </div>
					 			        <div class=\"details\">
					 			            <h3>$nome</h3>
					 			        </div>
					 						</div>";

							}

							$home.="

						    	</div>
			   				<div class=\"swiper-pagination\"></div>
						  </div>


						    <script type=\"text/javascript\" src=\"swiper.min.js\"></script>

						    <script>
							   var swiper = new Swiper('.swiper-container', {
						     effect: 'coverflow',
						     grabCursor: true,
						     centeredSlides: true,
						     slidesPerView: 'auto',
						     coverflowEffect: {
							       rotate: 50,
							       stretch: 0,
							       depth: 100,
							       modifier: 1,
							       slideShadows : true,
						     },
						     pagination: {
						       el: '.swiper-pagination',
						     },
						   });
						 </script>



					";

				echo $home;


			}else{
					$_SESSION["editMode"]=null;
				if(empty($_SESSION["privilegiAdmin"])){
					//Utente con privilegi normali
					$_SESSION["editMode"]=null;
							$home="
							<nav class=\"navbar\">
							 <h3 class=\"logo\">Immagine Logo</h3>
							 <div class=\"icon\"><i class=\"fas fa-bars\"></i></div>
								<div class=\"links-wrapper active\">
									<div class=\"backdrop\"></div>
									<div class=\"close-btn\"><i class=\"fas fa-times\"></i></div>
									<ul class=\"links\">
										<li><a href=\"Home.php\"><b>HOME</b></a></li>
										<li><a href=\"Prenotazione/prenotazione.php\"><b>PRENOTAZIONE</b></a></li>
										<li><a href=\"AreaPersonale/areaLogin.php\"><b>Area Personale</b></a></li>
									</ul>
								</div>
							</nav>

							<h3 class=\"title\">FILM RECENTI</h3>


							<div class=\"swiper-container\">
					    	<div class=\"swiper-wrapper\">";

								/////////prendo le foto dal database //////////////////////////
								$arrFoto=Array();
								$sql = "SELECT film.foto,film.nome from film";
								$records=$conn->query($sql);
								if ( $records == TRUE) {
										//echo "<br>Query eseguita!";
								}else {
									die("Errore nella query: " . $conn->error);
								}
								//gestisco gli eventuali dati estratti dalla query
								if($records->num_rows == 0){
										///dati non corretti
											$_SESSION["logFallito"]="yes";
										header('Location: Login-Registra.php');
								}else{
										while($tupla=$records-> fetch_assoc()){
											//echo $tupla["id"];
											$foto=$tupla["foto"];
											$nome=$tupla["nome"];
											$arrFoto+=Array($nome=>$foto);
										}
									}

									foreach($arrFoto as $nome=>$foto){
										$home.="<div class=\"swiper-slide\">
							 			        <div class=\"imgBx\">
							 			          <img src=\"$foto\" />
							 			        </div>
							 			        <div class=\"details\">
							 			            <h3>$nome</h3>
							 			        </div>
							 						</div>";

									}
									$home.="

								    	</div>
					   				<div class=\"swiper-pagination\"></div>
								  </div>


								    <script type=\"text/javascript\" src=\"swiper.min.js\"></script>

								    <script>
									   var swiper = new Swiper('.swiper-container', {
								     effect: 'coverflow',
								     grabCursor: true,
								     centeredSlides: true,
								     slidesPerView: 'auto',
								     coverflowEffect: {
									       rotate: 50,
									       stretch: 0,
									       depth: 100,
									       modifier: 1,
									       slideShadows : true,
								     },
								     pagination: {
								       el: '.swiper-pagination',
								     },
								   });
								 </script>



							";

							echo $home;

				}else{
					$_SESSION["editMode"]=null;
							//sono admin
							$home="
							<nav class=\"navbar\">
							 <h3 class=\"logo\">Immagine Logo</h3>
							 <div class=\"icon\"><i class=\"fas fa-bars\"></i></div>
								<div class=\"links-wrapper active\">
									<div class=\"backdrop\"></div>
									<div class=\"close-btn\"><i class=\"fas fa-times\"></i></div>
									<ul class=\"links\">
										<li><a href=\"Home.php\"><b>HOME</b></a></li>
										<li><a href=\"Prenotazione/prenotazione.php\"><b>PRENOTAZIONE</b></a></li>
										<li><a href=\"AreaPersonale/areaLoginAdmin.php\"><b>Area Admin</b></a></li>
									</ul>
								</div>
							</nav>

							<h3 class=\"title\">FILM RECENTI</h3>


							<div class=\"swiper-container\">
								<div class=\"swiper-wrapper\">";

								/////////prendo le foto dal database //////////////////////////
								$arrFoto=Array();
								$sql = "SELECT film.foto,film.nome from film";
								$records=$conn->query($sql);
								if ( $records == TRUE) {
										//echo "<br>Query eseguita!";
								}else {
									die("Errore nella query: " . $conn->error);
								}
								//gestisco gli eventuali dati estratti dalla query
								if($records->num_rows == 0){
										///dati non corretti
											$_SESSION["logFallito"]="yes";
										header('Location: Login-Registra.php');
								}else{
										while($tupla=$records-> fetch_assoc()){
											//echo $tupla["id"];
											$foto=$tupla["foto"];
											$nome=$tupla["nome"];
											$arrFoto+=Array($nome=>$foto);
										}
									}

									foreach($arrFoto as $nome=>$foto){
										$home.="<div class=\"swiper-slide\">
														<div class=\"imgBx\">
															<img src=\"$foto\" />
														</div>
														<div class=\"details\">
																<h3>$nome</h3>
														</div>
													</div>";

									}
									$home.="

								    	</div>
					   				<div class=\"swiper-pagination\"></div>
								  </div>


								    <script type=\"text/javascript\" src=\"swiper.min.js\"></script>

								    <script>
									   var swiper = new Swiper('.swiper-container', {
								     effect: 'coverflow',
								     grabCursor: true,
								     centeredSlides: true,
								     slidesPerView: 'auto',
								     coverflowEffect: {
									       rotate: 50,
									       stretch: 0,
									       depth: 100,
									       modifier: 1,
									       slideShadows : true,
								     },
								     pagination: {
								       el: '.swiper-pagination',
								     },
								   });
								 </script>



							";
									$_SESSION["editMode"]=null;
							echo $home;
				}
			}
$_SESSION["editMode"]=null;
			?>

			 <div class="footer">
					 <p>theCinema@gmail.com | Progetto gestione anno 2019/2020</p>
			 </div>
</body>
</html>
