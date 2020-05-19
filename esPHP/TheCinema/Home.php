<?php
	session_start();
	include "connessione.php";
 ?>

<html>


<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link rel="stylesheet" type="text/css" href="File-CSS/swiper.min.css" />
	<script
				src="https://kit.fontawesome.com/81c2c05f29.js"
				crossorigin="anonymous"
	></script>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<meta charset="utf-8">
	<title>The Cinema</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">


<style>
  @import url("https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css");
	@import url('https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap');
	@font-face {
		font-family: "font";
		src: url(font.ttf);
	}
	@font-face {
		font-family: "font2";
		src: url(font2.ttf);
	}
	body {
		background-color: #FAD961;
		background-image: linear-gradient(90deg, #FAD961 0%, #F76B1C 100%);
		margin:0;
		min-height: 100vh;
		font-family: 'font2';
		overflow-x: hidden;
	}
	/* Desktop view */

	header{
		z-index: 9999;
		position: fixed;
		height: 90px;
		width: 100%;
		background: #2f3640;
	}
	*{
		margin: 0;
		padding: 0;
		text-decoration: none;
		font-family: "Open Sans",sans-serif;
	}

	header{
		margin: 0;
		height: 90px;
		background: #2f3640;
	}

	.inner-width{
		background: black;
		max-width: 100%;
		padding: 0 10px;
		margin: auto;
	}

	.logo{
		float: left;
		min-left :10px;
		padding: 20px 0;
	}

		.logo img{
			height: 50px;
		}

		.navigation-menu{
			font-family: 'font2';
			float: right;
			display: flex;
			align-items: center;
			min-height: 90px;
		}

		.navigation-menu a{
			font-family: 'font2';

			margin-left: 10px;
			color: #ddd;
			text-transform: uppercase;

			font-size: 14px;
			padding: 12px 20px;
			border-radius: 4px;
			transition: .3s linear;
		}

		.navigation-menu a:hover{
			background: #fff;
			color: #2f3640;
			transform: scale(1.1);
		}

		.navigation-menu i{
			margin-right: 8px;
			font-size: 16px;
			}

		.home{
			color: #ff6b6b;
		}

		.about{
			color: #0abde3;
		}

		.works{
			color: #feca57;
		}

		.team{
			color: #5f27cd;
		}

		.contact{
		color: #1dd1a1;
		}

		.menu-toggle-btn{
			float: right;
			height: 90px;
			line-height: 90px !important;
			color: #fff;
			font-size: 26px;
			display: none !important;
			cursor: pointer;
			}


		@media screen and (max-width:700px) {
		.menu-toggle-btn{
			display: block !important;
		}

		.navigation-menu{
        position: fixed;
        width: 100%;
        background: #172b4d;
        top: 90px;
        right: 0;
        display: none;
        padding: 20px 40px;
        box-sizing: border-box;
      }

		.navigation-menu::before{
			content: "";
			border-left: 10px solid transparent;
			border-right: 10px solid transparent;
			border-bottom: 10px solid #172b4d;
			position: absolute;
			top: -10px;
			right: 10px;
		}

		.navigation-menu a{
			display: block;
			margin: 10px 0;
		}

		.navigation-menu.active{
			display: block;
		}
		}


/* fine navigation bar */

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
		height: auto;
		max-height:500px;
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
		border-top: 0px solid #ccc;
		background: black;
		text-align: center;
	  height: 0px;

	}

	.titolo{
		padding-top: 150px;
		width: 100%;
		height: 200px;
		text-align: center;
	}
	.titolohead{
		font-size: 50px;
		font-weight: bold;
		height: 50%;
		width: 100%;
		font-family: "font";
	}
	.titoloinfo{
		font-family: "font2";
		padding-top: 55px;
		font-size: 25px;
		height: 50%;
		width: 100%;
	}
	h3{
		font-weight: 700;
		font-family: "font2";
	}
	</style>

</head>

<body style="font-family: 'font2';" >


		<?php
			//non sono admin
			$numeroLimiteImmagini=5;   //numero massimo di foto che posso essere prese dal database
			$_SESSION["dataDaMantenere"]=null;
			$_SESSION["datiLoginNonPresenti"]=null;
			$_SESSION["logFallito"]=null;
			$_SESSION["regsterFall"]=null;
			if(empty($_SESSION["log"])){
					//home senza aver effettuato il login
					$_SESSION["editMode"]=null;
					$home = "
					<header >
						<div class=\"inner-width\">
							<i class=\"menu-toggle-btn fas fa-bars\"></i>
							<nav class=\"navigation-menu\">
								<a href=\"Home.php\"><i class=\"fas fa-home home\"></i> HOME</a>
								<a href=\"Prenotazione/Prenotazione.php\"><i class=\"fas fa-align-left about\"></i>PRENOTA BIGLIETTO</a>
								<a href=\"Registrazione/loginregister/Login-Registra.php\"><i class=\"fab fa-buffer works\"></i> REGISTRATI-ACCEDI</a>

							</nav>
						</div>
					</header>
			    <script type=\"text/javascript\">
			      $(\".menu-toggle-btn\").click(function(){
			        $(this).toggleClass(\"fa-times\");
			        $(\".navigation-menu\").toggleClass(\"active\");
			      });
			    </script>



												<div class=\"titolo\">
													<div class=\"titolohead\">
													FILM POPOLARI
													</div>
													<div class=\"titoloinfo\">
													Questi sono i film più popolari usciti al cinema, usa il mouse per sfogliare il catalogo. Corri subito a guardarli!
													<br />
													</div>
												</div>


													<div class=\"swiper-container\" style=\"margin-top: 40px\">
														<div class=\"swiper-wrapper\">

																	";
																	///////prendo le immagini dal database//////////////////////////////
																	///////////////trovo i film disponibili per la data selezionata//////////////////////
																		$arraryImmagini=Array();
																	 $film=Array();
																	 	$sql="SELECT film.foto,film.nome from film join proiezione on film.codiceFilm=proiezione.codiceFilm order by proiezione.dataProiezione LIMIT $numeroLimiteImmagini ";
																					 $records=$conn->query($sql);
																					 if ( $records == TRUE) {
																							 //echo "<br>Query eseguita!";
																					 } else {
																						 die("Errore nella query: " . $conn->error);
																					 }
																					 if($records->num_rows ==0){
																								 //	echo "la query non ha prodotto risultato";

																					 }else{

																									 while($tupla=$records->fetch_assoc()){
																										 $immagine=$tupla["foto"];
																											 $nomeFilm=$tupla["nome"];
																											 $arraryImmagini+=Array($immagine=>$nomeFilm);
																									 }
																					}
																			foreach($arraryImmagini as $foto=>$nomeFilm){

																						$home.="


																						<!--  immagine ENDGAME -->
																				      <div class=\"swiper-slide\">
																				        <div class=\"imgBx\">
																				          <img src=\"Immagini\\$foto\"/>
																				        </div>
																				        <div class=\"details\">
																				            <h3>$nomeFilm</h3>
																				        </div>
																							</div>

																						";
																			}
																		$home.="
															    	</div>
												   				<div class=\"swiper-pagination\" style=\"visibility:hidden;\"></div>
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
							<header>
								<div class=\"inner-width\">
									<i class=\"menu-toggle-btn fas fa-bars\"></i>
									<nav class=\"navigation-menu\">
										<a href=\"Home.php\"><i class=\"fas fa-home home\"></i> HOME</a>
										<a href=\"Prenotazione/Prenotazione.php\"><i class=\"fas fa-align-left about\"></i>PRENOTA BIGLIETTO</a>
										<a href=\"AreaPersonale/areaLogin.php\"><i class=\"fab fa-buffer works\"></i> Area Personale</a>

									</nav>
								</div>
							</header>
					    <script type=\"text/javascript\">
					      $(\".menu-toggle-btn\").click(function(){
					        $(this).toggleClass(\"fa-times\");
					        $(\".navigation-menu\").toggleClass(\"active\");
					      });
					    </script>



							<div class=\"titolo\">
								<div class=\"titolohead\">
								FILM POPOLARI
								</div>
								<div class=\"titoloinfo\">
								Questi sono i film più popolari usciti al cinema, usa il mouse per sfogliare il catalogo. Corri subito a guardarli!
								<br />
								</div>
							</div>


								<div class=\"swiper-container\" style=\"margin-top: 40px\">
									<div class=\"swiper-wrapper\">

												";
												///////prendo le immagini dal database//////////////////////////////
												///////////////trovo i film disponibili per la data selezionata//////////////////////
													$arraryImmagini=Array();
												 $film=Array();
												 	$sql="SELECT film.foto,film.nome from film join proiezione on film.codiceFilm=proiezione.codiceFilm order by proiezione.dataProiezione LIMIT $numeroLimiteImmagini ";
																 $records=$conn->query($sql);
																 if ( $records == TRUE) {
																		 //echo "<br>Query eseguita!";
																 } else {
																	 die("Errore nella query: " . $conn->error);
																 }
																 if($records->num_rows ==0){
																			 //	echo "la query non ha prodotto risultato";

																 }else{

																				 while($tupla=$records->fetch_assoc()){
																					 $immagine=$tupla["foto"];
																						 $nomeFilm=$tupla["nome"];
																						 $arraryImmagini+=Array($immagine=>$nomeFilm);
																				 }
																}
														foreach($arraryImmagini as $foto=>$nomeFilm){

																	$home.="


																	<!--  immagine ENDGAME -->
															      <div class=\"swiper-slide\">
															        <div class=\"imgBx\">
															          <img src=\"Immagini\\$foto\"/>
															        </div>
															        <div class=\"details\">
															            <h3>$nomeFilm</h3>
															        </div>
																		</div>

																	";
														}
													$home.="
										    	</div>
							   				<div class=\"swiper-pagination\" style=\"visibility:hidden;\"></div>
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
							<header>
								<div class=\"inner-width\">

									<i class=\"menu-toggle-btn fas fa-bars\"></i>
									<nav class=\"navigation-menu\">
										<a href=\"Home.php\"><i class=\"fas fa-home home\"></i> HOME</a>
										<a href=\"Prenotazione/Prenotazione.php\"><i class=\"fas fa-align-left about\"></i>PRENOTA BIGLIETTO</a>
										<a href=\"AreaPersonale/areaLoginAdmin.php\"><i class=\"fab fa-buffer works\"></i> Area personale admin</a>

									</nav>
								</div>
							</header>
					    <script type=\"text/javascript\">
					      $(\".menu-toggle-btn\").click(function(){
					        $(this).toggleClass(\"fa-times\");
					        $(\".navigation-menu\").toggleClass(\"active\");
					      });
					    </script>

							<div class=\"titolo\">
								<div class=\"titolohead\">
								FILM POPOLARI
								</div>
								<div class=\"titoloinfo\">
								Questi sono i film più popolari usciti al cinema, usa il mouse per sfogliare il catalogo. Corri subito a guardarli!
								<br />
								</div>
							</div>

							<div class=\"swiper-container\" style=\"margin-top: 40px\">
								<div class=\"swiper-wrapper\">

												";
												///////prendo le immagini dal database//////////////////////////////
												///////////////trovo i film disponibili per la data selezionata//////////////////////
													$arraryImmagini=Array();
												 $film=Array();
												 	$sql="SELECT film.foto,film.nome from film join proiezione on film.codiceFilm=proiezione.codiceFilm order by proiezione.dataProiezione LIMIT $numeroLimiteImmagini ";
																 $records=$conn->query($sql);
																 if($records == TRUE) {
																		 //echo "<br>Query eseguita!";
																 }else {
																	 die("Errore nella query: " . $conn->error);
																 }
																 if($records->num_rows ==0){
																			 //	echo "la query non ha prodotto risultato";

																 }else{

																				 while($tupla=$records->fetch_assoc()){
																					 $immagine=$tupla["foto"];
																						 $nomeFilm=$tupla["nome"];
																						 $arraryImmagini+=Array($immagine=>$nomeFilm);
																				 }
																}
														foreach($arraryImmagini as $foto=>$nomeFilm){
																	$home.="


																	<!-- 1 immagine -->
															      <div class=\"swiper-slide\">
															        <div class=\"imgBx\">
															          <img src=\"Immagini\\$foto\" />
															        </div>
															        <div class=\"details\">
															            <h3>$nomeFilm</h3>
															        </div>
																		</div>
																	<!--           -->
																	";
														}
													$home.="
										    	</div>
							   				<div class=\"swiper-pagination\" style=\"visibility:hidden;\"></div>
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
					 <p style="color:white; border-top: 2px solid black;">theCinema@gmail.com  </p>
				<!--	 <p style="color:white;">Progetto gestione anno 2019/2020 </p> -->
			 </div>
</body>
</html>
