<html>
		<head>
				<title>The Cinema </title>
			<style>
			body {
				margin:auto;
				background: rgb(253,187,45);

				font-family: 'Roboto', sans-serif;
				font-weight: 800;
				position: relative;

			}
			.c{
				position: absolute;
					top: 30%;
			}

				form{
				position: absolute;
				top: 60%;
				left: 50%;
				transform: translate(-50%, -50%);
				}
				p {
				border-style: inset;
				text-align:center;
				position: absolute;
				top: 20%;
				left: 50%;
				transform: translate(-50%, -50%);
				 font-size: 34px;
				padding: 30px;
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
				left: 80%;
				transform: translate(-50%, -50%);
			}
			.button3 {
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
				left: -150%;
				transform: translate(-50%, -50%);
			}

					.container {
											font-family: 'Roboto', sans-serif;
										  width: 1300px;
										  margin: 30px ;
								  }
		  .progressbar {font-family: 'Roboto', sans-serif;
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

<body>
  <div class="container">
      <ul class="progressbar">
				<li >Scegli il film</li>
				<li class="active">Seleziona i posti</li>
				<li>Ricapitolo</li>
				<li>Pagamento</li>
  </ul>



		<?php

			session_start();
			$ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
			$porta=$_SERVER['SERVER_PORT'];   //porta del serve, perchè c'è chi ha 80, chi 8080 etc...



		if(isset($_GET["idProiezione"])){

	        if(isset($_SESSION["usrLogin"])){
	          //vuoldire che é stato effettuato il login precedentemente
	        }else{
	          $_SESSION["loginPerAcquisto"]="yes";
	          header("Location: http://" .$ip .":" .$porta ."/esPHP/TheCinema/Registrazione/loginregister/Login-Registra.php");
	          die("");
	        }

			$idProiezione=$_GET["idProiezione"];
			$_SESSION["idProiezione"]=$idProiezione;
		//echo $id;
			//trovo la sala in cui si trova il film
			include "connessione.php";
				$film=Array();
			$sql = "SELECT sala.id,film.codiceFilm from film  join proiezione on film.codiceFilm=proiezione.codiceFilm join sala on proiezione.idSala=sala.id where proiezione.idProiezione=\"$idProiezione\"";
								 $records=$conn->query($sql);
								 if ( $records == TRUE) {
										 //echo "<br>Query eseguita!";
								 } else {
									 die("Errore nella query: " . $conn->error);
								 }
								 if($records->num_rows ==0){
											 //	echo "la query non ha prodotto risultato";
											 die("errore : il film non si trova in nessuna sala del cinema");
								 }else{

												 while($tupla=$records->fetch_assoc()){
													 $idFilm=$tupla["codiceFilm"];
													 $idSala=$tupla["id"];
														// 	echo "<br>il fim con id $idFilm viene proiettato nella sala $idSala ";

												 }
								}

								/////////////////////////////////////////////////mostro i posti presenti nella sala///////////////////////////
							include "VisualizzaPosti.php";


		}else{
			header("location:Prenotazione.php");
		}



		 ?>

</body>
</html>
