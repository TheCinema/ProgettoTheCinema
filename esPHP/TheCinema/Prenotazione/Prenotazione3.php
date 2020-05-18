
<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire');
session_start();
$ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
$porta=$_SERVER['SERVER_PORT'];

?>
<html>
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
			@font-face {
				font-family: "font2";
				src: url(../font2.ttf);
			}
			@import url("https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css");
			@import url('https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap');
		<style>
			body{
				margin:auto;
				background: rgb(253,187,45);
				background: linear-gradient(0deg, rgba(253,187,45,1) 0%, rgba(34,193,195,1) 100%);
				font-family: 'Roboto', sans-serif;
				font-weight: 800;
				position: relative;
			}

			form{
				width:100%;
				text-align: center;
				position: absolute;
				top: 180px;
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

			.container{
			  width: 100%;
				height: 61px;
				text-align: center;
				margin: 20px 0;
				margin-right: 0;
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
		</style>
	</head>

<body style="background-color: #FAD961; font-family: 'font2';
background-image: linear-gradient(90deg, #FAD961 0%, #F76B1C 100%);
">

	<header>
		<div class="inner-width">
			<a href="#" class="logo"><img src="logo.png" alt=""></a>
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
          <li >FILM</li>
          <li>POSTI</li>
          <li class="active">RIEPILOGO</li>
          <li>PAGAMENTO</li>
  </ul>

	<?php

	$selezionato=false;  //per vedere se è stato selezionato almeno 1
	include "connessione.php";
	if(isset($_SESSION["usrLogin"])){
		//$usernameUtente=$_SESSION["usrLogin"];
	}else{
		header("Location: http://" .$ip .":" .$porta ."/esPHP/TheCinema/Registrazione/loginregister/Login-Registra.php");
		die("");
	}
	if(isset($_POST["annulla"])){
		//torno indietro
		$idPr=$_SESSION["idProiezione"];
		header("Location: http://" .$ip .":" .$porta ."/esPHP/TheCinema/Prenotazione/Prenotazione2.php?idProiezione=$idPr");
		die("");
	}else{
		//continuo
	}
			if(isset($_POST["numeroPosti"])){
				$numeroPosti=$_POST["numeroPosti"];
				$presente=true;
				$msg="<br>";
				$id=Array();
				$numero=Array();
				$lettera=Array();
				$disabile=Array();
				for($i=1;$i<=$numeroPosti;$i++){
						if(isset($_POST["$i"])){
							$po=$_POST["$i"];
										$app=Array();
										$app= explode("?",$po);
										$id[]=$app[0];
										$numero[]=$app[1];
										$lettera[]=$app[2];
										$disabile[]= $app[3];
										$selezionato=true;  //metto selezionato a true
						}
				}
			}else{ //nessun posto selezionato
				header("Location: http://" .$ip .":" .$porta ."/esPHP/TheCinema/Prenotazione2.php");
				die("");
			}

					if($selezionato==false){ //torno a prenotazione2.php quando non è stato selezionato niente
						//prendo l'idProiezione cosi possono essere rivisti gli stessi posti
						$idPr=$_SESSION["idProiezione"];
						header("Location: http://" .$ip .":" .$porta ."/esPHP/TheCinema/Prenotazione/Prenotazione2.php?idProiezione=$idPr");
						die("");
					}

								///vado a trovare il costo, dato che i posti sono nella stessa sala prenderò il primo///////////////////////
								$idSalaPostoCasuale=$id[0];
						 $sql = "SELECT sala.costoIntero,sala.costoRidottoU6 from sala join posto on sala.id=posto.idSala where posto.id=\"$idSalaPostoCasuale\"  ";
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
																		$costoIntero=$tupla["costoIntero"];
																		$costoRidottoU6=$tupla["costoRidottoU6"];
																	//	echo "<br> Costo intero $costoIntero";
																	//	echo "<br> Costo ricotto $costoRidottoU6";
																}
											 }
											 $msg="<form action=\"prenotazione4.php\" method=\"POST\">";
											 $numPosti=1;

											 if(count($numero)==1){
												 $msg.="
															 <p style=\"font-weight: bold; font-size: 40px\">RIEPILOGO</p>
															 <br />";
											 }else{
												 $dim=count($numero);
												  $msg.="
												 	<p  style=\"font-weight: bold; font-size: 40px\">In basso trovi il resoconto dei $dim posti scelti</p>
													<br />";
											 }
											 for($i=0;$i<count($numero);$i++){
												// echo "<br><a>[$id[$i]] Posto lettera  $lettera[$i], numero  $numero[$i]</a> ";
												 $mesCostoIntero="Costo intero $costoIntero";
												 $mesCostoRidotto="Costo ridotto $costoRidottoU6";
												 $n=$i;
												 $n++;

												 $msg.="

												 				<label for=\"costo\">Fila  $lettera[$i], Posto  $numero[$i]</label>
												 					<select style=\"border-radius: 25px\" id=\"costo$numPosti\" name=\"costo$numPosti\">
																	  <option value=\"$costoIntero\">$mesCostoIntero</option>
																	  <option value=\"$costoRidottoU6\">$mesCostoRidotto</option>
																	</select><br>";
																	$msg.="<input  type=\"hidden\" name=\"idPosto$numPosti\" value=\"$id[$i]\"></input>";
																	$numPosti++;
													}


										 $msg.="
											 <input style=\"border: 2px solid black; border-radius: 25px; margin-top: 50px; width: 200px; height: 50px; font-weight: bold\" type=\"submit\" value=\"VAI AL PAGAMENTO\"></input>
											 <input  type=\"hidden\" name=\"numeroPosti\" value=\"$numPosti\"></input>
											</form>";

											 echo $msg;


			?>

</body>
</html>
