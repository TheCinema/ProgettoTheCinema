
<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire');
session_start();
	$ip = $_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
	$porta = $_SERVER['SERVER_PORT'];

	?>
		<head>
				<title>The Cinema </title>
				<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
				<script src="https://kit.fontawesome.com/81c2c05f29.js"	crossorigin="anonymous"></script>
				<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
				<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
				<script type="text/javascript">
					$(".menu-toggle-btn").click(function(){
						$(this).toggleClass("fa-times");
						$(".navigation-menu").toggleClass("active");
					});
				</script>
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
				<style>
				
				@import url("https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css");
				@import url('https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap');
			<style>
				body {
					margin:auto;
					background-color: #FAD961;
	background-image: linear-gradient(90deg, #FAD961 0%, #F76B1C 100%);

					font-weight: bold;
					position: relative;
				}
				form{
				position: absolute;
				top: 60%;
				left: 50%;
				transform: translate(-50%, -50%);
				}

				header{
					width: 100%;
					height: 90px;
					background: #2f3640;
				}

			.inner-width{
				background: black;
				max-width: 100%;
				padding: 0 10px;
			}

			.logo{
				float: left;
				min-left :10px;
				padding: 0 0;
			}

			.logo img{
				height: 30px;
			}

			.navigation-menu{
				float: right;
				display: flex;
				align-items: center;
				min-height: 90px;
			}
			.navigation-menu a{
				margin-left: 10px;
				color: #ddd;
				text-transform: uppercase;
				font-size: 14px;
				padding: 12px 20px;
				border-radius: 6px;
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
			.button2 {
				border: none;
		  color: white;
		  padding: 15px 32px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
				background-color: #008CBA; /* Blue */
			position: absolute;
				top: 100%;
				left: 50%;
				transform: translate(-50%, -50%);
			}

			.container{
				width: 100%;
				height: 61px;
				text-align: center;
				margin: 20px 0;

				padding: 0;
			 }
									.progressbar {
										padding: 0;
										width: 100%;
										text-align: center;
										position: fixed;
								    counter-reset: step;
								  }
		  .progressbar li {
			  font-family: 'Roboto', sans-serif;
		      list-style-type: none;
		      width: 25%;
		      float: left;

		      font-size: 12px;
		      position: relative;
		      text-align: center;
		      text-transform: uppercase;
		      color: #7d7d7d;
		  }
		  .progressbar li:before {
			  font-family: 'Roboto', sans-serif;
		      width: 30px;
		      height: 30px;
		      content: counter(step);
		      counter-increment: step;
		      line-height: 30px;
		      border: 2px solid #7d7d7d;
		      display: block;
		      text-align: center;
		      margin: 0 auto 10px auto;
		      border-radius: 50%;
		      background-color: white;
		  }
		  .progressbar li:after {
			  font-family: 'Roboto', sans-serif;
		      width: 100%;
		      height: 2px;
		      content: '';
		      position: absolute;
		      background-color: #7d7d7d;
		      top: 15px;
		      left: -50%;
		      z-index: -1;
		  }
		  .progressbar li:first-child:after {
			  font-family: 'Roboto', sans-serif;
		      content: none;
		  }
		  .progressbar li.active {
			  font-family: 'Roboto', sans-serif;
		      color: black;
		  }
		  .progressbar li.active:before {
			  font-family: 'Roboto', sans-serif;
		      border-color: black;
		  }
		  .progressbar li.active + li:after {
			  font-family: 'Roboto', sans-serif;
		      background-color: black;
		  }
			.imp{
				width: 100%;
				height: auto;
				text-align: center;
				padding-top: 60px;
				padding-left: 390px;

			}
			</style>
		</head>

		<body style="background-color: #FAD961; background-image: linear-gradient(90deg, #FAD961 0%, #F76B1C 100%);">

		<header>
			<div class="inner-width">
				<i class="menu-toggle-btn fas fa-bars"></i>
				<nav class="navigation-menu">
					<a href="../Home.php"><i class="fas fa-home home"></i> HOME</a>
					<a href="Prenotazione.php"><i class="fas fa-align-left about"></i>PRENOTA BIGLIETTO</a>
					<a href="../AreaPersonale/areaLogin.php"><i class="fab fa-buffer works"></i> AREA PERSONALE</a>

				</nav>
			</div>
		</header>
  <div class="container">
     <ul class="progressbar">
          <li>FILM</li>
          <li>POSTI</li>
          <li>RIEPILOGO</li>
          <li class="active">PAGAMENTO</li>
  		</ul>
	<?php

		$username=$_SESSION["usrLogin"];
		if(isset($username)){
			//ok rimane
		}else{
				header("location: http://" .$ip .":" .$porta ."/esPHP/TheCinema/Home.php");  //viene rimandato alla Home
				die("");
		}
					$arrPosti=Array();
					$costo=0;
						if(isset($_POST["numeroPosti"])){
							$numeroPosti=$_POST["numeroPosti"];
							for($i=1;$i<=$numeroPosti;$i++){
									if(isset($_POST["idPosto$i"])){
										$ps=$_POST["idPosto$i"];
										$arrPosti[]=$ps;
									}
									if(isset($_POST["costo$i"])){
										$costo+=$_POST["costo$i"];
									}else{
										$costo+=0;
									}
							}
						}else{
							header("Location: http://" .$ip .":" .$porta ."/esPHP/TheCinema/Prenotazione/Prenotazione.php");
							die("");
						}
						$nmEffettivo=$numeroPosti-1;
						$totale=0.00;
						$totale=$costo + 30 + $costo*30/100;
						$msg="<br />
						<br>
						<div class=\"imp\" style=\"text-align: center\">

				<table style=\"font-size: 20px; padding-left: 100px; margin: auto; 	font-size: 30px;\">
						<tr>
							<td style=\"text-align: left\">
							Posti selezionati:

							</td>
							<td style=\"text-align: center\">
							$nmEffettivo
							</td>
						</tr>
								<tr>
								<td style=\"text-align: left\">
								Importo da pagare:

								</td>
								<td  style=\"text-align: right\">
								$costo €
								</td>
								</tr>
							<tr>
							<td style=\"text-align: left\">
							Mancia obbligatoria:

							</td>
							<td  style=\"text-align: right\">
							+30 €
							</td>
														</tr>

														<tr style=\"border-bottom: 2px solid black\">

							<td style=\"text-align: left\" >
							Tasse aggiuntive:

							</td>
							<td style=\"text-align: right\">
							+30%
							</td>


						</tr>
						<tr>
						<td style=\"font-weight: bold\">
						Importo totale:
						</td>
						<td style=\"text-align: right; font-weight: bold;text-align: left\">
						$totale €
						</td>
						</tr>
						</table>		</div>";
						$msg.= "<form action=\"EffettuaAcquisto.php\" method=\"POST\">
										<input class=\"button2\" style=\"margin-top: 30px; border-radius: 25px\" type=\"submit\" style=\"font-weight: bold\" value=\"Acquista $nmEffettivo biglietto/i\" </input>";
											for($i=0;$i<count($arrPosti);$i++){
												$msg.="<input type=\"hidden\" value=\"$arrPosti[$i]\" name=\"id$i\"></input>";
											}
											$msg.="<input type=\"hidden\" value=\"$numeroPosti\" name=\"numeroPosti\"></input>";
												$val=count($arrPosti);
											$msg.="</form>";
						echo $msg;
						?>


								<?php
						//devo reinviare i dati ad un altra pagina
						/*
						////////dopo che è stato cliccato il pulsante/////////////////////
						if($_SERVER["REQUEST_METHOD"]=="POST"){
							//////////////////////procedo ad aggiornare il db //////////////////////////////////////
							/////////////////////////////////prendo l'id del cliente/////////////
							include "connessione.php";
							$usernameUtente=$_SESSION["usrLogin"];
							$sql = "SELECT idUtente from utente where username=\"$usernameUtente\"  ";
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
																		 $idUtente=$tupla["idUtente"];
																		 echo "id utente : $idUtente ";
																	 //	echo "<br> Costo intero $costoIntero";
																	 //	echo "<br> Costo ricotto $costoRidottoU6";
																 }
												}



							//////1. inserisco l'acquisto dell'utente per ciascun biglietto acquistato////////////
							if(isset($_SESSION["idProiezione"])){
													$idProiezione=$_SESSION["idProiezione"];
												}else{
													die("errore");
												}
												for($i=0;$i<count($arrPosti);$i++){

														 $sql = "insert into acquistabiglietto(idCliente,idProiezione,id_posto) values(\"$idUtente\",\"$idProiezione\",\"$arrPosti[$i]\") ";
																				$records=$conn->query($sql);
																				if ( $records == TRUE) {
																						//echo "<br>Query eseguita!";
																						die("Registrazione avvenuta correttamente");
																				} else {
																					die("Errore nella query: " . $conn->error);
																				}

												}

						}
						*/

		?>

</body>
</html>
